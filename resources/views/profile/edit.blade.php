@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile Edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Enter your name" required value="{{ $user->name }}">
                        </div>
        
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" required value="{{ $user->phone }}">
                        </div>
        
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email" required value="{{ $user->email }}">
                        </div>
        
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password">
                        </div>
        
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="photo">Photo:</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo"
                                        accept="image/*">
                                </div>
                                <div class="col">
                                    <div class="mt-4">
                                    @if ($user->photo)
                                        <img src="{{ asset('storage/' . $user->photo) }}" alt="User Avatar"
                                            style="width: 100px; height: 100px; border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('avatar.png') }}" alt="Default Avatar"
                                            style="width: 50px; height: 50px; border-radius: 50%;">
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
