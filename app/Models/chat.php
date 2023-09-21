<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes; 論理削除を使う場合はコメントON

class Chat extends Model
{
    use HasFactory; 
                   // ,SoftDeletes;  SoftDeletes トレイトを使用する
    protected $guarded = [
    'id',
    'created_at',
    'updated_at',
    ];
    
    // protected $dates = ['deleted_at']; // deleted_at カラムを日付として扱う

    // public static function getAllOrderByUpdated_at()
    // {
    //     return self::orderBy('updated_at', 'desc')->get();
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public static function getAllOrderByUpdated_at()
  {
    return self::orderBy('updated_at', 'desc')->get();
  }
    public function user()
  {
    return $this->belongsTo(User::class);
}
}
