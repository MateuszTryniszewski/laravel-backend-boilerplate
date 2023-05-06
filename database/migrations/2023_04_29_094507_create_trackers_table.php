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
        Schema::create('trackers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('effective_date')->nullable();
            $table->string('title', 100);
            $table->decimal('amount', 8, 2);
            $table->decimal('saldo', 8, 2)->nullable();
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
        Schema::dropIfExists('trackers');
    }
};
