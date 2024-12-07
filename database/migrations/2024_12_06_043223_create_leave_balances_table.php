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
      Schema::create('leave_balances', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('user_id');
         $table->foreign('user_id')->references('id')->on('users');
         $table->unsignedBigInteger('leavetype_id');
         $table->foreign('leavetype_id')->references('id')->on('leave_types');
         $table->integer('balance_days')->default(0);
         $table->year('year')->nullable(); // Optional
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('leave_balances');
   }
};
