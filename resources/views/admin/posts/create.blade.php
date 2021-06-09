@extends('layouts.app')
@section('title','Posts')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Create New Post</strong>
                            <!-- {{session()->get('success')}} -->
        </div>
        <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">New Post</h3>
                                        </div>
                                        <hr>
                                        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="image_1" class="control-label mb-1">Image 1</label>
                                                            <input id="image_1" name="image_1" type="file" class="form-control image_1" value="">
                                                            <span class="help-block" data-valmsg-for="image_1" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="image_2" class="control-label mb-1">Image 2</label>
                                                            <input id="image_2" name="image_2" type="file" class="form-control image_2" value="">
                                                            <span class="help-block" data-valmsg-for="image_2" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="image_3" class="control-label mb-1">Image 3</label>
                                                            <input id="image_3" name="image_3" type="file" class="form-control image_3" value="">
                                                            <span class="help-block" data-valmsg-for="image_3" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="title" class="control-label mb-1">Title</label>
                                                <input id="title" name="title" type="text" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="descreption" class="control-label mb-1">Descreption</label>
                                                <textarea name="description" type="text" id="description" rows="9" class="form-control"></textarea>
                                            </div>
                                            <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="weight" class="control-label mb-1">Weight</label>
                                                            <input id="weight" name="weight" type="text" class="form-control weight" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="price" class="control-label mb-1">Price</label>
                                                            <input id="price" name="price" type="number" class="form-control price" value="">
                                                        </div>
                                                    </div>
                                            </div>
                                            <!-- kjretretjktrjtjth -->
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-save fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Save</span>
                                                   
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>           
    </div>
@endsection