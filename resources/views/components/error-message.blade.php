@error($name)
<div {{ $attributes(['class' => '
    text-red-500
    text-sm
    mt-2
'])}}>
{{ $message }}
</div>
@enderror