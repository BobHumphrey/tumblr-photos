@extends('app')

@section('pageTitle')

Scheduled Job Log

@stop

@section('content')

<div class="content-scheduled-job-log">
  <div>
    <?= $grid ?>
  </div>
</div>
@stop
