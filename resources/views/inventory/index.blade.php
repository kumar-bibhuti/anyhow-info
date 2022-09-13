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
                    <h4 class="card-title">Inventory Listing</h4>
                    <a href="{{route('inventory.create')}}" class="btn btn-primary btn-sm ">Add New</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Vendor</th>
                                    <th>Mrp</th>
                                    <th>Batch No</th>
                                    <th>Batch Date</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventory as $row)
                                <tr>
                                    <td>{{$row->p_id}}</td>
                                    <td>{{$row->p_name}}</td>
                                    <td>{{$row->vendor}}</td>
                                    <td>{{$row->mrp}}</td>
                                    <td>{{$row->batch_no}}</td>
                                    <td>{{$row->batch_date}}</td>
                                    <td>{{$row->qty}}</td>
                                    <td>@if($row->status == 0)
                                        Pending
                                        @else($row->status == 1)
                                        Approved
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('inventory.edit',$row->id)}}" style="margin-right: 20px;"
                                                class="btn btn-primary btn-lg active">Edit</a>

                                            <form action="{{ route('inventory.delete', $row->id) }}" method="POST"
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