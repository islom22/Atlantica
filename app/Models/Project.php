<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        // 'img',
        'serviceCategory_id'
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
    ];

 

    public function projectImage()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
