<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class LeaveType extends Model
{
   use HasFactory;

   protected $fillable = [
      'leave_name',
      'leave_details',
      'max_days_per_year',
      'carry_forward_days',
      'description',
   ];

   /**
    * Get the leave requests for the leave type.
    */
   public function leaveRequests()
   {
      return $this->hasMany(LeaveRequest::class, 'leavetype_id');
   }
}
