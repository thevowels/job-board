<x-jobs-layout>
        <x-breadcrumbs class="mb-4 pt-4"
                       :links="['Jobs'=> route('jobs.index'),$job->title => '#']"/>
        <x-job-card :job="$job"/>
</x-jobs-layout>
