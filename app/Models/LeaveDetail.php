<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveDetail extends Model
{
   use HasFactory;

   protected $fillable = ['leave_name_id', 'details', 'max_days_per_year'];

   // Each LeaveDetail belongs to a LeaveName
   public function leaveName()
   {
      return $this->belongsTo(LeaveName::class, 'leave_name_id');
   }

   // One LeaveDetail can have many LeaveRequests and LeaveBalances
   public function leaveRequests()
   {
      return $this->hasMany(LeaveRequest::class);
   }

   public function leaveBalances()
   {
      return $this->hasMany(LeaveBalance::class);
   }
}
