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
      Schema::table('leave_requests', function (Blueprint $table) {
         //
         $table->integer('leave_days')->nullable()->after('leave_end_date'); // Stores computed leave days
         $table->text('comments')->nullable()->after('leave_days');          // Stores optional comments
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::table('leave_requests', function (Blueprint $table) {
         $table->dropColumn(['leave_days', 'comments']);
      });
   }
};
