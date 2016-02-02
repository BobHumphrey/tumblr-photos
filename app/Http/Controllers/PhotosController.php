<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Submission;
use DB;
use Carbon\Carbon;

class PhotosController extends Controller {

  public function __construct() {
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'delete', 'destroy', 'likes']]);
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index($page = null) {
    $page = ($page) ? $page : 1;
    $photosPager = $this->dispatchFrom('App\Jobs\CreatePhotosPager', new Request, [
      'page' => $page]);
      return view('photos.index')->with([
        'photos'=> $photosPager['photos'],
        'previousUrl'=> $photosPager['previousUrl'],
        'nextUrl'=> $photosPager['nextUrl'],
      ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
      return view('photos.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
      $file = $request->file('file');
      $this->dispatchFrom('App\Jobs\SavePhoto', $request, ['file' => $file]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id) {
      $photo = Photo::findOrFail($id);
      $submissions = Submission::photoSubmissions($id);
      $subCount = $submissions->count();
      if ($subCount) {
        $grids = $this->dispatchFrom('App\Jobs\CreateSubmissionsGrid', new Request,
        ['submissions' => $submissions, 'page' => 'photo']);
      }
      else {
        $noRecordsFound = 'No submissions for this photo.';
        $grids['narrowGrid'] = $noRecordsFound;
        $grids['grid'] = $noRecordsFound;
      }
      return view('photos.show')->with([
        'narrowGrid' => $grids['narrowGrid'],
        'grid' => $grids['grid'],
        'photo' => $photo,
        'submissions' => $submissions,
        'subCount' => $subCount,
      ]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id) {
      $photo = Photo::findOrFail($id);
      return view('photos.edit')->with([
        'photo' => $photo,
        'photoSrc' => '/photo_files/normal/' . $photo->file_name,
      ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update($id, Requests\PhotoRequest $request) {
      $photo = Photo::findOrFail($id);
      $photo->update($request->all());
      flashMessage("The photo has been updated.", "alert-success");
      return redirect('photos/list');
    }

    public function delete($id) {
      $photo = Photo::findOrFail($id);
      return view('photos.delete')->with('photo', $photo);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id) {
      $photo = Photo::findOrFail($id);
      $id = $photo->id;
      $photo->delete();
      flashMessage("Photo with ID $id has been deleted.", "alert-success");
      return redirect('photos/list');
    }

    public function listing(Request $request, $newOnly = null) {
      $grids = $this->dispatchFrom('App\Jobs\CreatePhotoGrid', $request,
        ['newOnly' => $newOnly]);
      return view('photos.listing')->with([
        'grid' => $grids['grid'],
        'newOnly' => $newOnly,
      ]);
    }

    public function likes() {
      $display = '';
      // Authenticate via OAuth
      $client = new \Tumblr\API\Client(
        env('BH_TUMBLR_CONSUMER_KEY'),
        env('BH_TUMBLR_CONSUMER_SECRET'),
        env('BH_TUMBLR_TOKEN'),
        env('BH_TUMBLR_TOKEN_SECRET')
      );

      $continue = TRUE;
      $offset = 0;
      while($continue) {
        // Make the request
        $reply = $client->getBlogPosts('bobhumphreyphotography', array('offset' => $offset, 'reblog_info' => true, 'notes_info' => true));
        $posts = $reply->posts;
        if(count($posts)) {
          foreach ($posts as $post) {
            $note_count = 0;
            $note_count_last10 = 0;
            $note_count_last30 = 0;
            if (property_exists($post, 'notes')) {
              $notes = $post->notes;
              foreach ($notes as $note) {
                $timestamp = $note->timestamp;
                $noteTime = Carbon::createFromTimestamp($timestamp);
                $daysAgo = $noteTime->diffInDays();
                $note_count++;
                if ($daysAgo <= 10) {
                  $note_count_last10++;
                }
                if ($daysAgo <= 30) {
                  $note_count_last30++;
                }
              }
            }
            $post_url = $post->post_url;
            $photo = DB::table('photo')->where('url', $post_url)->first();
            if ($photo) {
              DB::table('photo')
              ->where('url', $post_url)
              ->update([
                'notes' => $note_count,
                'notes_last30' => $note_count_last30,
                'notes_last10' => $note_count_last10,
              ]);
            }
            //$notes_count = count($notes);
            //\Debugbar::info($photo->url);
            \Debugbar::info($note_count . '--' . $note_count_last30 . '--' . $note_count_last10);

          }
          $offset = $offset + 20;
        }
        else {
          $continue = FALSE;
        }
      }
      //\Debugbar::info($posts);

      return view('photos.likes');
    }

  }
