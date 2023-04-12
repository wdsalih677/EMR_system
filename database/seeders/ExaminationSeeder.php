<?php

namespace Database\Seeders;

use App\Models\Examination;
use Illuminate\Database\Seeder;

class ExaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Examination::create([
            'ticket_id'=>1,
            'test_status'=>1,
            'test_results'=>'Test Results',
        ]);
    }
}
