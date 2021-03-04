
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Lists</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <div class="mb-3">
                        <a href="/users/create" class="btn btn-primary">Create New User</a>
                    </div>

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <td>OP</td>
                                <td>ID</td>
                                <td>Email</td>
                                <td>Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                                        <form action="/users/{{$user->id}}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
