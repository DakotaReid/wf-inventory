<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;

class FederatedLoginAuthSessionController extends AuthenticatedSessionController
{
	public function create(): View
	{
		return view('auth.federated_login_list');
	}
}
