<?php ?>

@extends('app')

@section('pageTitle')

Register

@stop

@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach

  </ul>
</div>

@endif

<form role="form" method="POST" action="{{action('Auth\AuthController@postRegister')}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="control-label">Name</label>
    <div>
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label">E-Mail Address</label>
    <div>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label">Password</label>
    <div>
      <input type="password" class="form-control" name="password">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label">Confirm Password</label>
    <div>
      <input type="password" class="form-control" name="password_confirmation">
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">
      Register
    </button>
  </div>

</form>

@stop
