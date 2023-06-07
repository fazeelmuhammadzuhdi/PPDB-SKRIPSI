<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'dinas',
        //     'email' => 'dinas@contoh.com',
        //     'password' => bcrypt('1'),
        //     'akses' => 'Admin Dinas',
        //     'nohp' => '081234567891',
        //     'email_verified_at' => now(),
        // ]);

        // User::create([
        //     'name' => 'sekolah',
        //     'email' => 'sekolah@contoh.com',
        //     'password' => bcrypt('1'),
        //     'akses' => 'Admin Sekolah',
        //     'nohp' => '081234567892',
        //     'email_verified_at' => now(),
        // ]);

        // User::create([
        //     'name' => 'siswa',
        //     'email' => 'siswa@contoh.com',
        //     'password' => bcrypt('1'),
        //     'akses' => 'Siswa',
        //     'nohp' => '081234567893',
        //     'email_verified_at' => now(),
        // ]);

        User::create([
            'name' => 'kepaladinas',
            'email' => 'kepaladinas@contoh.com',
            'password' => bcrypt('1'),
            'akses' => 'Kepla Dinas',
            'nohp' => '081234567894',
            'email_verified_at' => now(),
        ]);
    }
}
