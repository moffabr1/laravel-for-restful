<?php


use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

use App\Vehicle;

use Faker\Factory as Faker;


class VehiclesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 30; $i++) {

            Vehicle::create([

                'color' => $faker->safeColorName(),
                'power' => $faker->randomNumber(),
                //'capacity' => $faker->randomFloat(),
                //randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
                'capacity' => $faker->randomFloat(3,0,null),
                'speed' => $faker->randomFloat(3,0,null),
                'maker_id' => $faker->numberBetween(1,5)

            ]);
        }

    }
}
