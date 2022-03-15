<button {{ $attributes(['class' => '
    block
    w-full
    px-4
    py-2
    text-sm
    font-medium
    leading-5
    text-center
    text-white
    transition-colors
    duration-150
    bg-red-600
    border
    border-transparent
    rounded-full
    active:bg-primary
    hover:bg-red-800
    focus:outline-none
    focus:shadow-outline-primary
    '])}}>
    {{ $slot }}
</button>
