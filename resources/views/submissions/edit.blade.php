@extends('app')

@section('pageTitle')

Edit Submission

@stop

@section('content')

  @include('errors.list')

  {!! Form::model($submission, [
    'method' => 'PATCH',
    'action' => ['SubmissionsController@update', $submission->submission_id]
  ]) !!}
    @include('submissions._form', ['submitButtonText' => 'Update Submission'])
  {!! Form::close() !!}


@stop
