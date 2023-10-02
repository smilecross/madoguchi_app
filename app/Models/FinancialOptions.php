<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialOptions extends Model
{
    use HasFactory;

    protected $table = 'financial_options';  // テーブル名を指定
    protected $primaryKey = 'financial_option_id';  // 主キー名を指定（必要な場合）

    public function financialInfoOption()
    {
        return $this->hasOne(FinancialInfoOption::class);
    }

    public function familyPage()
    {
        return $this->hasOne(FamilyPage::class);
    }
}
