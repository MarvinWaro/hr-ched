<div>
   <h2 class="text-xl font-bold">Manage Leave Approvals</h2>

   @if (session()->has('message'))
       <p class="text-green-500 mt-2">{{ session('message') }}</p>
   @endif

   @if (session()->has('error'))
       <p class="text-red-500 mt-2">{{ session('error') }}</p>
   @endif

   <table class="table-auto w-full mt-4">
       <thead>
           <tr>
               <th>User</th>
               <th>Leave Type</th>
               <th>Start Date</th>
               <th>End Date</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($leaveRequests as $request)
               <tr>
                   <td>{{ $request->user->name }}</td>
                   <td>{{ $request->leaveDetail->name }}</td>
                   <td>{{ $request->leave_start_date }}</td>
                   <td>{{ $request->leave_end_date }}</td>
                   <td>
                       @if (Auth::user()->isAdmin())
                           <button wire:click="approveLeave({{ $request->id }}, {{ $request->days }})"
                                   class="bg-green-500 text-white px-4 py-2 rounded">
                               Approve
                           </button>
                           <button wire:click="rejectLeave({{ $request->id }}, 'Insufficient documentation')"
                                   class="bg-red-500 text-white px-4 py-2 rounded">
                               Reject
                           </button>
                       @else
                           <p class="text-gray-500">No Actions Available</p>
                       @endif
                   </td>
               </tr>
           @endforeach
       </tbody>
   </table>
</div>
