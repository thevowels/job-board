<x-card class="mb-4 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-2">
        <h3 class="text-lg font-medium">{{ $job->title }}</h3>
        <p class="text-slate-600"> ${{ number_format( $job->salary) }}</p>
    </div>
    <div class="flex justify-between items-center mb-4 text-sm text-slate-600">
        <div class="flex space-x-4">
            <div> Company Name</div>
            <div>{{$job->location}}</div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag >
                {{ Str::ucfirst( $job->experience)}}
            </x-tag>
            <x-tag>
                {{ $job->category}}
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
