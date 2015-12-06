@extends('app')

@section('pageTitle')

Delete Submission

@stop

@section('content')

  <h3>Do you really want to delete submission ID {{$submission->submission_id}}?</h3>

  <div class="row">
    <div class="delete-buttons">
      <div class="col-sm-3 col-md-2">
        {!! Form::open([
          'method' => 'DELETE',
          'action' => ['SubmissionsController@destroy', $submission->submission_id]
        ]) !!}
          {!! Form::submit('Delete Submission', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
      </div>
      <div class="col-sm-3 col-md-2">
        {!! Form::open([
          'method' => 'GET',
          'action' => ['SubmissionsController@index']
        ]) !!}
          {!! Form::submit('Cancel', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@stop
