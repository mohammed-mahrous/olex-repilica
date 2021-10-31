<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use AdvertisementTag;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\Advertisement_TagFactory;
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
        User::factory()->createone([
            'name' => 'Admin',
            'email' => 'Admin@test.com',
            'Role_id' => 2,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $tags = Tag::factory(30)->create();
        Role::factory()->create();
        Role::factory()->createone(['type' => 'Admin']);
        User::factory(100)->create();
        Category::factory(5)->create();
        for ($i = 1; $i < 1001; $i++) {
            Advertisement::factory(1)->hasAttached($tags->random(5))->create();
        }
    }
}