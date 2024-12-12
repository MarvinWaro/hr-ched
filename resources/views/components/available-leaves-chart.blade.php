<div class="p-4">
   <div class="h-[300px] flex flex-col justify-center items-center content-center">
      <div class="py-4">
         <h3>Available Leaves</h3>
      </div>
      <div id="pie"></div>

      <!-- Legend Indicator -->
      <div class="flex flex-wrap justify-center gap-x-4 gap-y-2 mt-3 sm:mt-2">
         <div class="inline-flex items-center">
            <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>
            <span class="text-[13px] text-gray-600">
               Income
            </span>
         </div>
         <div class="inline-flex items-center">
            <span class="size-2.5 inline-block bg-cyan-500 rounded-sm me-2"></span>
            <span class="text-[13px] text-gray-600">
               Outcome
            </span>
         </div>
         <div class="inline-flex items-center">
            <span class="size-2.5 inline-block bg-gray-300 rounded-sm me-2"></span>
            <span class="text-[13px] text-gray-600">
               Others
            </span>
         </div>
      </div>
      <!-- End Legend Indicator -->
   </div>
</div>
@vite('resources/js/available-leaves-chart.js')
