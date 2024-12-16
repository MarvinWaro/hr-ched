@props(['active', 'dropdown' => false])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<div class="relative group flex justify-center items-center">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        @if ($dropdown)
            <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        @endif
    </a>

   @if ($dropdown)
      <!-- Dropdown menu -->
      <div class="absolute left-0 mt-64 hidden group-hover:block bg-white text-gray-700 rounded-lg shadow-lg min-w-max z-10">
         <ul class="py-2 text-sm">
            <x-dropdown-leave-item label="Dashboard" route="leave"></x-dropdown-leave-item>
            <x-dropdown-leave-item label="Apply leave" route="leave.apply"></x-dropdown-leave-item>
            <x-dropdown-leave-item label="My requests leave" route="leave.requests"></x-dropdown-leave-item>
            @if(Auth::user()->usertype == 'admin') <!-- Only show for admin -->
               <x-dropdown-leave-item label="Manage leave" route="leave.manage"></x-dropdown-leave-item>
            @endif
            <x-dropdown-leave-item label="Leave policies" route="leave.policies"></x-dropdown-leave-item>
            <x-dropdown-leave-item label="Leave balances" route="leave.balances"></x-dropdown-leave-item>
         </ul>
      </div>
   @endif
</div>
