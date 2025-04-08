<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Show Course') }}
        </h2>
    </x-slot>


    <article class="-mx-4">
        <header
            class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <div class="order-first">
                <i class="float-left fa-solid fa-user min-w-8 text-white"></i>
                <h2 class="float-left">Course - {{ $course->aqf_level .' '. $course->title }}</h2>
            </div>
            <h2 class="grow"></h2>
        </header>

        <x-flash-message :data="session()"/>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">

                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">

                    <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <header
                            class="grid grid-cols-6 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                            <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Course Details</p>
                            <p class="text-right col-span-5 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                #{{ $course->id }}</p>
                        </header>

                        <section class="grid grid-cols-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">National Code</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->national_code }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">State Code</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->state_code }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">AQF Level</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->aqf_level }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Title</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->title }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">TGA Status</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->tga_status }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Nominal Hours</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->nominal_hours }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Package</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $package->national_code .': '. $package->title }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Type</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->type }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Creation Date</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->created_at }}</p>
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4 border-b border-zinc-200 dark:border-white/10">Last Updated</p>
                            <p class="col-span-2 px-6 py-4 border-b border-zinc-200 dark:border-white/10">{{ $course->updated_at != $course->created_at ? $course->updated_at : '' }}</p>

                            <div class="max-h-64 col-span-6 overflow-y-auto border">
                                <p class="text-center col-span-6 bg-zinc-300 px-6 py-1 border-b border-zinc-200 dark:border-white/10">Clusters</p>
                                @if (!$course->clusters->isEmpty())
                                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead class="sticky top-0 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                        <tr>
                                            <th scope="col" class="pl-3 pr-1">Code</th>
                                            <th scope="col" class="px-5">Title</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($course->clusters as $cluster)
                                            <tr class="border-b border-zinc-300 dark:border-white/10">
                                                <td class="whitespace-nowrap pl-3 pr-1 py-1">{{ $cluster->code }}</td>
                                                <td class="px-5 py-1 w-full">{{ $cluster->title }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="px-2 text-center text-sm">{{ __('Course currently has no clusters.') }}</p>
                                @endif
                            </div>
                            <div class="max-h-64 col-span-6 overflow-y-auto border">
                                <p class="text-center col-span-6 bg-zinc-300 px-6 py-1 border-b border-zinc-200 dark:border-white/10">Units</p>
                                @if (!$course->units->isEmpty())
                                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead class="sticky top-0 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                        <tr>
                                            <th scope="col" class="pl-3 pr-1">Code</th>
                                            <th scope="col" class="px-5">Title</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($course->units as $unit)
                                            <tr class="border-b border-zinc-300 dark:border-white/10">
                                                <td class="whitespace-nowrap pl-3 pr-1 py-1">{{ $unit->national_code }}</td>
                                                <td class="px-5 py-1 w-full">{{ $unit->title }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="p-2 text-center text-sm">{{ __('Course currently has no units.') }}</p>
                                @endif
                            </div>
                        </section>

                        <footer class="grid gid-cols-1 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">
                            <div class="flex gap-4">
                                <x-primary-link-button :href="route('courses.index')" class="bg-zinc-800">
                                    {{ __('Back') }}
                                </x-primary-link-button>
                                <x-primary-link-button :href="route('courses.edit', $course)" class="bg-zinc-800">
                                    {{ __('Edit') }}
                                </x-primary-link-button>
                                <x-confirm-deletion-modal action="{{ route('courses.destroy', $course) }}"
                                                          itemId="{{ $course->id }}"
                                                          itemName="{{ $course->aqf_level .' '. $course->title }}"
                                                          topic="course"
                                                          class="!text-gray-700 bg-zinc-200 pr-2 pl-2 hover:bg-red-700 hover:!text-white">
                                    {{ __('Delete') }}
                                    <i class="fa-solid fa-trash pr-2 order-first"></i>
                                </x-confirm-deletion-modal>

                            </div>
                        </footer>
                    </div>

                </section>

            </section>

        </div>

    </article>
</x-app-layout>
