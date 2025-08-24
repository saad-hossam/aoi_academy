<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturerTranslation extends Model
{
 protected $table = 'lecturer_translations';  // Optional, Laravel will infer this from the model name

 // Disable timestamps if you're not using them for translations
 public $timestamps = false;

 // Define the fillable fields for mass-assignment
 protected $fillable = [
     'lecturer_id', 'locale', 'title','image'
 ];}
