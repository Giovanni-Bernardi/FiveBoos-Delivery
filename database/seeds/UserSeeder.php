<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Utenti default
        $users = [
            [
                'firstname' => 'Martino',
                'lastname' => 'Scalvini',
                'email' => 'martino@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10)
            ],
            [
                'firstname' => 'Vlad',
                'lastname' => 'Okopny',
                'email' => 'vlad@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10)
            ],
            [
                'firstname' => 'Stefano',
                'lastname' => 'Patti',
                'email' => 'stefano@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10)
            ],
            [
                'firstname' => 'Giovanni',
                'lastname' => 'Bernardi',
                'email' => 'giovanni@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10)
            ],
            [
                'firstname' => 'Davide',
                'lastname' => 'Mannarelli',
                'email' => 'davide@mail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10)
            ]
        ];


        foreach($users as $user) {
            $query = DB::table('users') -> insert([
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'email_verified_at' => $user['email_verified_at'],
                'password' => $user['password'], // password
                'remember_token' => $user['remember_token']
            ]);
        }
        
        // factory(User::class, 5) -> create();
    }
}
