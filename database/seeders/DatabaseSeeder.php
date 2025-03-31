<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Vaccination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */  public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
=======

        $this->call([
            DepartmentSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            AppointmentStatusSeeder::class,
            AppointmentSeeder::class,
        ]);
        // Eerst departments aanmaken


        // Artsen aanmaken

>>>>>>> 9d34e96279d375f00c4c2fe3a3b91f47593c3fb0

        $this->call([
            PatientSeeder::class,
            DepartmentSeeder::class,
            VaccinationSeeder::class,
            ScheduleSeeder::class,
            DoctorSeeder::class,
        ]);

    }
}
