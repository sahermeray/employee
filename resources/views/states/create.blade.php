@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>
    <div class="card">
        <div class="card-header">
            Add State
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('states.store')}}">
                @csrf


                <div class="row mb-3">
                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('country') }}</label>

                    <div class="col-md-6">
                        <select class="form-control @error('country_id') is-invalid @enderror" aria-label="Default select example" name="country_id">
                            <option value="" selected>select country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                        </select>

                        @error('country_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Add State') }}
                        </button>


                        <a href="{{route('states.index')}}"  class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection