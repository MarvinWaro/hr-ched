<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;

class LeaveRequestActions extends Component
{
   public $leaveRequestId;
   public $leaveRequest;   // Stores the leave request data
   public $showEditModal = false; // Tracks the visibility of the edit modal
   public $showDeleteModal = false; // Tracks if the modal is visible
   public $leave_start_date, $leave_end_date, $reason, $status; // Editable fields

   // Fetch the leave request details
   public function mount($leaveRequestId)
   {
      $this->leaveRequestId = $leaveRequestId;
      $this->leaveRequest = LeaveRequest::find($leaveRequestId);
   }

   // Edit leave request (this could open a modal or redirect)
   public function editLeaveRequest($id)
   {
      // You can redirect to an edit form or show a modal
      // return redirect()->route('leaveRequest.edit', $this->leaveRequestId);

      $this->leaveRequestId = $id;
      $this->leaveRequest = LeaveRequest::find($id);

      if ($this->leaveRequest) {
         $this->leave_start_date = $this->leaveRequest->leave_start_date;
         $this->leave_end_date = $this->leaveRequest->leave_end_date;
         $this->reason = $this->leaveRequest->reason;
         $this->status = $this->leaveRequest->status;
         $this->showEditModal = true;
      }
   }

   // Update the leave request
   public function updateLeaveRequest()
   {
      $validatedData = $this->validate([
         'leave_start_date' => 'required|date',
         'leave_end_date' => 'required|date|after_or_equal:leave_start_date',
         'reason' => 'nullable|string|max:255',
         'status' => 'required|in:Pending,Approved,Rejected',
      ]);

      $leaveRequest = LeaveRequest::find($this->leaveRequestId);
      if ($leaveRequest) {
         $leaveRequest->update($validatedData);
         session()->flash('message', 'Leave request updated successfully.');
      }

      // Use dispatch() to trigger the toast event
      $this->dispatch('addToast', 'success', 'Leave request updated successfully.');

      $this->showEditModal = false; // Close the modal
      $this->dispatch('refreshLeaveRequests'); // Refresh the parent component
   }

   public function cancelEdit()
   {
      $this->showEditModal = false; // Close the modal without saving
   }


   public function confirmDelete()
   {
      $this->showDeleteModal = true; // Show the confirmation modal
   }

   public function cancelDelete()
   {
      $this->showDeleteModal = false; // Close the modal
   }

   // Delete leave request
   public function deleteLeaveRequest()
   {
      $leaveRequest = LeaveRequest::find($this->leaveRequestId);
      if ($leaveRequest) {
         $leaveRequest->delete();
         session()->flash('message', 'Leave request deleted successfully.');
      }

      // Use dispatch() to trigger the toast event
      $this->dispatch('addToast', 'success', 'Leave request deleted successfully.');

      $this->showDeleteModal = false; // Close the modal
      $this->dispatch('refreshLeaveRequests'); // Optional: Refresh the parent table if needed
   }

   public function render()
   {
      return view('livewire.leave-request-actions');
   }
}
