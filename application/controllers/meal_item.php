<?php

class Meal_Item_Controller extends Base_Controller {

	public function index($id) {
		$meal_items = Meal_item::where('meal_id', '=', $id);
	}
	
	public function store() {
		$input = Input::get();
		$meal_item = Meal_item::create(array('meal_id' => $input['meal_id'],'description' => $input['description'], 'health_level' => $input['health_level'] ));	
	}

	public function show($id) {

	}

	public function update($id) {

	}

	public function destroy($id) {
		
	}

}