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
        Schema::create('add_creates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('topic'); // Title of the advertisement
            $table->text('description'); // Detailed description
            $table->string('phone'); // Phone number
            $table->string('image')->nullable();
            $table->string('image2')->nullable(); 
            $table->string('image3')->nullable();
            $table->string('location'); // Path to the uploaded image
            $table->string('category'); // Category of the advertisement
            $table->decimal('price', 10, 2); // Price of the item
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_creates');
    }
};
