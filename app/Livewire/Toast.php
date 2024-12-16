<?php

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{
   public $toasts = [];

   // Listen for addToast events
   protected $listeners = ['addToast'];

   // Method to show the toast message
   public function addToast($type, $message)
   {
      $toastId = uniqid();
      $this->toasts[] = [
         'id' => $toastId,
         'type' => $type,
         'message' => $message,
         'visible' => true,
      ];

      // Automatically remove the toast after a delay
      $this->dispatch('hide-toast', ['id' => $toastId]);
   }

   // Remove the toast by ID
   public function removeToast($id)
   {
      $this->toasts = array_filter($this->toasts, fn($toast) => $toast['id'] !== $id);
   }

   public function render()
   {
      return view('livewire.toast');
   }
}
