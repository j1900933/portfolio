<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('engineers', function (Blueprint $table) {
            // カラム属性変更
            $table->date('birth_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('engineers', function (Blueprint $table) {
            // カラム属性変更
            $table->datetime('birth_date')->nullable()->change();
        });
    }
}
