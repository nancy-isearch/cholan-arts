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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('program')->nullable();
            $table->string('product_id')->nullable();
            $table->string('preferred_size')->nullable();
            $table->string('purpose')->nullable();
            $table->string('preferred_finish')->nullable();
            $table->string('preferred_time')->nullable();
            $table->text('message');
            $table->enum('status', ['pending', 'in-progress', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
