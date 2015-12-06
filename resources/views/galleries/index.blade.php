<?php
//Debugbar::info($galleries);
?>

@extends('app')

@section('pageTitle')

Galleries

@stop

@section('content')

<div class="content-galleries">
  <div class="visible-xs-block visible-sm-block">
    <?= $narrowGrid ?>
  </div>
  <div class="visible-md-block visible-lg-block">
    <?= $grid ?>
  </div>
</div>
@stop
