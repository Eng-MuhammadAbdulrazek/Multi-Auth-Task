@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{{ $user->name }}'s Profile</h1>
                    @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="User Avatar"
                        style="width: 100px; height: 100px; border-radius: 50%;">
                    @else
                        <img src="{{ asset('avatar.png') }}" alt="Default Avatar"
                            style="width: 50px; height: 50px; border-radius: 50%;">
                    @endif
                   <br>
                   User Name : {{ $user->name }}
                   <br>
                   User email : {{ $user->email }}
                   <br>
                   User phone : {{ $user->phone }}
                   <br>
                   User photo Link : @if (!empty($user->photo)){
                    <a href="{{ asset('storage/'.$user->photo) }}" target="_blank">click to open</a>
                    } @else 
                       NULL
                   @endif
                   <br>
                   User created at : {{ $user->created_at->diffForHumans()}}
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
