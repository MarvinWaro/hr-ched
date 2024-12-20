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
      Schema::create('leave_names', function (Blueprint $table) {
         $table->id();  // Auto-increment ID
         $table->string('name')->unique();  // Leave name (e.g., Vacation Leave, Sick Leave)
         $table->timestamps();  // Timestamps for created_at and updated_at
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('leave_names');
   }
};
