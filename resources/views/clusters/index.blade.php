<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clusters') }}
            </h2>
            <div class="flex space-x-4">
                {{--@can('cluster.add')--}}
                <a href="{{ route('clusters.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600">
                    {{ __('Add Cluster') }}
                </a>
                {{--@endcan--}}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Clusters Table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Code</th>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3">State Code</th>
                                <th scope="col" class="px-6 py-3">Courses</th>
                                <th scope="col" class="px-6 py-3">Units</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($clusters as $cluster)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $cluster->code }}
                                    </td>
                                    <td class="px-6 py-4">{{ $cluster->title }}</td>
                                    <td class="px-6 py-4">{{ $cluster->state_code }}</td>
                                    <td class="px-6 py-4">
                                        {{ $cluster->courses->count() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $cluster->units->count() }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        {{--@can('cluster.read')--}}
                                        <a href="{{ route('clusters.show', $cluster) }}"
                                           class="text-blue-600 hover:underline">View</a>
                                        {{--@endcan
                                        can('cluster.edit')--}}
                                        <a href="{{ route('clusters.edit', $cluster) }}"
                                           class="text-yellow-600 hover:underline">Edit</a>
                                        {{--@endcan
                                        @can('cluster.delete')--}}
                                        <form action="{{ route('clusters.destroy', $cluster) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this cluster?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                        {{--@endcan--}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center">
                                        No clusters found in database
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $clusters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
