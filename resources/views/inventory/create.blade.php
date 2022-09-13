@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color:white;">
                        <h1 class="card-title"> @if(isset($inventory->id)) Edit Inventory @else Add Inventory @endif
                        </h1>
                        <a href="{{route('inventory.index')}}" class="btn btn-primary btn-sm ">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            @if(isset($inventory->id))
                            <form action="{{route('inventory.update',$inventory->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @else
                                <form action="{{route('inventory.store')}}" method="POST" enctype="multipart/form-data">
                                    @endif

                                    @csrf
                                    <div class="form-group row">
                                        <div
                                            class="form-group col-12 col-sm-6 {{ $errors->has('p_id') ? 'has-error' : '' }}">
                                            <label for="p_id">Product Id</label>
                                            <input id="p_id" @if(isset($inventory->p_id)) value="{{ $inventory->p_id }}"
                                            @endif class="form-control form-control-sm" type="text" name="p_id"
                                            placeholder="Product id">
                                            @if($errors->has('p_id'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('p_id') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="p_name">Product Name</label>
                                            <input id="p_name" @if(isset($inventory->p_name))
                                            value="{{ $inventory->p_name }}"
                                            @endif class="form-control form-control-sm" type="text" name="p_name"
                                            placeholder="Product name">
                                            @if($errors->has('p_name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('p_name') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="vendor">Vendor</label>
                                            <input id="vendor" @if(isset($inventory->vendor))
                                            value="{{ $inventory->vendor }}"
                                            @endif class="form-control form-control-sm" type="text" name="vendor"
                                            placeholder="Vendor">
                                            @if($errors->has('vendor'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('vendor') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="mrp">Mrp</label>
                                            <input id="mrp" @if(isset($inventory->mrp))
                                            value="{{ $inventory->mrp }}"
                                            @endif class="form-control form-control-sm" type="text" name="mrp"
                                            placeholder="Mrp">
                                            @if($errors->has('mrp'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('mrp') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="batch_no">Batch No</label>
                                            <input id="batch_no" @if(isset($inventory->batch_no))
                                            value="{{ $inventory->batch_no }}"
                                            @endif class="form-control form-control-sm" type="text" name="batch_no"
                                            placeholder="Batch No">
                                            @if($errors->has('batch_no'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('batch_no') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="batch_date">Batch Date</label>
                                            <input id="batch_date" @if(isset($inventory->batch_date))
                                            value="{{ $inventory->batch_date }}"
                                            @endif class="form-control form-control-sm" type="date" name="batch_date"
                                            placeholder="Batch Date">
                                            @if($errors->has('batch_date'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('batch_date') }}
                                            </em>
                                            @endif
                                        </div>

                                        <div class="form-group col-12 col-sm-6 mt-1">
                                            <label for="qty">Quantity</label>
                                            <input id="qty" @if(isset($inventory->qty))
                                            value="{{ $inventory->qty }}"
                                            @endif class="form-control form-control-sm" type="text" name="qty"
                                            placeholder="Quantity">
                                            @if($errors->has('qty'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('qty') }}
                                            </em>
                                            @endif
                                        </div>
                                        @if(Auth::user())
                                        @if(Auth::user()->role == 1)
                                        <div
                                            class="form-group col-12 col-sm-6 {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option @if(isset($inventory))
                                                    {{($inventory->status == 0) ? 'selected': ''}} @endif value="0">
                                                    Pending</option>
                                                <option @if(isset($inventory))
                                                    {{($inventory->status == 1) ? 'selected': ''}} @endif value="1">
                                                    Approved</option>
                                            </select>
                                        </div>
                                        @endif
                                        @endif
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