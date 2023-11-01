<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
     public function up()
    {
        Schema::create('premises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('name');
            $table->string('state')->nullable();
            $table->json('premise_details')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('companies');
        });
    }

    public function down()
    {
        Schema::dropIfExists('premises');
    }
};
