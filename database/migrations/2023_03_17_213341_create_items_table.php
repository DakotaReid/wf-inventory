<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
		Schema::create('items', function (Blueprint $table) {
			$table->string('item_id')->primary();
			$table->string('name', 100)->index();
			$table->string('category', 10)->index();
			$table->text('description')->nullable();
//			$table->string('name')->virtualAs("JSON_VALUE(data, '$.name')");
//			$table->string('category')->virtualAs("JSON_VALUE(data, '$.category')")->index();
//			$table->string('description')->virtualAs("JSON_VALUE(data, '$.description')");
			$table->json('data');
		});
    }

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('items');
	}
};
