<x-app-layout mainClass="container grow my-8 mx-auto py-8 shadow shadow-black/25 w-full px-6 bg-white overflow-hidden rounded-lg">
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Timetable Management') }}
        </h2>
    </x-slot>

    <article class="-mx-6">
        <header class="flex-wrap justify-between -mt-8 py-1.5 px-6 gap-1 bg-zinc-700 text-zinc-200 rounded-t-lg text-2xl font-bold flex flex-row items-center">
            <div class="pt-2 pr-1">
                <h2><i class="fa-regular fa-calendar-days pr-1 text-white"></i> {{ __('Timetable List') }} </h2>
            </div>

            <div class="pt-2 mx-1">
                <x-primary-link-button href="{{ route('timetables.create') }}" class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                    <i class="fa-solid fa-plus pr-2"></i>
                    {{ __('Add Timetable') }}
                </x-primary-link-button>
            </div>

            <form action="{{ route('timetables.index') }}" method="get" class="pl-1 flex flex-row gap-0 items-center">
                @csrf
                <x-input-label for="search" :value="old('search')" class="sr-only"/>
                <x-text-input id="search" name="search" type="text" placeholder="{{ __('Search Timetables') }}" value="{{ $search }}" class="w-72 text-zinc-800 placeholder-gray-400 rounded-e-none" />
                <x-primary-button class="bg-neutral-500 rounded-s-none py-2.5 !text-sm normal-case">{{ __('Search') }}</x-primary-button>
            </form>
        </header>

        @auth
            <x-flash-message :data="session()"/>
        @endauth

        <div class="flex flex-col flex-wrap my-4 mt-8">
            @if ($search != null)
                <p class="px-5">
                    Search results for: "<b>{{ $search }}</b>" [{{ $timetables->total() ." of ". $timetablesCount }} timetable(s) found]
                    <x-primary-link-button href="{{ route('timetables.index') }}" class="float-end">
                        Show All Timetables
                    </x-primary-link-button>
                </p>
            @endif

            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">
                <section class="min-w-full bg-zinc-50 border border-zinc-600 rounded overflow-x-auto">
                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <thead class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                            <tr>
                                <th class="px-3 py-4 text-center">Day</th>
                                <th class="px-3 py-4 text-center">Start Date</th>
                                <th class="px-3 py-4 text-center">Start Time</th>
                                <th class="px-3 py-4 text-center">End Date</th>
                                <th class="px-3 py-4 text-center">Course</th>
                                <th class="px-3 py-4 text-center">Cluster</th>
                                <th class="pl-6 pr-2 py-4">Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($timetables as $timetable)
                                <tr class="border-b border-zinc-300 dark:border-white/10">
                                    <td class="whitespace-nowrap text-center py-4">{{ \Carbon\Carbon::parse($timetable->start_date)->format('l') }}</td>
                                    <td class="whitespace-nowrap text-center py-4">{{ \Carbon\Carbon::parse($timetable->start_date)->format('Y-m-d') }}</td>
                                    <td class="whitespace-nowrap text-center py-4">{{ \Carbon\Carbon::parse($timetable->start_time)->format('H:i') }}</td>
                                    <td class="whitespace-nowrap text-center py-4">{{ \Carbon\Carbon::parse($timetable->end_date)->format('Y-m-d') }}</td>
                                    <td class="whitespace-nowrap text-center py-4">{{ $courses[$timetable->course_id] ?? '-' }}</td>
                                    <td class="whitespace-nowrap text-center py-4">{{ $timetable->cluster?->title ?? '-' }}</td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="flex gap-2">
                                            <x-primary-link-button href="{{ route('timetables.show', $timetable) }}" class="bg-zinc-700 hover:bg-indigo-700 pr-2 pl-2">
                                                {{ __('Show') }}
                                                <i class="fa-solid fa-eye pr-2 order-first"></i>
                                            </x-primary-link-button>
                                            <x-primary-link-button href="{{ route('timetables.edit', $timetable) }}" class="bg-zinc-500 hover:bg-indigo-700 pr-2 pl-2">
                                                {{ __('Edit') }}
                                                <i class="fa-solid fa-edit pr-2 order-first"></i>
                                            </x-primary-link-button>
                                            <x-confirm-deletion-modal action="{{ route('timetables.destroy', $timetable) }}" itemId="{{ $timetable->id }}" itemName="{{ $timetable->start_date .' - '.$timetable->start_time }}" topic="timetable" class="!text-gray-700 bg-zinc-200 pr-2 pl-2 hover:bg-red-700 hover:!text-white">
                                                {{ __('Delete') }}
                                                <i class="fa-solid fa-trash pr-2 order-first"></i>
                                            </x-confirm-deletion-modal>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                        <tfoot>
                            <tr class="bg-zinc-100">
                                <td colspan="7" class="px-6 py-2 my-paginator">
                                    @if( $timetables->hasPages() )
                                        {{ $timetables->links() }}
                                    @elseif( $timetables->total() > 1 )
                                        <p class="p-2 font-semibold">Total Timetables: {{ $timetables->total() }}</p>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    
                    
                </section>
            </section>
        </div>
    </article>
</x-app-layout>
