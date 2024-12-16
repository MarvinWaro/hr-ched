<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LeaveApproval;
use App\Models\LeaveRequest;
use App\Models\LeaveBalance;
use Illuminate\Support\Facades\Auth;

class LeaveApprovalManagement extends Component
{
   public $leaveRequests;

   public function mount()
   {
      // Restrict access to admins
      if (!Auth::user()->isAdmin()) {
         abort(403, 'Unauthorized action.');
      }

      // Fetch pending leave requests
      $this->leaveRequests = LeaveRequest::with(['user', 'leaveDetail'])
         ->where('status', 'Pending')
         ->get();
   }

   public function approveLeave($leaveRequestId, $approvedDays)
   {
      if (!Auth::user()->isAdmin()) {
         abort(403, 'Unauthorized action.');
      }

      $leaveRequest = LeaveRequest::findOrFail($leaveRequestId);

      $leaveBalance = LeaveBalance::where('user_id', $leaveRequest->user_id)
         ->where('leave_detail_id', $leaveRequest->leave_detail_id)
         ->where('year', now()->year)
         ->first();

      if ($leaveBalance && $leaveBalance->balance_days >= $approvedDays) {
         $leaveBalance->decrement('balance_days', $approvedDays);

         LeaveApproval::create([
            'leave_request_id' => $leaveRequest->id,
            'approved_by' => Auth::id(),
            'status' => 'Approved',
            'comments' => 'Leave approved successfully.',
            'approval_date' => now(),
         ]);

         $leaveRequest->update(['status' => 'Approved']);

         session()->flash('message', 'Leave request approved successfully.');
      } else {
         session()->flash('error', 'Insufficient leave balance.');
      }

      $this->mount();
   }

   public function rejectLeave($leaveRequestId, $comments)
   {
      if (!Auth::user()->isAdmin()) {
         abort(403, 'Unauthorized action.');
      }

      $leaveRequest = LeaveRequest::findOrFail($leaveRequestId);

      LeaveApproval::create([
         'leave_request_id' => $leaveRequest->id,
         'approved_by' => Auth::id(),
         'status' => 'Rejected',
         'comments' => $comments,
         'approval_date' => now(),
      ]);

      $leaveRequest->update(['status' => 'Rejected']);

      session()->flash('message', 'Leave request rejected successfully.');

      $this->mount();
   }

   public function render()
   {
      return view('livewire.leave-approval-management');
   }
}
