<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 88;
        for ($i = 0; $i < $limit; $i++) {
            $dateIn = $faker->dateTimeThisDecade();
            $numOfHours = $faker->numberBetween(1, 8);
            $dateOut = clone $dateIn;
            $dateOut->modify("+$numOfHours hours");
            DB::table('entries')->insert([ //,
                'user_id' => $faker->numberBetween(4, 40),
                'date' => $dateIn->format('Y-m-d'),
                'startTime' => $dateIn->format('H:i:s'),
                'endTime' => $dateOut->format('H:i:s')
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            $dateIn = $faker->dateTimeThisYear();
            $numOfHours = $faker->numberBetween(1, 8);
            $dateOut = clone $dateIn;
            $dateOut->modify("+$numOfHours hours");
            DB::table('entries')->insert([ //,
                'user_id' => $faker->numberBetween(4, 40),
                'date' => $dateIn->format('Y-m-d'),
                'startTime' => $dateIn->format('H:i:s'),
                'endTime' => $dateOut->format('H:i:s')
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            $dateIn = $faker->dateTimeThisMonth();
            $numOfHours = $faker->numberBetween(1, 8);
            $dateOut = clone $dateIn;
            $dateOut->modify("+$numOfHours hours");
            DB::table('entries')->insert([ //,
                'user_id' => $faker->numberBetween(4, 40),
                'date' => $dateIn->format('Y-m-d'),
                'startTime' => $dateIn->format('H:i:s'),
                'endTime' => $dateOut->format('H:i:s')
            ]);
        }
    }
}
