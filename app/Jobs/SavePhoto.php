<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Photo;

class SavePhoto extends Job implements SelfHandling
{
  protected $file;
  /**
  * Create a new job instance.
  *
  * @return void
  */
  public function __construct($file)
  {
    $this->file = $file;
  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    $photoDirectory = env('BH_PHOTO_DIRECTORY');
    $fileExtension = $this->file->getClientOriginalExtension();
    $fileName =  str_random(10) . '.' . $fileExtension;
    $image = \Image::make($this->file->getRealPath());
    $image->resize(800, 800);
    $image->save($photoDirectory . '/photo_files/normal/'. $fileName);
    $image->resize(100, 100);
    $image->save($photoDirectory . '/photo_files/thumbnail/'. $fileName);
    $photo = new Photo;
    $photo->file_name = $fileName;
    $photo->save();
  }
}
