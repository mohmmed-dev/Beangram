@props(['value'])

<label {{ $attributes->merge(['class' => 'focus:ring-lime-600 focus:border-lime-600 block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
