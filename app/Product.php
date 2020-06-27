<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Product extends Model
{

  public function user()
  {
    return $this->belongsTo(Brand::class);
  }

  public function photos()
  {
    return $this->belongsToMany(Photo::class);
  }
//
  public function orders()
  {
    return $this->belongsToMany(Order::class);
  }
}
