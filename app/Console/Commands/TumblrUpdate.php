<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Photo;
use DB;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;

class TumblrUpdate extends Command
{
  use DispatchesJobs ;
  /**
  * The name and signature of the console command.
  *
  * @var string
  */
  protected $signature = 'app:update';

  /**
  * The console command description.
  *
  * @var string
  */
  protected $description = 'Update the database using the Tumblr API';

  /**
  * Create a new command instance.
  *
  * @return void
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Execute the console command.
  *
  * @return mixed
  */
  public function handle()
  {

    // log the start time

    $dt = Carbon::now();
    $startTime = $dt->toDateTimeString();
    $id = DB::table('scheduled_job_log')
    ->insertGetId(['start_time' => $startTime]
    );

    // Authenticate

    $client = new \Tumblr\API\Client(
      env('BH_TUMBLR_CONSUMER_KEY'),
      env('BH_TUMBLR_CONSUMER_SECRET'),
      env('BH_TUMBLR_TOKEN'),
      env('BH_TUMBLR_TOKEN_SECRET')
    );

    $this->dispatch(new \App\Jobs\UpdatePhotoFromAPI($client));

    $this->dispatch(new \App\Jobs\UpdateSubmissionsFromAPI($client));

    // log the end time

    $dt = Carbon::now();
    $endTime = $dt->toDateTimeString();
    $id = DB::table('scheduled_job_log')
    ->where('id', $id)->update(['end_time' => $endTime]
    );

  }





}
