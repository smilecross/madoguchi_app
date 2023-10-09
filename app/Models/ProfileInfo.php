<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProfileInfo extends Model
{
    use HasFactory;
    protected $table = 'diagnoses_infos';  // テーブル名を指定
    protected $primaryKey = 'diagnoses_id';  // 主キー名を指定（必要な場合）
    // 追加部分
    protected $fillable = [
        'family_page_id', 
        'birthdate',
        'prefecture',
        'city',
        'address_detail',
        'is_household_head',
        'spouse_status',
        'has_dependent_children',
        'lived_with_others'
        // 必要に応じて他のフィールドを追加
    ];

    public function getAgeAttribute()
    {
        return $this->birthdate->diffInYears(Carbon::now());
    }

    public function familyPage()
    {
        return $this->hasOne(FamilyPage::class);
    }
}
