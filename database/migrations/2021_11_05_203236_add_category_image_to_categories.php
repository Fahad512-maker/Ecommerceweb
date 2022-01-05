<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryImageToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('category_image')->after('name')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_home')->after('category_image')->nullable();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('status')->after('is_home')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
}
