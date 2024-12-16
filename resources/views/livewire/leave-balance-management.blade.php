<div>
   <h2 class="text-xl font-bold">Manage Leave Balances</h2>
   <p>Year: {{ $year }}</p>

   <button wire:click="initializeBalances" class="bg-blue-500 text-white px-4 py-2 rounded">
       Initialize Leave Balances
   </button>

   @if (session()->has('message'))
       <p class="text-green-500 mt-2">{{ session('message') }}</p>
   @endif

   <table class="table-auto w-full mt-4">
       <thead>
           <tr>
               <th>User</th>
               <th>Leave Type</th>
               <th>Balance Days</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($balances as $balance)
               <tr>
                   <td>{{ $balance->user->name }}</td>
                   <td>{{ $balance->leaveDetail->name }}</td>
                   <td>{{ $balance->balance_days }}</td>
               </tr>
           @endforeach
       </tbody>
   </table>
</div>
