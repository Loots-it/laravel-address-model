<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->string('street', 150)->nullable();
            $table->integer('house_number')->nullable();
            $table->string('bus_number', 20)->nullable();

            $table->string('postal_code', 20)->nullable();
            $table->string('city', 150)->nullable();

            $table->string('country_code', 2) ->nullable();

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
        Schema::dropIfExists('addresses');
    }
}
