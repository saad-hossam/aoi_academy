<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'goal', 'content', 'duration',
        'pre_request', 'meta_desc', 'meta_keyword',
    ];
}