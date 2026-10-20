<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Translatable, HasFactory;

    public $translatedAttributes = [
        'title', 'goal', 'content', 'duration',
        'pre_request', 'meta_desc', 'meta_keyword',
    ];

    protected $fillable = ['image', 'status', 'order'];

    public function images()
    {
        return $this->hasMany(CourseImage::class)->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}