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
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
            </div>
            <div class="col-4">
                <label>
                   Email
                </label>
                <input name="email" class="form-control" type="email" value="{{ old('email') }}">
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                   Role
                </label>
                <select name="role" id=""  class="form-control" >
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Profile Picture
                </label>
                <input name="avatar" class="form-control" type="file" accept="image/*">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Password
                </label>
                <input name="password" class="form-control" type="password" value="{{ old('password') }}">
            </div>
            <div class="col-4">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    Retype Password
                </label>
                <input name="password_confirmation" class="form-control" type="password" value="{{ old('password_confirmation') }}">
            </div>
        </div>
        <br>
        <button type="submit"  class="btn btn-success" >Submit</button>
    </form>
@endsection
