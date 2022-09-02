@extends('layouts.master')

@section('content')
    <h3>User : {{ $user->name }}</h3>
    <form action="{{route('users.update', encrypt($user->id))}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-4">
                <label>
                    Name
                </label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name', $user->name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label>
                    Email
                </label>
                <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email', $user->email) }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label>
                    Role
                </label>
                <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
                    <option value="admin" {{ $user->role === 'admin'? 'selected':'' }}>Admin</option>
                    <option value="member" {{ $user->role === 'member'? 'selected':'' }}>Member</option>
                </select>
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label>
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
