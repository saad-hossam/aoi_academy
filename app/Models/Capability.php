<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;
    use Translatable ;
    public $translatedAttributes=['title','desc','meta_desc','meta_keyword'];
    protected $fillable =[
       'title',
       'desc',
       'image',
       'status',
       'order',
       'meta_desc',
       'meta_keyword',
    ];

     public function translations()
{
    return $this->hasMany(CapabilityTranslation::class);
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
