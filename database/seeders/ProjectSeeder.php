<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3, true);
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->info = $faker->sentence(30, true);
            $newProject->link = $faker->url();
            $newProject->init = $faker->date('Y-m-d');
            $newProject->user_id = 1;

            $numTypes = Type::count('id');
            $newProject->type_id = rand(1, $numTypes);

            $dir = 'storage/app/public/placeholders/';
            $img_fake = $faker->image($dir, fullPath: false, category: 'Projects', format: 'jpg', word: $newProject->title);
            $newProject->image = 'placeholders/' . $img_fake;

            $newProject->save();
        }
    }
}
