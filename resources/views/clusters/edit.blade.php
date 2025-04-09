<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Cluster') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('clusters.index') }}" class="text-blue-600 hover:underline">&larr; Back to Clusters</a>
                    </div>

                    <form method="POST" action="{{ route('clusters.update', $cluster) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <!-- Code -->
                        <div>
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full"
                                          :value="old('code', $cluster->code)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('code')" />
                        </div>

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                          :value="old('title', $cluster->title)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- State Code -->
                        <div>
                            <x-input-label for="state_code" :value="__('State Code')" />
                            <x-text-input id="state_code" name="state_code" type="text" class="mt-1 block w-full"
                                          :value="old('state_code', $cluster->state_code)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('state_code')" />
                        </div>


                        <!-- Course Selection -->
                        <div class="flex flex-col my-2 pt-2">
                            <x-input-label for="course_id" class="!text-lg">
                                {{ __('Courses') }}
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
                                    @foreach($cluster->courses as $course)
                                        <tr class="border-b border-zinc-300 dark:border-white/10">
                                            <td class="pl-2 py-1">
                                                <input name="course_id[]" id="course_cb{{ $course->id }}" type="checkbox"
                                                       class="rounded"
                                                       {{ in_array($course->id, old('course_id',
                                                            $cluster->courses->pluck('id')->toArray() ?? [])
                                                          ) ? 'checked' : '' }}
                                                       value="{{ $course->id }}"/>
                                            </td>
                                            <td class="whitespace-nowrap pl-3 pr-1 py-1">
                                                <label for="course_cb{{ $course->id }}">{{ $course->national_code }}</label>
                                            </td>
                                            <td class="px-5 py-1 w-full">{{ $course->aqf_level .' '. $course->title }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach($otherCourses as $course)
                                        <tr class="border-b border-zinc-300 dark:border-white/10">
                                            <td class="pl-2 py-1">
                                                <input name="course_id[]" id="course_cb{{ $course->id }}" type="checkbox"
                                                       class="rounded"
                                                       {{ in_array($course->id, old('course_id', [])) ? 'checked' : '' }}
                                                       value="{{ $course->id }}"/>
                                            </td>
                                            <td class="whitespace-nowrap pl-3 pr-1 py-1">
                                                <label for="course_cb{{ $course->id }}">{{ $course->national_code }}</label>
                                            </td>
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
{{--                            <select id="course_id" name="course_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">--}}
{{--                                @foreach($courses as $id => $nationalCode)--}}
{{--                                    <option value="{{ $id }}" {{ $id == old('course_id', $cluster->course_id) ? 'selected' : '' }}>--}}
{{--                                        {{ $nationalCode }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('course_id')" />--}}
{{--                        </div>--}}


                        <!-- Units Selection -->
                        <div>
                            <x-input-label :value="__('Units')" />
                            <div class="mt-2 space-y-2">
                                @foreach($units as $unit)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="unit_id[]" value="{{ $unit->id }}"
                                               {{ in_array($unit->id, old('units', $selectedUnits)) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2">{{ $unit->national_code }}</span>
                                    </label><br>
                                @endforeach
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('unit_id')" />
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
                            <a href="{{ route('clusters.show', $cluster) }}"
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
