<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WillStatus extends Model
{
    use HasFactory;
    public function otherInfos()
    {
        return $this->hasMany(OtherInfo::class, 'will_status_id');
    }
}
