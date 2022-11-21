<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name='Admin User';
        $admin->email='adminuser@gmail.com';
        $admin->password='admin123';
        $admin->phone='9843696619';
        $admin->address='Location A';
        $admin->status='Active';
        $admin->type='Admin';
        $admin->save();
    }
}
