<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer'
   ];

   protected $casts = [
    'question'=> 'array',
    'answer'=> 'array',
    // 'date' => 'date:d-m-Y'
]; 

  
}
