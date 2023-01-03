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
            $table->string('purok');
            $table->integer('total_fam');
            $table->integer('total_pwd');
            $table->integer('total_senior');
            $table->string('swara');
            $table->string('salt');
            $table->string('herbal');
            $table->string('grb_disposal');
            $table->string('housing_status');
            $table->string('water_source');
            $table->string('fam_planning');
            $table->string('env_sanitation');
            $table->string('electricatian');
            $table->string('animal_owned'); 
            $table->string('vehicle'); 
            $table->string('total_voter');
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
