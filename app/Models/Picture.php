<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $table = 'pictures';
    protected $primaryKey = 'id';

    protected $fillable = [
        'project_id',
        'picture'
    ];

    public function company()
    {
        return $this->belongsTo(Picture::class);
    }
}
