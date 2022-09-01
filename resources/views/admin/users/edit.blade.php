@extends('layouts.master')

@section('content')
    <h1>User Create Page</h1>
    <form action="{{route('users.update', encrypt($user->id))}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4">
                <label class="form-control">
                    Name
                </label>
                <input name="name" class="form-control" type="text" value="{{ old('name', $user->name) }}">
            </div>
            <div class="col-4">
                <label class="form-control">
                    Email
                </label>
                <input name="email" class="form-control" type="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="col-4">
                <label class="form-control">
                    Role
                </label>
                <select name="role" id="" class="form-control">
                    <option value="admin" {{ $user->role === 'admin'? 'selected':'' }}>Admin</option>
                    <option value="member" {{ $user->role === 'member'? 'selected':'' }}>Member</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Current Profile Picture:
                </label>
                @if(!$user->avatar)
                    No Picture Found
                @else
                <img
                    src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('user/avatar/'.$user->avatar) }}"
                    alt="{{ $user->name }}" style="width: 100px; height: 100px; border-radius: 5%">
                @endif
            </div>
            <div class="col-12">
                <label for="">Change Picture</label>
                <input type="file" accept="image/*" name="avatar">
            </div>
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
