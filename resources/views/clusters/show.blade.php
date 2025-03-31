<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cluster Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <a href="{{ route('clusters.index') }}"
                           class="text-blue-600 hover:underline">&larr; Back to Clusters</a>
                    </div>

                    <!-- Code -->
                    <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Code</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cluster->code }}</dd>
                        </div>

                        <!-- Title -->
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Title</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cluster->title }}</dd>
                        </div>

                        <!-- Course Selection -->
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Course</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $cluster->course->national_code ?? 'N/A' }}
                            </dd>
                        </div>

                        <!-- State Code -->
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">State Code</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cluster->state_code }}</dd>
                        </div>

                        <!-- Units Selection -->
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Units</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                @forelse($cluster->units as $unit)
                                    <span class="px-2 py-1 bg-gray-100 rounded">{{ $unit->national_code }}</span>
                                @empty
                                    <span class="text-gray-500 italic">No units assigned</span>
                                @endforelse
                            </dd>
                        </div>
                    </dl>

                    <!-- Form Actions -->
                    <div class="mt-6 flex gap-4">
                        <a href="{{ route('clusters.edit', $cluster) }}"
                           class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600">
                            Edit Cluster
                        </a>
                        <form action="{{ route('clusters.destroy', $cluster) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this cluster?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600">
                                Delete Cluster
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
