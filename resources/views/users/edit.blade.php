@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
    <div class="card">

        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update',$user->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="username" value="{{$user->username}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{$user->first_name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>




                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Update') }}
                        </button>


                        <a href="{{route('users.index')}}"  class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">

        <div class="card-header">{{ __('Change Password') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('changePassword',$user->id) }}">
                @csrf

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection