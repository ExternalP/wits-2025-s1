<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Show Package
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
            <div class="order-first">
                <i class="fa-solid fa-box-archive min-w-8 text-white"></i>
                <h2 class="float-left">Package - {{ $package->title }}</h2>
            </div>
        </header>

        <div class="px-8 py-6">
            <section class="bg-white border border-zinc-600 rounded overflow-hidden">
                <header class="bg-zinc-800 text-white font-semibold px-6 py-4 text-lg">
                    Package Details
                </header>

                <table class="w-full table-fixed border-t border-gray-300">
                    <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                    <tr>
                        <th class="w-1/4 px-6 py-4 bg-gray-100 text-left">Title</th>
                        <td class="px-6 py-4">{{ $package->title }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 bg-gray-100 text-left">National Code</th>
                        <td class="px-6 py-4">{{ $package->national_code }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 bg-gray-100 text-left">TGA Status</th>
                        <td class="px-6 py-4">{{ $package->tga_status }}</td>
                    </tr>
                    </tbody>
                </table>

                <footer class="flex justify-start px-6 py-4 bg-gray-50">
                    <a href="{{ route('packages.index') }}"
                       class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Back
                    </a>
                </footer>
            </section>
        </div>
    </article>
</x-app-layout>
