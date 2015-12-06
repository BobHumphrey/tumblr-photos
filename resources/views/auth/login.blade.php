<?php ?>

@extends('app')

@section('pageTitle')

Login

@stop

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops! </strong> There were some problems with your input. <br> <br>
  <ul>

    @foreach ($errors->all() as $error)
    <li>{{ $error }} </li>
    @endforeach
  </ul>
</div>
@endif

<form role="form" method="POST" action="{{action('Auth\AuthController@postLogin')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="control-label">E-Mail Address </label>
    <div>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label">Password </label>
    <div>
      <input type="password" class="form-control" name="password">
    </div>
  </div>

  <div class="form-group">
    <div>
      <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
        Login
      </button>
    </div>
  </div>
</form>

@stop
