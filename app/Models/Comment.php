<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'date',
        'img'
   ];

   protected $casts = [
    'title'=> 'array',
    'desc'=> 'array',
    // 'date' => 'date:d-m-Y'
]; 

  

}
