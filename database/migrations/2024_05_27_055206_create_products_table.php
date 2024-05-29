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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->integer('brand_id')->nullable();
            $table->double('old_price')->nullable();
            $table->double('price')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('add_info')->nullable();
            $table->text('shiping_return')->nullable();
            $table->text('created_by')->nullable();
            $table->text('quantity')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
