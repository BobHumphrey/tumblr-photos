<?php
\Debugbar::info($submission);
$src = '/photo_files/normal/' . $submission->photo->file_name;
$published = showCheckMark($submission->published_flag);
$publishedNotSubmitted = showCheckMark($submission->published_not_submitted);
$galleryUrl = action('GalleriesController@show', ['id' => $submission->gallery_id]);
?>

@extends('app')

@section('pageTitle')

Submission / Reblog

@stop

@section('content')

<div class="row">
  <div class="col-md-4">
    <img src={{$src}} class="img-responsive">
    {!! Form::open([
    'method' => 'GET',
    'action' => ['SubmissionsController@edit', $submission->submission_id]
    ]) !!}
    {!! Form::submit('Update Submission/Reblog', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

    {!! Form::open([
    'method' => 'GET',
    'action' => ['PhotosController@delete', $submission->submission_id]
    ]) !!}
    {!! Form::submit('Delete Submission/Reblog', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
  </div>

  <div class="col-md-8">
    <table class="table table-striped table-bordered">
      <tr>
        <td>ID</td>
        <td>{{$submission->submission_id}}</td>
      </tr>
      <tr>
        <td>Gallery</td>
        <td><a href="{{$galleryUrl}}" target="_blank">{{$submission->gallery->name}}</a></td>
      </tr>
      <tr>
        <td>Submitted Date</td>
        <td>{{$submission->submitted_date}}</td>
      </tr>
      <tr>
        <td>Reblog Date</td>
        <td>{{$submission->published_date}}</td>
      </tr>
    </table>
  </div>



  @stop
