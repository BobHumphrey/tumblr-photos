<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Photo;

class CreatePhotosPager extends Job implements SelfHandling
{
  protected $page;
  /**
  * Create a new job instance.
  *
  * @return void
  */
  public function __construct($page)
  {
    $this->page = $page;
  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    $recordsPerPage = 3;
    $offset = ($this->page - 1) * $recordsPerPage;
    $count = Photo::count();
    if ($this->page > 1) {
      $previousPage = $this->page - 1;
    }
    else {
      $previousPage = null;
    }
    if (($this->page * $recordsPerPage) < $count) {
      $nextPage = $this->page + 1;
    }
    else {
      $nextPage = null;
    }
    $photos = Photo::orderBy('posted_date', 'desc')->skip($offset)->take($recordsPerPage)->get();
    //$previousUrl = action('PhotosController@index', ['page' => $previousPage]);
    //$nextUrl = action('PhotosController@index', ['page' => $nextPage]);
    if ($previousPage) {
      $previousUrl = url('photos/display/' . $previousPage);
    }
    else {
      $previousUrl = null;
    }
    if ($nextPage) {
      $nextUrl = url('photos/display/' . $nextPage);
    }
    else {
      $nextUrl = null;
    }
    return [
      'photos'=> $photos,
      'previousUrl'=> $previousUrl,
      'nextUrl'=> $nextUrl,
    ];
  }
}
