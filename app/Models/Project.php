<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'description', 'image', 'category', 'client', 'project_url'];

    public function picture()
    {
        return $this->hasMany(Picture::class, 'project_id');
    }
}
