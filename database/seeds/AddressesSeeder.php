<?php

use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'postal_code' => '0000-000',
            'prefecture' => '福岡県',
            'city' => '福岡市',
            'ward' => '博多区',
            'town' => '銀天町',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'deleted_at' => date('Y-m-d'),
        ]);
    }
}
