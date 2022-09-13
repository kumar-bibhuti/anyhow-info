@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:white;">
                        <h1 class="card-title">Edit User</h1>
                        <a href="{{route('user.index')}}" class="btn btn-primary btn-sm ">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            @if(isset($users->id))
                            <form action="{{route('user.update',$users->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @else
                                <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                                    @endif

                                    @csrf
                                    <div class="form-group row">
                                        <div
                                            class="form-group col-12 col-sm-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name">User Name</label>
                                            <input id="name" @if(isset($users->name)) value="{{ $users->name }}"
                                            @endif class="form-control form-control-sm" type="text" name="name"
                                            placeholder="user name">
                                            @if($errors->has('name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="email">Email</label>
                                            <input id="email" @if(isset($users->email))
                                            value="{{ $users->email }}"
                                            @endif class="form-control form-control-sm" type="text" name="email"
                                            placeholder="Email">
                                            @if($errors->has('email'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('email') }}
                                            </em>
                                            @endif
                                        </div>


                                        <div
                                            class="form-group col-12 col-sm-6 {{ $errors->has('role') ? 'has-error' : '' }}">
                                            <label for="role">Assign Role</label>
                                            <select class="form-control" name="role">
                                                <option @if(isset($users)) {{($users->role == '0') ? 'selected': ''}}
                                                    @endif value="0">
                                                    User</option>
                                                <option @if(isset($users)) {{($users->role == '1') ? 'selected': ''}}
                                                    @endif value="1">Store Manager</option>
                                                <option @if(isset($users)) {{($users->role == '2') ? 'selected': ''}}
                                                    @endif value="2">Deapartment Manager</option>
                                            </select>
                                        </div>


                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection