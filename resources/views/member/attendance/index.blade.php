@extends('layouts.master')

@section('content')
    <form action="{{route('attendances.store')}}" method="POST">
        @csrf
        <input type="hidden" value="present" name="status">
        <div>
            <button type="submit">Give Present</button>
        </div>
    </form>
    Attendance Index From Member
@endsection
