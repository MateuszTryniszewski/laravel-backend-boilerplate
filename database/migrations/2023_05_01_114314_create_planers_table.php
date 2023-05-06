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
        Schema::create('planers', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->string('title', 100);
            $table->decimal('m01', 8, 2)->nullable();
            $table->decimal('m02', 8, 2)->nullable();
            $table->decimal('m03', 8, 2)->nullable();
            $table->decimal('m04', 8, 2)->nullable();
            $table->decimal('m05', 8, 2)->nullable();
            $table->decimal('m06', 8, 2)->nullable();
            $table->decimal('m07', 8, 2)->nullable();
            $table->decimal('m08', 8, 2)->nullable();
            $table->decimal('m09', 8, 2)->nullable();
            $table->decimal('m10', 8, 2)->nullable();
            $table->decimal('m11', 8, 2)->nullable();
            $table->decimal('m12', 8, 2)->nullable();
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('group_id')->constrained('group_types');
            $table->foreignId('category_id')->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planers');
    }
};
