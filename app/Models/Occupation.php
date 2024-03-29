<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    public function jobAdminInfos()
    {
        return $this->hasMany(JobAdminInfo::class);
    }

}
