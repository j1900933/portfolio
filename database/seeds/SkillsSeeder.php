<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'name' => 'PHP',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'deleted_at' => date('Y-m-d'),
        ]);
    }
}
