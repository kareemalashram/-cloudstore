<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([

            'name' =>  'admin',
            'email' =>  'super_admin@app.com',
            'password' =>  bcrypt('123456'),

        ]);
    }
}
