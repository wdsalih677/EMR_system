<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            DoctorSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SectionSeeder::class,
            TicketSeeder::class,
            Pre_diagnosisSeeder::class,
            ExaminationSeeder::class,
            PatientFinalDataSeeder::class,
            WardSeeder::class,
        ]);
    }
}
