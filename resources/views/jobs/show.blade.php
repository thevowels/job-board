<x-jobs-layout>
        <x-breadcrumbs class="mb-4 pt-4"
                       :links="['Jobs'=> route('jobs.index'),$job->title => '#']"/>
        <x-job-card :job="$job">
            <p class="text-slate-500 text-sm mb-4">{!! nl2br(e($job->description))!!}</p>

        </x-job-card>
</x-jobs-layout>
