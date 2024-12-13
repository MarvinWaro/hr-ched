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
      Schema::table('leave_types', function (Blueprint $table) {
         $table->enum('leave_name', [
            'Vacation Leave',
            'Mandatory/Force Leave',
            'Sick Leave',
            'Maternity Leave',
            'Paternity Leave',
            'Special Privilege Leave',
            'Solo Parent Leave',
            'Study Leave',
            '10-day VAWC Leave',
            'Rehabilitation Privilege',
            'Special Leave Benefits for Women',
            'Special Emergency (Calamity) Leave'
         ])->after('id');

         $table->enum('leave_details', [
            'Within the Philippines',
            'Abroad',
            'In hospital',
            'Out patient',
            'Completion of masters degree',
            'Bar/Board examination review',
            'Monetization of leave',
            'Terminal leave'
         ])->nullable()->after('leave_name');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::table('leave_types', function (Blueprint $table) {
         $table->dropColumn('leave_name');
         $table->dropColumn('leave_details');
      });
   }
};
