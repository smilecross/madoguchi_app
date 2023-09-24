<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProfileInfo extends Model
{
    use HasFactory;
    protected $table = 'profile_infos';  // テーブル名を指定
    protected $primaryKey = 'profile_id';  // 主キー名を指定（必要な場合）


    public function getAgeAttribute()
    {
        return $this->birthday->diffInYears(Carbon::now());
    }

    public function familyPage()
    {
        return $this->hasOne(FamilyPage::class);
    }
}
