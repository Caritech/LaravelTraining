
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Lists</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <td>OP</td>
                                <td>ID</td>
                                <td>Title</td>
                                <td>Comment Count</td>
                                <td>Like Count</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total_like = 0;
                                $total_comment = 0;
                            ?>
                            @foreach($posts as $post)
       
                                <tr>
                                    <td>
                                        <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
                                    </td>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->comment()->count()}}</td>
                                    <td>{{$post->like()->count()}}</td>
                                </tr>
                                <?php
                                    $total_like += $post->like()->count();
                                    $total_comment += $post->comment()->count();
                                ?>
                            @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$total_comment}}</td>
                            <td>{{$total_like}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
