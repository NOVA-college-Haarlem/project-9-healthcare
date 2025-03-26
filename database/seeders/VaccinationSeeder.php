<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Vaccination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient; // Zorg ervoor dat het Patient-model is geïmporteerd

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Voorbeeld: Haal een specifieke patiënt op (pas dit aan naar jouw situatie)
        $patient = Patient::first(); // Haal de eerste patiënt op uit de database

        if (!$patient) {
            // Als er geen patiënt is, geef een foutmelding of stop de seeder
            throw new \Exception('Geen patiënt gevonden in de database.');
        }

        if (isset($patientData['vaccinations'])) {
            foreach ($patientData['vaccinations'] as $vaccinationData) {
                $doctor = Doctor::whereHas('user', function($q) use ($vaccinationData) {
                    $q->where('email', $vaccinationData['doctor_email']);
                })->first();

                if (!$doctor) {
                    // Als de dokter niet wordt gevonden, sla deze iteratie over
                    continue;
                }

                Vaccination::firstOrCreate(
                    [
                        'patient_id' => $patient->id,
                        'doctor_id' => $doctor->id,
                        'vaccine_name' => $vaccinationData['vaccine_name'],
                        'administration_date' => $vaccinationData['administration_date']
                    ],
                    [
                        'lot_number' => $vaccinationData['lot_number'],
                        'next_dose_date' => $vaccinationData['next_dose_date']
                    ]
                );
            }
        }
    }
}