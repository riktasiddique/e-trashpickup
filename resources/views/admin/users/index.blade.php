@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}} ({{$user->created_at->diffForHumans()}})</td>
                                    </tr>
                                    @empty
                                     <tr>
                                        <th colspan="4">no user found</th>
                                     </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
@endsection