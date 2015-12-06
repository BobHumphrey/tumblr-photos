<?php
?>

@extends('app')

@section('pageTitle')

Edit Photo

@stop

@section('content')

  @include('errors.list')

  {!! Form::model($photo, [
    'method' => 'PATCH',
    'action' => ['PhotosController@update', $photo->id]
  ]) !!}
    @include('photos._form', ['submitButtonText' => 'Update Photo'])
  {!! Form::close() !!}


@stop
