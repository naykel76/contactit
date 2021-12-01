<x-gotime-app-layout layout="{{ config('naykel.template') }}">

    <div class="container py-3">
        <div class="col-md-50 max">
            <h1>{{ $title }}</h1>

            <x-contactit-contact>
                {{-- remove top margin if adding $slot content --}}
            </x-contactit-contact>
        </div>
    </div>

</x-gotime-app-layout>
