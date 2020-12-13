<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('email');
            $table->date('bdate');
            $table->integer('last_donation_date');
            $table->integer('blood_type_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->text('phone');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('clients', function (Blueprint $table) {

            $table->foreign('blood_type_id')->on('blood_types')
                ->references('id')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('city_id')->on('cities')
                ->references('id')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
