<?php

class Create_Meals_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meal_types', function($table)
		{
		    $table->increments('id');
		    $table->string('name',255);
		    $table->string('category',64);
		    $table->integer('sequence');
		    $table->timestamps();

		});
		Schema::create('meals', function($table)
		{
		    $table->increments('id');
			$table->integer('type_id');
		    $table->date('eaten_at');
		    $table->timestamps();
		    $table->integer('consumption_level');
		    $table->integer('timing');
		});
		Schema::create('meal_items', function($table)
		{
		    $table->increments('id');
		    $table->integer('meal_id');
		    $table->string('description');
		    $table->integer('health_level');
		    $table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meal_types');
		Schema::drop('meals');
		Schema::drop('meal_items');
	}

}