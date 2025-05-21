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
                <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">Expected Salary</label>
                <x-form-text-input type="number" name="expected_salary" class="flex-grow"/>

            </div>
            <div class="mb-4">
                <label class="">Upload CV</label>
                <x-form-text-input type="file" name="cv"/>
            </div>
            <x-button class="w-full">
                Apply
            </x-button>

        </form>
    </x-card>
</x-jobs-layout>
