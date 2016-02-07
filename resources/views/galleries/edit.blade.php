@extends('app')

@section('pageTitle')

Edit Sites

@stop

@section('content')

  @include('errors.list')

  {!! Form::model($gallery, [
    'method' => 'PATCH',
    'action' => ['GalleriesController@update', $gallery->id]
  ]) !!}
    @include('galleries._form', ['submitButtonText' => 'Update Site'])
  {!! Form::close() !!}


@stop
