@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 pt-1']) }}>
    {{ $value ?? $slot }}
</label>
