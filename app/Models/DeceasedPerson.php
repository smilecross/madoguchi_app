<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DeceasedPerson extends Model
{
    use HasFactory;
     protected $table = 'deceased_persons';
     protected $fillable = ['firstname', 'lastname', 'death_date'];
     protected $dates = ['death_date'];

}
