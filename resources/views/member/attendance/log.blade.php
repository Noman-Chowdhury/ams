@extends('layouts.master')

@section('content')

    <h3 class="text-center">{{ \Illuminate\Support\Carbon::parse(\request()->date)->format('Y-m-d') }}</h3>
    @if(auth()->user()->attendances()->whereDate('date', \Illuminate\Support\Carbon::parse(\request()->date)->format('Y-m-d'))->first())
        <p class="text-success">
            You were Present
        </p>
    @else
        <p class="text-danger">
            You were Absent
        </p>
    @endif
@endsection



