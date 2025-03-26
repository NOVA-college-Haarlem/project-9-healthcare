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
    public function run(): void
    {

        $this->call([
            DepartmentSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            AppointmentStatusSeeder::class,
            AppointmentSeeder::class,
        ]);
    }
}
