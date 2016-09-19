<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Maker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        Maker::truncate();
        Model::unguard();

        // $this->call(UsersTableSeeder::class);
        $this->call('MakersSeed');
        $this->call('VehiclesSeed');

    }
}
