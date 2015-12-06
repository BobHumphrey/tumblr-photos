@extends('app')

@section('pageTitle')

Delete Photo

@stop

@section('content')

  <h3>Do you really want to delete photo ID {{$photo->id}}?</h3>

  <div class="row">
    <div class="delete-buttons">
      <div class="col-sm-3 col-md-2">
        {!! Form::open([
          'method' => 'DELETE',
          'action' => ['PhotosController@destroy', $photo->id]
        ]) !!}
          {!! Form::submit('Delete Photo', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
      </div>
      <div class="col-sm-3 col-md-2">
        {!! Form::open([
          'method' => 'GET',
          'action' => ['PhotosController@index']
        ]) !!}
          {!! Form::submit('Cancel', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@stop
