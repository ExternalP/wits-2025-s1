{{--/**
 * Blade button that opens a modal form for confirming deletion.
 * Can set form action.
 * Example implementation provide below.
 *
 * Filename:        confirm-deletion-modal.blade.php
 * Location:        resources/views/components/
 * Project:         wits-2025-s1
 * Date Created:    18/03/2025
 *
 * Author:          Corin Little <20135656@tafe.wa.edu.au>
 *
 */--}}

{{-- EXAMPLE Setup for user deletion

<x-confirm-deletion-modal action="{{ route('users.destroy', $user) }}"
                          itemId="{{ $user->id }}"
                          itemName="{{ $user->name }}"
                          topic="user"
                          class="!text-gray-700 bg-zinc-200 pr-2 pl-2 hover:bg-red-700 hover:!text-white">
    {{ __('Delete') }}
    <i class="fa-solid fa-times pr-2 order-first"></i>
</x-confirm-deletion-modal>

--}}

@props([
    'action',
    'itemId' => '00',
    'itemName' => null,
    'message' => 'Are you sure you want to delete this ',
    'topic' => 'item',
    'maxWidth' => '2xl',
    'width' => '!w-fit',
    'modalClass' => '',
])

<x-danger-button x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $itemId }}')"
                 x-data="" {{-- x-data="" is REQUIRED --}}
                {{-- class="!text-gray-700 bg-zinc-200 pr-2 pl-2 hover:bg-red-700 hover:!text-white" --}}
                {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
{{--    {{ __('Delete') }}--}}
{{--    <i class="fa-solid fa-trash pr-2 order-first"></i>--}}
</x-danger-button>

<form method="POST" action="{{ $action }}">
    @csrf
    @method('DELETE')

    <x-modal name="confirm-deletion-{{ $itemId }}" maxWidth="{{ $maxWidth }}" width="{{ $width }}"
             modalClass="{{ $modalClass }}">
        <div class="p-6 text-lg font-medium text-gray-900 text-center">
            <h2> {!! $message . $topic !!}? </h2>

            @if (!empty($itemName))
                {{--<h2> "{{ Str::of($itemName)->toHtmlString() }}" </h2>--}}
                <h2> "{!! $itemName !!}" </h2>
            @endif

            <div class="mt-6 flex justify-center">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="ms-3">
                    {!! __('Delete ') . $topic !!}
                </x-danger-button>
            </div>
        </div>
    </x-modal>
</form>
