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
        Schema::create('harmonograms', function (Blueprint $table) {
            $table->id();
            $table->date('effective_date')->nullable();
            $table->string('title', 100);
            $table->decimal('amount', 8, 2);
            $table->decimal('saldo', 8, 2)->nullable();
            $table->tinyInteger('day');
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->foreignId('group_id')->constrained('group_types')->nullable();
            $table->foreignId('category_id')->constrained('categories')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harmonograms');
    }
};
