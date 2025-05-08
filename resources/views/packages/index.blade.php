<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Package Management') }}
        </h2>
    </x-slot>

    @auth
        <article class="-mx-4 mt-6">
            <header
                class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold flex flex-row items-center">
                <h2 class="mr-auto max-w-md truncate">
                    Package (List)
                </h2>
                <div class="order-first">
                    <i class="fa-solid fa-user min-w-8 text-white"></i>
                </div>
                <x-primary-link-button :href="route('packages.create')" class="bg-zinc-800">
                    ADD PACKAGE
                </x-primary-link-button>
            </header>

            <div class="flex flex-col flex-wrap my-4 mt-8">
                <section class="grid grid-cols-1 gap-4 px-4 mt-4 sm:px-8">
                    <section class="w-full items-center bg-zinc-50 border border-zinc-600 rounded overflow-hidden">

                        <table class="w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">

                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                <th scope="col" class="px-6 py-4">National Code</th>
                                <th scope="col" class="px-6 py-4">Title</th>
                                <th scope="col" class="px-6 py-4">TGA Status</th>

                                <th scope="col" class="px-6 py-4 text-center" colspan="2">Actions</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach($packages as $package)
                                <tr class="border-b border-zinc-300 dark:border-white/10">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->index + 1 }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $package->national_code }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 w-full">{{ $package->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 w-full">{{ $package->tga_status }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">


                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form action="{{ route('packages.destroy', $package) }}"
                                              method="POST"
                                              class="flex gap-4">

                                        @csrf
                                            @method('DELETE')

                                            <x-primary-link-button href="{{ route('packages.show', $package) }}"
                                                                   class="bg-zinc-800">
                                                <span>Show </span>
                                                <i class="fa-solid fa-eye pr-2 order-first"></i>
                                            </x-primary-link-button>
                                            <x-primary-link-button href="{{ route('packages.edit', $package) }}"
                                                                   class="bg-zinc-800">
                                                <span>Edit </span>
                                                <i class="fa-solid fa-edit pr-2 order-first"></i>
                                            </x-primary-link-button>
                                            <x-secondary-button type="submit"
                                                                class="bg-zinc-200">
                                                <span>Delete</span>
                                                <i class="fa-solid fa-times pr-2 order-first"></i>
                                            </x-secondary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr class="bg-zinc-100">
                                <td colspan="5" class="px-6 py-2">
                                    @if( $packages->hasPages() )
                                        {{ $packages->links() }}
                                    @elseif( $packages->total() === 0 )
                                        <p class="text-xl">No packages found</p>
                                    @else
                                        <p class="py-2 text-zinc-800 text-sm">All packages shown</p>
                                    @endif
                                </td>
                            </tr>
                            </tfoot>

                        </table>

                    </section>

                </section>

            </div>
        </article>
    @else
        <p class="text-center py-4">You must be logged in to view the packages list.</p>
    @endauth
</x-app-layout>
