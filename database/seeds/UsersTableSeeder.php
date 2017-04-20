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
            'category' => $faker->randomElement(['student', 'admin']),
            'status' => $faker->randomElement(['in', 'out']),
            'username' => 'admin'
        ]);
        DB::table('users')->insert([ //,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'middleName' => $faker->firstName,
            'course' => $faker->randomElement(['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS']),
            'yearLevel' => $faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']),
            'password' => bcrypt('studentstudent'),
            'category' => $faker->randomElement(['student', 'admin']),
            'status' => $faker->randomElement(['in', 'out']),
            'username' => 'student'
        ]);

        $limit = 88;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'middleName' => $faker->firstName,
                'course' => $faker->randomElement(['BSIT', 'BSCS', 'BSM', 'BSN', 'BALA', 'BSLIS']),
                'yearLevel' => $faker->randomElement(['1st year', '2nd year', '3rd year', '4th year']),
                'password' => bcrypt('password'),
                'category' => 'admin',
                'status' => $faker->randomElement(['in', 'out']),
                'username' => $faker->userName
            ]);
        }
    }
}
