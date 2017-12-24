@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="post" action="{{url('/posts/'.$post->id)}}" enctype="multipart/form-data">
    	{{csrf_field()}}
    	<input name="_method" type="hidden" value="PUT">
		<div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
		</div>
		<div class="form-group">
		    <label for="article-ckeditor">Post Body</label>
		    <textarea id="article-ckeditor" name="body">{!! $post->body !!}</textarea>
		</div>
		<div class="form-group">
		    <input type="file" name="cover_image" onchange="readURL(this)">
		    <img class="rounded" src="{{ url('/storage/cover_images/'.$post->cover_image) }}" id="cover_image">
		</div>
		<button type="submit" class="btn btn-primary">Save Changes</button>
	</form>
@endsection