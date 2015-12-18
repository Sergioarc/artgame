<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $user = new User();
        $user->first_name = 'Jonguer';

        $user->last_name = 'Soprano Mengano'; 
       $user->email = 'jona_54_.com@ciencias.unam.mx';
        $user->password = 'pass';
        $user->save();
        Model::reguard();
    }
}
