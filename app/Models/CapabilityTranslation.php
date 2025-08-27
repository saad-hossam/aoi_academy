<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapabilityTranslation extends Model
{
    use HasFactory;

     protected $table = 'capabilities_translations';  // Optional, Laravel will infer this from the model name

 // Disable timestamps if you're not using them for translations
 public $timestamps = false;

 protected $fillable = [
       'title',
        'desc',
        'image',
       'status',
       'order',
      'meta-desc',
      'meta-keyword',
 ];
}
