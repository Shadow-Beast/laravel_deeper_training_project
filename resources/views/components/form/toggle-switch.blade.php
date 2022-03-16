
@props([
    'name',
    'value' => 1
    ])
    
    <style>
        #toggle:checked~.block {
            background-color: #6967ec;
        }
    
        #toggle:checked~.dot {
            transform: translateX(100%);
            background-color: #ffffff;
        }
    </style>
    
    <label for="toggle" {{ $attributes(['class'=> 'flex items-center justify-center cursor-pointer']) }}>
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input id="toggle"
                type="checkbox"
                class="sr-only"
                name="{{ $name }}"
                value="{{$value}}"
                {{ $value ? 'checked' : '' }}>
            <!-- line -->
            <div class="block bg-gray-400 w-14 h-8 rounded-full"></div>
            <!-- dot -->
            <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
        </div>
    </label>