<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs Board') }}
        </h2>
    </x-slot>
    <div>
        <x-job-card :job="$job">
        </x-job-card>
    </div>



</x-app-layout>