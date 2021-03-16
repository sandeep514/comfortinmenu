@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <button type="button" class="btn btn-info btn-xs " id="categorybutton" data-toggle="modal" data-target="#cuisine" >Create new</button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    {{-- @dd($cuisine) --}}
                                    @foreach($cuisine as $k => $v)
                                        <tr>
                                            <td>{{ $v->name }}</td>
                                            <td>{{  (is_null($v->getBelongedCategory)) ? "" : $v->getBelongedCategory->name }}</td>
                                            <td>{{ ($v->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td>
                                                <ul class="noliststyle">
                                                    <li>
                                                        <a href="{{ route('cuisine.change.status' , $v->id) }}" class="{{ ($v->status == 1) ? 'btn btn-sm btn-danger' : 'btn btn-sm btn-primary' }}" >{{ ($v->status == 1) ? 'Deactivate' : 'Activate' }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('delete.cuisine' , $v->id) }}" onclick="return confirm('Are you sure ?')" class="btn-sm btn btn-danger">Delete</a>
                                                    </li>
                                                </ul>
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
@endsection