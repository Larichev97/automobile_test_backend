<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('mark_id')->default(0)->index()->references('id')->on('vehicle_marks');
            $table->bigInteger('model_id')->default(0)->index()->references('id')->on('vehicle_models');
            $table->string('vin');
            $table->bigInteger('fuel_type_id')->default(0)->index()->references('id')->on('vehicle_fuel_types');
            $table->integer('engine_volume');
            $table->date('production_date');
            $table->float('price', '10', '2')->default(0);
            $table->bigInteger('importer_country_id')->default(0)->index()->references('id')->on('importer_countries');

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
        Schema::dropIfExists('vehicles');
    }
}
