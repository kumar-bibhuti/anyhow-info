@extends('layouts.app')
@section('content')

<!--************
    Content body start
*************-->
<div class="content-body">
    <div class="container-fluid">
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Listing</h4>
                    <a href="{{route('inventory.index')}}" class="btn btn-primary btn-sm ">User Inventory</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Assigned Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->role == 0)
                                        User
                                        @elseif($user->role == 1)

                                        Store Manager
                                        @else
                                        Department Manager
                                        @endif

                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('user.edit',$user->id)}}" style="margin-right: 20px;"
                                                class="btn btn-primary btn-lg active">Edit</a>

                                            <form action="{{route('user.delete',$user->id)}}" method="POST"
                                                onsubmit="return confirm('{{ trans('Are You Sure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-danger btn-lg active"
                                                    value="Delete">
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!--************
    Content body end
*************-->

@endsection

@section('scripts')

@endsection