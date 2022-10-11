<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'img',
        'address1',
        'address2',
        'twitter',
        'linkedin',
        'facebook',
        'instagram',
        'phone',
        'desc',
        'email',
        'title',
        'skype'
];

protected $casts = [
    'desc'=> 'array',
    'title' => 'array'
]; 

}
