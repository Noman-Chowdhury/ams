@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-8">
            <form action="{{ route('users.index') }}">
                <label for="">Filter By Months</label>
                <select name="month" id="">
                    <option
                        value="01" {{ (request()->month ? request()->month== '01' : now()->format('m')) == '01' ? 'selected':'' }}>
                        January
                    </option>
                    <option
                        value="02" {{ (request()->month ? request()->month == '02' : now()->format('m')) == '02' ? 'selected':'' }}>
                        February
                    </option>
                    <option
                        value="03" {{ (request()->month ? request()->month == '03' : now()->format('m') == '03') ? 'selected':'' }}>
                        March
                    </option>
                    <option
                        value="04" {{ (request()->month ? request()->month == '04' : now()->format('m') == '04') ? 'selected':'' }}>
                        April
                    </option>
                    <option
                        value="05" {{( request()->month ? request()->month == '05' : now()->format('m') == '05') ? 'selected':'' }}>
                        May
                    </option>
                    <option
                        value="06" {{ (request()->month ? request()->month == '06' : now()->format('m') == '06') ? 'selected':'' }}>
                        June
                    </option>
                    <option
                        value="07" {{ (request()->month ? request()->month == '07' : now()->format('m') == '07') ? 'selected':'' }}>
                        July
                    </option>
                    <option
                        value="08" {{ (request()->month ? request()->month == '08' : now()->format('m') == '08') ? 'selected':'' }}>
                        August
                    </option>
                    <option
                        value="09" {{( request()->month ? request()->month == '09' : now()->format('m') == '09') ? 'selected':'' }}>
                        September
                    </option>
                    <option
                        value="10" {{ (request()->month ? request()->month == '10' : now()->format('m') == '10') ? 'selected':'' }}>
                        October
                    </option>
                    <option
                        value="11" {{ (request()->month ? request()->month == '11' : now()->format('m') == '11') ? 'selected':'' }}>
                        November
                    </option>
                    <option
                        value="12" {{ (request()->month ? request()->month == '12' : now()->format('m') == '12') ? 'selected':'' }}>
                        December
                    </option>
                </select>
                <button type="submit">Filter</button>
            </form>
        </div>
    </div>
    <a href="{{ route('users.create') }}">Add Member</a>
    <table>
        <thead>
        <tr>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Total Day Present</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('user/avatar/'.$user->avatar) }}"
                        alt="{{ $user->name }}" style="width: 50px; height: 50px; border-radius: 50%">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->attendances_count }}</td>
                <td>
                    <div>
                        <div>
                            <a href="{{ route('users.edit',encrypt($user->id)) }}">Edit</a>
                        </div>
                        <div>
                            <form action="{{ route('users.destroy', encrypt($user->id)) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
