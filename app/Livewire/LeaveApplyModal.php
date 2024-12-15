<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LeaveDetail;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LeaveApplyModal extends Component
{
   use WithFileUploads;

   public $leaveDetails = []; // Hold leave types for the dropdown
   public $leaveDetailId;
   public $startDate;
   public $endDate;
   public $reason;
   public $files = []; // For file attachments
   public $isOpen = false; // Modal visibility toggle
   public $leave_days; // Store calculated leave days

   protected $rules = [
      'leaveDetailId' => 'required|exists:leave_details,id',
      'startDate' => 'required|date|after_or_equal:today',
      'endDate' => 'required|date|after_or_equal:startDate',
      'reason' => 'nullable|string|max:255',
      'files.*' => 'nullable|file|max:2048', // Optional file validation
   ];

   public function mount()
   {
      // Fetch leave details from the database (associated leave types and their details)
      $this->leaveDetails = LeaveDetail::with('leaveName')->get();
   }

   public function updated($propertyName)
   {
      if ($propertyName === 'startDate' || $propertyName === 'endDate') {
         $this->calculateLeaveDays();
      }
   }

   public function calculateLeaveDays()
   {
      if ($this->startDate && $this->endDate) {
         $start = Carbon::parse($this->startDate);
         $end = Carbon::parse($this->endDate);
         $this->leave_days = $start->diffInDays($end) + 1; // Include both start and end dates
      } else {
         $this->leave_days = null;
      }
   }

   public function openModal()
   {
      $this->isOpen = true;
   }

   public function closeModal()
   {
      $this->reset(['leaveDetailId', 'startDate', 'endDate', 'reason', 'files', 'leave_days']);
      $this->isOpen = false;
   }

   public function applyLeave()
   {
      $this->validate();

      // Store file attachments if any
      $fileNames = [];
      if ($this->files) {
         foreach ($this->files as $file) {
            // Store each file and get its name
            $fileNames[] = $file->getClientOriginalName();  // Store file name
            $file->storePublicly('leave_attachments', 'public');
         }
      }

      // Create the leave request and save it in the database
      LeaveRequest::create([
         'user_id' => Auth::id(),
         'leave_detail_id' => $this->leaveDetailId,
         'leave_start_date' => $this->startDate,
         'leave_end_date' => $this->endDate,
         'leave_days' => $this->leave_days, // Store calculated leave days
         'status' => 'Pending',
         'reason' => $this->reason,
         'attachments' => $fileNames ? json_encode($fileNames) : null, // Store file names as JSON
      ]);

      // Use dispatch() to trigger the toast event
      $this->dispatch('addToast', 'success', 'Leave request submitted successfully.');

      // Close the modal and reset form
      $this->closeModal();
      $this->dispatch('leaveUpdated'); // Notify other components if needed
   }

   public function render()
   {
      return view('livewire.leave-apply-modal');
   }
}
