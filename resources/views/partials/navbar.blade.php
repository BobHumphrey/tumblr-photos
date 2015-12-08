<?php

$galleriesLink = action('GalleriesController@index');
$galleriesCreateLink = action('GalleriesController@create');
$photosLink = url('photos/display');
$photosListLink = action('PhotosController@listing');
$photosNewLink = url('photos/list/new');
$photosCreateLink = action('PhotosController@create');
$submissionsLink = action('SubmissionsController@index');
$loginLink = action('Auth\AuthController@getLogin');
$logoutLink = action('Auth\AuthController@getLogout');
// Set the current page as active.
$galleries = '';
$galleriesCreate = '';
$photos = '';
$photosList = '';
$photosCreate = '';
$submissions = '';
$login = '';
$path = ($_SERVER['REQUEST_URI']);
if ($path == '/galleries/create') {
  $galleriesCreate = 'active';
}
elseif ($path == '/galleries') {
  $galleries = 'active';
}
elseif (substr($path, 0, 10) == '/galleries') {
  $galleries = 'active';
}
elseif ($path == '/photos/create') {
  $photosCreate = 'active';
}
elseif (substr($path, 0, 12) == '/photos/list') {
  $photosList = 'active';
}
elseif ($path == '/photos') {
  $photos = 'active';
}
elseif ($path == '/') {
  $photos = 'active';
}
elseif (substr($path, 0, 7) == '/photos') {
  $photos = 'active';
}
elseif ($path == '/submissions') {
  $submissions = 'active';
}
elseif (substr($path, 0,12) == '/submissions') {
  $submissions = 'active';
}
elseif ($path == '/auth/login') {
  $login = 'active';
}

?>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
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
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
          role="button" aria-haspopup="true" aria-expanded="false">
          PHOTOS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="{{$photos}}"><a href="{{$photosLink}}">DISPLAY</a></li>
            <li class="{{$photosList}} visible-lg-inline"><a href="{{$photosListLink}}">LIST</a></li>
            <li class="{{$photosNewLink}} visible-lg-inline"><a href="{{$photosNewLink}}">NEW</a></li>
          </ul>
        </li>
        <li class="{{$galleries}}"><a href="{{$galleriesLink}}">GALLERIES</a></li>
        <li class="{{$submissions}}"><a href="{{$submissionsLink}}">SUBMISSIONS</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"
          role="button" aria-haspopup="true" aria-expanded="false">
          ADD <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="{{$photosCreate}}"><a href="{{$photosCreateLink}}">ADD PHOTOS</a></li>
            <li class="{{$galleriesCreate}}"><a href="{{$galleriesCreateLink}}">ADD GALLERY</a></li>
          </ul>
        </li>
        @if (Auth::check())
        <li><a href="{{$logoutLink}}">LOGOUT</a></li>
        @else
        <li class="{{$login}}"><a href="{{$loginLink}}">LOGIN</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
