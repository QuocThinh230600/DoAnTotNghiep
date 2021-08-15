<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @author 
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'uuid'       => (string)Str::uuid(),
                    'email'      => 'luantran04555@gmail.com',
                    'password'   => Hash::make('password'),
                    'full_name'  => 'Trần Thanh Luân',
                    'phone'      => '0349394368',
                    'status'     => 'on',
                    'level'      => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ],
                [
                    'uuid'       => (string)Str::uuid(),
                    'email'      => 'support@tranluan.com',
                    'password'   => Hash::make('password'),
                    'full_name'  => 'Luân Trần',
                    'phone'      => '0349394368',
                    'status'     => 'on',
                    'level'      => 1,
                    'created_at' => new \DateTime(),
                    'updated_at' => new \DateTime(),
                ]
            ]
        );
    }
}
