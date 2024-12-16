<div>
   <!-- Modal Trigger -->
   <button
      class="flex items-center gap-3 rounded-lg bg-blue-600 py-2 px-4 text-xs font-bold uppercase text-white shadow-md hover:bg-blue-700 hover:shadow-lg focus:ring-2 focus:ring-blue-400 focus:outline-none transition-all"
      type="button"
      wire:click="openModal">
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
      </svg>
      Create
   </button>

   <!-- Modal -->
   @if ($isOpen)
   <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50 transition-opacity">
      <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6 relative transform transition-all scale-95">
         <!-- Modal Header -->
         <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-800">Apply for Leave</h2>
            <button type="button" wire:click="closeModal" class="text-gray-400 hover:text-gray-600">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
               </svg>
            </button>
         </div>

         <!-- Leave Type Dropdown -->
         <div class="mb-4">
            <label for="leaveDetailId" class="block text-sm font-medium text-gray-700">Leave Type</label>
            <select id="leaveDetailId" wire:model="leaveDetailId" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400">
               <option value="">-- Select Leave Type --</option>
               @foreach ($leaveDetails as $leaveDetail)
                  <option value="{{ $leaveDetail->id }}">
                     {{ $leaveDetail->leaveName->name }} - {{ $leaveDetail->details ?? 'No details' }}
                  </option>
               @endforeach
            </select>
            @error('leaveDetailId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
         </div>

         <!-- Start Date -->
         <div class="mb-4">
            <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" id="startDate" wire:model="startDate" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400">
            @error('startDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
         </div>

         <!-- End Date -->
         <div class="mb-4">
            <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" id="endDate" wire:model="endDate" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400">
            @error('endDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
         </div>

         <!-- File Upload -->
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Upload Files (Optional)</label>
            <input type="file" wire:model="files" multiple class="block w-full text-sm text-gray-900 border-gray-300 rounded-lg shadow-sm cursor-pointer focus:ring-blue-400 focus:border-blue-400">
            @foreach ($errors->get('files.*') as $fileError)
               <span class="text-red-500 text-sm">{{ $fileError[0] }}</span>
            @endforeach
         </div>

         <!-- Reason -->
         <div class="mb-4">
            <label for="reason" class="block text-sm font-medium text-gray-700">Reason</label>
            <textarea id="reason" wire:model="reason" rows="3" class="block w-full mt-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-400 focus:border-blue-400"></textarea>
            @error('reason') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
         </div>

         <!-- Form Submission -->
         <form wire:submit="applyLeave">
            <!-- Buttons -->
            <div class="flex justify-end space-x-4">
               <button
                  type="button"
                  wire:click="closeModal"
                  class="inline-flex items-center gap-2 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg shadow-md hover:bg-gray-300 transition-all">
                  Cancel
               </button>
               <button
                  type="submit"
                  class="inline-flex items-center gap-2 bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition-all"
                  wire:loading.attr="disabled"
                  wire:loading.class="bg-green-400"
                  wire:target="applyLeave"> <!-- Scope the loading to applyLeave -->
                  <span wire:loading.remove wire:target="applyLeave">Submit</span>
                  <span wire:loading wire:target="applyLeave">Processing...</span>
               </button>
            </div>
         </form>
      </div>
   </div>
   @endif
</div>
<script>
   window.addEventListener('leaveUpdated', () => {
       setTimeout(() => {
           window.location.reload(); // Reload the page
       }, 2000); // 1.5-second delay
   });
</script>
