<?php

use Illuminate\Database\Seeder;

class MassagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i++) {
            \App\Message::create([
                'user_id' => $i . '氏',
                'messages' => $i . '番目のテキスト'
            ]);
        }
    }
}
