<?php

use Illuminate\Database\Seeder;

class DocumentstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentstatuses = [
            ['name'=>'Return to client.'],
            ['name'=>'Controlled.']
        ];

        foreach($documentstatuses as $documentstatus){

            $docstatus = new \App\Documentstatus();

            $docstatus->name = $documentstatus['name'];

            $docstatus->save();
        }
    }
}
