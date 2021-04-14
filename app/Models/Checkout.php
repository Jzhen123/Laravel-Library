<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
  
  
  
  protected $with = ['user', 'book'];
  
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
  
//     public function condition()
//     {
//         return $this->belongsTo(Condition::class);
//     }

}
