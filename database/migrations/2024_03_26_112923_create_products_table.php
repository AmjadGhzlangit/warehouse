<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->string('scientific_name');
            $table->string('trading_name');
            $table->string('description');
            $table->date('date_of_validity');
            $table->string('manufacturer');
            $table->unsignedInteger('price');
            $table->unsignedInteger('sell_price');
            $table->unsignedInteger('quantity');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
