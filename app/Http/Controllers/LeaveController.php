<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LeaveRequest;
use App\Models\LeaveName;
use App\Models\LeaveDetail;
use App\Models\LeaveBalance;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
   public function leaveindex()
   {
      $users = User::all();
      return view('admin.leave.index', compact('users'));
   }

   public function apply()
   {
      $users = User::all();
      $leave_requests = LeaveRequest::with('leaveDetail')->get();
      // dd($leave_requests);
      return view('admin.leave.apply', compact('users', 'leave_requests'));
   }


   public function requests()
   {
      $users = User::all();
      return view('admin.leave.requests', compact('users'));
   }

   public function manage()
   {
      $users = User::all();
      return view('admin.leave.manage', compact('users'));
   }

   public function policies()
   {
      $users = User::all();
      return view('admin.leave.policies', compact('users'));
   }

   public function balances()
   {
      $balances = LeaveBalance::all();
      $users = User::all();
      return view('admin.leave.balances', compact('users', 'balances'));
   }
}
