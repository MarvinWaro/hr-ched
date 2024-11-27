@include('partials._header')

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts

@include('partials._footer')
