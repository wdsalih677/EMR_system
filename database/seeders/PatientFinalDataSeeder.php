<?php

namespace Database\Seeders;

use App\Models\PatientFinalData;
use Illuminate\Database\Seeder;

class PatientFinalDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            PatientFinalData::create([
                'ticket_id'         => 1,
                'final_diagnosis'   => 'Final Diagnosis',
                'section_id'        => 1,
                'residence_type'    => 2,
                'follow_up_date'    => 2023/8/3,
                'treatment_diet'    => 'Treatment Diet'
            ]);
    }
}
