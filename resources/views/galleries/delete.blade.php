@extends('app')

@section('pageTitle')

Delete Site

@stop

@section('content')

  <h3>Do you really want to delete '{{$gallery->name}}'?</h3>

  <div class="row">
    <div class="delete-buttons">
      <div class="col-sm-3 col-md-2">
        {!! Form::open([
          'method' => 'DELETE',
          'action' => ['GalleriesController@destroy', $gallery->id]
        ]) !!}
          {!! Form::submit('Delete Gallery', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
      </div>
      <div class="col-sm-3 col-md-2">
        {!! Form::open([
          'method' => 'GET',
          'action' => ['GalleriesController@index']
        ]) !!}
          {!! Form::submit('Cancel', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@stop
