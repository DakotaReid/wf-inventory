<?php

namespace App\Http\Controllers;

use App\Models\ItemImport;

class ItemImportController extends Controller
{
	public function import() {
		ItemImport::run();
	}
}
