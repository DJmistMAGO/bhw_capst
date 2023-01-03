<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->string('household_no');
            $table->string('housing_status');
            $table->string('fam_planning');
            $table->string('env_sanitation');
            $table->string('animal_owned');
            $table->string('water_source');
            $table->string('grb_disposal');
            $table->string('gardening');
            $table->string('vehicles');
            $table->string('purok');
            $table->string('year_now');
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
        Schema::dropIfExists('households');
    }
};
