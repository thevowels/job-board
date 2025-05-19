<x-jobs-layout>

            <x-breadcrumbs class="mb-4 pt-4"
                           :links="['Jobs'=> route('jobs.index')]"/>
            <x-card class="mb-4 text-sm">
                <form action=" {{route('jobs.index')}}" method="GET">

                    <div class="mb-4 gap-4 grid grid-cols-2">
                        <div>
                            <div class="mb-1 font-semibold">
                                Search
                            </div>
                            <x-form-text-input name="search" value="" placeholder="Search for any Text"/>
                        </div>
                        <div>
                            <div class="mb-1 font-semibold">
                                Salary
                            </div>
                            <div class="flex space-x-2">
                                <x-form-text-input name="min_salary" value="" placeholder="From"/>
                                <x-form-text-input name="max_salary" value="" placeholder="To"/>

                            </div>
                        </div>
                        <div>Column 1</div>
                        <div>Column 1</div>
                    </div>
                    <div>
                        <x-primary-button class="w-full justify-center"> Filter</x-primary-button>
                    </div>
                </form>

            </x-card>
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
