@props(['active' => false, 'type'=>'a'])

@if ($type === 'a')
    <a class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}           rounded-md  px-3 py-2 text-sm font-medium"
        {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button class="text-white hover:bg-blue/900 hover:text-gray rounded-md px-3 py-2 text-sm font-medium" {{ $attributes }}>
    {{ $slot }} </button>
@endif
