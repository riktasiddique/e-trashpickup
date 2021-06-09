@extends('layouts.app')
@section('title','Show')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-user"></i><strong class="card-title pl-2">Post# {{$post->id}}</strong>
            </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <h5 class="text-sm-center mt-2 mb-1"><img src="{{url($post->image1)}}" alt="" height="100"></h5>
                        <h5 class="text-sm-center mt-2 mb-1"><img src="{{url($post->image2)}}" alt="" height="100"></h5>
                        <h5 class="text-sm-center mt-2 mb-1"><img src="{{url($post->image3)}}" alt="" height="100"></h5>
                        <h5 class="text-sm-center mt-2 mb-1">Name: {{$post->creator->name}}</h5>
                        <h5 class="text-sm-center mt-2 mb-1">Product Title: {{$post->title}}</h5>
                        <h5 class="text-sm-center mt-2 mb-1">Description: {{$post->description}}</h5>
                        <h5 class="text-sm-center mt-2 mb-1">Weight: {{$post->weight}}</h5>
                        <h5 class="text-sm-center mt-2 mb-1">Price: {{$post->price}}</h5>
                        <h5 class="text-sm-center mt-2 mb-1">Time: {{$post->created_at}} ({{$post->created_at->diffForHumans()}})</h5>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                        <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                        <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                        <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                    </div>
                </div>
        </div>
    </div>
</div>
    
@endsection