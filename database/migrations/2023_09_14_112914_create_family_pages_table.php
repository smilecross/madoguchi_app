<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyPagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('family_pages')) {
            Schema::create('family_pages', function (Blueprint $table) {
                $table->id();
                $table->string('inheritor_name');
                $table->date('deceased_date');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('financial_info_options', function (Blueprint $table) {
        // 外部キー制約が存在するか確認
        if (DB::getSchemaBuilder()->getColumnType('financial_info_options', 'family_page_id') == 'bigint') {
            $table->dropForeign(['family_page_id']);
        }
    });
    
    // family_pagesテーブルを削除
    Schema::dropIfExists('family_pages');
}
}
