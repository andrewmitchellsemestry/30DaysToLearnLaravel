<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
    <div class="space-y-4">

    @foreach ($jobs as $job)
        <a href="/jobs/{{ $job->id }}" class='block px-4 py-6 text-red-100 rounded-lg'>
            <div class="font-bold text-blue-500 text-sm">
                {{ $job->employer->name }}
            </div>
            <div>
                <strong>Position:</strong> {{ $job->title }}, <strong>Salary:</strong> ${{ number_format($job->salary) }}
            </div>
        </a> 
    @endforeach

        <div>
            {{ $jobs->links() }}
        </div>

    </div>



</x-layout>