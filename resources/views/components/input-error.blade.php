@props(['field'])

@error($field)
    <p class="text-red-600">{{ $message }}</p>
@enderror