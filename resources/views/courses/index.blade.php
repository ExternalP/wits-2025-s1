<x-app-layout mainClass="container grow my-8 mx-auto py-8 shadow shadow-black/25
                         w-full px-6 bg-white overflow-hidden rounded-lg">

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Course Management') }}
        </h2>
    </x-slot>


    <article class="-mx-6">
        <header
            class="flex-wrap justify-between -mt-8 py-1.5 px-6 gap-1 bg-zinc-700 text-zinc-200 rounded-t-lg text-2xl font-bold flex flex-row items-center">
            <div class="pt-2 pr-1">
                <h2><i class="fa-solid fa-graduation-cap pr-1 text-white"></i> {{ __('Course List') }} </h2>
                <form action="{{ route('courses.index') }}" method="GET" class="pr-2 pb-2 text-black">
                    @csrf
                        <x-select name="filter" required autofocus
                                  class="py-1 text-sm"
                                  :defaultOption="['', 'Filter by Package']"
                                  onchange="this.form.submit()"
                                  :options="$packages"
                        />
                </form>
            </div>
            <div class="pt-2 mx-1">
                <x-primary-link-button href="{{ route('courses.create') }}"
                                       class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                    <i class="fa-solid fa-plus pr-2"></i>
                    {{ __('Add Course') }}
                </x-primary-link-button>
                {{--@if ($trashedCount > 0)
                    <x-primary-link-button href="{{ route('courses.trash') }}"
                                           class="text-center rounded-md space-x-2 text-slate-200 bg-slate-600 hover:bg-slate-500 duration-300 ease-in-out transition-all">
                        <i class="fa fa-trash pr-2"></i>
                        {{ __("$trashedCount Courses Deleted") }}
                    </x-primary-link-button>
                @else
                    <x-secondary-link-button href="{{ route('courses.trash') }}"
                                             class="text-center rounded-md space-x-2 hover:text-slate-200 hover:bg-slate-500 duration-300 ease-in-out transition-all">
                        <i class="fa fa-trash pr-2"></i>
                        {{ __("$trashedCount Courses Deleted") }}
                    </x-secondary-link-button>
                @endif--}}
            </div>
{{--            <div class="grow"></div>--}}
            <form action="{{ route('courses.index') }}"
                  method="get"
                  class="pl-1 flex flex-row gap-0 items-center"  >
                @csrf
                <x-input-label for="search" :value="old('search')" class="sr-only"/>
                <x-text-input id="search"
                              name="search"
                              type="text"
                              placeholder="{{ __('Search Courses') }}"
                              value="{{ $search }}"
                              class="w-72 text-zinc-800 placeholder-gray-400 rounded-e-none"  />
                <x-primary-button class="bg-neutral-500 rounded-s-none py-2.5 !text-sm normal-case">{{ __('Search') }}</x-primary-button>
            </form>
        </header>

        @auth
            <x-flash-message :data="session()"/>
        @endauth

        <div class="flex flex-col flex-wrap my-4 mt-8">
            @if ($search != null || $filter != null)
                <p class="px-5">
                    @if ($search != null)
                        Search results for: "<b>{{ $search }}</b>" [{{ $courses->total() ." of ". $coursesCount }} course(s) found]
                    @else
                        Filtered for the package: "<b>{{ $filter->national_code .': '. $filter->title }}</b>" [{{ $courses->total() ." of ". $coursesCount }} course(s) found]
                    @endif
                    <x-primary-link-button href="{{ route('courses.index') }}" class="float-end">
                        Show All Courses
                    </x-primary-link-button>
                </p>
            @endif
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">

                <section class="min-w-full bg-zinc-50 border border-zinc-600 rounded overflow-x-scroll">

                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                        <thead
                            class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                        <tr>
                            {{--                            <th scope="col" class="px-6 py-4">#</th>--}}
                            <th scope="col" class="px-3 py-4 text-center">National Code</th>
                            <th scope="col" class="px-5 py-4">AQF Level & Title</th>
                            <th scope="col" class="px-2 py-4 text-center">TGA Status</th>
                            <th scope="col" class="px-2 py-4 text-center">State Code</th>
                            <th scope="col" class="px-2 py-4 text-center">Nominal Hours</th>
{{--                            <th scope="col" class="px-4 py-4">Type</th>--}}
                            <th scope="col" class="pl-6 pr-2 py-4">Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($courses as $course)
                            <tr class="border-b border-zinc-300 dark:border-white/10">
                                <td class="whitespace-nowrap pl-3 pr-1 py-4">{{ $course->national_code }}</td>
                                <td class="px-5 py-4 w-full">{{ $course->aqf_level .' '. $course->title }}</td>
                                <td class="whitespace-nowrap py-4">
                                    @if ($course->tga_status == 'Current')
                                        <i class="fa-solid fa-circle-check text-green-600 flex text-center justify-center text-xl"></i>
                                    @elseif ($course->tga_status == 'Replaced')
                                        <i class="fa-solid fa-circle-xmark text-amber-600 flex text-center justify-center text-xl"></i>
                                    @else
                                        <i class="fa-solid fa-circle-xmark text-red-600 flex text-center justify-center text-xl"></i>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-1 py-4 text-center justify-center">
                                    <span class="text-xs text-white bg-zinc-500 px-1 rounded-full min-w-12 inline-block">
                                        {{ $course->state_code }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-2 py-4 text-center">{{ $course->nominal_hours }}</td>
                                <td class="whitespace-nowrap px-2 py-4">
                                    <div class="flex gap-2">
                                        <x-primary-link-button href="{{ route('courses.show', $course) }}"
                                                               class="bg-zinc-700 hover:bg-indigo-700 pr-2 pl-2">
                                            {{ __('Show') }}
                                            <i class="fa-solid fa-eye pr-2 order-first"></i>
                                        </x-primary-link-button>
                                        <x-primary-link-button href="{{ route('courses.edit', $course) }}"
                                                               class="bg-zinc-500 hover:bg-indigo-700 pr-2 pl-2">
                                            {{ __('Edit') }}
                                            <i class="fa-solid fa-edit pr-2 order-first"></i>
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
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr class="bg-zinc-100">
                            <td colspan="6" class="px-6 py-2 my-paginator">
                                @if( $courses->hasPages() )
                                    {{ $courses->links() }}
                                @elseif( $courses->total() === 0 )
                                    <p class="text-xl">{{ __('No courses found') }}</p>
                                @else
                                    <p class="py-2 text-zinc-800 text-sm">{{ __('All ' . $courses->total() . ' courses shown') }}</p>
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
