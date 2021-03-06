@extends('layouts.admin')

@section('title')
    Posts
@stop

@section('content')
    @if(Session::has('post-c'))
        <p class="alert alert-success">{{session('post-c')}}</p>
    @endif
    @if(Session::has('post-u'))
        <p class="alert alert-success">{{session('post-u')}}</p>
    @endif
    @if(Session::has('deleted-p'))
        <p class="alert alert-danger">{{session('deleted-p')}}</p>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>User</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>

        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="40" src="{{asset('/images/'. ($post->image))}}" alt="{{$post->title}}"></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{!! $post->content !!}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{url('post/'. $post->slug)}}">View Post</a></td>
                    <td><a href="{{url('admin/comments/'. $post->id)}}">View Comment(s)</a></td>
                    <td><a class="btn btn-info" role="button" href="{{url('admin/posts/'. $post->id . '/edit')}}">Edit</a></td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminPostsController@destroy', $post->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
        @endif

        </tbody>
    </table>


        <div class=" text-center " style="position:relative; top: 400px">

            {{$posts->render()}}

        </div>

@stop