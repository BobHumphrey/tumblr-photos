<?php

$galleriesLink = action('GalleriesController@index');
$galleriesCreateLink = action('GalleriesController@create');
$photosLink = url('photos/display');
$photosLikesLink = action('PhotosController@likes');
$photosListLink = action('PhotosController@listing');
$photosNewLink = url('photos/list/new');
$photosCreateLink = action('PhotosController@create');
$submissionsLink = action('SubmissionsController@index');
$loginLink = action('Auth\AuthController@getLogin');
$logoutLink = action('Auth\AuthController@getLogout');
$scheduledJobLogLink = action('AdminController@index');
// Set the current page as active.
$activePhotos = '';
$activeGalleries = '';
$activeSubmissions = '';
$activeAdd = '';
$activeLogin = '';
$activeAdmin = '';
$path = ($_SERVER['REQUEST_URI']);

$pathPhotosAdd = '/photos/create';
$pathGalleriesAdd = '/galleries/create';
$pathPhotos = '/photos';
$pathGalleries = '/galleries';
$pathSubmissions = '/submissions';
$pathLogin = '/auth/login';

if (substr($path, 0, strlen($pathPhotosAdd)) == $pathPhotosAdd) {
  $activeAdd = 'active';
}
elseif (substr($path, 0, strlen($pathGalleriesAdd)) == $pathGalleriesAdd) {
  $activeAdd = 'active';
}
elseif (substr($path, 0, strlen($pathPhotos)) == $pathPhotos) {
  $activePhotos = 'active';
}
elseif (substr($path, 0, strlen($pathGalleries)) == $pathGalleries) {
  $activeGalleries = 'active';
}
elseif (substr($path, 0, strlen($pathSubmissions)) == $pathSubmissions) {
  $activeSubmissions = 'active';
}
elseif (substr($path, 0, strlen($pathLogin)) == $pathLogin) {
  $activeLogin = 'active';
}
?>

<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://bobhumphrey.org"><img src="/images/logo-80.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>
          <a href="/">
            <span class="nav-item visible-lg-inline">TUMBLR PHOTOS</span>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown {{$activePhotos}}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
          role="button" aria-haspopup="true" aria-expanded="false">
          PHOTOS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{$photosLink}}">DISPLAY</a></li>
            <li><a href="{{$photosListLink}}">LIST</a></li>
          </ul>
        </li>
        <li class="{{$activeGalleries}}"><a href="{{$galleriesLink}}">SITES</a></li>
        <li class="{{$activeSubmissions}}"><a href="{{$submissionsLink}}">REBLOGS</a></li>
        <li class="dropdown {{$activeAdd}}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
          role="button" aria-haspopup="true" aria-expanded="false">
          ADD <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{$photosCreateLink}}">ADD PHOTOS</a></li>
            <li><a href="{{$galleriesCreateLink}}">ADD SITE</a></li>
          </ul>
        </li>
        <li class="dropdown {{$activeAdmin}}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
          role="button" aria-haspopup="true" aria-expanded="false">
          ADMIN <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Auth::check())
            <li><a href="{{$logoutLink}}">LOGOUT</a></li>
            @else
            <li class="{{$activeLogin}}"><a href="{{$loginLink}}">LOGIN</a></li>
            @endif
            <li><a href="{{$scheduledJobLogLink}}">SCHEDULED JOB LOG</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
