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
            $table->integer('total_pwd')->nullable();
            $table->integer('total_senior')->nullable();
            // $table->string('swara');
            $table->string('salt');
            $table->string('herbal')->nullable();
            $table->string('grb_disposal');
            $table->string('housing_status');
            $table->string('water_source');
            $table->string('fam_planning');
            $table->string('otherOption')->nullable();
            $table->string('env_sanitation');
            $table->string('electrification');
            $table->string('animal_owned')->nullable();
            $table->string('vehicle')->nullable();
            $table->string('total_voter')->nullable();
            $table->softDeletes();
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
