<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'desc',
        'date'
   ];

   protected $casts = [
    'title'=> 'array',
    'desc'=> 'array',
    // 'date' => 'date:d-m-Y'
]; 

  

}
