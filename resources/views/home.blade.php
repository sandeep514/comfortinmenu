@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Type </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Veg / Non-Veg</div>
                            </div>
                           <!--  <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-xl-3 col-md-6 mb-4 categoryclick" >
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-xs " id="categorybutton" data-toggle="modal" data-target="#category" style="display: none;">Open Modal</button>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Category</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Starter / Main course</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4 cuisineclick">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <button type="button" class="btn btn-info btn-xs " id="cuisinebutton" data-toggle="modal" data-target="#cuisine" style="display: none;">Open Modal</button>
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cuisine
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Burger / Pizza</div>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Dishes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">19</div>
                            </div>
                            <div class="col-auto">
                                <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.categoryclick').click(function(){
                document.getElementById('categorybutton').click();
            });
            $('.cuisineclick').click(function(){
                document.getElementById('cuisinebutton').click();
            });
        });
    </script>
@endsection