<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductFieldsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('lead_time')->nullable()->after('warranty');
        });

         Schema::table('products', function (Blueprint $table) {
            $table->string('tax')->nullable()->after('lead_time');
        });

          Schema::table('products', function (Blueprint $table) {
            $table->string('tax_type')->nullable()->after('tax');
        });

         Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_promo')->nullable()->after('tax_type');
        });
        

         Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_featured')->nullable()->after('is_promo');
        });


         Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_discounted')->nullable()->after('is_featured');
        });


         Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_trending')->nullable()->after('is_discounted');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
