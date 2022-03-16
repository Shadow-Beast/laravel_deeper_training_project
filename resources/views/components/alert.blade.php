@php
$colors = [
    'success' => 'bg-green-400',
    'fail' => 'bg-red-400',
];
$types = array_keys($colors);
@endphp
<div class="container" x-data="{ show: true }">
    @foreach ($types as $type)
        @if (session($type))
            <div x-show="show" class="{{ $colors[$type] }} text-white flex justify-between items-center py-2 px-4 rounded-full w-full my-6 font-semibold">
                <span>
                    {{ session($type) }}
                </span>
                <button class="text-white hover:text-white/[0.8] bg-transparent" @click="show = !show">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
    @endforeach
</div>
