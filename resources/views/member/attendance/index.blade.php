@extends('layouts.master')

@section('content')
    @if(auth()->user()->attendances()->whereDate('date',\Carbon\Carbon::now())->first())
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
    {{ auth()->user()->presentToday}}
        <h3>Memo</h3>
@endsection
