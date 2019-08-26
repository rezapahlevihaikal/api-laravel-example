<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create(); //import library faker
        $limit = 20; //batasan banyak data

        for($i = 0; $i < $limit; $i++){
            DB::table('kontaks')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'email' => $faker->unique()->email,
            ]);
        }
    }
}
