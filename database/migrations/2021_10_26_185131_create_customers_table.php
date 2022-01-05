<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('address')->nullable();
            $table->dateTime('expire_link')->nullable();
            $table->string('remember_token')->nullable();
            $table->UnsignedBigInteger('country_id')->nullable();
            $table->UnsignedBigInteger('state_id')->nullable();
            $table->UnsignedBigInteger('city_id')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('company')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
