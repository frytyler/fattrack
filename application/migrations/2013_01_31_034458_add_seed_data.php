<?php

class Add_Seed_Data {    

	public function up()
    {
		
    	$breakfast_id = DB::table('meal_types')->insert_get_id(array('name' => 'Breakfast', 'category' => 'Meal', 'sequence' => 1));
    	$pre_lunch_snack_id = DB::table('meal_types')->insert_get_id(array('name' => 'Pre-Lunch Snack', 'category' => 'Snack', 'sequence' => 2));
    	$lunch_id = DB::table('meal_types')->insert_get_id(array('name' => 'Lunch', 'category' => 'Meal', 'sequence' => 3));
    	$pre_supper_snack_id = DB::table('meal_types')->insert_get_id(array('name' => 'Pre-Supper Snack', 'category' => 'Snack', 'sequence' => 4));
    	$supper_id = DB::table('meal_types')->insert_get_id(array('name' => 'Supper', 'category' => 'Meal', 'sequence' => 5));
    	$evening_snack_id = DB::table('meal_types')->insert_get_id(array('name' => 'Evening Snack', 'category' => 'Snack', 'sequence' => 6));
    	$midnight_snack_id = DB::table('meal_types')->insert_get_id(array('name' => 'Midnight Snack', 'category' => 'Snack', 'sequence' => 7));

    	$meal_one = DB::table('meals')->insert_get_id(array('type_id' => $breakfast_id, 'eaten_at' => '2013-01-30', 'consumption_level' => 0, 'timing' => 0));
    	$meal_two = DB::table('meals')->insert_get_id(array('type_id' => $lunch_id, 'eaten_at' => '2013-01-30', 'consumption_level' => 1, 'timing' => -1));
    	$meal_three = DB::table('meals')->insert_get_id(array('type_id' => $supper_id, 'eaten_at' => '2013-01-30', 'consumption_level' => -1, 'timing' => 1));

    	$meal_item_one = DB::table('meal_items')->insert_get_id(array('meal_id' => $meal_one, 'description' => 'Cheerios', 'health_level' => 0));
    	$meal_item_two = DB::table('meal_items')->insert_get_id(array('meal_id' => $meal_two, 'description' => 'Onion Soup', 'health_level' => 0));
    	$meal_item_three = DB::table('meal_items')->insert_get_id(array('meal_id' => $meal_three, 'description' => 'Greasy Pizza', 'health_level' => -1));


    }    

	public function down()
    {
		

    }

}