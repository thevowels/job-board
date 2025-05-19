<x-jobs-layout>
            <x-breadcrumbs class="mb-4 pt-4"
                           :links="['Jobs'=> route('jobs.index')]"/>
            <x-card class="mb-4 text-sm" x-data>
                <form x-ref="filters" id="filtering-form" action=" {{route('jobs.index')}}" method="GET">

                    <div class="mb-4 gap-4 grid grid-cols-2">
                        <div>
                            <div class="mb-1 font-semibold">
                                Search
                            </div>
                            <x-form-text-input form-ref="filters" name="search" value="{{request('search')}}" placeholder="Search for any Text"/>
                        </div>
                        <div>
                            <div class="mb-1 font-semibold">
                                Salary
                            </div>
                            <div class="flex space-x-2">
                                <x-form-text-input form-ref="filters" name="min_salary" value="{{request('min_salary')}}" placeholder="From"/>
                                <x-form-text-input form-ref="filters" name="max_salary" value="{{request('max_salary')}}" placeholder="To"/>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1 font-semibold">
                                Experience
                            </div>
                            <x-radio-group name="experience"
                                           :options="array_combine(array_map('ucfirst',\App\Models\Job::$experience), \App\Models\Job::$experience)"/>
                        </div>
                        <div>
                            <div class="mb-1 font-semibold">
                                Category
                            </div>
                            <x-radio-group name="category"
                                           :options="array_combine(array_map('ucfirst',\App\Models\Job::$category), \App\Models\Job::$category)"/>
                        </div>
                    </div>
                    <div>
                        <x-button class="w-full"> Filter</x-button>
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
