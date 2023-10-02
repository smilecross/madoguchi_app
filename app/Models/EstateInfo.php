<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateInfo extends Model
{
    use HasFactory;

    protected $table = 'estate_infos';  // テーブル名を指定（変更後の名前に）
    protected $primaryKey = 'estate_id';  // 主キー名を指定（必要な場合）

    public function familyPage()
    {
        return $this->hasOne(FamilyPage::class);
    }
}
