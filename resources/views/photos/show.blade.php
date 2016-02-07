<?php
$src = '/photo_files/normal/' . $photo->file_name;
?>

@extends('app')

@section('pageTitle')

Photo

@stop

@section('content')

<div class="row">
  <div class="col-md-4">
    <img src={{$src}} class="img-responsive">
    {!! Form::open([
    'method' => 'GET',
    'action' => ['PhotosController@edit', $photo->id]
    ]) !!}
    {!! Form::submit('Update Photo', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

    {!! Form::open([
    'method' => 'GET',
    'action' => ['SubmissionsController@create', $photo->id]
    ]) !!}
    {!! Form::submit('Add Submission/Reblog', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

    {!! Form::open([
    'method' => 'GET',
    'action' => ['PhotosController@delete', $photo->id]
    ]) !!}
    {!! Form::submit('Delete Photo', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

  </div>
  <div class="col-md-8">
    <table class="table table-striped table-bordered">
      <tr>
        <th>Name</th>
        <th>Value</th>
      </tr>
      <tr>
        <td>ID</td>
        <td>{{$photo->id}}</td>
      </tr>
      <tr>
        <td>File</td>
        <td>{{$photo->file_name}}</td>
      </tr>
      <tr>
        <td>Url</td>
        <td><a href="{{$photo->url}}" target="_blank">{{$photo->url}}</a></td>
      </tr>
      <tr>
        <td>Posted Date</td>
        <td>{{$photo->posted_date}}</td>
      </tr>
      <tr>
        <td>Notes</td>
        <td>{{$photo->notes}}</td>
      </tr>
      <tr>
        <td>Last 30 Days</td>
        <td>{{$photo->notes_last30}}</td>
      </tr>
      <tr>
        <td>Last 10 Days</td>
        <td>{{$photo->notes_last10}}</td>
      </tr>
      <tr>
        <td>Created Date</td>
        <td>{{$photo->created_at}}</td>
      </tr>
      <tr>
        <td>Updated Date</td>
        <td>{{$photo->updated_at}}</td>
      </tr>
    </table>

    <br>
    <h3>Reblogs</h3>
    <div class="visible-xs-block visible-sm-block submissions-grid">
      <?= $narrowGrid ?>
    </div>
    <div class="visible-md-block visible-lg-block submissions-grid">
      <?= $grid ?>
    </div>
  </div>



  @stop
