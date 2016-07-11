<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'dautunglinh',
                'email' => 'dautunglinh2@gmail.com',
                'password' => bcrypt('12345'),
                'avatar' => 't.jpeg',
                'information' => 'Số điện thoại: 01662522131. Quê Quán : Hà Đông, Hà Noi',
                'role' => 0
            ],
            [
                'name' => 'nguyenmanhthang',
                'email' => 'nguyenmanhthang@gmail.com',
                'password' => bcrypt('123456'),
                'avatar' => 'manhthang.jpeg',
                'information' => 'Số điện thoại: 01662528486. Quê Quán : Tân Minh, Thường Tín, Hà nội',
                'role' => 0
            ],
            [
                'name' => 'duongquynhtrang',
                'email' => 'duongquynhtrang@gmail.com',
                'password' => bcrypt('22222'),
                'avatar' => 'trang.jpg',
                'information' => 'Số điện thoại: 01662521231. Quê Quán : Cầu giấy, Hà Noi. ',
                'role' => 1
            ],
            [
                'name' => 'phikimhung',
                'email' => 'phikimhung@gmail.com',
                'password' => bcrypt('33333'),
                'avatar' => 'kimhung.jpeg',
                'information' => 'Số điện thoại: 09138983797. Quê Quán : Lục Ngạn, Bắc Giang',
                'role' => 1
            ],
            [
                'name' => 'phamxuantung',
                'email' => 'phamxuantung@gmail.com',
                'password' => bcrypt('57575'),
                'avatar' => 'xuantung.jpeg',
                'information' => 'Số điện thoại: 90909223. Quê Quán : Hai Hậu, Hải Dương',
                'role' => 0
            ]
        ]);
    }
}
