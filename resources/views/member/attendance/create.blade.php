@extends('layouts.master')

@section('content')
    <form action="{{route('attendances.store')}}" method="POST">
        @csrf
        <input type="hidden" value="present">
        <button type="submit">Give Present Today</button>
    </form>
@endsection
