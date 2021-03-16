<!DOCTYPE html> 
<html lang="en"> 

<head> 

	<!-- Required meta tags -->
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, 
			initial-scale=1, shrink-to-fit=no"> 

	<link rel="stylesheet" href="index.css"> 
    <link rel="stylesheet" href="{{ asset('menu-assets/style.css') }}"> 

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity= 
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
		crossorigin="anonymous"> 

	<title>Digital Menu</title> 
  <style type="text/css">
    .btn{
    border-radius: 40px;
    padding-right: 45px;
    padding-left: 45px;
    padding-top: 10px;
    padding-bottom: 10px;
    font-size: 15px;
    font-weight: 600;
    }
    .centered {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.btn-success{
    background-color: #00ad29;
}
.btn-danger {
    background-color: #d20013;
}
  </style>
</head> 

<body>

<div id="mainDemo" class="centered">
    <div class="imageWrapper" style="margin-bottom: 25%;" align="center">
        <img src="{{ asset('menu-assets/logo.png') }}">
    </div>
    
    <div class="buttons" style="margin-bottom: 5%;" align="center">
        <a href="{{ route('get.product.data' , 'veg') }}" class="btn btn-success" id="vegitrian">Vegetarian</a>
    </div>

    <div align="center">
        <a href="{{ route('get.product.data' , 'nonveg') }}" class="btn btn-danger" id="nonVegitrian" style="padding: 10px 30px;">Non Vegetarian</a>    
    </div>

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

</body> 

</html> 
