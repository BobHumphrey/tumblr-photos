<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use DB;
use Carbon\Carbon;


class UpdatePhotoFromAPI extends Job implements SelfHandling
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
          $noteCount = $post->note_count;
          $noteCountLast10 = 0;
          $noteCountLast30 = 0;
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
                $noteCountLast10++;
              }
              if ($daysAgo <= 30) {
                $noteCountLast30++;
              }
            }
          }
          // Find the record in the photo table and update it.
          $postUrl = $post->post_url;
          $photo = DB::table('photo')->where('url', $postUrl)->first();
          if ($photo) {
            DB::table('photo')
            ->where('url', $postUrl)
            ->update([
              'notes' => $noteCount,
              'notes_last30' => $noteCountLast30,
              'notes_last10' => $noteCountLast10,
            ]);
          }
          // Add new posts to the photo table.
          else {
            $photoDirectory = env('BH_PHOTO_DIRECTORY');
            $fileExtension = 'jpg';
            $fileName =  str_random(10) . '.' . $fileExtension;
            $imageUrl = $post->photos[0]->alt_sizes[0]->url;
            $image = \Image::make($imageUrl);
            $image->resize(800, 800);
            $image->save($photoDirectory . '/photo_files/normal/'. $fileName);
            $image->resize(100, 100);
            $image->save($photoDirectory . '/photo_files/thumbnail/'. $fileName);
            $postedDate = substr($post->date, 0, 10);
            DB::table('photo')->insert([
              'file_name' => $fileName,
              'url' => $postUrl,
              'posted_date' => $postedDate,
              'notes' => $noteCount,
              'notes_last30' => $noteCountLast30,
              'notes_last10' => $noteCountLast10,
            ]);
        }
        // next post
        }
        $offset = $offset + 20;
      }
      else {
        $continue = FALSE;
      }
    }
  }
}
