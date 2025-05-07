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
    'selected' => 'propsNull', // Can’t use null or '' due to comparison to $value.
    // 'defaultOption' => ['', 'Choose an option'],
    'defaultOption' => ['', ''],
    // if true: <option value="KEY">ARRAY_VALUE</option>
    // if false: <option value="ARRAY_VALUE">ARRAY_VALUE</option>
    'useArrayKeys' => true,
])

<select @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
>
    @if ($selected == 'propsNull')
        <option value="{{ $defaultOption[0] }}" selected hidden>{{ $defaultOption[1] }}</option>
    @endif

    @foreach($options ?? [] as $value => $displayTxt)
        <option value="{{ $useArrayKeys ? $value : ($value = $displayTxt) }}" {{ $value == $selected ? 'selected' : '' }} >
            {{ $displayTxt }}
        </option>
    @endforeach

    {{ $slot }}
</select>
