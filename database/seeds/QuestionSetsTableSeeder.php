<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();
    	for ($i=0; $i < 30; $i++) { 
    		DB::table('question_sets')->insert([
    			'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
    			'study_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    			'time' => $faker->randomElement($array = array ('30','45','60', '120')),
    			'post' => $faker->randomElement($array = array ('0','1')),
    			'user_id' => $faker->randomElement($array = array ('1')),
    			'created_at' => date("Y-m-d H:i:s")
    			]);
    	}
    	
    }
}
