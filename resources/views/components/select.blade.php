{{--/**
 * Blade template for <select>.
 *
 * Filename:        select.blade.php
 * Location:        resources/views/components/
 * Project:         wits-2025-s1
 * Date Created:    24/03/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */--}}

@props([
    // 'options' => [value => displayTxt, BSB10115 => Certificate I in Business,],
    'options' => [],
    'disabled' => false,
    'selected' => null,
    // 'defaultOption' => ['', 'Choose an option'],
    'defaultOption' => ['', ''],
    'old' => '',
    'valuesAsKeys' => false,
])

<select @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
>
    <option value="{{ old($old) ?? $defaultOption[0] }}" selected hidden>{{ old($old) ?? $defaultOption[1] }}</option>

    @if (old($old) || $defaultOption !== ['', ''])
        {{ $selected = null }}
    @endif

    @foreach($options ?? [] as $value => $displayTxt)
        <option value="{{ $valuesAsKeys ? ($value = $displayTxt) : $value }}" {{ $value === $selected ? 'selected' : '' }} >
            {{ $displayTxt }}
        </option>
    @endforeach

    {{ $slot }}
</select>
