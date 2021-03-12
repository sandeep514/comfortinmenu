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
                                <ul class="producttype">
                                    <li>
                                       <label>
                                            <input type="checkbox" name="categorytype[]" class="form-control form-control-user" value="1">
                                            <span style="line-height: 2;margin-left: 9px">Veg</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="categorytype[]" class="form-control form-control-user" value="2"><span style="line-height: 2;margin-left: 9px">Non-Veg</span>
                                        </label>
                                    </li>
                                </ul>
                                @if( $errors->has('categorytype') )
                                    <span class="validationerror"> The Type field is required.</span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="categoryname" id="exampleLastName" placeholder="Category">
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
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
</html>