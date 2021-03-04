
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-2">
                <div class="card-header">Post [ID: {{$post->id}}]</div>

                <div class="card-body">
                    Post Title: <b>{{$post->title}}</b>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Comment [count: {{$post->comment()->count()}}]</div>

                <div class="card-body">
                    @foreach($post->comment()->get() as $comment)
                        <div class="card mb-2">
                            <b>Comment:</b> 
                            {{$comment->message}}
                            <br><br>
                            <b>By: {{$comment->user->name}}</b> 
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-header">Like [count: {{$post->like()->count()}}]</div>

                <div class="card-body">
                    <ul>
                    @foreach($post->like()->get() as $like)
                        <li class="mb-2">
                            By: {{$like->user->name}}
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
