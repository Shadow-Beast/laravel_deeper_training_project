@error($name)
<div {{ $attributes(['class' => '
    error
    text-red-500
    text-sm
    mt-2
    absolute
'])}}>
{{ $message }}
</div>
@enderror