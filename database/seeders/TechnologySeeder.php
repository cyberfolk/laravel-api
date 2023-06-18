<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $technologies = [
            'html' => [
                'name' => 'html',
                'icon' => 'https://www.vectorlogo.zone/logos/w3_html5/w3_html5-icon.svg',
            ],
            'css' => [
                'name' => 'css',
                'icon' => 'https://www.vectorlogo.zone/logos/w3_css/w3_css-icon.svg',
            ],
            'js' => [
                'name' => 'js',
                'icon' => 'https://upload.vectorlogo.zone/logos/javascript/images/239ec8a4-163e-4792-83b6-3f6d96911757.svg',
            ],
            'vue-js' => [
                'name' => 'vue-js',
                'icon' => 'https://www.vectorlogo.zone/logos/vuejs/vuejs-icon.svg',
            ],
            'saas' => [
                'name' => 'saas',
                'icon' => 'https://www.vectorlogo.zone/logos/w3_html5/w3_html5-icon.svg',
            ],
            'php' => [
                'name' => 'php',
                'icon' => 'https://www.vectorlogo.zone/logos/sass-lang/sass-lang-icon.svg',
            ],
            'laravel' => [
                'name' => 'laravel',
                'icon' => 'https://www.vectorlogo.zone/logos/laravel/laravel-icon.svg',
            ],
            'sql' => [
                'name' => 'sql',
                'icon' => 'https://www.vectorlogo.zone/logos/mysql/mysql-icon.svg',
            ],

        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->slug = Str::slug($newTechnology->name, '-');
            $dir = 'technologies/' . $technology['name'] . '.svg';
            $contents = file_get_contents($technology['icon']);
            Storage::put($dir, $contents);
            $newTechnology->link_cover = $dir;
            $newTechnology->save();
        }
    }
}
