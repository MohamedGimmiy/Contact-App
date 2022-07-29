<?php

namespace Database\Seeders;

use App\Models\Company;
use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Adding facades to seed our db
use Illuminate\Support\Facades\DB;

// using faker lib
class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(20)->create();
    }
}
