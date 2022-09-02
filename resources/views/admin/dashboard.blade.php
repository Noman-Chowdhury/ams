@extends('layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-4">
            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ \App\Models\User::where('role','admin')->count().' Admin' }}</h5>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ \App\Models\User::where('role','member')->count().' Member' }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection



