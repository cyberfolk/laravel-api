<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3, true);
            $newProject->slug = Str::slug($newProject->title, '-');
            $newProject->description = $faker->sentence(30, true);
            $newProject->link_cover = $faker->imageUrl(category: 'Projects', format: 'jpg');
            $newProject->link_live = $faker->url();
            $newProject->link_code = $faker->url();
            $newProject->start_date = $faker->date('Y-m-d');
            $newProject->last_commit = $faker->date('Y-m-d');
            $newProject->code_line = $faker->numberBetween(100, 1000);
            $newProject->folders = $faker->numberBetween(5, 30);
            $newProject->user_id = 1;
            $newProject->save();
        }
    }
}
