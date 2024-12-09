<?php

namespace Database\Seeders;

use App\Models\Person;
use Database\Factories\PersonFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::factory(1000)->create();
    }
}
