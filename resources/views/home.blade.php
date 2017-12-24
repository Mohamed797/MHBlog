@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Your Posts</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($posts) > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>Title</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                          <td>{{$post->title}}</td>
                          <td>
                            <button class="btn btn-danger float-right ml-2" data-toggle="modal" data-target="#deleteModal">Delete</button>
                            <form class="float-right" method="post" action="{{url('/posts/'.$post->id)}}" id="deleteForm">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <a class="btn btn-success" href="{{url('/posts/'.$post->id.'/edit')}}">Edit</a>
                            </form>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>You have no posts yet.</h3>
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
