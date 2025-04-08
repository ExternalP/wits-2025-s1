<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Course Edit') }}
        </h2>
    </x-slot>


    <article class="-mx-4">
        <header
            class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <div class="order-first">
                <i class="float-left fa-solid fa-graduation-cap min-w-8 text-white"></i>
                <h2 class="float-left">Course - {{ $course->aqf_level .' '. $course->title }}</h2>
            </div>
            <h2 class="grow"></h2>
            <x-primary-link-button :href="route('courses.edit', $course)"
                                   class="bg-zinc-200 hover:bg-zinc-900 text-zinc-800 hover:text-white">
                <i class="fa-solid fa-graduation-cap"></i>
                <span class="pl-4">{{ __('Reset Fields') }}</span>
            </x-primary-link-button>
        </header>

        <x-flash-message :data="session()"/>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">

                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">
                    <form action="{{ route('courses.update', $course) }}"
                          method="POST"
                          class="flex gap-4">

                        @csrf
                        @method('patch')

                        <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <header
                                class="grid grid-cols-6 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                    Course Details
                                </p>
                                <p class="text-right col-span-5 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                    #{{ $course->id }}
                                </p>
                            </header>

                            <section
                                class="py-4 px-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">

                                <div class="flex flex-col my-2 mt-2">
                                    <x-input-label for="package_id">
                                        {{ __('Package') }}
                                    </x-input-label>
                                    <x-select id="package_id" name="package_id" required autofocus
                                              class="w-full"
                                              :selected="old('package_id', $course->package_id)"
                                              :options="$packages"
                                    />
                                    <x-input-error :messages="$errors->get('package_id')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="national_code">
                                        {{ __('National Code') }}
                                    </x-input-label>
                                    <x-text-input id="national_code" name="national_code" required autofocus
                                                  class="uppercase"
                                                  placeholder="The first 3 characters should be package code"
                                                  :value="old('national_code', $course->national_code)"
                                    />
                                    <x-input-error :messages="$errors->get('national_code')" class="mt-2"/>
                                </div>

                                <div class="flex md:flex-row flex-col my-2">
                                    <div class="flex flex-col my-2 mr-4">
                                        <x-input-label for="aqf_level">
                                            {{ __('AQF Level') }}
                                        </x-input-label>
                                        <x-select id="aqf_level" name="aqf_level" required autofocus
                                                  :selected="old('aqf_level', $course->aqf_level)"
                                                  :valuesAsKeys="true"
                                                  :options="$uniqueAqfs"/>
                                        <x-input-error :messages="$errors->get('aqf_level')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2 w-full">
                                        <x-input-label for="title">
                                            {{ __('Title') }}
                                        </x-input-label>
                                        <x-text-input id="title" name="title" required autofocus
                                                      class="w-full"
                                                      :value="old('title', $course->title)"/>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                    </div>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="tga_status">
                                        {{ __('TGA Status') }}
                                    </x-input-label>
                                    <x-select id="tga_status" name="tga_status" required autofocus
                                              class="w-full"
                                              :selected="old('tga_status', $course->tga_status)"
                                              :valuesAsKeys="true"
                                              :options="$tgaStatuses"/>
                                    <x-input-error :messages="$errors->get('tga_status')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="state_code">
                                        {{ __('State Code') }}
                                    </x-input-label>
                                    <x-text-input id="state_code" name="state_code" autofocus required
                                                  class="uppercase"
                                                  :value="old('state_code', $course->state_code)"/>
                                    <x-input-error :messages="$errors->get('state_code')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="nominal_hours">
                                        {{ __('Nominal Hours') }}
                                    </x-input-label>
                                    <x-text-input id="nominal_hours" name="nominal_hours" autofocus
                                                  type="number" max="10000" min="0"
                                                  :value="old('nominal_hours', $course->nominal_hours)"/>
                                    <x-input-error :messages="$errors->get('nominal_hours')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="type">
                                        {{ __('Type') }}
                                    </x-input-label>
                                    <x-text-input id="type" name="type" autofocus
                                                  :value="old('type', $course->type)"/>
                                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2 pt-2">
                                    <x-input-label for="cluster_id" class="!text-lg">
                                        {{ __('Clusters') }}
                                    </x-input-label>
                                    <div class="max-h-64 overflow-y-auto border">
                                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                            <thead class="sticky top-0 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                            <tr>
                                                <th scope="col" class="pl-1 text-center">#</th>
                                                <th scope="col" class="pl-3 pr-1">Code</th>
                                                <th scope="col" class="px-5">Title</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($course->clusters as $cluster)
                                                <tr class="border-b border-zinc-300 dark:border-white/10">
                                                    <td class="pl-2 py-1 whitespace-nowrap">
                                                        <input name="cluster_id[]" id="cluster_cb{{ $cluster->id }}"
                                                               type="checkbox" class="mr-2 rounded"
                                                           {{ in_array($cluster->id, old('cluster_id',
                                                                $course->clusters->pluck('id')->toArray() ?? [])
                                                              ) ? 'checked' : '' }}
                                                           value="{{ $cluster->id }}"/>
                                                    </td>
                                                    <td class="whitespace-nowrap pl-3 pr-1 py-1">
                                                        <label for="cluster_cb{{ $cluster->id }}">{{ $cluster->code }}</label>
                                                    </td>
                                                    <td class="px-5 py-1 w-full">{{ $cluster->title }}</td>
                                                </tr>
                                            @endforeach
                                            @foreach($otherClusters as $cluster)
                                                <tr class="border-b border-zinc-300 dark:border-white/10">
                                                    <td class="pl-2 py-1 whitespace-nowrap">
                                                        <input name="cluster_id[]" id="cluster_cb{{ $cluster->id }}"
                                                               type="checkbox" class="mr-2 rounded"
                                                               {{ in_array($cluster->id, old('cluster_id', [])) ? 'checked' : '' }}
                                                               value="{{ $cluster->id }}"/>
                                                    </td>
                                                    <td class="whitespace-nowrap pl-3 pr-1 py-1">
                                                        <label for="cluster_cb{{ $cluster->id }}">{{ $cluster->code }}</label>
                                                    </td>
                                                    <td class="px-5 py-1 w-full">{{ $cluster->title }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <x-input-error :messages="$errors->get('cluster_id')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2 pt-4">
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
                                            @foreach($course->units as $unit)
                                                <tr class="border-b border-zinc-300 dark:border-white/10">
                                                    <td class="pl-2 py-1">
                                                        <input name="unit_id[]" id="unit_cb{{ $unit->id }}"
                                                               type="checkbox" class="mr-2 rounded"
                                                               {{ in_array($unit->id, old('unit_id',
                                                                    $course->units->pluck('id')->toArray() ?? [])
                                                                  ) ? 'checked' : '' }}
                                                               value="{{ $unit->id }}"/>
                                                    </td>
                                                    <td class="whitespace-nowrap pl-3 pr-1 py-1">
                                                        <label for="unit_cb{{ $unit->id }}">{{ $unit->national_code }}</label>
                                                    </td>
                                                    <td class="px-5 py-1 w-full">{{ $unit->title }}</td>
                                                </tr>
                                            @endforeach
                                            @foreach($otherUnits as $unit)
                                                <tr class="border-b border-zinc-300 dark:border-white/10">
                                                    <td class="pl-2 py-1">
                                                        <input name="unit_id[]" id="unit_cb{{ $unit->id }}"
                                                               type="checkbox" class="mr-2 rounded"
                                                               {{ in_array($unit->id, old('unit_id', [])) ? 'checked' : '' }}
                                                               value="{{ $unit->id }}"/>
                                                    </td>
                                                    <td class="whitespace-nowrap pl-3 pr-1 py-1">
                                                        <label for="unit_cb{{ $unit->id }}">{{ $unit->national_code }}</label>
                                                    </td>
                                                    <td class="px-5 py-1 w-full">{{ $unit->title }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <x-input-error :messages="$errors->get('unit_id')" class="mt-2"/>
                                </div>
                            </section>

                            <footer
                                class="flex gap-4 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">

                                <x-primary-link-button :href="route('courses.show', $course)"
                                                       class="bg-zinc-800">
                                    Cancel
                                </x-primary-link-button>

                                <x-primary-button type="submit" class="bg-zinc-800">
                                    Save
                                </x-primary-button>
                            </footer>
                        </div>
                    </form>

                </section>

            </section>

        </div>

    </article>
</x-app-layout>
