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

        $this->call([
            DepartmentSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            VaccinationSeeder::class,
            AppointmentStatusSeeder::class,
            AppointmentSeeder::class,
            InventorySeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
