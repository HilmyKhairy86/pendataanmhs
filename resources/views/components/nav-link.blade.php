@props(['active' => false])
<a {{ $attributes }}class="flex items-center {{ $active ? 'active-nav-link text-white opacity-100' : 'text-white opacity-75' }}  py-4 pl-6 nav-item">{{ $slot }}</a>

{{-- class="flex items-center active-nav-link text-white py-4 pl-6 nav-item" --}}