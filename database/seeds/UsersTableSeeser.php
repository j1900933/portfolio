<?php

use Illuminate\Database\Seeder;

class UsersTableSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '竈門 炭治郎',
            'email' => 'tanjiro@gmai.com',
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'deleted_at' => date('Y-m-d'),
        ]);
    }
}
