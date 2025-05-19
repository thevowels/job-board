<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs Board') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-200">
        <div class="sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($jobs as $job)
                        <x-job-card :job="$job">
                            <div class="my-3">
                                <x-link-button :href="route('jobs.show', $job->id)">
                                    View Details
                                </x-link-button>
                            </div>

                        </x-job-card>
                    @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
