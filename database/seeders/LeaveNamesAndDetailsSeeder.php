<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveNamesAndDetailsSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      // Insert predefined leave names into the leave_names table
      $vacationLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Vacation Leave']);
      $mandatoryForcedLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Mandatory/Forced leave']);
      $sickLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Sick Leave']);
      $specialPrivilegeId = DB::table('leave_names')->insertGetId(['name' => 'Special Privilege Leave']);
      $soloParentLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Solo Parent Leave']);
      $maternityLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Maternity Leave']);
      $paternityLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Paternity Leave']);
      $studyLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Study Leave']);
      $vawcLeaveId = DB::table('leave_names')->insertGetId(['name' => '10-day VAWC Leave']);
      $rehabilitationLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Rehabilitation Privilege Leave']);
      $womenBenefitsLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Special leave benefits for women']);
      $calamityLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Special emergency (calaminty) Leave']);
      $adoptionLeaveId = DB::table('leave_names')->insertGetId(['name' => 'Adoption Leave']);
      $othersLeaveId = DB::table('leave_names')->insertGetId(['name' => 'others']);

      // Insert related details into the leave_details table
      DB::table('leave_details')->insert([
         // Vacation Leave Details
         ['leave_name_id' => $vacationLeaveId, 'details' => 'Within the Philippines', 'max_days_per_year' => 15],
         ['leave_name_id' => $vacationLeaveId, 'details' => 'Abroad', 'max_days_per_year' => 15],

         // Mandatory/Forced Leave Details
         ['leave_name_id' => $mandatoryForcedLeaveId, 'details' => null, 'max_days_per_year' => 5],

         // Sick Leave Details
         ['leave_name_id' => $sickLeaveId, 'details' => 'In Hospital', 'max_days_per_year' => 10],
         ['leave_name_id' => $sickLeaveId, 'details' => 'Out Patient', 'max_days_per_year' => 10],

         // Maternity Leave Details
         ['leave_name_id' => $maternityLeaveId, 'details' => null, 'max_days_per_year' => 60],

         // Paternity Leave Details
         ['leave_name_id' => $paternityLeaveId, 'details' => null, 'max_days_per_year' => 7],

         // Special Privilege Leave Details
         ['leave_name_id' => $specialPrivilegeId, 'details' => null, 'max_days_per_year' => 7],

         // Solo Parent Leave Details
         ['leave_name_id' => $soloParentLeaveId, 'details' => null, 'max_days_per_year' => 7],

         // Study Leave Details
         ['leave_name_id' => $studyLeaveId, 'details' => 'Completion of Masters Degree', 'max_days_per_year' => 10],
         ['leave_name_id' => $studyLeaveId, 'details' => 'BAR/Board Examination Review', 'max_days_per_year' => 10],

         // 10-day VAWC Leave Details
         ['leave_name_id' => $vawcLeaveId, 'details' => null, 'max_days_per_year' => 10],

         // Rehabilitation Privilege Leave Details
         ['leave_name_id' => $rehabilitationLeaveId, 'details' => null, 'max_days_per_year' => 15],

         // Special Leave Benefits for Women Details
         ['leave_name_id' => $womenBenefitsLeaveId, 'details' => null, 'max_days_per_year' => 15],

         // Special Emergency (Calamity) Leave Details
         ['leave_name_id' => $calamityLeaveId, 'details' => null, 'max_days_per_year' => 15],

         // Adoption Leave Details
         ['leave_name_id' => $adoptionLeaveId, 'details' => null, 'max_days_per_year' => 60],

         // Others Leave Details
         ['leave_name_id' => $othersLeaveId, 'details' => 'Monetization of leave', 'max_days_per_year' => 0],
         ['leave_name_id' => $othersLeaveId, 'details' => 'Terminal leave', 'max_days_per_year' => 0],
      ]);
   }
}
