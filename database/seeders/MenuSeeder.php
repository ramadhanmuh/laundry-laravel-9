<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\OnePageMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = time();

        $homeId = Str::uuid();

        Menu::insert([
            [
                'id' => $homeId,
                'name' => 'Beranda',
                'slug' => null,
                'number' => 1,
                'filePath' => 'App\Http\Controllers\Frontend\HomeController',
                'metaTitle' => 'Situs Laundry',
                'metaDescription' => 'Situs yang menyediakan katalog jasa laundry.',
                'createdAt' => $time,
                'updatedAt' => $time,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Katalog',
                'slug' => 'katalog',
                'number' => 2,
                'filePath' => 'App\Http\Controllers\Frontend\CatalogController',
                'metaTitle' => 'Katalog',
                'metaDescription' => 'Katalog jasa laundry.',
                'createdAt' => $time,
                'updatedAt' => $time,
            ],
        ]);

        OnePageMenu::create([
            'id' => Str::uuid(),
            'name' => 'Tentang Kami',
            'slug' => 'tentang-kami',
            'number' => 3,
            'menuId' => $homeId
        ]);

        OnePageMenu::create([
            'id' => Str::uuid(),
            'name' => 'Kontak',
            'slug' => 'kontak',
            'number' => 4,
            'menuId' => $homeId
        ]);
    }
}
