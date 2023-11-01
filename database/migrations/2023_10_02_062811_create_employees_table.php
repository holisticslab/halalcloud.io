<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('role_id'); // Add the role_id column
            $table->timestamps();

            // Define a foreign key constraint to link employees to companies
            $table->foreign('company_id')->references('company_id')->on('companies');
            // $table->foreign('role_id')->references('id')->on('roles'); // Assuming "roles" table exists
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
