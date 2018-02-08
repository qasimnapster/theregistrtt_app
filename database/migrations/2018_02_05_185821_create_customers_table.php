<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 66);
            $table->string('last_name', 66);
            $table->string('email_address', 320);
            $table->string('password', 64);
            $table->integer('registry_type_id')->unsigned();
            $table->foreign('registry_type_id')->references('ID')->on('registry_types');
            $table->boolean('status');
            // required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();
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
        Schema::drop('customers');
    }
}
