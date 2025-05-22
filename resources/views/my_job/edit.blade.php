<x-jobs-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" class="mb-4"/>

    <x-card class="mb-8">
        <form  action="{{route('my-jobs.update', $job)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" required>
                        Job Title
                    </x-label>
                    <x-form-text-input name="title" value="{{$job->title}}"/>
                </div>
                <div>
                    <x-label for="location" required>
                        Job Location
                    </x-label>
                    <x-form-text-input name="location" :value="$job->location"/>
                </div>
                <div class="col-span-2">
                    <x-label for="salary" required>
                        Salary
                    </x-label>
                    <x-form-text-input type="number" name="salary" :value="$job->salary"/>
                </div>
                <div class="col-span-2">
                    <x-label for="description" required>
                        Description
                    </x-label>
                    <x-form-text-input type="textarea" name="description" :value="$job->description" />
                </div>
                <div>
                    <x-label for="experience" required>Experience</x-label>
                    <x-radio-group name="experience"
                                   :value="$job->experience"
                                   :options="array_combine(array_map('ucfirst',\App\Models\Job::$experience), \App\Models\Job::$experience)"
                                   :allOption="false"
                    />
                </div>
                <div>
                    <x-label for="category" required>Category</x-label>
                    <x-radio-group name="category"
                                   :value="$job->category"
                                   :options="array_combine(array_map('ucfirst',\App\Models\Job::$category), \App\Models\Job::$category)"
                                   :allOption="false"
                    />
                </div>
                <div class="col-span-2">
                    <x-button>Submit</x-button>
                </div>

            </div>
        </form>
    </x-card>

</x-jobs-layout>
