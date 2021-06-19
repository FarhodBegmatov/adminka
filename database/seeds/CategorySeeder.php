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
            ['name' => 'Заработная плата'],
            ['name' => 'Сдача в аренду'],
            ['name' => 'Питание'],
            ['name' => 'Мобильная связь'],
            ['name' => 'Wi-fi'],
        ];

        DB::table('categories')->insert($data);

    }
}
