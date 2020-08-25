<?php

use Illuminate\Database\Seeder;

class BusinessResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_results')->insert([
            'name' => 'テスト',
            'started_date' => date('Y-m-d'),
            'finished_date' => date('Y-m-d'),
            'details' => '大事なテスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'deleted_at' => date('Y-m-d'),

        ]);
    }
}
