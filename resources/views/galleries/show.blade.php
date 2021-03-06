<?php
$ignore = showCheckMark($gallery->ignore_this_site);
$accepts_submissions = showCheckMark($gallery->accepts_submissions);
$reblog_posts = showCheckMark($gallery->reblog_posts);

//$will_reblog = showCheckMark($gallery->will_reblog);
?>

@extends('app')

@section('pageTitle')

{{$gallery->name}}

@stop

@section('content')

  <table class="table table-striped table-bordered">
    <tr>
      <th>Name</th>
      <th>Value</th>
    </tr>
    <tr>
      <td>ID</td>
      <td>{{$gallery->id}}</td>
    </tr>
    <tr>
      <td>Name</td>
      <td>{{$gallery->name}}</td>
    </tr>
    <tr>
      <td>Url</td>
      <td><a href="{{$gallery->url}}" target="_blank">{{$gallery->url}}</a></td>
    </tr>
    <tr>
      <td>Reblogs</td>
      <td>{{$gallery->reblogs}}</td>
    </tr>
    <tr>
      <td>Accepts Submissions</td>
      <td>{!!$accepts_submissions!!}</td>
    </tr>
    <tr>
      <td>Will Reblog Posts</td>
      <td>{!!$reblog_posts!!}</td>
    </tr>
    <tr>
      <td>Ignore This Site</td>
      <td>{!!$ignore!!}</td>
    </tr>
    <tr>
      <td>Created Date</td>
      <td>{{$gallery->created_at}}</td>
    </tr>
    <tr>
      <td>Updated Date</td>
      <td>{{$gallery->updated_at}}</td>
    </tr>
  </table>

  <br>
  <h3>Reblogs</h3>
  <div class="submissions-grid">
    <div class="visible-xs-block visible-sm-block submissions-grid">
      <?= $narrowGrid ?>
    </div>
    <div class="visible-md-block visible-lg-block submissions-grid">
      <?= $grid ?>
    </div>
  </div>
  @stop
