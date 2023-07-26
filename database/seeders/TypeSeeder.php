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
                'name' => 'front-end',
                'link' => 'https://www.svgrepo.com/show/234844/coding.svg',
            ],
            'back-end' => [
                'name' => 'back-end',
                'link' => 'https://www.svgrepo.com/show/375819/gear.svg',
            ],
            'full-stack' => [
                'name' => 'full-stack',
                'link' => 'https://www.svgrepo.com/show/375900/stack.svg',
            ]
        ];



        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->slug = Str::slug($newType->name, '-');
            $newType->image = $this->downloadImg('types/', $type, '.svg');
            $newType->save();
        }
    }

    private function downloadImg($root, $item, $extension)
    {
        $dir = $root . $item['name'] . $extension;
        $contents = file_get_contents($item['link']);
        Storage::put('public/' . $dir, $contents); // devo specificare che i file li vado a salvare nella cartella public.
        return $dir; //nel nome del file non c'è la parola public perchè assets() va a pescare i file direttamente dalla cartella public.
    }
}
