<?php

namespace App\Livewire;

use App\Models\LeaveBalance;
use App\Models\LeaveDetail;
use App\Models\User;
use Livewire\Component;

class LeaveBalanceManagement extends Component
{
   public $year;
   public $users; // List of users
   public $leaveDetails; // List of leave types
   public $balances = [];

   public function mount()
   {
      $this->year = now()->year;
      $this->users = User::all();
      $this->leaveDetails = LeaveDetail::all();
      $this->balances = LeaveBalance::with(['user', 'leaveDetail'])->get();
   }

   public function initializeBalances()
   {
      foreach ($this->users as $user) {
         foreach ($this->leaveDetails as $detail) {
            LeaveBalance::updateOrCreate(
               [
                  'user_id' => $user->id,
                  'leave_detail_id' => $detail->id,
                  'year' => $this->year,
               ],
               [
                  'balance_days' => $detail->max_days_per_year,
               ]
            );
         }
      }

      session()->flash('message', 'Leave balances initialized successfully.');
      $this->balances = LeaveBalance::with(['user', 'leaveDetail'])->get(); // Refresh balances
   }
   public function render()
   {
      return view('livewire.leave-balance-management');
   }
}
