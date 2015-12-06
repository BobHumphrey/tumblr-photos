@extends('app')

@section('pageTitle')

Add New Gallery

@stop

@section('content')

  @include('errors.list')

  {!! Form::open(['url' => 'galleries']) !!}
    @include('galleries._form', ['submitButtonText' => 'Add Gallery'])
  {!! Form::close() !!}


@stop
