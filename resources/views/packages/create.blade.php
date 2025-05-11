<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Package Create') }}
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <div class="order-first">
                <i class="fa-solid fa-box-archive min-w-8 text-white"></i>
                <h2 class="float-left">New Package</h2>
            </div>
        </header>

        <x-flash-message :data="session()"/>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">
                <section class="min-w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">
                    <form action="{{ route('packages.store') }}" method="POST" class="flex gap-4">
                        @csrf

                        <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <header class="grid grid-cols-6 border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                    Package Details
                                </p>
                            </header>

                            <section class="py-4 px-6 border-b border-neutral-200 bg-white font-medium text-zinc-800 dark:border-white/10">

                                <div class="flex flex-col my-2">
                                    <x-input-label for="national_code">{{ __('National Code') }}</x-input-label>
                                    <x-text-input id="national_code" name="national_code" required autofocus
                                                  class="uppercase"
                                                  :value="old('national_code')" />
                                    <x-input-error :messages="$errors->get('national_code')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="title">{{ __('Title') }}</x-input-label>
                                    <x-text-input id="title" name="title" required
                                                  :value="old('title')" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                </div>

                                <div class="flex flex-col my-2">
                                    <x-input-label for="tga_status">{{ __('TGA Status') }}</x-input-label>
                                    <x-select id="tga_status" name="tga_status" required
                                              :selected="old('tga_status')"
                                              :valuesAsKeys="true"
                                              :options="$tgaStatus" />
                                    <x-input-error :messages="$errors->get('tga_status')" class="mt-2"/>
                                </div>
                            </section>

                            <footer class="flex gap-4 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">
                                <x-primary-link-button :href="route('packages.index')" class="bg-zinc-800">
                                    Cancel
                                </x-primary-link-button>

                                <x-primary-button type="submit" class="bg-zinc-800">
                                    Create
                                </x-primary-button>
                            </footer>
                        </div>
                    </form>
                </section>
            </section>
        </div>
    </article>
</x-app-layout>
