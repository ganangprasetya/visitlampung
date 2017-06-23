<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // Membuat role kepala dinas
        $kepaladinasRole = new Role();
        $kepaladinasRole->name = "kepaladinas";
        $kepaladinasRole->display_name = "Kepala Dinas";
        $kepaladinasRole->save();

        // Membuat role user
        $userRole = new Role();
        $userRole->name = "user";
        $userRole->display_name = "User";
        $userRole->save();


        //membuat sample admin
        $admin = new User();
        $admin->name ='Administrator';
        $admin->email = 'admin@pariwisata.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat sample kepala dinas
        $kepaladinas = new User();
        $kepaladinas->name ='Kepala Dinas';
        $kepaladinas->email = 'kepaladinas@pariwisata.com';
        $kepaladinas->password = bcrypt('rahasia');
        $kepaladinas->save(); 
        $kepaladinas->attachRole($kepaladinasRole); 

        $ganang = new User();
        $ganang->name = 'Ganang';
        $ganang->email = 'ganang@mail.com';
        $ganang->password = bcrypt('rahasia');
        $ganang->save();
        $ganang->attachRole($userRole);

        // //membuat sample user
        $paulus = new User();
        $paulus->name ='Joni';
        $paulus->email = 'joni@mail.com';
        $paulus->password = bcrypt('rahasia');
        $paulus->save();
        $paulus->attachRole($userRole);
    }
}
