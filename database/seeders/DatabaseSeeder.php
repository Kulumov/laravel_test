<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table("news")->delete();
        DB::table("users")->delete();

        //Create an admin user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@mail.com',
            'is_admin' => true,
        ]);

        //Create two ordinary users
        User::factory()->create([
            'email' => 'test2@mail.com',
            'password' => Hash::make('blablabla'),
        ]);

        User::factory()->create([
            'email' => 'test3@mail.com',
            'password' => Hash::make('abcdabcd'),
        ]);


        //Create 12 news in total, 4 per each user

        News::factory(4)->create([
            'author_id' => User::pluck("id")->toArray()[0],
        ]);

        News::factory(4)->create([
            'author_id' => User::pluck("id")->toArray()[1],
        ]);

        News::factory(4)->create([
            'author_id' => User::pluck("id")->toArray()[2],
        ]);
    }
}
