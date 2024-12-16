<x-app-layout>
   <x-slot name="header">
      <div class="flex items-center justify-between">
         <nav class="flex" aria-label="Breadcrumb">
               <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                  <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                           <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                           </svg>
                           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                              {{ __('Leave') }}
                           </h2>
                        </a>
                  </li>
                  <li aria-current="page">
                        <div class="flex items-center">
                           <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                           </svg>

                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-plus-2 w-4 h-4 text-gray-400"><path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M3 15h6"/><path d="M6 12v6"/></svg>


                           <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{__('Apply')}}</span>
                        </div>
                  </li>
               </ol>
            </nav>
      </div>
   </x-slot>
   <div class="">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <x-leave-types-card/>
      </div>
   </div>

   <div class="py-2">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="">
               <div class="px-5 py-5 justify-end flex">

                   <x-leaveapplytable :leave-requests="$leave_requests"/>

                   <!-- Add Livewire Component for Edit and Delete -->
                   {{-- @foreach ($leave_requests as $leave_request)
                     @livewire('leave-request-actions', ['leaveRequestId' => $leave_request->id])
                   @endforeach --}}
               </div>
           </div>
       </div>
   </div>
</x-app-layout>
