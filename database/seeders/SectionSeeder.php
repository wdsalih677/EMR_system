<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name'=>'قسم الأطفال',
            'ward_num'=>2,
            'doctor_id'=>1
        ]);
        Section::create([
            'name'=>'قسم الجراحه',
            'ward_num'=>2,
            'doctor_id'=>1
        ]);
        Section::create([
            'name'=>'قسم الباطنيه',
            'ward_num'=>2,
            'doctor_id'=>1
        ]);
    }
}
