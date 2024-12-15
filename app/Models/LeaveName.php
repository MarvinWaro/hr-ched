<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveName extends Model
{
   use HasFactory;

   protected $fillable = ['name'];

   // One LeaveName can have many LeaveDetails
   public function leaveDetails()
   {
      return $this->hasMany(LeaveDetail::class);
   }
}
