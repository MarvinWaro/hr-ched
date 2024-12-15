<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveRequest extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'leave_detail_id',
      'leave_start_date',
      'leave_end_date',
      'leave_days', // Newly added
      'status',
      'reason',
      'attachments', // Assuming this is used for storing file paths
   ];

   // Each LeaveRequest belongs to a User
   public function user()
   {
      return $this->belongsTo(User::class, 'user_id');
   }

   // Each LeaveRequest belongs to a LeaveDetail
   public function leaveDetail()
   {
      return $this->belongsTo(LeaveDetail::class, 'leave_detail_id');
   }

   // One LeaveRequest can have many LeaveApprovals
   public function leaveApprovals()
   {
      return $this->hasMany(LeaveApproval::class);
   }
}
