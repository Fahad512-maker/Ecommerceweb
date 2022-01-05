<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToProductAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_attributes', function (Blueprint $table) {
            $table->string('product_id')->after('mrp')->nullable();
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->string('qty')->after('product_id')->nullable();
        });

        Schema::table('product_attributes', function (Blueprint $table) {
            $table->string('price')->after('color_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_attributes', function (Blueprint $table) {
            //
        });
    }
}
