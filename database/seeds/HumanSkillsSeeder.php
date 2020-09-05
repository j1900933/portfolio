<?php

use Illuminate\Database\Seeder;

class HumanSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('human_skills')->insert([
            [
                'lebel' => 'Fair',
                'name_num' => '1',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'lebel' => 'Excellent',
                'name_num' => '2',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'lebel' => 'Good',
                'name_num' => '3',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
        ]);
    }
}