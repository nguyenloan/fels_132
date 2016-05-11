<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class LessonTableSeeder extends Seeder{
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1,50) as $index)
        {
            Lesson::create([
                'result' => $faker->text,
               // 'name'  => $faker->name
            ]);
        }
    }
}
