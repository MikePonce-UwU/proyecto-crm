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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('main_address');
            $table->string('secondary_address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('county');
            $table->string('phone_number');
            $table->string('owner_renter');
            $table->string('credit_rating');
            $table->string('home_value');
            $table->string('income');
            $table->string('age');
            $table->string('birth_month');
            $table->string('foto')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->softDeletes();
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
