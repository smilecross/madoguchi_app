<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyPage extends Model
{
    use HasFactory;

    protected $dates = ['deceased_date'];

    protected $casts = ['deceased_date' => 'date',];

    public function deceasedPerson()
    {
        return $this->belongsTo(DeceasedPerson::class, 'deceased_person_id'); // 第2引数にはFamilyPageテーブルの外部キーカラム名を指定
    }
 
    public function DiagnosesInfo()
    {
        return $this->hasOne(DiagnosesInfo::class);
    }

    public function jobAdminInfo()
    {
        return $this->hasOne(JobAdminInfo::class);
    }

    public function estateInfo()
    {
        return $this->hasOne(EstateInfo::class);
    }

    public function financialInfo()
    {
        return $this->hasOne(FinancialInfo::class);
    }

    public function financialOption()
    {
        return $this->hasOne(FinancialOption::class);
    }

    public function otherInfo()
    {
        return $this->hasOne(OtherInfo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
