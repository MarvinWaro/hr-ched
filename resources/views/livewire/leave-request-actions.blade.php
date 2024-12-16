<td class="p-4 border-b border-blue-gray-50">
   <!-- Edit Button -->
   <button wire:click="editLeaveRequest({{ $leaveRequest->id }})"
       class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-green-600 transition-all hover:bg-green-600/10 active:bg-green-600/20">
       <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4">
               <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
           </svg>
       </span>
   </button>

   <!-- Edit Modal -->
   @if($showEditModal)
      <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50 transition-opacity">
         <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-lg font-semibold text-gray-700">Edit Leave Request</h3>

            <!-- Edit Form -->
            <form wire:submit.prevent="updateLeaveRequest">
                  <div class="mt-4">
                     <label for="leave_start_date" class="block text-sm text-gray-600">Start Date</label>
                     <input type="date" id="leave_start_date" wire:model="leave_start_date"
                        class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                     @error('leave_start_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                  </div>
                  <div class="mt-4">
                     <label for="leave_end_date" class="block text-sm text-gray-600">End Date</label>
                     <input type="date" id="leave_end_date" wire:model="leave_end_date"
                        class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                     @error('leave_end_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                  </div>
                  <div class="mt-4">
                     <label for="reason" class="block text-sm text-gray-600">Reason</label>
                     <textarea id="reason" wire:model="reason" rows="3"
                        class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                     @error('reason') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                  </div>
                  <div class="mt-4">
                     <label for="status" class="block text-sm text-gray-600">Status</label>
                     <select id="status" wire:model="status"
                        class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="Pending">Pending</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                     </select>
                     @error('status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                  </div>

                  <div class="mt-6 flex justify-end space-x-2">
                     <button type="button" wire:click="cancelEdit"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</button>
                     <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
                  </div>
            </form>
         </div>
      </div>
   @endif

   <!-- Delete Button -->
   <button wire:click="confirmDelete"
   class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-red-600 transition-all hover:bg-red-600/10 active:bg-red-600/20">
      <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 lucide lucide-trash-2">
            <path d="M3 6h18"/>
            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
            <line x1="10" x2="10" y1="11" y2="17"/>
            <line x1="14" x2="14" y1="11" y2="17"/>
         </svg>
      </span>
   </button>

   <!-- Delete Confirmation Modal -->
   @if($showDeleteModal)
      <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50 transition-opacity">
         <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-lg font-semibold text-gray-700">Confirm Delete</h3>
            <p class="text-gray-600 mt-2">Are you sure you want to delete this item? This action cannot be undone.</p>

            <div class="mt-4 flex justify-end space-x-2">
                  <button wire:click="cancelDelete"
                     class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                     Cancel
                  </button>
                  <button wire:click="deleteLeaveRequest"
                     class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
                     wire:loading.attr="disabled"
                     wire:loading.class="bg-red-300"
                     wire:target="deleteLeaveRequest">
                     <span wire:loading.remove wire:target="deleteLeaveRequest">Delete</span>
                     <span wire:loading wire:target="deleteLeaveRequest">Processing...</span>
                  </button>
            </div>
         </div>
      </div>
   @endif
</td>
<script>
   window.addEventListener('refreshLeaveRequests', () => {
       setTimeout(() => {
           window.location.reload(); // Reload the page
       }, 2000); // 1.5-second delay
   });
</script>
