<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'firstname' => 'Admin',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $author = User::create([
            'firstname' => 'Author',
            'name' => 'Author',
            'email' => 'author@author.com',
            'password' => Hash::make('author'),
        ]);

        $user = User::create([
            'firstname' => 'User',
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

        User::factory(5)->create();
    }
}
