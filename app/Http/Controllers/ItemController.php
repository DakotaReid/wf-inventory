<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
	public function get_items() {
		//Item::all()
		$items = DB::table("items")
			->orderBy("name")
			->get();

		var_dump($items);die;

		foreach ($items as $item) {
			echo "{$item->item_id}: {$item->name}<br>";
		}
	}
}
