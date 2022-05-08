@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="card">
        <div class="card-header">
            Edit Employee
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('employees.update',$employee->id)}}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{$employee->first_name}}" required autocomplete="name" autofocus>

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
                        <input id="last_name" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{$employee->last_name}}" required autocomplete="name" autofocus>

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
                        <select class="form-control @error('country_id') is-invalid @enderror" aria-label="Default select example" id="country_id" name="country_id">
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


                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('state') }}</label>

                    <div class="col-md-6">
                        <select class="form-control @error('state_id') is-invalid @enderror" aria-label="Default select example" id="state_id" name="state_id">
                            <option value="" selected>select state</option>
                        </select>

                        @error('state_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('city') }}</label>

                    <div class="col-md-6">
                        <select class="form-control @error('city_id') is-invalid @enderror" aria-label="Default select example" id="city_id" name="city_id">
                            <option value="" selected>select city</option>
                        </select>

                        @error('city_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('department') }}</label>

                    <div class="col-md-6">
                        <select class="form-control @error('department_id') is-invalid @enderror" aria-label="Default select example" id="department_id" name="department_id">
                            <option value="" selected>select department</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>

                        @error('department_id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Update Employee') }}
                        </button>


                        <a href="{{route('employees.index')}}"  class="btn btn-primary">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#country_id").change(function(){
                $('#state_id').find('option').remove().end();
                $.ajax({
                    url: '/get_states',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, message:$("#country_id").val()},
                    dataType: 'JSON',
                    success: function (data) {
                        $('#state_id').append(new Option("select state",""));
                        for(state of data.states) {
                            $('#state_id').append(new Option(state['name'],state['id']));
                        }
                    }
                });
            });

            $("#state_id").change(function(){
                $('#city_id').find('option').remove().end();
                $.ajax({
                    url: '/get_cities',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN, message:$("#state_id").val()},
                    dataType: 'JSON',
                    success: function (data) {
                        $('#city_id').append(new Option("select city",""));
                        for(city of data.cities) {
                            $('#city_id').append(new Option(city['name'],city['id']));
                        }
                    }
                });
            });
        });

    </script>
@endsection