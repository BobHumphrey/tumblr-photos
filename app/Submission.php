<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model {

  protected $table = 'submission';
  protected $primaryKey = 'submission_id';
  protected $fillable = [
    'gallery_id',
    'photo_id',
    'submitted_date',
    'published_flag',
    'published_date',
    'published_not_submitted',
  ];

  // relationships

  public function gallery() {
    return $this->belongsTo('App\Gallery');
  }

  public function photo() {
    return $this->belongsTo('App\Photo');
  }

  // accessors and mutators

  public function getSubmittedDateAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  public function setSubmittedDateAttribute($value) {
    $this->attributes['submitted_date'] = convertToYYYYMMDD($value);
  }

  public function getPublishedDateAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  public function setPublishedDateAttribute($value) {
    $this->attributes['published_date'] = convertToYYYYMMDD($value);
  }

  public function getCreatedAtAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  public function getUpdatedAtAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  // scopes

  public function scopeAllSubmissions($query) {
    return $query->leftJoin('photo', 'submission.photo_id', '=', 'photo.id')
    ->leftJoin('gallery', 'submission.gallery_id', '=', 'gallery.id');
  }

  public function scopeGallerySubmissions($query, $id) {
    return $query->leftJoin('photo', 'submission.photo_id', '=', 'photo.id')
    ->leftJoin('gallery', 'submission.gallery_id', '=', 'gallery.id')
    ->where('submission.gallery_id', $id);
  }

  public function scopePhotoSubmissions($query, $id) {
    return $query->leftJoin('photo', 'submission.photo_id', '=', 'photo.id')
    ->leftJoin('gallery', 'submission.gallery_id', '=', 'gallery.id')
    ->where('submission.photo_id', $id);
  }

}
