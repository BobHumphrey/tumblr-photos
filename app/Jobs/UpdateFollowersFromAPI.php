<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use DB;
use Carbon\Carbon;

class UpdateFollowersFromAPI extends Job implements SelfHandling
{

  protected $client;
  /**
  * Create a new job instance.
  *
  * @return void
  */
  public function __construct($client)
  {
    $this->client = $client;
  }

  protected function handleBlog($blog, $client) {
    $continue = TRUE;
    $offset = 0;
    // The Tumblr API returns a maximum of 20 records at a time.  So loop
    // through the posts 20 at a time and update the database.
    while($continue) {
      $client->getBlogFollowers($blog, array('limit' => 20, 'offset' =>$offset));
      $users = $reply->users;
      if(count($users)) {
        foreach ($users as $user) {
          $name = $user->name;
          $url = $user->url;
          $updated = $user->updated;
        }
      }
    }

  }

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    // Initialize the followers table.  Set the main_blog and photo_blog
    // indicators to FALSE on all records.
    $followers = DB::table('followers')->get();
    foreach ($followers as $follower) {
      $id = $followers->id;
      DB::table('followers')
      ->where('id', $id)
      ->update(['main_blog' => false, 'photo_blog' => false]);
    }

    // Use the Tumblr API to update the followers table.  Find all the
    // followers for each blog, and either update the table for existing
    // followers, or add new rows for new followers.
    $blogs = [
      'bobhumphreyphotography',
      'rphumphrey',
    ];
    foreach ($blogs as $blog) {
      $this->handleBlog($blog, $this->client);
    }



  }
}
