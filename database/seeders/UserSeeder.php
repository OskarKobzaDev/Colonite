<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $joeTesting = User::factory()->create([
            'name' => 'Joe Testing',
            'email' => 'test@example.com',
            'password' => bcrypt('11111111'),
        ]);

        $users = User::factory(199)->create();

        $allUsers = $users->push($joeTesting);

        $joeColleagues = $users->random(10);
        $joeColleagues->each(function ($colleague) use ($joeTesting) {
            $joeTesting->colleagues()->attach($colleague->id, ['status' => true]);
        });

        $allUsers->each(function ($user) use ($allUsers) {
            $potentialColleagues = $allUsers->where('id', '!=', $user->id);

            $randomColleagues = $potentialColleagues->random(25);

            $randomColleagues->each(function ($colleague) use ($user) {
                $user->colleagues()->attach($colleague->id, ['status' => true]);
            });
        });
    }
}
