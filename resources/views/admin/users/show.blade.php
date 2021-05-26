@extends('layouts.app')
@section('title','Dashboard')
@section('content')
   <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card# {{$user->id}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="{{asset('admin/images/admin.jpg')}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{$user->name}}</h5>
                                    <h5 class="text-sm-center mt-2 mb-1">{{$user->role->name}}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-envelope"></i>{{$user->email}}</div>
                                </div>
                                <hr>
                                @if($user->isactive)
                                    <a href="{{route('user.change_status', $user->id)}}" class="btn btn-danger">Blocked</a>
                                @else
                                    <a href="{{route('user.change_status', $user->id)}}" class="btn btn-success">Unblock</a>
                                @endif

                                @if(auth()->user()->id != $user->id)
                                <a href="{{route('user.change_status', $user->id)}}" data-toggle="modal" data-target="#changerole" class="btn btn-warning">Change Role</a>
                                @endif
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
    @if(auth()->user()->id != $user->id)
    <!-- Small Modal -->
    <div class="modal fade" id="changerole" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Change Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('user.change_role', $user->id)}}" method="post">
                            @csrf
                                 <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Role</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="role_id" id="select" class="form-control" required>
                                            <option value="">Please select</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}"
                                                @if($role->id == $user->role_id){
                                                    selected
                                                }
                                                @endif
                                            >{{$role->name}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
   </div>
   @endif
@endsection
