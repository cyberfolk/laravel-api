<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'front-end' => [
                'name' => 'html',
                'link' => 'https://www.svgrepo.com/show/234844/coding.svg',
            ],
            'back-end' => [
                'name' => 'css',
                'link' => 'https://www.svgrepo.com/show/375819/gear.svg',
            ],
            'full-stack' => [
                'name' => 'js',
                'link' => 'https://www.svgrepo.com/show/375900/stack.svg',
            ]
        ];



        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->slug = Str::slug($newType->name, '-');
            $newType->link_cover = $this->downloadImg('types/', $type, '.svg');
            $newType->save();
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
