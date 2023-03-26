<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commentables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('comment_id');
            $table->foreignId('commentable_id');
            $table->string('commentable_type');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commentables');
    }
};
