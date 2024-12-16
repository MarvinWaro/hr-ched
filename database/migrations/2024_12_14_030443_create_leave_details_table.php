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
      Schema::create('leave_details', function (Blueprint $table) {
         $table->id();  // Auto-increment ID
         $table->unsignedBigInteger('leave_name_id');  // Foreign key referencing the leave_names table
         $table->string('details')->nullable();  // Leave details (e.g., "Within the Philippines", "Abroad")
         $table->integer('max_days_per_year')->default(0);  // Max days per year for this leave type
         $table->timestamps();  // Timestamps for created_at and updated_at

         // Foreign key constraint referencing the leave_names table
         $table->foreign('leave_name_id')->references('id')->on('leave_names')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('leave_details');
   }
};
