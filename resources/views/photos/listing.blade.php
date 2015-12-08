<?php
if ($newOnly) {
  $pageTitle = 'New Photos';
}
else {
  $pageTitle = 'Photos';
}
?>

@extends('app')

@section('pageTitle')

{{$pageTitle}}

@stop

@section('content')

<div class="content-photos-list">
  <div class="photos-grid">
    <?= $grid ?>
  </div>
</div>
@stop
