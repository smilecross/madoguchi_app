<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Chat extends Model
{
    use HasFactory; 
                   // ,SoftDeletes;  SoftDeletes トレイトを使用する
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    

    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // family_page とのリレーション
    public function familyPage()
    {
        return $this->belongsTo(FamilyPage::class);
    }
}
