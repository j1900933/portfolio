<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressesSeeder::class);
        $this->call(BusinessFieldsSeeder::class);
        $this->call(BusinessResultsSeeder::class);
        $this->call(EngineersSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(SkillFieldsSeeder::class);
        $this->call(QualificationsSeeder::class);
        $this->call(EngineerSkillsSeeder::class);
        $this->call(HumanSkillsSeeder::class);
        $this->call(EmploymentStatusesSeeder::class);
        $this->call(InHouseStatusesSeeder::class);
        $this->call(MassagesTableSeeder::class);
    }
}
