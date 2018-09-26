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
             [
                 'name' => 'George',
                 'email' => 'george@mail.com',
                 'paternal_surname' => 'Bluth',
                 'maternal_surname' => 'Bluth',
                 'birthday' => '1984-05-06',
                 'admission_date' => '2005-01-03',
                 'avatar' => 'https://s3.amazonaws.com/uifaces/faces/twitter/calebogden/128.jpg',
                 'created_at' => new \DateTime()
             ]
        ]);
    }
}
