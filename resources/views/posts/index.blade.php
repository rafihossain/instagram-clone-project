@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)

    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{$post->image}}" class="w-100" alt="">
            </a>
        </div>
    </div>

    <div class="row pt-4 pb-5">
        <div class="col-6 offset-3">
        	<div class="d-flex">
                <p class="pr-2 font-weight-bold">
                    <a href="/profile/{{$post->user->id}}">
                        <span class="text-dark">{{$post->user->name}}</span>
                    </a>
                </p>
                <p class="pr-2 ">
                    <span class="text-dark">{{$post->caption}}</span>
                </p>
        	</div>
        </div>
    </div>
    

    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection