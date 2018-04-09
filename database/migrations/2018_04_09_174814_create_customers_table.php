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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email_address');
            $table->integer('registry_type_id')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();
        });

        Schema::table('priorities', function($table) {
            $table->foreign('registry_type_id')->references('id')->on('registry_types');
            $table->foreign('status')->references('id')->on('customer_statuses');
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
