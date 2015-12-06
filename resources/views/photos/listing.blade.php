<?php

?>

@extends('app')

@section('pageTitle')

Photos

@stop

@section('content')

<div class="content-photos-list">
  <div class="photos-grid">
    <?= $grid ?>
  </div>
</div>
@stop
