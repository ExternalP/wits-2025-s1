<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Cluster') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
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


                        <!-- Course Selection -->
                        <div class="flex flex-col my-2 pt-2">
                            <x-input-label for="cluster_id" class="!text-lg">
                                {{ __('Course') }}
                            </x-input-label>
                            <div class="max-h-64 overflow-y-auto border">
                                <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                    <thead class="sticky top-0 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                    <tr>
                                        <th scope="col" class="pl-2 text-center">#</th>
                                        <th scope="col" class="pl-3 pr-1">Code</th>
                                        <th scope="col" class="px-5">Title</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($courses as $course)
                                        <tr class="border-b border-zinc-300 dark:border-white/10">
                                            <td class="pl-2 py-1">
                                                <input name="course_id[]" type="checkbox"
                                                       {{ in_array($course->id, old('course_id', [])) ? 'checked' : '' }}
                                                       value="{{ $course->id }}"/>
                                            </td>
                                            <td class="whitespace-nowrap pl-3 pr-1 py-1">{{ $course->national_code }}</td>
                                            <td class="px-5 py-1 w-full">{{ $course->aqf_level .' '. $course->title }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                        </div>
                        {{--                        <div>--}}
                        {{--                            <x-input-label for="course_id" :value="__('Course')" />--}}
                        {{--                            <select--}}
                        {{--                                id="course_id"--}}
                        {{--                                name="course_id"--}}
                        {{--                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"--}}
                        {{--                                required--}}
                        {{--                            >--}}
                        {{--                                <option value="">Select a Course</option>--}}
                        {{--                                @foreach($courses as $id => $nationalCode)--}}
                        {{--                                    <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>--}}
                        {{--                                        {{ $nationalCode }}--}}
                        {{--                                    </option>--}}
                        {{--                                @endforeach--}}
                        {{--                            </select>--}}
                        {{--                            <x-input-error class="mt-2" :messages="$errors->get('course_id')" />--}}
                        {{--                        </div>--}}


                        <!-- Units Selection -->
                        <div class="flex flex-col my-2">
                            <x-input-label for="unit_id" class="!text-lg">
                                {{ __('Units') }}
                            </x-input-label>
                            <div class="max-h-64 overflow-y-auto border">
                                <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                    <thead class="sticky top-0 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                    <tr>
                                        <th scope="col" class="pl-2 text-center">#</th>
                                        <th scope="col" class="pl-3 pr-1">National Code</th>
                                        <th scope="col" class="px-5">Title</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($units as $unit)
                                        <tr class="border-b border-zinc-300 dark:border-white/10">
                                            <td class="pl-2 py-1">
                                                <input name="unit_id[]" type="checkbox"
                                                       {{ in_array($unit->id, old('unit_id', [])) ? 'checked' : '' }}
                                                       value="{{ $unit->id }}"/>
                                            </td>
                                            <td class="whitespace-nowrap pl-3 pr-1 py-1">{{ $unit->national_code }}</td>
                                            <td class="px-5 py-1 w-full">{{ $unit->title }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <x-input-error :messages="$errors->get('unit_id')" class="mt-2"/>
                        </div>
{{--                        <div>--}}
{{--                            <x-input-label for="unit_id" :value="__('Units')" />--}}
{{--                            <div class="mt-2 grid grid-cols-2 gap-2">--}}
{{--                                @foreach($units as $unit)--}}
{{--                                    <label class="inline-flex items-center">--}}
{{--                                        <input type="checkbox"--}}
{{--                                               name="unit_id[]"--}}
{{--                                               value="{{ $unit->id }}"--}}
{{--                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"--}}
{{--                                            {{ in_array($unit->id, old('units', [])) ? 'checked' : '' }}>--}}
{{--                                        <span class="ml-2">{{ $unit->national_code }}</span>--}}
{{--                                    </label>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('unit_id')" />--}}
{{--                        </div>--}}

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
