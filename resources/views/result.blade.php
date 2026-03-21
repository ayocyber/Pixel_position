<x-layout>
    <x-page-heading>
        Search Results
    </x-page-heading>

        <div class="space-y-4">
                @foreach ($jobs as $job)
                    <x-expand-job-card :job="$job"/>
                @endforeach
        </div>
</x-layout>