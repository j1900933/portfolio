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
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'lebel' => 'Excellent',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'lebel' => 'Good',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
        ]);
    }
}