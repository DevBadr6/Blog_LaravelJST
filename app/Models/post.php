<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class post extends Model
{
  use HasFactory;

  protected $casts = [
    'published_at' => 'datetime' 
  ];

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }


  public function scopePublished($query)
  {
    $query->where("published_at", '<=', Carbon::now());
  }
  public function scopeFeatured($query)
  {
    $query->where("featured", true); // if featured is true 
  }
public function getExcerpt(){
  return Str::limit(strip_tags($this->body), 150);
}

  public function getReadingTime(){
    $min = round(str_word_count($this->body) / 250);
    return ($min < 1) ? 1 : $min; 
  }
}
