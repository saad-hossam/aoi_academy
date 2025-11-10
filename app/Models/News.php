<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
     use Translatable ;
    
    public $translatedAttributes=['title','desc'];
    protected $fillable =[
        'title',
        'desc',
        'image',
       'status',
       'order',
    ];

     
    public function translations()
{
    return $this->hasMany(NewsTranslation::class);
}
public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }

public function images()
{
    return $this->morphMany(Image::class, 'imageable');
}

}
