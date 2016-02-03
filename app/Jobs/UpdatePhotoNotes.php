<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Gallery;
use DB;
use Carbon\Carbon;


class UpdatePhotoNotes extends Job implements SelfHandling
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

  /**
  * Execute the job.
  *
  * @return void
  */
  public function handle()
  {
    // Update the current notes for each post.
    $continue = TRUE;
    $offset = 0;
    // The Tumblr API returns a maximum of 20 records at a time.  So loop
    // through the posts 20 at a time and update the database.
    while($continue) {
      // Make the request
      $reply = $this->client->getBlogPosts('bobhumphreyphotography', array('offset' => $offset, 'reblog_info' => true, 'notes_info' => true));
      $posts = $reply->posts;
      if(count($posts)) {
        foreach ($posts as $post) {
          $note_count = $post->note_count;
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
}
