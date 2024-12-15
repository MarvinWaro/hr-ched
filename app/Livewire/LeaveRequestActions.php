<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;

class LeaveRequestActions extends Component
{
   public $leaveRequestId;
   public $leaveRequest;
   public $showDeleteModal = false; // Tracks if the modal is visible

   // Fetch the leave request details
   public function mount($leaveRequestId)
   {
      $this->leaveRequestId = $leaveRequestId;
      $this->leaveRequest = LeaveRequest::find($leaveRequestId);
   }

   // Edit leave request (this could open a modal or redirect)
   public function editLeaveRequest()
   {
      // You can redirect to an edit form or show a modal
      return redirect()->route('leaveRequest.edit', $this->leaveRequestId);
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

   public function confirmDelete()
   {
      $this->showDeleteModal = true; // Show the confirmation modal
   }

   public function cancelDelete()
   {
      $this->showDeleteModal = false; // Close the modal
   }

   public function render()
   {
      return view('livewire.leave-request-actions');
   }
}
