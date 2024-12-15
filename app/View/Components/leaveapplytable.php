<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class leaveapplytable extends Component
{
   /**
    * Create a new component instance.
    */
   public $leave_requests;

   public function __construct($leaveRequests = [])
   {
      $this->leave_requests = $leaveRequests;
   }

   /**
    * Get the view / contents that represent the component.
    */
   public function render(): View|Closure|string
   {
      return view('components.leaveapplytable', [
         'leave_requests' => $this->leave_requests,
      ]);
   }
}
