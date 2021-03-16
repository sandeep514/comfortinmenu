@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <button type="button" class="btn btn-info btn-xs " id="categorybutton" data-toggle="modal" data-target="#product" >Create new</button>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Dishes Description</th>
                                        <th>Dishes Rating</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Cousine</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Dishes Description</th>
                                        <th>Dishes Rating</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Cousine</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($products as $k => $product)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ $product->productName }}</td>
                                            <td>{{ ($product->productDesc) ? $product->productDesc : 'Not Available' }}</td>
                                            <td>{{ $product->productRating }}</td>
                                            <td>
                                                @if($product->cuisine_rel->getBelongedCategory->type == '1')
                                                    <span class="badge badge-success">Vegitarian</span>
                                                @else
                                                    <span class="badge badge-success">Non-Vegitarian</span>
                                                @endif
                                            </td>
                                            <td>{{ $product->productPrice }}</td>
                                            <td>{{ $product->cuisine_rel->getBelongedCategory->name }}</td>
                                            <td>{{ $product->cuisine_rel->name }}</td>
                                            <td>{{ ($product->status == 1) ? 'Active' : 'In Active' }}</td>
                                            <td>
                                                <ul class="noliststyle">
                                                    <li>
                                                        <a href="{{ route('product.change.status' , $product->id) }}" class="{{ ($product->status == 1) ? 'btn btn-sm btn-danger' : 'btn btn-sm btn-primary' }}" >{{ ($product->status == 1) ? 'Deactivate' : 'Activate' }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('delete.product' , $product->id) }}" onclick="return confirm('Are you sure ?')" class="btn-sm btn btn-danger">Delete</a>
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