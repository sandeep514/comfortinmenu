<!DOCTYPE html> 
<html lang="en"> 

<head> 

	<!-- Required meta tags -->
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, 
			initial-scale=1, shrink-to-fit=no"> 

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity= 
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
		crossorigin="anonymous"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="{{ asset('menu-assets/style.css') }}"> 
  <title>Digital Menu</title> 
</head> 

<body>

<div id="nonVegitrianMenu">

    @if($category->count() > 0)
        <h4 class="row alert {{ ($category[0]->type == 1)? 'alert-success' : 'alert-danger' }}">
            <a href="{{ route('menu.home') }}" class="pl-3"><i class="fa fa-angle-left text-light" style="font-size:28px;"></i></a>      
            <div class="col text-center">
                {{ ($category[0]->type == 1)? 'Vegetarian' : 'Non Vegetarian' }}
             </div>
        </h4>
        <div id="accordion">
            @foreach( $category as $key => $value )
                @if( $value->getCuisine->count() > 0 )
                    @foreach( $value->getCuisine as $k => $v )
                        <div class="card shadow">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0 text-center">
                              <button class="btn " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <strong class="productCategoryName">{{ $v->name }}</strong>
                              </button>
                            </h5>
                          </div>

                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              <ul class="list-group">
                                @foreach( $v->getBelongedProduct as $productKey => $products )
                                    <li class="list-group-item shadow">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <h5 class="productName">{{ $products->productName }}</h5>
                                            <p>{{ $products->productDesc }}</p>
                                          </div>
                                          <div class="col-md-6">
                                            <hr class="hidden-md-3">
                                            <div class="row">
                                              <div class="col">
                                                @for( $i = 1 ; $i <= $products->productRating; $i++ )
                                                    <i class="fa fa-star text-warning" style="font-size:20px;"></i>
                                                @endfor
                                             </div>
                                              <div class="col" align="right">
                                                <b class="productPrice">&#8377;{{ $products->productPrice }}</b>
                                              </div>
                                            </div>


                                          </div>
                                        </div>
                                    </li>
                                @endforeach

                              </ul>
                            </div>
                          </div>
                        </div>
                    @endforeach
                @else
                    <p style="margin-top: 10px;text-align: center;font-size: 20px;font-weight: 600;">No Data available</p>
                    @php
                        return false;
                    @endphp
                @endif
            @endforeach
        </div>
    @else
        <p>No Menu Available</p>
    @endif

</div>




	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity= 
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"> 
	</script> 
	
	<script src= 
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity= 
"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"> 
	</script> 
	
	<script src= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity= 
"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"> 
	</script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body> 

</html> 
