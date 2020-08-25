<?php

use Illuminate\Database\Seeder;

class EngineerSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('engineer_skills')->insert([
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
            ],  [
                'lebel' => 'Good',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
        ]);
    }
}
