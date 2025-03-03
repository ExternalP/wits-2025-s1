<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Home page') }}
        </h2>
    </x-slot>


    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h2>Welcome</h2>
            <p class="text-sm">{{ now() }}</p>
        </header>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:grid-cols-3 sm:px-8">

                <section class="rounded flex items-center bg-lime-200 border border-lime-600 overflow-hidden">
                    <div class="rounded-l p-6 bg-lime-600 text-center">
                        <i class="fa-solid fa-users text-5xl min-w-24 text-white"></i>
                    </div>
                </section>

                <section class="flex items-center bg-amber-200 border border-amber-600 rounded overflow-hidden">
                    <div class="rounded-l p-6 bg-amber-600 text-center">
                        <i class="fa-solid fa-table-list text-5xl min-w-24 text-white"></i>
                    </div>

                </section>

                <section class="flex items-center bg-indigo-200 border border-indigo-600 rounded overflow-hidden">
                    <div class="rounded-l p-6 bg-indigo-600 text-center">
                        <i class="fa-solid fa-comments text-5xl min-w-24 text-white"></i>
                    </div>

                </section>


            </section>


        </div>

    </article>

</x-app-layout>
