<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $technologies = [
            'html' => [
                'name' => 'html',
                'link' => 'https://www.vectorlogo.zone/logos/w3_html5/w3_html5-icon.svg',
            ],
            'css' => [
                'name' => 'css',
                'link' => 'https://www.vectorlogo.zone/logos/w3_css/w3_css-icon.svg',
            ],
            'js' => [
                'name' => 'js',
                'link' => 'https://upload.vectorlogo.zone/logos/javascript/images/239ec8a4-163e-4792-83b6-3f6d96911757.svg',
            ],
            'vue-js' => [
                'name' => 'vue-js',
                'link' => 'https://www.vectorlogo.zone/logos/vuejs/vuejs-icon.svg',
            ],
            'saas' => [
                'name' => 'saas',
                'link' => 'https://www.vectorlogo.zone/logos/w3_html5/w3_html5-icon.svg',
            ],
            'php' => [
                'name' => 'php',
                'link' => 'https://www.vectorlogo.zone/logos/sass-lang/sass-lang-icon.svg',
            ],
            'laravel' => [
                'name' => 'laravel',
                'link' => 'https://www.vectorlogo.zone/logos/laravel/laravel-icon.svg',
            ],
            'sql' => [
                'name' => 'sql',
                'link' => 'https://www.vectorlogo.zone/logos/mysql/mysql-icon.svg',
            ],

        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->slug = Str::slug($newTechnology->name, '-');
            $newTechnology->image = $this->downloadImg('technologies/', $technology, '.svg');
            $newTechnology->save();
        }
    }

    private function downloadImg($root, $item, $extension)
    {
        $dir = $root . $item['name'] . $extension;
        $contents = file_get_contents($item['link']);
        Storage::put($dir, $contents);
        return $dir;
    }
}
