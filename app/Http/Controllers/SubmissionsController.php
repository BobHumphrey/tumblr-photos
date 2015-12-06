<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Submission;
use App\Photo;
use App\Gallery;

// Grids

use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\EloquentDataRow;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class SubmissionsController extends Controller {

  public function __construct() {
    $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'delete', 'destroy']]);
  }

  /**
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index(Request $request) {
    $submissions = Submission::allSubmissions();
    $grids = $this->dispatchFrom('App\Jobs\CreateSubmissionsGrid', $request,
    ['submissions' => $submissions, 'page' => 'submissions']);
    return view('submissions.index')->with([
      'narrowGrid' => $grids['narrowGrid'],
      'grid' => $grids['grid'],
      'submissions' => $submissions,
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
  public function create($id) {
    $photo = Photo::findOrFail($id);
    $photoSrc = '/photo_files/normal/' . $photo->file_name;
    $photoId = $photo->id;
    $galleryList = array();
    $galleries = Gallery::orderBy('name', 'asc')->get();
    foreach($galleries as $gallery) {
      $galleryList[strval($gallery->id)] = $gallery->name;
    }
    return view('submissions.create')->with([
      'photoSrc' => $photoSrc,
      'photoId' => $photoId,
      'galleryList' => $galleryList,
      'galleryId' => null,
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  Request  $request
  * @return Response
  */
  public function store(Requests\SubmissionRequest $request) {
    Submission::create($request->all());
    flashMessage("The submission has been added.", "alert-success");
    return redirect('submissions');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function show($id) {
    $submission = Submission::findOrFail($id);
    return view('submissions.show')->with([
      'submission' => $submission,
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  public function edit($id) {
    $submission = Submission::findOrFail($id);
    $photoSrc = '/photo_files/normal/' . $submission->photo->file_name;
    $galleryList = array();
    $galleries = Gallery::orderBy('name', 'asc')->get();
    foreach($galleries as $gallery) {
      $galleryList[strval($gallery->id)] = $gallery->name;
    }
    return view('submissions.edit')->with([
      'submission' => $submission,
      'photoSrc' => $photoSrc,
      'photoId' => $submission->photo_id,
      'galleryList' => $galleryList,
      'galleryId' => null,
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  Request  $request
  * @param  int  $id
  * @return Response
  */
  public function update($id, Requests\SubmissionRequest $request) {
    $submission = Submission::findOrFail($id);
    $submission->update($request->all());
    flashMessage("The submission has been updated.", "alert-success");
    return redirect('submissions');
  }

  public function delete($id) {
    $submission = Submission::findOrFail($id);
    return view('submissions.delete')->with('submission', $submission);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
  public function destroy($id) {
    $submission = Submission::findOrFail($id);
    $id = $submission->submission_id;
    $submission->delete();
    flashMessage("Submission with ID $id has been deleted.", "alert-success");
    return redirect('submissions');
  }

}
