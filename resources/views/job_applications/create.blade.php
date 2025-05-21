<x-jobs-layout>
    <x-breadcrumbs
        class="mb-4 pt-4"
        :links="['Jobs'=> route('jobs.index'),
                $job->title => '#',
                'Apply'=> '#'
    ]"/>

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>
        <form action="{{route('jobs.applications.store', $job)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4  items-center ">
                <x-label for="expected_salary" required>Expected Salary</x-label>
                <x-form-text-input type="number" name="expected_salary" class="flex-grow"/>

            </div>
            <div class="mb-4">
                <x-label required >Upload CV</x-label>
                <x-form-text-input type="file" name="cv"/>
            </div>
            <x-button class="w-full">
                Apply
            </x-button>

        </form>
    </x-card>
</x-jobs-layout>
