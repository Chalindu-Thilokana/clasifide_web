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
        Schema::table('add_creates', function (Blueprint $table) {
            //
          
                $table->renameColumn('category', 'catergory_id');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('add_creates', function (Blueprint $table) {
            //
            $table->renameColumn('catergory_id', 'category');
        });
    }
};
