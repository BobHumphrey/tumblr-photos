<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use DB;
use Carbon\Carbon;

class UpdateSubmissionsFromAPI extends Job implements SelfHandling
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
          // Get the photo id.
          $postUrl = $post->post_url;
          $photo = DB::table('photo')->where('url', $postUrl)->first();
          if (!$photo) {
            continue;
          }
          $photoId = $photo->id;
          // Examine each note and select if it is a reblog.
          if (property_exists($post, 'notes')) {
            $notes = $post->notes;
            foreach ($notes as $note) {
              $noteType = $note->type;
              if ($noteType != 'reblog') {
                continue;
              }
              $parent = $note->reblog_parent_blog_name;
              if ($parent != 'bobhumphreyphotography') {
                continue;
              }
              $timestamp = $note->timestamp;
              $noteTime = Carbon::createFromTimestamp($timestamp);
              $noteDate = $noteTime->toDateString();
              $blogUrl = $note->blog_url;
              // Get the gallery id.  If no gallery record exists, create one.
              $gallery = DB::table('gallery')->where('url', $blogUrl)->first();
              if (!$gallery) {
                $dt = Carbon::now();
                $createdAt = $dt->toDateTimeString();
                $galleryId = DB::table('gallery')->insertGetId(
                  ['name' => $note->blog_name,
                   'url' => $note->blog_url,
                   'created_at' => $createdAt,
                 ]
                );
              }
              else {
                $galleryId = $gallery->id;
              }
              // Get the submission record.  If no submission record exists,
              // create one.
              $dt = Carbon::now();
              $now = $dt->toDateTimeString();
              /*
              $submission = DB::table('submission')->where([
                ['photo_id', '=', $photoId],
                ['gallery_id', '=', $galleryId]
              ])->first();
              */
              $submissions = DB::select('select * from submission where photo_id =
               :photoId and gallery_id = :galleryId limit 1',
               ['photoId' => $photoId, 'galleryId' => $galleryId]);
              if ($submissions) {
                $submission = $submissions[0];
                $closed = $submission->closed;
                if (!$closed) {
                  $submissionId = $submission->submission_id;
                  DB::table('submission')
                  ->where('submission_id', $submissionId)
                  ->update(['published_date' => $noteDate, 'updated_at' => $now]);
                }
              }
              else {
                DB::table('submission')->insert([
                  'photo_id' => $photoId,
                  'gallery_id' => $galleryId,
                  'submitted_date' => NULL,
                  'published_date' => $noteDate,
                  'created_at' => $now
                ]
                );
              }

            }
          }
        }
        $offset = $offset + 20;
      }
      else {
        $continue = FALSE;
      }
    }

    // Read each submission record.  Update the sort field and set close to
    // true if the record has both a submission date and a published date.
    // If the submission has not been counted, updated the reblogs counter
    // in the gallery table record.
    $submissions = DB::table('submission')->get();
    foreach ($submissions as $submission) {
      $closed = $submission->closed;
      if ($closed) {
        continue;
      }
      $submittedDate = $submission->submitted_date;
      $publishedDate = $submission->published_date;
      if (!$submittedDate) {
        $sortDate = $publishedDate;
        $closed = TRUE;
      }
      elseif (!$publishedDate) {
        $sortDate = $submittedDate;
        $closed = FALSE;
      }
      elseif ($submittedDate > $publishedDate) {
        $sortDate = $submittedDate;
        $closed = TRUE;
      }
      else {
        $sortDate = $publishedDate;
        $closed = TRUE;
      }
      $counted = $submission->counted;
      if (($publishedDate) && (!$counted)) {
        $counted = TRUE;
        $galleryId = $submission->gallery_id;
        // Increment the reblog counter in the gallery table.
        $reblogCount = DB::table('gallery')->where('id', $galleryId)->value('reblogs');
        $reblogCount++;
        DB::table('gallery')->where('id', $galleryId)->update(['reblogs' => $reblogCount]);
      }
      $submissionId = $submission->submission_id;
      $dt = Carbon::now();
      $now = $dt->toDateTimeString();
      DB::table('submission')
      ->where('submission_id', $submissionId)
      ->update(['sort_date' => $sortDate,
      'counted' => $counted,
      'closed' => $closed,
      'updated_at' => $now]);
    }
  }

}
