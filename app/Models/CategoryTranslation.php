<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
  protected $fillable = ['category_id', 'locale', 'title'];
 // Disable timestamps if you're not using them for translations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
