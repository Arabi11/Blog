@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            {{ $post->title }}
        </h1>
    </div>
</div>

<div class="w-4/5 m-auto text-left">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
    </div>

    <div>@foreach($post->comments as $comment)
        <div>
            <div class="w-4/5 m-auto text-left">
            <div><span class="font-bold text-2xl">{{$comment->user->name}}</span><hr>
            </div><br>
                <h4 class="media-heading user_name">{{$comment->body}}</h4>
            </div><br>
        </div>
    </div>
    @endforeach
    <form method="post" action="{{ url('/comment/store') }}">
        @csrf
        <div class="w-4/5 m-auto text-left"><br><hr>
            <textarea class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none" name="body"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
        </div>
        <div class="w-4/5 m-auto text-left">
            <input type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" value="Add Comment" />
        </div>





@endsection