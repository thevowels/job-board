<x-jobs-layout>

            <x-breadcrumbs class="mb-4 pt-4"
                           :links="['Jobs'=> route('jobs.index')]"/>

            @foreach ($jobs as $job)
                <x-job-card :job="$job">
                    <div class="my-3">
                        <x-link-button :href="route('jobs.show', $job->id)">
                            View Details
                        </x-link-button>
                    </div>

                </x-job-card>
            @endforeach
</x-jobs-layout>
