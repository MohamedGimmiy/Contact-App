<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Adding facades to seed our db
use Illuminate\Support\Facades\DB;

// using faker lib
use Faker\Factory as Faker;
class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // first delete all records of our db (reset auto increment id)
        // this is the difference between delete and truncate
        //DB::table('companies')->truncate();
        $faker = Faker::create();
        $companies = [];


        foreach (range(1, 10) as $index) {
            $companies[] = [
                'name' => $name = $faker->company(),
                'address' => $faker->address(),
                'website' => $faker->domainName(),
                'email' => $faker->email(),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('companies')->insert($companies);
    }
}
