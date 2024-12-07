@include('partials._header')

   <div class="font-sans antialiased min-h-screen">
      {{ $slot }}
   </div>

        @livewireScripts

@include('partials._footer')
