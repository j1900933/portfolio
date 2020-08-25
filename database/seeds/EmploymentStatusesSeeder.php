<?php

use Illuminate\Database\Seeder;

class EmploymentStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_statuses')->insert([
            [
                'name' => 'ハコブネ研修中', 
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'name' => '未分類', 
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'name' => '離職中',
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'name' => '就職中', 
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],                        
        ]);

    }
}
