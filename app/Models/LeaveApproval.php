<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveApproval extends Model
{
   use HasFactory;

   protected $fillable = ['leave_request_id', 'approved_by', 'status', 'comments', 'approval_date'];

   // Each LeaveApproval belongs to a LeaveRequest
   public function leaveRequest()
   {
      return $this->belongsTo(LeaveRequest::class);
   }

   // Each LeaveApproval belongs to a User (who approved the leave)
   public function approvedBy()
   {
      return $this->belongsTo(User::class, 'approved_by');
   }
}
