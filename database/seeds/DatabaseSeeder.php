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
         $this->call(UserSeeder::class);
         $this->call(AdminsSeeder::class);
         $this->call(OfficeSeeder::class);
         $this->call(DocumentstatusSeeder::class);
         $this->call(RequirementstatusSeeder::class);
    }
}
