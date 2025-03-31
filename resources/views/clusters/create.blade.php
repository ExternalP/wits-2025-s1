<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Cluster') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('clusters.index') }}"
                           class="text-blue-600 hover:underline">&larr; Back to Clusters</a>
                    </div>

                    <form method="POST" action="{{ route('clusters.store') }}" class="space-y-6">
                        @csrf

                        <!-- Code -->
                        <div>
                            <x-input-label for="code" :value="__('Cluster Code')" />
                            <x-text-input
                                id="code"
                                name="code"
                                type="text"
                                class="mt-1 block w-full"
                                :value="old('code')"
                                required
                                autofocus
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('code')" />
                        </div>

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Cluster Title')" />
                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                class="mt-1 block w-full"
                                :value="old('title')"
                                required
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- Course Selection -->
                        <div>
                            <x-input-label for="course_id" :value="__('Course')" />
                            <select
                                id="course_id"
                                name="course_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                required
                            >
                                <option value="">Select a Course</option>
                                @foreach($courses as $id => $nationalCode)
                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>
                                        {{ $nationalCode }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('course_id')" />
                        </div>

                        <!-- State Code -->
                        <div>
                            <x-input-label for="state_code" :value="__('State Code')" />
                            <x-text-input
                                id="state_code"
                                name="state_code"
                                type="text"
                                class="mt-1 block w-full"
                                :value="old('state_code')"
                                required
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('state_code')" />
                        </div>

                        <!-- Units Selection -->
                        <div>
                            <x-input-label :value="__('Units')" />
                            <div class="mt-2 grid grid-cols-2 gap-2">
                                @foreach($units as $unit)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox"
                                               name="units[]"
                                               value="{{ $unit->id }}"
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            {{ in_array($unit->id, old('units', [])) ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $unit->national_code }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('units')" />
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create Cluster') }}</x-primary-button>
                            <a href="{{ route('clusters.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
