<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Huisartsenpraktijk', 'location' => 'Begane grond, links'],
            ['name' => 'Pediatrie', 'location' => 'Eerste verdieping, rechts'],
            ['name' => 'Interne Geneeskunde', 'location' => 'Tweede verdieping'],
            ['name' => 'Chirurgie', 'location' => 'Begane grond, rechts'],
            ['name' => 'Gynaecologie', 'location' => 'Eerste verdieping, links']
        ];

        foreach ($departments as $dept) {
            Department::firstOrCreate(['name' => $dept['name']], $dept);
        }
    }
}
