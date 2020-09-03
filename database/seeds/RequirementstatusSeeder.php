<?php

use Illuminate\Database\Seeder;

class RequirementstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requirementstatus = [
            ['name'=>'Complied'],
            ['name'=>'Not Complied']
        ];

        foreach($requirementstatus  as $requirementstatu){

            $reqstatus = new \App\Requirementstatus();

            $reqstatus->name = $requirementstatu['name'];

            $reqstatus->save();
        }
    }
}
