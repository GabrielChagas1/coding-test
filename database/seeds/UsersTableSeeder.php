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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        factory(App\User::class, 2)->create()->each(function ($user) {
            $user->save();
        });
    }
}
