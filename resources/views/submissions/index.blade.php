<?php

?>

@extends('app')

@section('pageTitle')

Submissions and Reblogs

@stop

@section('content')
<div class="content-submissions">
  <div class="visible-xs-block visible-sm-block submissions-grid">
    <?= $narrowGrid ?>
  </div>
  <div class="visible-md-block visible-lg-block submissions-grid">
    <?= $grid ?>
  </div>
</div>
@stop
