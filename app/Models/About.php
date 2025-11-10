<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    
     use Translatable ;
    use HasFactory;
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
    return $this->hasMany(AboutTranslation::class);
}
public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }

}
