@props([
    'name',
    'id' => null,
    'options' => [],
])

<div class="mt-2">
    <x-input-label for="{{ $id ?? $name }}" :value="ucwords(str_replace('_', ' ', $name))" />

    <select name="{{ $name }}" id="{{ $id ?? $name }}" {{ $attributes->merge(['class' => 'w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
