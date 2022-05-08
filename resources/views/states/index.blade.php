@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>
    <div class="card">
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form method="get" action="{{route('stateSearch')}}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" class="form-control mb-2" name="search" id="search" placeholder="find state">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>

                        </div>
                    </form>

                </div>
                <a class="btn btn-success float-right mb-2" href="{{route('states.create')}}">create</a>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">country</th>
                    <th scope="col">management</th>
                </tr>
                </thead>
                <tbody>
                @foreach($states as $state)
                <tr>
                    <th scope="row">{{$state->id}}</th>
                    <td>{{$state->name}}</td>
                    <td>{{$state->country_name}}</td>
                    <td>
                        <a href="{{route('states.edit',$state->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('deleteState',$state->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection