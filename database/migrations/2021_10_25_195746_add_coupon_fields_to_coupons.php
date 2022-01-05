<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouponFieldsToCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            
            $table->enum('type' , ['value' , 'percentage'])->nullable()->after('value');
        });

        Schema::table('coupons', function (Blueprint $table) {
            
            $table->string('min_order_amt')->nullable()->after('type');
        });


        Schema::table('coupons', function (Blueprint $table) {
            
           $table->boolean('is_one_time')->nullable()->after('min_order_amt')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            //
        });
    }
}
