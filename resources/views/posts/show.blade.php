@extends('layouts.app')

@section('content')
	<a href="{{url('/posts')}}" class="btn btn-secondary mb-3">Go Back</a>
	<div class="card mb-3">
		  <div class="card-header">
		    <h1>{{$post->title}}</h1>
		  </div>
		  <div class="card-body">
			  	<div class="col-md-6 offset-md-3 text-center">
			  		<img class="img-fluid" src="{{ url('/storage/cover_images/'.$post->cover_image) }}">
			  	</div>
			  	<div class="col-md-6 offset-md-3 text-center">
			  		{!! $post->body !!}
			  	</div>
			    <hr>
			    <p><small><strong>Written on : </strong>{{$post->created_at}} <strong>by</strong> {{$post->user->name}}</small></p> 

			    @if (Auth::user() && ($post->user_id == Auth::user()->id))
				    <a class="btn btn-success float-right" href="{{url('/posts/'.$post->id.'/edit')}}">Edit</a>
				    <form method="post" action="{{url('/posts/'.$post->id)}}" id="deleteForm">
				    	{{csrf_field()}}
				    	<input name="_method" type="hidden" value="DELETE">
				    </form>
				    <button class="btn btn-danger float-right mr-2" data-toggle="modal" data-target="#deleteModal">Delete</button>
			    @endif
		  </div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Delete Post</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Are you sure you want to delete post?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection