<?php

use Illuminate\Database\Seeder;

class InHouseStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('in_house_statuses')->insert([
            [
                'name' => '営業中',
                'name_num' => '1',
                'started_at' => date('Y-m-d'),
                'finish_at' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'name' => '未分類',
                'name_num' => '2',
                'started_at' => date('Y-m-d'),
                'finish_at' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'name' => '研修中',
                'name_num' => '3',
                'started_at' => date('Y-m-d'),
                'finish_at' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],
            [
                'name' => '稼働中',
                'name_num' => '4',
                'started_at' => date('Y-m-d'),
                'finish_at' => date('Y-m-d'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
                'deleted_at' => date('Y-m-d'),
            ],

        ]);
    }
}
