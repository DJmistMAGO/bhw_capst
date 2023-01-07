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
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('household_id')->constrained()->references('id')->on('households')->onDelete('cascade');
            $table->string('fullname');
            $table->string('gender');
            $table->date('bdate');
            $table->integer('age');
            $table->string('religion')->nullable();
            $table->string('marital_status');
            $table->string('pwd_type')->nullable();
            $table->string('is_voter')->default(false);
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
        Schema::dropIfExists('residents');
    }
};
