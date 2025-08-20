<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'release_date',
        'genre',
        'songs',
        'producer',
        'image',
    ];
}
