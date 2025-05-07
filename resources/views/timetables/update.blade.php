<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Timetable Edit') }}
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <div class="order-first">
                <i class="float-left fa-solid fa-calendar-days min-w-8 text-white"></i>
                <h2 class="float-left">Timetable - #{{ $timetable->id }}</h2>
            </div>
            <h2 class="grow"></h2>
            <x-primary-link-button :href="route('timetables.update', $timetable)"
                                   class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="pl-4">{{ __('Clear Fields') }}</span>
            </x-primary-link-button>
        </header>

        <x-flash-message :data="session()"/>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">

                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">
                    <form action="{{ route('timetables.update', $timetable) }}"
                          method="POST"
                          class="flex gap-4">

                        @csrf
                        @method('patch')

                        <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <header class="grid grid-cols-6 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                    Timetable Details
                                </p>
                                <p class="text-right col-span-5 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                    #{{ $timetable->id }}
                                </p>
                            </header>

                            <section class="py-4 px-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">

                                <div class="flex flex-col my-2">
                                    <x-input-label for="course_id">
                                        {{ __('Course') }}
                                    </x-input-label>
                                    <x-select id="course_id" name="course_id" required autofocus
                                              class="w-full"
                                              :selected="old('course_id', $timetable->course_id)"
                                              :options="$courses"/>
                                    <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="cluster_id">
                                        {{ __('Cluster') }}
                                    </x-input-label>
                                    <x-select id="cluster_id" name="cluster_id" required
                                              class="w-full"
                                              :selected="old('cluster_id', $timetable->cluster_id)"
                                              :options="$clusters"/>
                                    <x-input-error :messages="$errors->get('cluster_id')" class="mt-2"/>
                                </div>

                                <div class="flex md:flex-row flex-col my-2">
                                    <div class="flex flex-col my-2 mr-4 w-full">
                                        <x-input-label for="start_date">
                                            {{ __('Start Date') }}
                                        </x-input-label>
                                        <x-text-input id="start_date" name="start_date" type="date"
                                                      :value="old('start_date', $timetable->start_date ? $timetable->start_date->toDateString() : '')"/>
                                        <x-input-error :messages="$errors->get('start_date')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2 w-full">
                                        <x-input-label for="end_date">
                                            {{ __('End Date') }}
                                        </x-input-label>
                                        <x-text-input id="end_date" name="end_date" type="date"
                                                      :value="old('end_date', $timetable->end_date ? $timetable->end_date->toDateString() : '')"/>
                                        <x-input-error :messages="$errors->get('end_date')" class="mt-2"/>
                                    </div>
                                </div>

                                <div class="flex md:flex-row flex-col my-2">
                                    <div class="flex flex-col my-2 mr-4 w-full">
                                        <x-input-label for="start_time">
                                            {{ __('Start Time') }}
                                        </x-input-label>
                                        <x-text-input id="start_time" name="start_time" type="time"
                                                      :value="old('start_time', $timetable->start_time)"/>
                                        <x-input-error :messages="$errors->get('start_time')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2 w-full">
                                        <x-input-label for="session_duration">
                                            {{ __('Session Duration (minutes)') }}
                                        </x-input-label>
                                        <x-text-input id="session_duration" name="session_duration" type="number"
                                                      :value="old('session_duration', $timetable->session_duration)"/>
                                        <x-input-error :messages="$errors->get('session_duration')" class="mt-2"/>
                                    </div>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="lecturer_id">
                                        {{ __('Lecturer') }}
                                    </x-input-label>
                                    <x-select id="lecturer_id" name="lecturer_id" required
                                              class="w-full"
                                              :selected="old('lecturer_id', $timetable->lecturer_id)"
                                              :options="$lecturers"/>
                                    <x-input-error :messages="$errors->get('lecturer_id')" class="mt-2"/>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <x-primary-button>
                                        {{ __('Update Timetable') }}
                                    </x-primary-button>
                                    <x-primary-link-button :href="route('timetables.index')"
                                                           class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                                        <span class="pl-4">{{ __('Cancel') }}</span>
                                    </x-primary-link-button>

                                    
                                </div>
                               

                            </section>
                        </div>

                    </form>
                </section>
            </section>
        </div>

        
       
    </article>

</x-app-layout>
