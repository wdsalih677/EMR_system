<?php

namespace Database\Seeders;

use App\Models\Pre_diagnosis;
use Illuminate\Database\Seeder;

class Pre_diagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pre_diagnosis::create([
            'ticket_id'=>1,
            'provisional_diagnosis'=>'Provisional Diagnosis',
            'symptoms'=>'Symptoms',
            'examinations'=>'Examination'
        ]);
    }
}
