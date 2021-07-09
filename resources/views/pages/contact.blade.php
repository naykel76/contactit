@extends('gotime::layouts.' . config('naykel.template'))

@section('content')

<div class="container py-3">
    <div class="col-md-50 max">
        <h1>{{ $title }}</h1>

        <x-contactit-contact>
            {{-- remove top margin if adding $slot content --}}
        </x-contactit-contact>
    </div>
</div>

@endsection
