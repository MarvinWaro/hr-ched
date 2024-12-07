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
      Schema::create('leave_types', function (Blueprint $table) {
         $table->id();
         $table->string('leave_name');
         $table->integer('max_days_per_year')->default(0);
         $table->integer('carry_forward_days')->default(0)->nullable(); // Optional
         $table->text('description')->nullable(); // Optional
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('leave_types');
   }
};
