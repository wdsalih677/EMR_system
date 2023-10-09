<?php

namespace Database\Seeders;

use App\Models\Diagnosis;
use Illuminate\Database\Seeder;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * diagnoses_type = 1 مرض ساري
         * diagnoses_type = 2 مرض غير ساري
         * diagnoses_type = 0 none
         */
        $diagnosis = [
            ['diagnoses' => 'ملاريا' , 'diagnoses_type' => 1],
            ['diagnoses' => 'الإسهالات و النزلات المعويه' , 'diagnoses_type' => 1],
            ['diagnoses' => 'التايفويد' , 'diagnoses_type' => 1],
            ['diagnoses' => 'البلهارسيا' , 'diagnoses_type' => 1],
            ['diagnoses' => 'الدرن الرئوي' , 'diagnoses_type' => 1],
            ['diagnoses' => 'الحصبه' , 'diagnoses_type' => 1],
            ['diagnoses' => 'السعال الديكي' , 'diagnoses_type' => 1],
            ['diagnoses' => 'الدفتريا' , 'diagnoses_type' => 1],
            ['diagnoses' => 'شلل الأطفال' , 'diagnoses_type' => 1],
            ['diagnoses' => 'التتانوس' , 'diagnoses_type' => 1],
            ['diagnoses' => 'السحائي' , 'diagnoses_type' => 1],
            ['diagnoses' => 'كلازار' , 'diagnoses_type' => 1],
            ['diagnoses' => 'اللشمانيا الجلديه' , 'diagnoses_type' => 1],
            ['diagnoses' => 'الجزام' , 'diagnoses_type' => 1],
            ['diagnoses' => 'إلتهاب الكبد الوبائي أ' , 'diagnoses_type' => 1],
            ['diagnoses' => 'إلتهاب الكبد الوبائي ب' , 'diagnoses_type' => 1],
            ['diagnoses' => 'الحمه الراجعه' , 'diagnoses_type' => 1],
            ['diagnoses' => 'االأيدز' , 'diagnoses_type' => 1],
            /****************************************************************************************** */
            ['diagnoses' => 'إرتفاع ضغط الدم' , 'diagnoses_type' => 2],
            ['diagnoses' => 'السكري' , 'diagnoses_type' => 2],
            ['diagnoses' => 'الربو' , 'diagnoses_type' => 2],
            ['diagnoses' => 'فقر الدم' , 'diagnoses_type' => 2],
            ['diagnoses' => 'إصابات' , 'diagnoses_type' => 2],
            ['diagnoses' => 'حوادث طرق' , 'diagnoses_type' => 2],
            /****************************************************************************************** */
            ['diagnoses' => 'الدسنتاريا' , 'diagnoses_type' => 0],
            ['diagnoses' => 'حمى مالطيه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'تسمم دموي' , 'diagnoses_type' => 0],
            ['diagnoses' => 'شلل الأطفال الحاد' , 'diagnoses_type' => 0],
            ['diagnoses' => 'السيلان' , 'diagnoses_type' => 0],
            ['diagnoses' => 'داء السعر' , 'diagnoses_type' => 0],
            ['diagnoses' => 'إلتهاب المخ الفيروسي الغير محدد' , 'diagnoses_type' => 0],
            ['diagnoses' => 'حمى نزفيه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'حمى صفراء' , 'diagnoses_type' => 0],
            ['diagnoses' => 'ديوان معويه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'الأورام الخبيثه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'جلطه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'سرطان الدم' , 'diagnoses_type' => 0],
            ['diagnoses' => 'إضترابات الغده الكظريه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'فقدان سوائل' , 'diagnoses_type' => 0],
            ['diagnoses' => 'أرق' , 'diagnoses_type' => 0],
            ['diagnoses' => 'هستريا' , 'diagnoses_type' => 0],
            ['diagnoses' => 'الصرع' , 'diagnoses_type' => 0],
            ['diagnoses' => 'الدوالي' , 'diagnoses_type' => 0],
            ['diagnoses' => 'البواسير' , 'diagnoses_type' => 0],
            ['diagnoses' => 'هبوط ضغط الدم' , 'diagnoses_type' => 0],
            ['diagnoses' => 'إلتهاب الجيوب الأنفيه' , 'diagnoses_type' => 0],
            ['diagnoses' => 'إلتهاب الحنجره' , 'diagnoses_type' => 0],
            ['diagnoses' => 'إلتهاب اللوزتين' , 'diagnoses_type' => 0],
            ['diagnoses' => 'الإمساك' , 'diagnoses_type' => 0],
            ['diagnoses' => 'تليف كبد' , 'diagnoses_type' => 0],
            ['diagnoses' => 'إلتهاب المراره' , 'diagnoses_type' => 0],
            ['diagnoses' => 'اسباب أخرى غير معروفه للمرض أو الوفاة' , 'diagnoses_type' => 0],
        ];
        foreach($diagnosis as $value){
            Diagnosis::create($value);
        }
    }
}
