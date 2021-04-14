<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;
  protected $table = 'books';
  protected $primaryKey = 'id';
  public $incrementing = true;
  public $timestamps = true;
  
  protected $with = ['checkouts'];
  
  public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
}
