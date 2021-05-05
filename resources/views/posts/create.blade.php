@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row pt-5">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Create Post</h1>
                </div>
                
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">
                    Post Caption</label>

                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" value="{{ old('caption') }}"  autocomplete="" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">
                    Post image</label>

                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                        <strong style="color: red">{{ $message }}</strong>
                    @enderror

                </div>
                <div class="row pt-3">
                    <button class="btn btn-primary">Add New Post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
