<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */ 
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $data=[
            'Admin', 'Dosen', 'Mahasiswa'
        ];
        foreach($data as $value){
            Role::insert([
                'Jabatan' => $value
            ]);
        }
        User::insert([
            'username' => '5',
            'status' =>'Active',
            'password' => bcrypt('kucing33'),
            'id_role' => "1"
        ]);
    }
}