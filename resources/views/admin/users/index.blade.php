@extends('layouts.master')
@section('content')
    <div class="row mt-2">
        <form action="{{ route('users.index') }}">
            <div class="row">
                <div class="col-8">
                    <select name="month" class="form-control" id="month">
                        <option value="" disabled>Select Month</option>
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
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <br>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add Member</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Profile Picture</th>
            <th scope="col">Name</th>
            <th scope="col">Total Day Present</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('user/avatar/'.$user->avatar) }}"
                        alt="{{ $user->name }}" style="width: 50px; height: 50px; border-radius: 50%">
                </td>
                <td>{{ $user->name }}</td>
                <td>
                    @if($user->attendances_count < 1)
                        <p class="text-danger">{{ $user->attendances_count }}</p>
                    @else
                        <p class="text-success">{{ $user->attendances_count }}</p>
                    @endif
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('users.edit',encrypt($user->id)) }}" class="btn btn-warning">Edit</a>
                        </div>
                        <div class="col-6">
                            <form action="{{ route('users.destroy', encrypt($user->id)) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
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
    {{ $users->links() }}
@endsection
