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

                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard w-4 h-4 text-gray-400"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/>
                           </svg>


                           <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Dashboard</span>
                        </div>
                  </li>
               </ol>
            </nav>
      </div>
   </x-slot>
   <div class="pt-4">
      <div class="mx-auto sm:px-5 lg:px-5">
          <x-leave-dashboard/>
      </div>
  </div>

   <div class="py-2">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-6 py-9 grid grid-cols-1 sm:grid-cols-2 gap-6">

               <!-- Pie chart-->
               <x-available-leaves-chart/>

               <!-- Total leave requests -->
               <x-user-total-leave-request/>

            </div>
         </div>
      </div>
   </div>

</x-app-layout>
