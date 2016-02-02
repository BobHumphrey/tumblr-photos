<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

  protected $table = 'photo';
  protected $fillable = [
    'file_name',
    'url',
    'posted_date',
    'notes',
    'notes_last30',
    'notes_last10',
  ];

  // relationships

  public function submissions(){
    return $this->hasMany('App\Submission');
  }

  public function galleries() {
    return $this->belongsToMany('App\Gallery', 'submission')->withTimestamps();
  }

  // accessors and mutators

  public function getPostedDateAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  public function setPostedDateAttribute($value) {
    $this->attributes['posted_date'] = convertToYYYYMMDD($value);
  }

  public function getCreatedAtAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  public function getUpdatedAtAttribute($value) {
    return convertToMMDDYYYY($value);
  }

/*
  public function setNotesAttribute($value) {
    if (isset($this->attributes['other_notes'])) {
      $otherNotes = $this->attributes['other_notes'];
    }
    else {
      $otherNotes = 0;
    }
    $this->attributes['notes'] = $value;
    $this->attributes['total_notes'] = $value + $otherNotes;
  }

  public function setOtherNotesAttribute($value) {
    if (isset($this->attributes['notes'])) {
      $notes = $this->attributes['notes'];
    }
    else {
      $notes = 0;
    }
    $this->attributes['other_notes'] = $value;
    $this->attributes['total_notes'] = $value + $notes;
  }
  */

}
