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
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3, true);
            $newProject->slug = Str::slug($faker->title, '-');
            $newProject->description = $faker->text(50);
            $newProject->thumb = $faker->imageUrl(category: 'Projects', format: 'jpg');
            $newProject->start_date = $faker->date('Y-m-d');
            $newProject->last_commit = $faker->date('Y-m-d');
            $newProject->code_line = $faker->numberBetween(100, 1000);
            $newProject->folders = $faker->numberBetween(5, 30);
            $newProject->save();
        }
    }
}
