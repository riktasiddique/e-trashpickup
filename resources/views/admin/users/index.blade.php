@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Users</strong>
                            <!-- {{session()->get('success')}} -->
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}} ({{$user->created_at->diffForHumans()}})</td>
                                        <td>
                                        @if($user->isactive)
                                            <a href="{{route('user.change_status', $user->id)}}" class="btn btn-danger">Blocked</a>
                                        @else
                                            <a href="{{route('user.change_status', $user->id)}}" class="btn btn-success">Unblock</a>
                                        @endif
                                        </td>
                                    </tr>
                                     @empty
                                     <tr>
                                        <th colspan="4">no user found</th>
                                     </tr>
                                    @endforelse
                                </thead>
                            </table>
                        </div>
                    </div>
@endsection