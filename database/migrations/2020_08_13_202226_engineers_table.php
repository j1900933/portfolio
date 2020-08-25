<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name_furigana')->nullable();
            $table->string('first_name_furigana')->nullable();
            $table->string('gender')->nullable();
            $table->datetime('birth_date')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('closest_station')->nullable();
            $table->string('educational_background')->nullable();
            $table->string('resume')->nullable();
            $table->string('job_history_sheet')->nullable();
            $table->text('comment')->nullable();
            $table->integer('employment_status_id')->nullable();
            $table->integer('in_house_status_id')->nullable();
            $table->integer('engineer_skill_id')->nullable();
            $table->integer('human_skill_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engineers');
    }
}
