<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnoses extends Model
{
    protected $fillable = [
    'family_pages_id', 'birthday', 'address', 'prefecture', 
    'householder', 'spouse', 'childUnder18', 'nonFamilyMember'
    ];
}
