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
        Schema::create('bilings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->foreign('registration_id')->references('registration_id')->on('users')->onDelete('cascade');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->bigInteger('Phone')->nullable();
            $table->string('Location')->nullable();
            $table->date('Date_Of_Birth')->nullable();
            $table->string('Password')->nullable();
            $table->float('New_weight')->nullable();
            $table->float('Weight_diff')->nullable();
            $table->string('New_status')->nullable();
            $table->float('cod_ammount')->nullable();
            $table->string('Remark')->nullable();
            $table->date('Created_at')->nullable();
            $table->date('Updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bilings');
    }
};
