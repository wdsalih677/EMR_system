<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);//المدير الطبي
        Role::create(['name' => 'Recepion']);//موظف الإستقبال
        Role::create(['name' => 'Doctor']);//الطبيب
        Role::create(['name' => 'Medical_laboratory']);//أخصائي المختبرات
        Role::create(['name' => 'Nurse']);//الممرض
        Role::create(['name' => 'Statisticians']);//الإحصاء
    }
}
