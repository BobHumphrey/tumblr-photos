<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Photo;
use DB;
use Carbon\Carbon;

class TumblrUpdate extends Command
{
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
    // Authenticate
    $client = new \Tumblr\API\Client(
    env('BH_TUMBLR_CONSUMER_KEY'),
    env('BH_TUMBLR_CONSUMER_SECRET'),
    env('BH_TUMBLR_TOKEN'),
    env('BH_TUMBLR_TOKEN_SECRET')
  );

  // Update the current notes for each post.
  $continue = TRUE;
  $offset = 0;
  // The Tumblr API returns a maximum of 20 records at a time.  So loop
  // through the posts 20 at a time and update the database.
  while($continue) {
    // Make the request
    $reply = $client->getBlogPosts('bobhumphreyphotography', array('offset' => $offset, 'reblog_info' => true, 'notes_info' => true));
    $posts = $reply->posts;
    if(count($posts)) {
      foreach ($posts as $post) {
        $note_count = 0;
        $note_count_last10 = 0;
        $note_count_last30 = 0;
        if (property_exists($post, 'notes')) {
          // Count each note.  Check the date of the note and add 1 to the
          // appropriate counters:  total note count, notes added in the last
          // 10 days, notes added in the last 30 days.
          $notes = $post->notes;
          foreach ($notes as $note) {
            $timestamp = $note->timestamp;
            $noteTime = Carbon::createFromTimestamp($timestamp);
            $daysAgo = $noteTime->diffInDays();
            $note_count++;
            if ($daysAgo <= 10) {
              $note_count_last10++;
            }
            if ($daysAgo <= 30) {
              $note_count_last30++;
            }
          }
        }
        // Find the record in the photo table and update it.
        $post_url = $post->post_url;
        $photo = DB::table('photo')->where('url', $post_url)->first();
        if ($photo) {
          DB::table('photo')
          ->where('url', $post_url)
          ->update([
            'notes' => $note_count,
            'notes_last30' => $note_count_last30,
            'notes_last10' => $note_count_last10,
          ]);
        }
      }
      $offset = $offset + 20;
    }
    else {
      $continue = FALSE;
    }
  }
}

// Next task.



}
