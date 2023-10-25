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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->uuid('owner_id');
            $table->uuid('post_id');
            $table->unsignedBigInteger('parent_comment_id')->nullable()->index();
            $table->text('message');
            $table->timestamps();

            $table->foreign('owner_id')->on('users')->references('id');
            $table->foreign('post_id')->on('posts')->references('id');
            $table->foreign('parent_comment_id')->on('comments')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
