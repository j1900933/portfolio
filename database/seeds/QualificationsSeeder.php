<?php

use Illuminate\Database\Seeder;

class QualificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->insert([
            'name' => 'TOEIC',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'deleted_at' => date('Y-m-d'),
        ]);
    }
}
