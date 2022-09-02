@extends('layouts.master')

@section('content')
    <h1>User Create Page</h1>
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <label>
                   Name
                </label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" >
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label>
                   Email
                </label>
                <input name="email" class="form-control  @error('email') is-invalid @enderror" type="email" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                   Role
                </label>
                <select name="role" id=""  class="form-control  @error('role') is-invalid @enderror" >
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
                @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Profile Picture
                </label>
                <input name="avatar" class="form-control  @error('avatar') is-invalid @enderror" type="file" accept="image/*">
                @error('avatar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Password
                </label>
                <input name="password" class="form-control  @error('password') is-invalid @enderror" type="password" value="{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Retype Password
                </label>
                <input name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" type="password" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <button type="submit"  class="btn btn-success" >Submit</button>
    </form>
@endsection
