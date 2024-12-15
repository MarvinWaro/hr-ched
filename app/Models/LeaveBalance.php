<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveBalance extends Model
{
   use HasFactory;

   protected $fillable = ['user_id', 'leave_detail_id', 'balance_days', 'year'];

   // Each LeaveBalance belongs to a User
   public function user()
   {
      return $this->belongsTo(User::class);
   }

   // Each LeaveBalance belongs to a LeaveDetail
   public function leaveDetail()
   {
      return $this->belongsTo(LeaveDetail::class);
   }
}
