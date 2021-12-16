@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>

    <div>@foreach($post->comments as $comment)
        <div class="media">
            <div class="media-body">
            <div>{{$comment->user->name}}
            </div><br>
                <h4 class="media-heading user_name">{{{$comment->body}}}</h4>
            </div><br>
        </div>
    </div>
    @endforeach
    <form method="post" action="{{ url('/comment/store') }}">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="body"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Add Comment" />
        </div>

</div>
</div>


@endsection