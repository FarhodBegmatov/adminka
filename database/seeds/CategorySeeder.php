<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Смартфоны, телефоны, гаджеты, аксессуары'],
            ['name' => 'Ноутбуки, принтеры, компьютеры'],
            ['name' => 'Телевизоры, фото-видео и аудио'],
            ['name' => 'Техника для кухни'],
            ['name' => 'Бытовая техника'],
        ];

        DB::table('categories')->insert($data);

    }
}
