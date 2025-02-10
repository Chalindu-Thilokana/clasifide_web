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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('topic'); // Title of the advertisement
            $table->text('description'); // Detailed description
            $table->string('phone'); // Phone number
            $table->string('image')->nullable();
            $table->string('image2')->nullable(); 
            $table->string('image3')->nullable();// Path to the uploaded image
            $table->string('catergory_id'); 
            $table->string('location');// Category of the advertisement
            $table->decimal('price', 10, 2); // Price of the item
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
