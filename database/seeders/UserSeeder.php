<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =  [
            [
                'name'              => 'Dũng Zaii',
                'email'             => 'dung@gmail.com',
                'password'          => Hash::make('password123'),
                'role'              => 'admin',
                'status'            => true,
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Nguyễn Văn An',
                'email'             => 'an.nguyen@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'staff',
                'status'            => true,
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Trần Thị Bình',
                'email'             => 'binh.tran@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'user',
                'status'            => true,
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Lê Văn Cường',
                'email'             => 'cuong.le@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'user',
                'status'            => false, // tài khoản bị khóa
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Phạm Thị Dung',
                'email'             => 'dung.pham@example.com',
                'password'          => Hash::make('password123'),
                'role'              => 'user',
                'status'            => true,
                'email_verified_at' => null, // chưa xác thực email
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user,
            );
        }
    }
}
