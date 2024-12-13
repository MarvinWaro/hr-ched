<div>
   <!-- Button to Open Modal -->
   <button
      class="flex rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
      type="button"
      onclick="openModal()"
   >
      <svg
         class="w-4 h-4 text-white"
         aria-hidden="true"
         xmlns="http://www.w3.org/2000/svg"
         width="24"
         height="24"
         fill="none"
         viewBox="0 0 24 24"
      >
         <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 12h14m-7 7V5"
         />
      </svg>
      Create
   </button>

   <!-- Modal -->
   <div
      id="modal"
      class="fixed inset-0 z-50 hidden items-center justify-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 ease-in-out"
   >
      <!-- Modal Content -->
      <div
         id="modalContent"
         class="relative m-4 p-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white shadow-lg transform transition-all duration-300 translate-y-10 opacity-0"
      >
         <div class="flex items-center justify-between pb-4 text-xl font-medium text-slate-800">
            <span>Apply for Leave</span>
            <button
               onclick="closeModal()"
               class="text-gray-400 hover:text-gray-600"
            >
               ×
            </button>
         </div>
         <form class="space-y-4">
            <div>
               <label for="leaveTypeId" class="block text-sm font-medium">Leave Type</label>
               {{-- <select id="leaveTypeId" class="block w-full mt-1 border-gray-300 rounded-md">
                  <option value="">Select</option>
                  <!-- Populate dynamically -->
               </select> --}}
               <!-- Select leave type-->
               <select
                  id="leaveTypeId"
                  data-hs-select='{
                  "hasSearch": true,
                  "searchPlaceholder": "Search...",
                  "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                  "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                  "placeholder": "Select country...",
                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                  "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                  "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                  "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"}' class="hidden">
                  <option value="">Choose</option>
                  <option value="AF" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/af.png\" alt=\"Afghanistan\" />"}'>
                  Afghanistan
                  </option>
                  <option value="AX" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ax.png\" alt=\"Aland Islands\" />"}'>
                  Aland Islands
                  </option>
                  <option value="AL" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/al.png\" alt=\"Albania\" />"}'>
                  Albania
                  </option>
                  <option value="DZ" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dz.png\" alt=\"Algeria\" />"}'>
                  Algeria
                  </option>
                  <option value="AS" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/as.png\" alt=\"American Samoa\" />"}'>
                  American Samoa
                  </option>
                  <option value="AD" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ad.png\" alt=\"Andorra\" />"}'>
                  Andorra
                  </option>
                  <option value="AO" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ao.png\" alt=\"Angola\" />"}'>
                  Angola
                  </option>
                  <option value="AI" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ai.png\" alt=\"Anguilla\" />"}'>
                  Anguilla
                  </option>
                  <option value="AG" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ag.png\" alt=\"Antigua and Barbuda\" />"}'>
                  Antigua and Barbuda
                  </option>
                  <option value="AR" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ar.png\" alt=\"Argentina\" />"}'>
                  Argentina
                  </option>
                  <option value="BF" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bf.png\" alt=\"Burkina Faso\" />"}'>
                  Burkina Faso
                  </option>
                  <option value="JO" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/jo.png\" alt=\"Jordan\" />"}'>
                  Jordan
                  </option>
                  <option value="KZ" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kz.png\" alt=\"Kazakhstan\" />"}'>
                  Kazakhstan
                  </option>
                  <option value="KE" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ke.png\" alt=\"Kenya\" />"}'>
                  Kenya
                  </option>
                  <option value="KI" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ki.png\" alt=\"Kiribati\" />"}'>
                  Kiribati
                  </option>
                  <option value="KW" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kw.png\" alt=\"Kuwait\" />"}'>
                  Kuwait
                  </option>
                  <option value="KG" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kg.png\" alt=\"Kyrgyzstan\" />"}'>
                  Kyrgyzstan
                  </option>

                  <option value="ZW" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/zw.png\" alt=\"Zimbabwe\" />"}'>
                  Zimbabwe
                  </option>
               </select>
               <!-- End Select -->
            </div>
            <div>
               <label for="reason" class="block text-sm font-medium">Reason for leave</label>
               <!-- Select leave reason-->
               <select
                  id="reason"
                  data-hs-select='{
                  "hasSearch": true,
                  "searchPlaceholder": "Search...",
                  "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                  "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                  "placeholder": "Select country...",
                  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                  "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                  "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                  "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
                  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"}' class="hidden">
                  <option value="">Choose</option>
                  <option value="AF" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/af.png\" alt=\"Afghanistan\" />"}'>
                  Afghanistan
                  </option>
                  <option value="AX" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ax.png\" alt=\"Aland Islands\" />"}'>
                  Aland Islands
                  </option>
                  <option value="AL" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/al.png\" alt=\"Albania\" />"}'>
                  Albania
                  </option>
                  <option value="DZ" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/dz.png\" alt=\"Algeria\" />"}'>
                  Algeria
                  </option>
                  <option value="AS" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/as.png\" alt=\"American Samoa\" />"}'>
                  American Samoa
                  </option>
                  <option value="AD" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ad.png\" alt=\"Andorra\" />"}'>
                  Andorra
                  </option>
                  <option value="AO" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ao.png\" alt=\"Angola\" />"}'>
                  Angola
                  </option>
                  <option value="AI" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ai.png\" alt=\"Anguilla\" />"}'>
                  Anguilla
                  </option>
                  <option value="AG" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ag.png\" alt=\"Antigua and Barbuda\" />"}'>
                  Antigua and Barbuda
                  </option>
                  <option value="AR" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ar.png\" alt=\"Argentina\" />"}'>
                  Argentina
                  </option>
                  <option value="BF" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/bf.png\" alt=\"Burkina Faso\" />"}'>
                  Burkina Faso
                  </option>
                  <option value="JO" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/jo.png\" alt=\"Jordan\" />"}'>
                  Jordan
                  </option>
                  <option value="KZ" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kz.png\" alt=\"Kazakhstan\" />"}'>
                  Kazakhstan
                  </option>
                  <option value="KE" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ke.png\" alt=\"Kenya\" />"}'>
                  Kenya
                  </option>
                  <option value="KI" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/ki.png\" alt=\"Kiribati\" />"}'>
                  Kiribati
                  </option>
                  <option value="KW" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kw.png\" alt=\"Kuwait\" />"}'>
                  Kuwait
                  </option>
                  <option value="KG" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/kg.png\" alt=\"Kyrgyzstan\" />"}'>
                  Kyrgyzstan
                  </option>

                  <option value="ZW" data-hs-select-option='{
                  "icon": "<img class=\"inline-block size-4 rounded-full\" src=\"../assets/vendor/svg-country-flags/png100px/zw.png\" alt=\"Zimbabwe\" />"}'>
                  Zimbabwe
                  </option>
               </select>
               <!-- End Select -->
               <div class="max-w-full space-y-3 my-3">
                  <input type="text" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Enter your reason here..">
               </div>
            <div>
               <label for="endDate" class="block text-sm font-medium">Number of working days applied for</label>

               <div id="date-range-picker" date-rangepicker class="flex justify-items-center content-center justify-center place-content-center">
                  <div class="relative">
                     <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                           </svg>
                     </div>
                     <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                     </div>
                     <span class="mx-4 text-gray-500">to</span>
                     <div class="relative">
                     <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                           </svg>
                     </div>
                     <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                  </div>
               </div>

               <input type="text" id="disabled-input-2" aria-label="disabled input 2" class="my-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Disabled readonly input" disabled readonly>
            </div>
            <div>
               <label for="startDate" class="block text-sm font-medium">Attachments (Optional)</label>
               <div data-hs-file-upload='{
                  "url": "/upload",
                  "maxFiles": 1,
                  "singleton": true}'>
                  <template data-hs-file-upload-preview="">
                    <div class="flex items-center w-full">
                      <span class="grow-0 overflow-hidden truncate" data-hs-file-upload-file-name=""></span>
                      <span class="grow-0">.</span>
                      <span class="grow-0" data-hs-file-upload-file-ext=""></span>
                    </div>
                  </template>

                  <button type="button" class="relative flex w-full border overflow-hidden border-gray-200 shadow-sm rounded-lg text-sm focus:outline-none focus:z-10 focus:border-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:border-neutral-600">
                    <span class="h-full py-3 px-4 bg-gray-100 text-nowrap dark:bg-neutral-800">Choose File</span>
                    <span class="group grow flex overflow-hidden h-full py-3 px-4" data-hs-file-upload-previews="">
                      <span class="group-has-[div]:hidden">No Chosen File</span>
                    </span>
                    <span class="absolute top-0 left-0 w-full h-full" data-hs-file-upload-trigger=""></span>
                  </button>
               </div>
            </div>

            <div class="flex justify-end space-x-2 my-4">
               <button type="button" onclick="closeModal()" class="rounded-md border border-transparent py-2 px-4 text-center text-sm transition-all text-slate-600 hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
                  Cancel
               </button>
               <button type="submit" class="rounded-md bg-green-600 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-green-700 focus:shadow-none active:bg-green-700 hover:bg-green-700">
                  Submit
               </button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function openModal() {
      const modal = document.getElementById('modal');
      const modalContent = document.getElementById('modalContent');

      // Make modal visible
      modal.classList.remove('hidden');

      // Trigger animation
      setTimeout(() => {
         modal.classList.add('opacity-100');
         modalContent.classList.remove('translate-y-10', 'opacity-0');
         modalContent.classList.add('translate-y-0', 'opacity-100');
      }, 10);
   }

   function closeModal() {
      const modal = document.getElementById('modal');
      const modalContent = document.getElementById('modalContent');

      // Reverse animation
      modalContent.classList.remove('translate-y-0', 'opacity-100');
      modalContent.classList.add('translate-y-10', 'opacity-0');

      setTimeout(() => {
         modal.classList.remove('opacity-100');
         setTimeout(() => modal.classList.add('hidden'), 300); // Delay to match animation
      }, 300);
   }
</script>
