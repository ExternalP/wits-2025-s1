<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create New Timetable') }}
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <h2 class="grow">
                {{ __('Timetable (Add)') }}
            </h2>
            <div class="order-first">
                <i class="fa-solid fa-plus min-w-8 text-white"></i>
            </div>
            <x-primary-link-button :href="route('timetables.create')"
                                   class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                <i class="fa-solid fa-eraser"></i>
                <span class="pl-4">{{ __('Clear Fields') }}</span>
            </x-primary-link-button>
        </header>

        @auth
            <x-flash-message :data="session()"/>
        @endauth

        <div class="flex flex-col flex-wrap my-4 mt-8 xl:px-40 lg:px-20">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">

                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">
                    <form action="{{ route('timetables.store') }}" method="POST" class="flex gap-4">
                        @csrf

                        <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <header class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                    {{ __("Enter timetable details") }}
                                </p>
                            </header>

                            <section class="lg:px-8 xl:px-20 py-4 px-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">
                                
                                <div class="flex flex-col my-2">
                                    <x-input-label for="course_id">{{ __('Course') }}</x-input-label>
                                    <x-select id="course_id" name="course_id" required autofocus class="w-full" :selected="old('course_id')" :options="$courses"/>
                                    <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                                </div>

                                
                                <div class="flex flex-col my-2 mt-2">
                                    <x-input-label for="cluster_id">{{ __('Cluster') }}</x-input-label>
                                    <x-select id="cluster_id" name="cluster_id" required autofocus class="w-full" :selected="old('cluster_id')">
                                        @foreach($clusters as $id => $title)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </x-select>
                                    <x-input-error :messages="$errors->get('cluster_id')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2 mt-2">
                                    <x-input-label for="lecturer_id">{{ __('Lecturer') }}</x-input-label>
                                    <x-select id="lecturer_id" name="lecturer_id" required autofocus class="w-full" :selected="old('lecturer_id')" :options="$lecturers"/>
                                    <x-input-error :messages="$errors->get('lecturer_id')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="start_date">{{ __('Start Date') }}</x-input-label>
                                    <x-text-input type="date" id="start_date" name="start_date" class="w-full" value="{{ old('start_date') }}"/>
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2 mt-2">
                                    <x-input-label for="end_date">{{ __('End Date') }}</x-input-label>
                                    <x-text-input type="date" id="end_date" name="end_date" class="w-full" value="{{ old('end_date') }}"/>
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2"/>
                                </div>

                               

                                <div class="flex flex-col my-2">
                                    <x-input-label for="start_time">{{ __('Start Time') }}</x-input-label>
                                    <x-text-input type="time" id="start_time" name="start_time" class="w-full" value="{{ old('start_time') }}"/>
                                    <x-input-error :messages="$errors->get('start_time')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="session_duration">{{ __('Session Duration (minutes)') }}</x-input-label>
                                    <x-text-input type="number" id="session_duration" name="session_duration" min="1" max="10000" class="w-full" value="{{ old('session_duration') }}"/>
                                    <x-input-error :messages="$errors->get('session_duration')" class="mt-2"/>
                                </div>

                            </section>

                            <footer class="flex gap-4 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">
                                <x-primary-link-button :href="route('timetables.index')" class="bg-zinc-800">{{ __('Cancel') }}</x-primary-link-button>
                                <x-primary-button type="submit" class="bg-zinc-800">{{ __('Create Timetable') }}</x-primary-button>
                            </footer>
                        </div>
                    </form>
                </section>

            </section>
        </div>
    </article>
</x-app-layout>
