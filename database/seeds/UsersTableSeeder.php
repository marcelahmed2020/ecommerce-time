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
        $user = \App\User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'type' => 'Mr',
            'country' => 'country',
            'state' => 'state',
            'address' => 'address',
            'phone' => 0122155121212,
            'birth' => '1996',
            'zip' => '1996',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456')
        ]);
        $user->attachRole('super_admin');


    }
}
