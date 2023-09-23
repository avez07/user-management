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
        Schema::create('users', function (Blueprint $table) {
            $table->id('registration_id');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->bigInteger('Phone')->nullable();
            $table->string('Location')->nullable();
            $table->date('Date_Of_Birth')->nullable();
            $table->string('Password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
