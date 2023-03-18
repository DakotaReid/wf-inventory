<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Item extends Model
{
	use HasFactory;

	protected $table = 'items';
	protected $primaryKey = 'item_id';
	public $incrementing = false;
	protected $keyType = 'string';
	public $timestamps = false;

	protected $fillable = [
		'item_id',
		'name',
		'category',
		'description',
		'data'
	];
}
