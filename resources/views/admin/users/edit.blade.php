@extends('layouts.master')

@section('content')
    <h1>User Create Page</h1>
    <form action="{{route('users.update', encrypt($user->id))}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Name
                </label>
                <input name="name" class="form-control" type="text" value="{{ old('name', $user->name) }}">
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Email
                </label>
                <input name="email" class="form-control" type="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Role
                </label>
                <select name="role" id="">
                    <option value="admin" {{ $user->role === 'admin'? 'selected':'' }}>Admin</option>
                    <option value="member" {{ $user->role === 'member'? 'selected':'' }}>Member</option>
                </select>
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
