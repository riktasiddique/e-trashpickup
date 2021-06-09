@extends('layouts.app')
@section('title','Posts')
@section('content')
    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Posts</strong>
                            <!-- {{session()->get('success')}} -->
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Created_At</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    @forelse($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->id}}</th>
                                        <!-- <td>{{$post->image1}}</td> -->
                                        <td><img src="{{url($post->image1)}}" alt="" height="100"></td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->created_at}} ({{$post->created_at->diffForHumans()}})</td>
                                        <td>{{$post->creator->name}}</td>
                                        <td>
                                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-secondary">Details</a>
                                        </td>
                                        <!-- <td>
                                            
                                        </td> -->
                                    </tr>
                                     @empty
                                     <tr>
                                        <th colspan="4">no post found</th>
                                     </tr>
                                    @endforelse
                                </thead>
                            </table>
                        </div>
                    </div>
@endsection