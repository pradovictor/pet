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
    DB::table('usuarios')->insert([
      'email' => 'admin@nitsys.com.br',
      'password' => bcrypt('admin'),
      'nome' => 'admin',
      'remember_token' => str_random(10),
      'created_at' =>  \Carbon\Carbon::now(),
      'updated_at' =>  \Carbon\Carbon::now(),
    ]);
  }
}
