<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Certificate extends Model
{
 use Translatable ;
    use HasFactory;
    public $translatedAttributes=['title'];
    protected $fillable =[
        'title',
        'image',
       'status',
    ];

   
    public function translations()
{
    return $this->hasMany(CertificateTranslation::class);
}
public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }}
