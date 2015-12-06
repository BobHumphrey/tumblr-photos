@extends('app')

@section('pageTitle')

Add New Submission

@stop

@section('content')

  @include('errors.list')

  {!! Form::open(['url' => 'submissions']) !!}
    @include('submissions._form', ['submitButtonText' => 'Add Submission'])
  {!! Form::close() !!}


@stop
