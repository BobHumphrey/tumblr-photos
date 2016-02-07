<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Submission;
use App\Http\Requests\GalleryRequest;

class GalleriesController extends Controller {

  public function __construct() {
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'delete', 'destroy']]);
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index(Request $request) {
    $grids = $this->dispatchFrom('App\Jobs\CreateGalleriesGrid', $request);
    return view('galleries.index')->with([
      'narrowGrid' => $grids['narrowGrid'],
      'grid' => $grids['grid'],
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create() {
    return view('galleries.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  Request  $request
  * @return Response
  */
  public function store(GalleryRequest $request) {
    Gallery::create($request->all());
    flashMessage("The gallery has been added.", "alert-success");
    return redirect('galleries');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id) {
    $gallery = Gallery::findOrFail($id);
    $submissions = Submission::gallerySubmissions($id);
    $subCount = $gallery->reblogs;
    if ($subCount) {
      $grids = $this->dispatchFrom('App\Jobs\CreateSubmissionsGrid', new Request,
      ['submissions' => $submissions, 'page' => 'gallery']);
    } else {
      $noRecordsFound = 'No submissions for this gallery.';
      $grids['narrowGrid'] = $noRecordsFound;
      $grids['grid'] = $noRecordsFound;
    }
    return view('galleries.show')->with([
      'narrowGrid' => $grids['narrowGrid'],
      'grid' => $grids['grid'],
      'gallery' => $gallery,
      'submissions' => $submissions,
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id) {
    $gallery = Gallery::findOrFail($id);
    return view('galleries.edit')->with('gallery', $gallery);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  Request  $request
  * @param  int  $id
  * @return Response
  */
  public function update($id, Requests\GalleryRequest $request) {
    $gallery = Gallery::findOrFail($id);
    $gallery->update($request->all());
    flashMessage("The gallery has been updated.", "alert-success");
    return redirect('galleries');
  }

  public function delete($id) {
    $gallery = Gallery::findOrFail($id);
    return view('galleries.delete')->with('gallery', $gallery);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id) {
    $gallery = Gallery::findOrFail($id);
    $name = $gallery->name;
    $gallery->delete();
    flashMessage("'$name' has been deleted.", "alert-success");
    return redirect('galleries');
  }


}
