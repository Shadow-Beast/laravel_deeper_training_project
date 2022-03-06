<button {{ $attributes(['class' => '
    flex
    items-center
    justify-center
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
    bg-transparent
    border
    border-white
    rounded-full
    active:bg-transparent
    hover:border-primary
    hover:text-primary
    focus:outline-none
    focus:shadow-outline-primary
    '])}}>
    {{ $slot }}
</button>
