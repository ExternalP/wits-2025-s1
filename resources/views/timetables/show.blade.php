<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Show Timetable') }}
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header
            class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <div class="order-first">
                <i class="float-left fa-solid fa-calendar-days min-w-8 text-white"></i>
                <h2 class="float-left">Timetable - {{ $timetable->title }}</h2>
            </div>
            <h2 class="grow"></h2>
        </header>

        <x-flash-message :data="session()" />

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">
                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">
                    <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <header
                            class="grid grid-cols-6 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                            <p class="col-span-1 px-6 py-4">Timetable Details</p>
                            <p class="text-right col-span-5 px-6 py-4">#{{ $timetable->id }}</p>
                        </header>

                        <section
                            class="grid grid-cols-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">
                            {{-- Course --}}
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4">Course</p>
                            <p class="col-span-2 px-6 py-4">{{ $course->title ?? '-' }}</p>

                            {{-- Package --}}
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4">Package</p>
                            <p class="col-span-2 px-6 py-4">{{ $package->title ?? '-' }}</p>


                            {{-- Start Date --}}
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4">Start Date</p>
                            <p class="col-span-2 px-6 py-4">{{ $timetable->start_date?->format('d/m/Y') }}</p>

                            {{-- End Date --}}
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4">End Date</p>
                            <p class="col-span-2 px-6 py-4">{{ $timetable->end_date?->format('d/m/Y') }}</p>
                            {{-- Lecturer --}}
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4">Lecturer</p>
                            <p class="col-span-2 px-6 py-4">{{ $timetable->lecturer->given_name ?? '-' }}</p>








                            {{-- Created At --}}
                            <p class="text-right col-span-1 bg-zinc-300 px-6 py-4">Created At</p>
                            <p class="col-span-2 px-6 py-4">{{ $timetable->created_at?->format('d/m/Y H:i') }}</p>



                            {{-- Clusters --}}
                            <div class="col-span-6 mt-6">
                                <p class="bg-zinc-300 px-6 py-2 font-bold text-center">Clusters</p>
                                <table
                                    class="min-w-full text-left text-sm font-light text-surface dark:text-white border">
                                    <thead
                                        class="sticky top-0 border-b border-neutral-200 bg-zinc-800 font-medium text-white">
                                        <tr>
                                            <th scope="col" class="pl-6 py-2">Cluster Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($cluster)
                                            <tr class="border-b border-zinc-300">
                                                <td class="pl-6 py-2">{{ $cluster->title }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td class="pl-6 py-2">No cluster assigned.</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>



                            <footer
                                class="grid grid-cols-1 px-6 py-4 border-t border-neutral-200 font-medium text-zinc-800">
                                <div class="flex gap-4">
                                    <x-primary-link-button :href="route('timetables.index')" class="bg-zinc-800">
                                        {{ __('Back') }}
                                    </x-primary-link-button>

                                    <x-primary-link-button :href="route('timetables.edit', $timetable)" class="bg-zinc-800">
                                        {{ __('Edit') }}
                                    </x-primary-link-button>

                                    <x-confirm-deletion-modal action="{{ route('timetables.destroy', $timetable) }}"
                                        itemId="{{ $timetable->id }}" itemName="{{ $timetable->title }}"
                                        topic="timetable"
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