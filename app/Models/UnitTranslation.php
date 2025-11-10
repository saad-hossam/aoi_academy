<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitTranslation extends Model
{
// The table associated with the model
 protected $table = 'unit_translations';  // Optional, Laravel will infer this from the model name

 // Disable timestamps if you're not using them for translations
 public $timestamps = false;

 // Define the fillable fields for mass-assignment
 protected $fillable = [
     'unit_id', 'locale', 'title'
 ];}
