<?php

namespace Database\Seeders;

use App\Models\Translation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Translation::factory(100000)->create();
    }
}
