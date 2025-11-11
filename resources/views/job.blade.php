<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['position'] }}</h2>
    <p>
        This job will pay: ${{ number_format($job['salary']) }}
    </p>
</x-layout>