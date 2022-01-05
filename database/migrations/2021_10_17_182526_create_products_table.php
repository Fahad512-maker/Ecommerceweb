<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('category_id');
            $table->UnsignedBigInteger('subcategory_id');
            $table->string('title')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('Tags')->nullable();
            $table->string('technical_specification')->nullable();
            $table->string('uses')->nullable();
            $table->string('warranty')->nullable();
            $table->boolean('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
