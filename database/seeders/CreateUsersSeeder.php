<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Users::insert([
            [
               'name'=>'user',
               'email'=>'user@gmail.com',
               'role'=>'0',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'S_manger',
               'email'=>'smanager@gmail.com',
               'role'=>'1',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'D_manager',
               'email'=>'dmanager@gmail.com',
               'role'=>'2',
               'password'=> bcrypt('12345678'),
            ],
     ]);
    }
}