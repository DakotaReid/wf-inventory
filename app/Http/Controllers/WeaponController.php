<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class WeaponController extends Controller
{
    public function get_weapons(): View
	{
		return view('items.weapons.list', [
//			'weapons' => Weapon::all()
			'weapons' => DB::table("weapons")
				->orderBy("name")
				->limit(10)
				->get()
		]);
	}
}
