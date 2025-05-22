<x-jobs-layout>
    <x-card>
        <form action="{{route('employer.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company-name" required> Company Name</x-label>
                <x-form-text-input name="company_name"/>
            </div>
            <x-button class="w-full">Create</x-button>
        </form>
    </x-card>
</x-jobs-layout>
