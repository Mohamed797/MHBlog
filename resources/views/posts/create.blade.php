@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form method="post" action="{{url('/posts')}}" enctype="multipart/form-data">
    	{{ csrf_field() }}
		<div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" name="title" id="title">
		</div>
		<div class="form-group">
		    <label for="article-ckeditor">Post Body</label>
		    <textarea class="form-control" id="article-ckeditor" name="body"></textarea>
		</div>

		<div class="form-group">
		    <input type="file" name="cover_image" onchange="readURL(this)">
		    <img class="invisible rounded" src="#" id="cover_image">
		</div>

		<button type="submit" class="btn btn-primary">Create</button>
	</form>
@endsection
