<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_data', function (Blueprint $table) {
            $table->id();
            $table->string('property_uuid')->unique();
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->text('description');
            $table->string('display_address');
            $table->string('image');
            $table->string('thumbnail');
            $table->string('latitude');
            $table->string('longitude');
            $table->tinyInteger('number_of_bedrooms')->index();
            $table->tinyInteger('number_of_bathrooms');
            $table->integer('price')->index();
            $table->string('property_type')->index();
            $table->string('type')->index();
            $table->tinyInteger('if_updated')->comment('0->Not updated, 1->Updated');
            $table->integer('page_number');
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
        Schema::dropIfExists('property_data');
    }
}
