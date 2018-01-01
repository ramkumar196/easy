<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(UsersTableSeeder::class);
      DB::table('admins')->insert([
      'name' => 'Admin',
      'email' => 'admin@easy.com',
      'password' => bcrypt('easyadmin'),
      'user_type' => 'A',
      ]);

    }
}
