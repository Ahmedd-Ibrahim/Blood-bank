<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age');
            $table->integer('blood_count');
            $table->longText('hospital_address');
            $table->string('phone');
            $table->text('notes');
            $table->integer('city_id')->unsigned();
            $table->integer('blood_type_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('donation_orders', function (Blueprint $table) {

            $table->foreign('city_id')->on('cities')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('blood_type_id')->on('blood_types')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('client_id')->on('clients')->references('id')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donation_orders');
    }
}
