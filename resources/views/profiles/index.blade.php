@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 py-4 px-5">
            <img src="{{ $user->profile->blankImage() }}" class="rounded-circle w-100" alt="">
        </div>
        <div class="col-9 pt-5 pl-5">
            <div class="d-flex">
                <div><h1>{{ $user->profile->title }}</h1></div>


                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id}}/edit" class="pl-3">
                        <button class="btn border">Edit Profile</button>
                    </a>
                    <img class="ml-2 pb-3" src="/svg/settings.svg" width="20px" alt="">
                    
                    <a class="col-4 pl-5" href="/p/create">
                        <button class="col-md-9 btn border btn-success">Add New Post</button>
                    </a>
                @endcan

                
                <a class="pl-5">
                    <follow-button user-id = "{{ $user->id}}" follows="{{ $follows }}"></follow-button>
                </a>
                
            </div>


            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-5"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-3"><h4>{{$user->name}}</h4></div>
            <a href="">{{$user->profile->url}}</a>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->image}}" class="w-100" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
