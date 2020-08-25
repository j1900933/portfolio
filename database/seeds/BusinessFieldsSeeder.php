<?php

use Illuminate\Database\Seeder;

class BusinessFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_fields')->insert([
            'name' => 'テスト',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'deleted_at' => date('Y-m-d'),
        ]);
    }
}
