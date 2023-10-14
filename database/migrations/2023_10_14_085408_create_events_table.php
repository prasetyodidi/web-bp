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
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('owner_id');
            $table->dateTime('event_time');
            $table->string('location');
            $table->unsignedInteger('price');
            $table->text('description');
            $table->timestamps();

            $table->foreign('owner_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
