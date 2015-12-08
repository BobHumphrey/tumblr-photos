<?php
$x = 0;
?>

@extends('app')

@section('pageTitle')

Photos

@stop

@section('content')

<div class="content-photos">

  <div class="row">

    @foreach ($photos as $photo)

    <?php
    $src = '/photo_files/normal/' . $photo->file_name;
    $link = '/photos/' . $photo->id;
    ?>

    @if ($x == 3)
  </div>
  <div class="row">
    @endif

    <div class="col-sm-4"><a href={{$link}}><img src={{$src}} class="img-responsive"></a></div>

    <?php
    if ($x == 3) {
      $x = 0;
    }
    $x++;
    ?>
    @endforeach

  </div>
  <div class="row">

    <nav>
      <ul class="pager">
        <li class="previous"><a href={{$previousUrl}}><span aria-hidden="true">&larr;</span> Previous</a></li>
        <li class="next"><a href={{$nextUrl}}>Next <span aria-hidden="true">&rarr;</span></a></li>
      </ul>
    </nav>

  </div>

  @stop
