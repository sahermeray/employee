@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>
    <div class="card">

        <div class="card-header">
            Edit Country
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('countries.update',$country->id) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$country->name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('code') }}</label>

                    <div class="col-md-6">
                        <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{$country->country_code}}" required>

                        @error('country_code')
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


                        <a href="{{route('countries.index')}}"  class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection