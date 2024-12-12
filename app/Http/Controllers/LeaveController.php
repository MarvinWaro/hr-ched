<?php

namespace App\Http\Controllers;

use App\Models\User;
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
      return view('admin.leave.apply', compact('users'));
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
      $users = User::all();
      return view('admin.leave.balances', compact('users'));
   }
}
