<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
	//https://socialiteproviders.com/Steam/
	//https://socialiteproviders.com/Discord/
	//https://socialiteproviders.com/Microsoft
    public function redirect(string $driver) {
		//TODO Check if driver is valid
		$valid_drivers = [
			"google",
			"steam"
		];

		if (in_array($driver, $valid_drivers)) {
			return Socialite::driver($driver)->redirect();
		}
	}

	public function callback(string $driver) {
		$driver_user = Socialite::driver($driver)->user();

//		echo "<pre>";
//		print_r($driver_user);
//		echo "</pre>";

		$email = $driver_user->getEmail();
		$nickname = $driver_user->getNickname();

		$user = User::updateOrCreate([
			"${driver}_id" => $driver_user->getId(),
		], [
			'username' => ($email ?? $nickname),
			'name' => ($driver_user->getName() ?? $nickname),
			'email' => $email
		]);

		Auth::login($user);

		return redirect("/dashboard");
	}
}
