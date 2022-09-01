@extends('layouts.master')
@section('content')

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
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->avatar }}</td>
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
