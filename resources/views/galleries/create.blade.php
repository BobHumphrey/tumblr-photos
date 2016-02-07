@extends('app')

@section('pageTitle')

Add New Site

@stop

@section('content')

  @include('errors.list')

  {!! Form::open(['url' => 'galleries']) !!}
    @include('galleries._form', ['submitButtonText' => 'Add Gallery'])
  {!! Form::close() !!}


@stop
