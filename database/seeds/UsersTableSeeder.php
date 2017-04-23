<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([ //,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'middleName' => $faker->firstName,
            'course' => $faker->randomElement(['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS']),
            'yearLevel' => $faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']),
            'password' => bcrypt('adminadmin'),
            'category' => 'admin',
            'status' => 'out',
            'username' => 'admin'
        ]);
        DB::table('users')->insert([ //,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'middleName' => $faker->firstName,
            'course' => $faker->randomElement(['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS']),
            'yearLevel' => $faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']),
            'password' => bcrypt('student'),
            'category' => 'student',
            'status' => 'out',
            'username' => 'student'
        ]);
        DB::table('users')->insert([ //,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'middleName' => $faker->firstName,
            'course' => $faker->randomElement(['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS']),
            'yearLevel' => $faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']),
            'password' => bcrypt('faculty'),
            'category' => 'faculty',
            'status' => 'out',
            'username' => 'faculty'
        ]);

        $limit = 15;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'middleName' => $faker->firstName,
                'course' => $faker->randomElement(['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS']),
                'yearLevel' => $faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']),
                'password' => bcrypt('password'),
                'category' => 'student',
                'status' => 'out',
                'username' => $faker->unique()->numerify('#######')
            ]);
        }
        $limit = 32;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'middleName' => $faker->firstName,
                'department' => $faker->randomElement(['SON', 'SCIS', 'SOL', 'SEA', 'STELLA', 'SOBA']),
                'password' => bcrypt('password'),
                'category' => 'faculty',
                'status' => 'out',
                'username' => $faker->unique()->numerify('#######')
            ]);
        }

    }
}
