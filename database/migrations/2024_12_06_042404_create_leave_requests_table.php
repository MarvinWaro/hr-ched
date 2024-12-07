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
      Schema::create('leave_requests', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('user_id');
         $table->foreign('user_id')->references('id')->on('users');
         $table->unsignedBigInteger('leavetype_id');
         $table->foreign('leavetype_id')->references('id')->on('leave_types');
         $table->date('leave_start_date');
         $table->date('leave_end_date');
         $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
         $table->text('reason')->nullable();
         $table->timestamp('request_date')->useCurrent();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('leave_requests');
   }
};
