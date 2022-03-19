<textarea {{ $attributes->merge(['class' => '
    w-full
    px-4
    py-2
    text-sm
    text-white
    border
    rounded-md
    bg-secondary-light
    focus:border-primary
    focus:outline-none
    focus:ring-1
    focus:ring-primary
    h-[8.25rem]
    ']) }}>{{ $slot }}</textarea>