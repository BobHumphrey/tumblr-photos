<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

  protected $table = 'gallery';
  protected $fillable = [
    'name',
    'url',
    'quality',
    'promo',
    'accepts_members',
    'member',
    'membership_date',
    'no_submissions',
  ];

  // relationships
  
  public function submission(){
    return $this->hasMany('App\Submission');
  }

  public function photos() {
    return $this->belongsToMany('App\Photo', 'submission')->withTimestamps();
  }

  // mutators

  public function getMembershipDateAttribute($value) {
    return convertToMMDDYYYY($value);
  }

  public function setMembershipDateAttribute($value) {
    $this->attributes['membership_date'] = convertToYYYYMMDD($value);
  }

}
