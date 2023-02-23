<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        User::create([
            'name' => $faker->firstName,
            'email'     => 'daan@atabix.nl',
            'password' => bcrypt('lazy-test-password-56R'),
            'group_id' => Group::inRandomOrder()->value('id')
        ]);

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => $faker->firstName,
                'email'     => 'user' . $i . '@gmail.com',
                'password' => bcrypt('123456'),
                'group_id' => Group::inRandomOrder()->value('id')
            ]);
        }
    }
}
