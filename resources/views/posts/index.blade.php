@extends('layouts.app')

@section('content')
	<div class="card mb-5">
		<div class="card-body">
			<p class="h3 d-inline-block">Posts</p>
			@if (Auth::user())
			    <a class="btn btn-primary float-right" href="{{url('/posts/create')}}">Create Post</a>
			@endif
		</div>
	</div>
    @if (count($posts) > 0)
	    @foreach ($posts as $post)
		    <div class="card mb-3">
			  <div class="card-header">
			    <a href="{{url('/posts/'.$post->id)}}">{{$post->title}}</a>
			    <p><small><strong>Written on : </strong>{{$post->created_at}} <strong>by</strong> {{$post->user->name}}</small></p>
			  </div>
			  <div class="card-body">
			  	<div class="row">
				  	<div class="col-md-3 col-sm-3">
				  		<img style="width:100%" src="{{ url('/storage/cover_images/'.$post->cover_image) }}">
				  	</div>
				  	<div class="col-md-9 col-sm-9">
				  		<p class="card-text">{!!$post->body!!}</p>
				  	</div>
				</div>
			  </div>
			</div>
		@endforeach
		{{$posts->links()}}
	@else
		<p>No Posts found.</p>
	@endif
@endsection