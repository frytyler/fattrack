<?php

class Meal_Item_Controller extends Base_Controller {

	public function action_index($id) {
		$meal_items = MealItem::where('meal_id', '=', $id)->get();
		return Response::json($meal_items);
	}
	
	public function store() {
		$input = Input::json();
		$meal_item = Meal_item::create(array('meal_id' => $input['meal_id'],'description' => $input['description'], 'health_level' => $input['health_level'] ));	
	}

	public function show($id) {
		$meal_item = Meal_item::find($id);
	}

	public function update($id) {
		$input = Input::json();
		$meal_item = Meal_item::find($id);
		$meal_item = array('meal_id' => $input['meal_id'],'description' => $input['description'], 'health_level' => $input['health_level'] );
		$meal_item->save();
	}

	public function destroy($id) {
		$meal_item = Meal_item::find($id);
		$meal_item->delete();
	}

}