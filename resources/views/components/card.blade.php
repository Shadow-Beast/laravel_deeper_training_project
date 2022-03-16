@props(['meeting', 'edit_url' => null])

<div class="lg:w-1/4 w-1/2 lg:p-4 p-2">
    <div @click="openDetailModal({{ $meeting->id }})"
        class="shadow-lg rounded-lg bg-white text-secondary-dark transition delay-150 ease-in-out shadow-secondary-dark hover:shadow-primary hover:scale-105 cursor-pointer">
        {{-- Card Header --}}
        <div class="h-44 relative" x-data="{ optionMenuOpen: false }">
            <!-- Meeting Image -->
            <img src="{{ $meeting->image_url }}" alt="Meeting Image"
                class="h-full w-full object-cover object-center rounded-t-lg pointer-events-none">

            <!-- Option Menu -->
            @auth
                @if ($meeting->isOwnMeeting())
                    <div @mouseleave="optionMenuOpen = false">
                        <button class="absolute right-2 top-2" @mouseover="optionMenuOpen = true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-white" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="optionMenuOpen" class="absolute right-2 top-8 rounded-md shadow-lg bg-white text-right">
                            <button class="block px-4 py-2 text-sm w-full text-primary rounded-t-md hover:bg-gray-100"
                                @click="openSaveModal({{ $meeting->id }})">Edit</button>
                            <button class="block px-4 py-2 text-sm w-full text-red-500 rounded-b-md hover:bg-gray-100"
                                @click="openDeleteConfirmModal({{ $meeting->id }})">Delete</button>
                        </div>
                    </div>
                @endif
            @endauth

            <!-- Profile Image -->
            <div class="absolute h-11 w-11 right-5 bg-white p-[0.187rem] rounded-full -bottom-5">
                <img src="{{ optional($meeting->user->image)->url ?? asset('images/avator.png') }}" alt="Profile Imge"
                    class="rounded-full">
            </div>
            <!-- Category -->
            {{-- <span
                class="absolute px-2 py-1 rounded-full left-2 bottom-2 bg-primary-light text-primary-dark text-center text-xs font-semibold">
                {{ $meeting->category->name }}
            </span> --}}
            <x-badge class="absolute left-2 bottom-2">
                {{ $meeting->category->name }}
            </x-badge>
        </div>

        {{-- Card Body --}}
        <div class="p-4">
            <div class="py-4">
                <div class="text-sm text-center font-semibold text-primary">
                    {{ $meeting->created_at->diffForHumans() }}
                </div>
                <h3 class="text-xl text-center font-bold line-clamp-2 h-14">{{ $meeting->title }}</h3>
            </div>
            <p class="text-justify text-base line-clamp-4 h-24">
                {!! $meeting->description !!}
            </p>
        </div>

        {{-- Card Footer --}}
        <div class="bg-primary rounded-b-lg flex py-1">
            <div class="w-1/3 flex flex-wrap justify-center text-white py-2">
                <p class="mb-2 text-center text-xs font-semibold w-full">
                    {{ $meeting->start_at->toFormattedDateString() }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="w-1/3 flex flex-wrap justify-center text-white p-2 border-x">
                <p class="mb-2 text-center text-xs font-semibold w-full">{{ $meeting->start_at->format('h:i A') }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="w-1/3 flex flex-wrap justify-center text-white p-2">
                <p class="mb-2 text-center text-xs font-semibold w-full">
                    {{ $meeting->duration->hour . 'h ' . $meeting->duration->minute . 'm' }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                    class="h-4 w-4" viewBox="0 0 256 256" xml:space="preserve">
                    <desc>Created with Fabric.js 1.7.22</desc>
                    <defs>
                    </defs>
                    <g transform="translate(128 128) scale(0.72 0.72)" style="">
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                            transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
                            <path
                                d="M 52.976 38.792 c 7.213 -6.25 15.987 -12.648 15.987 -32.09 h 3.974 V 0.086 H 17.063 v 6.616 h 3.974 c 0 19.441 8.774 25.839 15.987 32.09 c 3.986 3.454 3.986 9.133 0 12.588 c -7.213 6.25 -15.987 12.648 -15.987 32.09 h -3.974 v 6.616 h 55.875 V 83.47 h -3.974 c 0 -19.441 -8.774 -25.839 -15.987 -32.09 C 48.99 47.926 48.99 42.247 52.976 38.792 z M 49.676 30.926 c -1.559 1.46 -4.033 4.679 -4.676 8.19 c -0.529 -3.51 -3.117 -6.73 -4.676 -8.19 c -4.228 -3.664 -9.371 -7.414 -9.371 -18.81 h 28.094 C 59.047 23.511 53.904 27.262 49.676 30.926 z"
                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;"
                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</div>
