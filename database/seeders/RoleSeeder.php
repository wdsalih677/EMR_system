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
        Role::create(['name' => 'الإستقبال']);//موظف الإستقبال
        Role::create(['name' => 'طبيب']);//الطبيب
        Role::create(['name' => 'طبيب مختبر']);//أخصائي المختبرات
        Role::create(['name' => 'ممرض']);//الممرض
        Role::create(['name' => 'مدير الإحصاء']);//الإحصاء
        Role::create(['name' => 'طبيب جراح']);//طبيب جراح
        Role::create(['name' => 'مدير طبي']);//مدير طبي
    }
}
