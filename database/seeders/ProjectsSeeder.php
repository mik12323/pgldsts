<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $departments = [1,2,3];
        $offices = [1,2,3,4,5,6,7,8];
        foreach (range(1,20) as $value){
            $faker = Faker::create();
            $location = $faker->text(12);
            $projectName = $faker->text(6);
            DB::table('projects')->insert([
                // 'department_id'=> $departments[rand(0,2)],
                'department_id' => 1,
                // 'office_id'=> $offices[rand(0,7)],
                'office_id' => 1,
                'activity_id'=> 1,
                'projectName'=> $projectName,
                'referenceNumber'=>rand(1,1000),
                'location'=> $location


            ]);
        }

    }
}
