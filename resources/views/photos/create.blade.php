@extends('app')

@section('pageTitle')

Add New Photos

@stop

@section('content')

  @include('errors.list')

  {!! Form::open(array(
    'class' => 'dropzone',
    'method' => 'POST',
    'action' => 'PhotosController@store')) !!}
  {!! Form::close() !!}

@stop
