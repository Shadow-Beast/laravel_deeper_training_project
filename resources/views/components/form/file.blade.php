<label for="image" class="bg-secondary-light flex rounded-full px-2 py-4 justify-center text-sm hover:bg-secondary-dark cursor-pointer">
    <span class="mr-2">
        Choose an Image
    </span>
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
        </svg>
    </span>
</label>
<input type="file" id="image"
    {{ $attributes->merge([
        'class' => '
                invisible
                w-full
                absolute
                top-0
                left-0
                text-sm
                text-white
                border
                rounded-md
                bg-secondary-light
                focus:border-primary
                focus:outline-none
                focus:ring-1
                focus:ring-primary
                ',
    ]) }} />
