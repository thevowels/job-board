<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs Board') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-200">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($jobs as $job)
                        <x-card class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-medium">{{ $job->title }}</h3>
                            <p class="text-slate-500"> ${{ number_format( $job->salary) }}</p>

                            </div>
                            <p class="text-slate-500 text-sm">{!! nl2br(e($job->description))!!}</p>

                            <div class="flex justify-between items-center mt-4 text-sm text-slate-500">
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
                        </x-card>   
                        
                    @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
