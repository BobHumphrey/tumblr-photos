<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Submission;

class PhotosController extends Controller {

  public function __construct() {
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'delete', 'destroy']]);
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index($page) {
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
      return redirect('photos');
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
      return redirect('photos');
    }

    public function listing(Request $request) {
      $photosQueryBuilder = Photo::where('id', '>', 0);
      $photos = $photosQueryBuilder->get();
      $grids = $this->dispatchFrom('App\Jobs\CreatePhotoGrid', $request);
      return view('photos.listing')->with([
        'grid' => $grids['grid'],
        'photos' => $photos,
      ]);
    }

  }
