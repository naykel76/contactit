@extends('gotime::layouts.' . config('naykel.template'))

@section('content')

    <h1>{{ $title }}</h1>

    <x-contactit-contact>
        {{-- remove top margin if adding $slot content --}}
    </x-contactit-contact>

@endsection
