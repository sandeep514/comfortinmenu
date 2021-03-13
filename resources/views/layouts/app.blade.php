<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    <title>{{ config('app.name', 'Laravel') }}</title>



    <link href="{{asset('admindata/vendor/fontawesome-free/css/all.min.css')}} " rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{asset('admindata/css/sb-admin-2.min.css')}} " rel="stylesheet">
    <link href="{{asset('admindata/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .modal-header{
            padding: 6px 20px;
            background: #1cc88a;
            color: white
        }
        .producttype{
            padding: 0;
            list-style: none;
        }
        .producttype li{
            width: 50%;
            float: left;
            margin-top: 9px
        }
        label{
            width: 90%
        }
        input[type=checkbox]{
            width: 14px;
            float: left;
        }
        input[name=type]{
            float: left;
            width: 17%;
        }
        .validationerror{
            color: red;

        }
        .success{
            background: green;
            border-radius: 10px;
            color: white;
            width: auto;
            position: absolute;
            right: 15px;
            top: 10px !important;
            z-index: 9999;
            box-shadow: 0px 8px 21px 0px green;
        }
        .noliststyle{
            list-style: none;
            display: inline-block;
        }
        .noliststyle li{
            display: inline-block;
        }
        .displaynone{
            display: none;
        }
    </style>
</head>
<body>
    
    
    <div id="category" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('save.new.category') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                @php

                                    $catType = old('categorytype');
                                    if( $catType == null ){
                                        $catType = [];
                                    }   
                                @endphp
                                <ul class="producttype">
                                    <li>
                                       <label>
                                            <input type="checkbox" {{ (in_array( '1' ,$catType )) ? 'checked' : ''  }} name="categorytype[]" class="form-control form-control-user" value="1">
                                            <span style="line-height: 2;margin-left: 9px">Veg</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" {{ (in_array( '2' ,$catType )) ? 'checked' : ''  }} name="categorytype[]" class="form-control form-control-user" value="2"><span style="line-height: 2;margin-left: 9px">Non-Veg</span>
                                        </label>
                                    </li>
                                </ul>
                                @if( $errors->has('categorytype') )
                                    <span class="validationerror"> The Type field is required.</span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="categoryname" value="{{ old('categoryname') }}" id="exampleLastName" placeholder="Category">
                                @if( $errors->has('categoryname') )
                                    <span class="validationerror"> Category is required</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Add new Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="cuisine" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Cuisine</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('save.new.cuisine') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>
                                    <select name="category" class="form-control">
                                        @foreach( App\Models\Category::getActiveCategory() as $k => $v )
                                            <option value="{{ $k }}"> {{ ucfirst($v) }} </option>
                                        @endforeach
                                    </select>
                                </label>
                                @if( $errors->has('category') )
                                    <span class="validationerror"> Category is required.</span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="cuisinename" value="{{ old('cuisinename') }}" id="exampleLastName" placeholder="Category">
                                @if( $errors->has('cuisinename') )
                                    <span class="validationerror"> Cuisine is required</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Add new Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="product" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('save.new.cuisine') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-12 mb-sm-0">
                                <ul class="producttype">
                                    <li>
                                       <label>
                                            <input type="checkbox" name="categorytype" class="form-control form-control-user" value="1">
                                            <span style="line-height: 2;margin-left: 9px">Veg</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="categorytype" class="form-control form-control-user" value="2"><span style="line-height: 2;margin-left: 9px">Non-Veg</span>
                                        </label>
                                    </li>
                                </ul>
                                <span class="type validationerror displaynone" > Please select veg or non-veg first to continue.</span>
                            </div>


                            <div class="col-md-12 categorydiv" style="display: none;">
                                <label>
                                    <select name="category" class="form-control">
                                        <option value="0">Please select Category </option>
                                    </select>
                                </label>
                                    <span class="cat validationerror displaynone"> Category field is required.</span>
                            </div>

                            <div class="col-md-12 cuisine" style="display: none;">
                                <label>
                                    <select name="cuisine" class="form-control">
                                        <option value="0">Please select cuisine </option>
                                    </select>
                                </label>
                                    <span class="cuisine validationerror displaynone"> Cuisine field is required.</span>
                            </div>


                            <div class="col-sm-12 productDetails" style="display: none;">
                                <div>
                                    <label>Product Name</label>
                                    <input type="text" class="form-control form-control-user" name="productname" value="{{ old('productname') }}" id="exampleLastName" placeholder="Product name">
                                    <span class="productname displaynone validationerror">Product Name is Required </span>
                                </div>
                                <div>
                                    <textarea class="form-control form-control-user" name="productdesc" value="{{ old('productdesc') }}" id="exampleLastName" placeholder="Description"></textarea>
                                    <span class="productdesc displaynone validationerror">Product Description is required </span>
                                </div>
                                <div>
                                    <input type="number" class="form-control form-control-user" name="productRating" value="{{ old('productRaiting') }}" id="exampleLastName" placeholder="Product Rating">
                                    <span class="productRaiting displaynone validationerror">Product Rating is required </span>
                                </div>
                                <div>
                                    <input type="number" class="form-control form-control-user" name="productPrice" value="{{ old('productPrice') }}" id="exampleLastName" placeholder="Product Price">
                                    <span class="productPrice displaynone validationerror"> Product Price is required</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-user btn-block checkvalidation">
                            Add new Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="app">
        <main class="">
                 <!-- Page Wrapper -->
            <div id="wrapper">
                @include('components.sidemenu')
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('admindata/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admindata/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admindata/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admindata/js/demo/datatables-demo.js') }}"></script>

    @yield('script')
    @if( $errors->first('categoryname') || $errors->first('categorytype') )
        <script type="text/javascript">
            $(document).ready(function(){
                $('#category').modal('show')
            })
        </script>
    @endif 
    @if( $errors->first('category') || $errors->first('cuisinename') )
        <script type="text/javascript">
            $(document).ready(function(){
                $('#cuisine').modal('show')
            })
        </script>
    @endif

    @if(Session::has('success'))
        <div class="alert success">
            <span>Data save successfully</span>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){
                    $('.success').fadeOut();
                } , 2000)         
            });
        </script>
    @endif

    @if(Session::has('error'))
        <div class="alert error">
            <span>Data save successfully</span>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                setTimeout(function(){
                    $('.error').fadeOut();
                } , 2000)
            });
        </script>
    @endif

    <script type="text/javascript">
        $(document).ready(function(){
            let type = '';
            let category = '';
            let cuisine = '';

            $(document).on('change' , '#product input[name=categorytype]' , function(){
                type = $(this).val();
                $.ajax({
                    url     : 'get/category/by/type/'+type,
                    method  : 'GET',
                    success : function(success){
                        $('.categorydiv').show();
                        if( success.length > 0 ){
                            for (var i = 0;i < success.length; i++) {
                                $('#product select[name=category]').append('<option value="'+success[i].id+'">'+success[i].name+'</option>');
                            }
                        }else{
                            alert('No Category available');
                        }
                    }
                });
            });

            $(document).on('change' , '#product select[name=category]' , function(){
                category = $(this).val();

                $.ajax({
                    url     : 'get/cuisine/by/type/'+category,
                    method  : 'GET',
                    success : function(success){
                        $('.cuisine').show();
                        if( success.length > 0 ){
                            for (var i = 0;i < success.length; i++) {
                                $('#product select[name=cuisine]').append('<option value="'+success[i].id+'">'+success[i].name+'</option>');
                            }
                        }else{
                            alert('No Category available');
                        }
                    }
                });
            });

            $(document).on('change' , '#product select[name=cuisine]' , function(){
                cuisine = $(this).val();
                $('.productDetails').show()
            });

            $('.checkvalidation').click(function(){
                $('#product .validationerror').hide();
                console.log(type);
                console.log(category);
                console.log(cuisine);
                if( type != '' && type != 0){
                    if( category != '' && category != 0){
                        if( cuisine != '' && cuisine != 0){

                            // product details
                            if($('input[name=productname]').val() == ''){
                                $('.productname.validationerror').show();                                
                            }
                            if($('textarea[name=productdesc]').val() == ''){
                                $('.productdesc.validationerror').show();
                            }
                            if($('input[name=productRating]').val() == ''){
                                $('.productRaiting.validationerror').show();
                            }
                            if($('input[name=productPrice]').val() == ''){
                                $('.productPrice.validationerror').show();
                            }
                        }else{
                            $('.cuisine.validationerror').show();
                        }
                    }else{
                        $('.cat.validationerror').show()
                    }
                }else{
                    $('.type.validationerror').show();
                }
            });

       });
    </script>
</html>