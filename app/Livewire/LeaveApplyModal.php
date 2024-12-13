<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Support\Facades\Auth;

class LeaveApplyModal extends Component
{
   public $leaveTypes = [];
   public $leaveTypeId;
   public $startDate;
   public $endDate;
   public $reason;

   public $isOpen = false;

   protected $rules = [
      'leaveTypeId' => 'required|exists:leave_types,id',
      'startDate' => 'required|date|after_or_equal:today',
      'endDate' => 'required|date|after_or_equal:startDate',
      'reason' => 'nullable|string|max:255',
   ];

   public function mount()
   {
      $this->leaveTypes = LeaveType::all();
   }

   public function openModal()
   {
      $this->isOpen = true;
   }

   public function closeModal()
   {
      $this->reset(['leaveTypeId', 'startDate', 'endDate', 'reason', 'isOpen']);
   }

   public function applyLeave()
   {
      $this->validate();

      LeaveRequest::create([
         'user_id' => Auth::id(),
         'leavetype_id' => $this->leaveTypeId,
         'leave_start_date' => $this->startDate,
         'leave_end_date' => $this->endDate,
         'reason' => $this->reason,
      ]);

      session()->flash('message', 'Leave applied successfully.');
      $this->closeModal();
      $this->emit('leaveUpdated'); // Notify parent components
   }
   public function render()
   {
      return view('livewire.leave-apply-modal');
   }
}
