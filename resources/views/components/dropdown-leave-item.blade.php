@props(['label', 'route'])

<li>
    <a href="{{ route($route) }}"
       class="block px-4 py-2 hover:bg-gray-100">
        {{ $label }}
    </a>
</li>
