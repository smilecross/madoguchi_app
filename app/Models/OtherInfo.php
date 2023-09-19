<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInfo extends Model
{
    use HasFactory;

    protected $table = 'other_infos';  // テーブル名を指定（変更後の名前に）
    protected $primaryKey = 'other_id';  // 主キー名を指定（必要な場合）

    public function familyPage()
    {
        return $this->hasOne(FamilyPage::class);
    }
}
