@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
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
                    <form method="get" action="{{route('userSearch')}}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" class="form-control mb-2" name="search" id="search" placeholder="find user">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>

                        </div>
                    </form>

                </div>
                <a class="btn btn-success float-right mb-2" href="{{route('users.create')}}">create</a>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">management</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('deleteUser',$user->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection