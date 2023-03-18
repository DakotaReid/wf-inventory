<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ItemImport extends Model
{
	protected static string $endpoint = "https://api.warframestat.us/items/";

	public static function run(): void {
		$items = Http::get(self::$endpoint)->object();

		foreach ($items as $item) {
			if ($item->wikiaThumbnail ?? false) {
				$wikia_thumbnail = preg_replace("/(?<=\.png|gif|jpg|jpeg).+$/", "", $item->wikiaThumbnail);
				$item->wikiaThumbnail = $wikia_thumbnail;
			}

			$item_id = $item->uniqueName;

			Item::updateOrCreate(["item_id" => $item_id], [
				"name" => $item->name,
				"category" => $item->category,
				"description" => $item->description ?? null,
				"data" => json_encode($item)
			]);
		}
	}
}
