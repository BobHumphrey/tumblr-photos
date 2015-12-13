@extends('app')

@section('pageTitle')

Tumblr Photos

@stop

@section('content')

<div class="row">
  <div class="col-md-4">
    <img src="images/life-is-a-carnival.jpg" class="img-responsive" alt="tumblr website">
  </div>
  <div class="col-md-8">
    <p>
      I created this application to see if I could find a wider audience for
      my photography and increase the number of followers of
      <a href="http://bobhumphreyphotography.tumblr.com/" target="_blank">
        my tumblr site</a>.
      </p>
      <p>
        There are a number of popular tumblr sites  that showcase the work of
        unknown photographers.  Many of these sites allow you to submit your
        work to them for consideration and possible posting.
        For lack of a better term, I call these sites Galleries and keep a
        <a href="/galleries" target="_blank">list of them here</a>.
      </p>
      <p>
        When adding new photos to my tumblr, I also add them to this application.
        I then use the application to keep track of when I send an image to a
        gallery for possible publication.  I maintain a
        <a href="/submissions" target="_blank">list of these submissions</a>,
        along with whether or not the photo was actually accepted.
        Finally, for each photo, I track the number of notes received,
        which is tumblr-speak for  the number of times a post is either liked
        or reblogged by someone else.
      </p>
      <p>
        Examples of my photos that have been published on these gallery sites
        include:
        <ul>
          <li><a href="http://um-yesplease-photography.tumblr.com/post/122885113960/wilmington-nc-this-shot-is-all-about-the-lines-and"
          target="_blank">Wilmington NC</a></li>
          <li><a href="http://istumbled-upon.tumblr.com/post/131876350119/bobhumphreyphotography-oregon-dunes-or"
          target="_blank">Oregon Dunes OR</a></li>
          <li><a href="http://imiging.tumblr.com/post/122753235709/bobhumphreyphotography-kure-beach-nc"
          target="_blank">Kure Beach NC</a></li>
        </ul>
      </p>
      <p>
        Viewing of the application data is open to anyone, but authentication
        is required for updating.
      </p>
      <p>
        The application was created with PHP, Laravel 5, and Twitter Bootstrap
        3.  It uses <a href="https://github.com/Nayjest/Grids" target="_blank">
        Nayjest Grids</a> for table displays,
        <a href="http://www.dropzonejs.com/" target="_blank">DropzoneJS 4</a>
        for drag and drop file uploading, and
        <a href="http://image.intervention.io/" target="_blank">Intervention
        Image 2 4</a> for image handling and manipulation.
      </p>
      <p>
        My code for the application can be found
        <a href="https://github.com/BobHumphrey/tumblr-photos" target="_blank">
        here</a>.
      </p>
    </div>

    @stop
