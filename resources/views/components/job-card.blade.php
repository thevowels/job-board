<x-card class="mb-4 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-2">
        <h3 class="text-lg font-medium">{{ $job->title }}</h3>
        <p class="text-slate-600"> ${{ number_format( $job->salary) }}</p>
    </div>
    <div class="flex justify-between items-center mb-4 text-sm text-slate-600">
        <div class="flex items-center space-x-4">
            <div> {{$job->employer->company_name}}</div>
            <div>{{$job->location}}</div>
            @if($job->deleted_at)
                <span class="text-xs text-red-500">Deleted</span>
            @endif
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{route('jobs.index', ['experience' => $job->experience])}}">
                    {{ Str::ucfirst( $job->experience)}}
                </a>
            </x-tag>
            <x-tag>
                <a href="{{route('jobs.index', ['category' => $job->category])}}">
                    {{ $job->category}}
                </a>
            </x-tag>
        </div>
    </div>
    {{ $slot }}
</x-card>
