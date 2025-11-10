<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
// The table associated with the model
 protected $table = 'partner_translations';  // Optional, Laravel will infer this from the model name

 // Disable timestamps if you're not using them for translations
 public $timestamps = false;

 // Define the fillable fields for mass-assignment
 protected $fillable = [
     'partner_id', 'locale', 'title','image'
 ];}
