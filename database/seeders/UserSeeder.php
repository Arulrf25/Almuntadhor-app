<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
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
        User::truncate();
        User::create([
            'name' => 'Admin Aplikasi',
            'username' => 'admin',
            'level' => 'admin',
            'email' => 'adminalmuntadhor@gmail.com',
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'Andi Surandi',
            'username' => 'andi',
            'level' => 'pengurus',
            'email' => 'andisurandi@gmail.com',
            'password' => bcrypt('andi123'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'Guru Matematika',
            'username' => 'matematika',
            'level' => 'pendidik',
            'email' => 'matematika@gmail.com',
            'password' => bcrypt('Matematika123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Matematika',
        ]);

        User::create([
            'name' => 'Guru Fiqh',
            'username' => 'fiqh',
            'level' => 'pendidik',
            'email' => 'fiqh@gmail.com',
            'password' => bcrypt('Fiqh123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Fiqh',
        ]);

        User::create([
            'name' => 'Guru Aqidah',
            'username' => 'aqidah',
            'level' => 'pendidik',
            'email' => 'aqidah@gmail.com',
            'password' => bcrypt('Aqidah123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Aqidah',
        ]);

        User::create([
            'name' => 'Guru Akhlak',
            'username' => 'akhlak',
            'level' => 'pendidik',
            'email' => 'akhlak@gmail.com',
            'password' => bcrypt('Akhlak123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Akhlak',
        ]);

        User::create([
            'name' => 'Guru Nahwu',
            'username' => 'nahwu',
            'level' => 'pendidik',
            'email' => 'nahwu@gmail.com',
            'password' => bcrypt('Nahwu123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Nahwu',
        ]);

        User::create([
            'name' => 'Guru Tauhid',
            'username' => 'tauhid',
            'level' => 'pendidik',
            'email' => 'tauhid@gmail.com',
            'password' => bcrypt('Tauhid123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Tauhid',
        ]);

        User::create([
            'name' => 'Guru Hadis',
            'username' => 'hadis',
            'level' => 'pendidik',
            'email' => 'hadis@gmail.com',
            'password' => bcrypt('Hadis123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Hadis',
        ]);

        User::create([
            'name' => 'Guru Tasawuf',
            'username' => 'tasawuf',
            'level' => 'pendidik',
            'email' => 'tasawuf@gmail.com',
            'password' => bcrypt('Tasawuf123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Tasawuf',
        ]);

        User::create([
            'name' => 'Guru Tahajji',
            'username' => 'tahajji',
            'level' => 'pendidik',
            'email' => 'tahajji@gmail.com',
            'password' => bcrypt('Tahajji123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Tahajji',
        ]);

        User::create([
            'name' => 'Guru Imla',
            'username' => 'imla',
            'level' => 'pendidik',
            'email' => 'imla@gmail.com',
            'password' => bcrypt('Imla123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Imla',
        ]);

        User::create([
            'name' => 'Guru Inggris',
            'username' => 'inggris',
            'level' => 'pendidik',
            'email' => 'inggris@gmail.com',
            'password' => bcrypt('Inggris123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Bahasa Inggris',
        ]);

        User::create([
            'name' => 'Guru Kromo',
            'username' => 'kromo',
            'level' => 'pendidik',
            'email' => 'kromo@gmail.com',
            'password' => bcrypt('Kromo123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Bahasa Kromo',
        ]);

        User::create([
            'name' => 'Guru Teknologi Informasi',
            'username' => 'teknologi',
            'level' => 'pendidik',
            'email' => 'teknologis@gmail.com',
            'password' => bcrypt('Teknologi123'),
            'remember_token' => Str::random(60),
            'kelas' => 'Teknologi Informasi',
        ]);

        // User::create([
        //     'name' => 'Arul Rachman Faruqhy',
        //     'username' => '1903064',
        //     'level' => 'santri',
        //     'email' => 'arulrachmanfaruqhy@gmail.com',
        //     'password' => bcrypt('Arulrf_25'),
        //     'remember_token' => Str::random(60),
        //     'kelas' => 'Kelas 5',
        // ]);

        // User::create([
        //     'name' => 'Melisah Rachman',
        //     'username' => '1903065',
        //     'level' => 'santri',
        //     'email' => 'melisahridho@gmail.com',
        //     'password' => bcrypt('Melisah123'),
        //     'remember_token' => Str::random(60),
        //     'kelas' => 'Kelas 6',
        // ]);

    }
}
