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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('tour_name', 100);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->string('location');
            $table->string('cover');
            $table->string('created_by');
            $table->string('created_date');
            $table->text('description');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
