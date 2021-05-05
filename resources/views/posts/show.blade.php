@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>
        <div class="col-4">
        	<div>
        		<div class="">
	        		<div class="d-flex align-items-center">
						<a href="/profile/{{$post->user->id}}">
							<img src="{{ $post->user->profile->blankImage() }}" class="w-100 rounded-circle" style="max-width: 64px">
						</a>
	        		</div>

        		</div>

				


				<p class="pt-2 font-weight-bold">
					<a href="/profile/{{$post->user->id}}">
						<span class="text-dark">{{$post->user->name}}</span>
					</a>
				</p>
				<p class="">
					<span class="text-dark">{{$post->caption}}</span>
				</p>



				@can('update', $post->user->profile)
					<a class="" href="/p/{{ $post->id}}/edit">
						<button class="btn border btn-dark">Edit Post</button>
					</a>
				@endcan

        	</div>
        </div>
    </div>
</div>
@endsection
