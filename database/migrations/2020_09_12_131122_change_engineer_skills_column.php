<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\RenameColumn;
use Illuminate\Support\Facades\Schema;

class ChangeEngineerSkillsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('engineer_skills', function (Blueprint $table) {
            //カラム名の変更
            $table->renameColumn('lebel', 'level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('engineer_skills', function (Blueprint $table) {
            $table->renameColumn('level', 'lebel');
        });
    }
}
