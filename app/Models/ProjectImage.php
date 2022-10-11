<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectImage extends Model
{
    use HasFactory;
    protected $table = 'project_images';

    protected $fillable = [
       'img',
       'project_id'
    ];
    

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
