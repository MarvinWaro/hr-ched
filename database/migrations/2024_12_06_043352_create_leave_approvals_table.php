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
      Schema::create('leave_approvals', function (Blueprint $table) {
         $table->id();
         $table->foreignId('leave_request_id')->constrained('leave_requests')->cascadeOnDelete();
         $table->foreignId('approved_by')->constrained('users')->cascadeOnDelete();
         $table->enum('status', ['Approved', 'Rejected']);
         $table->text('comments')->nullable();
         $table->timestamp('approval_date')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('leave_approvals');
   }
};
