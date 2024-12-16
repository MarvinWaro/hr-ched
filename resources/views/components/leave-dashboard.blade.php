<!-- component -->
<div class="">
   <main class="h-full overflow-y-auto max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="container  mx-auto grid">
         <!-- Cards -->
         <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
           <!-- Card -->
           <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
             <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                 <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
               </svg>
             </div>
             <div>
               <p class="mb-2 text-sm font-medium text-gray-600">
                 New Requests
               </p>
               <p class="text-lg font-semibold text-gray-700">
                 10
               </p>
             </div>
           </div>
           <!-- Card -->
           <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
             <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
               <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                 <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
               </svg>
             </div>
             <div>
               <p class="mb-2 text-sm font-medium text-gray-600">
                   Approval Requests
               </p>
               <p class="text-lg font-semibold text-gray-700">
                24
               </p>
             </div>
           </div>
           <!-- Card -->
           <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
               <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full">
                   <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                   </svg>
                 </div>
             <div>
               <p class="mb-2 text-sm font-medium text-gray-600">
                 Rejected Requests
               </p>
               <p class="text-lg font-semibold text-gray-700">
                 376
               </p>
             </div>
           </div>
           <!-- Card -->
           <div class="flex items-center p-4 bg-orange-300 rounded-lg shadow-xs">

             <div class="p-3 mr-4 text-red-200 bg-orange-500 rounded-full">
               {{-- <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                 <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
               </svg> --}}

               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>

             </div>
             <div>
               <p class="mb-2 text-sm font-medium text-gray-600">
                Holiday
               </p>
               <p class="text-lg font-semibold text-gray-700">
                 Dec 25 - Christmas
               </p>
             </div>
           </div>
         </div>

       </div>
   </main>
</div>
