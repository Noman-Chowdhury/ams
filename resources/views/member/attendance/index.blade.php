@extends('layouts.master')

@section('content')
    @if(auth()->user()->presentToday)
        You have given your attendance today!
    @else

    <form action="{{route('attendances.store')}}" method="POST">
        @csrf
        <input type="hidden" value="present" name="status">
        <div>
            <button type="submit" class="btn btn-primary">Give Present</button>
        </div>
    </form>
    @endif
    Attendance Index From Member
@endsection
