<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor =Doctor::create([
            'name'      =>"Ahmed Mohamed",
            'id_num'    =>"12345678901234",
            'phone_num' =>"967705154",
            'email'     =>"ahm3d677@gmail.com",
            'degree'    =>"بكلاريوس الطب و الجراحه",
            'title_job' =>"رئيس قسم الجراحه",
        ]);
    }
}

