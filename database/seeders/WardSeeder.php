<?php

namespace Database\Seeders;

use App\Models\Ward;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ward::create([
            'name'=>'عنبر الباطنيه',
            'ward_type'=>'الأطفال',
            'section_id'=>3
        ]);
        Ward::create([
            'name'=>'عنبر الجراحه',
            'ward_type'=>'رجال',
            'section_id'=>2
        ]);
        Ward::create([
            'name'=>'عنبر الأطفال',
            'ward_type'=>'الأطفال',
            'section_id'=>1
        ]);
    }
}

