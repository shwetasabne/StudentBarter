<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}" />

	    <title>Student Barter</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="/../css/bootstrap.min.css" type="text/css">

	    <!-- Custom Fonts -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" href="/../font-awesome/css/font-awesome.min.css" type="text/css">

	    <!-- Plugin CSS -->
	    <link rel="stylesheet" href="/../css/animate.min.css" type="text/css">

	    <!-- Custom CSS -->
	    <link rel="stylesheet" href="/../css/creative.css" type="text/css">

	<!-- Chosen jQuery -->
	<script src="/../js/jquery.js" type="text/javascript"></script>
	<script src="/../chosen/chosen.jquery.js"></script>
	<link rel="stylesheet" href="/../chosen/chosen.css" type="text/css">
	
	<!-- <script src="./../../public/js/jquery.1.11.2.min.js" type="text/javascript"/> -->
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".chosen").data("placeholder","Select Options...").chosen();
		});
	</script>

	</head>
	<body>

		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top affix">
	        <div class="container-fluid">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
	                    <li>
	                        <a href="#about">About</a>
	                    </li>
	                    <li>
	                        <a href="#services">Services</a>
	                    </li>
	                    <li>
	                        <a href="#portfolio">Portfolio</a>
	                    </li>
	                    <li>
	                        <a href="#contact">Contact</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container-fluid -->
	    </nav>


	    <h1>Create Post</h1>

		@if (count($errors) > 0)
    		<div class="alert alert-danger">
    		<strong>Whoops!</strong> Errors in your input !!<br><br>
        	<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    		</div>
		@endif


	    <section id="productinfo">

	    	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-2">
	    			</div>
	    			<div class="col-lg-8">
	    				<h2 class="section-heading" style="text-align: center;">Product Info</h2>
	    				<div class="well well-lg">
	    					<form id="createForm" role="form" method="POST" action="/product" class="form-horizontal">
	    						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    						<div class="form-group">
	    							<div class="col-lg-6 ">
      								<label for="title" style="text-align: left;">Title</label>
      								<input type="text" class="form-control" id="title" name="title" maxlength="20" placeholder="20 Characters">
    								</div>
	    						</div>
	    						<div class="form-group">
    							<div class="col-lg-6">
        							<label for="description" style="text-align: left;">Description</label>
      								<textarea class="form-control" id="description" name="description" maxlength="100" name="description" rows="4" placeholder="100 Characters"></textarea>
      							</div>
      							</div>
      							<div class="form-group">
    							<div class="col-lg-6">
        							<label for="category" style="text-align: left;">Category</label>
        							<select name="category" class="chosen" multiple="true" style="/*width:400px;*/">
        								<option></option>
        								<option>Books</option>
        								<option>Clothes</option>
        								<option>Electronics</option>
        								<option>Furniture</option>
        								<option>Office Products</option>
        							</select>
      							</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-6">
      									<label for="transport" style="text-align: left;">Transport</label>
      									<!-- <div class="well well-lg"> -->
      									<div class="container">
      										<div class="row">
      											<div style="text-align:left" class="col-lg-2">
	      											<div class="checkbox">
	      											<label><input type="checkbox" id="delivery" name="delivery">Delivery</label>
	      											</div>	
      											</div>
      											<div style="text-align:left" class="col-lg-2">
	      											<div class="checkbox">
	      											<label><input type="checkbox" id="pickup" name="pickup">Pickup</label>
	      											</div>
      											</div>      										
      										</div>
      									</div>
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-6">
      									<label for="pricing" style="text-align: left;">Pricing</label>
      									<!-- <div class="well well-lg"> -->
      									<div class="container">
      										<div class="row">
      											<div style="text-align:left" class="col-lg-2">
	      											<div class="checkbox">
	      											<label><input type="checkbox" id="free" name="free">Free</label>
	      											</div>	
      											</div>
      										</div>
      										
      										<div class="row" style = "padding-top:10px;">
      											<div style="text-align:left" class="col-lg-1">
	      											<p style="text-align: left;">Price</p>
	      										</div>
	      										<div style="text-align:left;" class="col-lg-2">
      												<input type="number" class="form-control" min="1" id="price" name="price" disabled="false">
      											</div>      										
      										</div>
      									</div>			
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-6">
      									<label for="images" style="text-align: left;">Images</label>
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-6">
      									<label for="keywords" style="text-align: left;">Keywords</label>
      									<input type="text" class="form-control" id="keywords" name="keywords" placeholder="Maximum 5 keywords">
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-6" align="center">
      									<button id="Clear" type="button" style="padding-left:10px;">Clear</button>
      									<button id="Preview" type="button" style="padding-left:10px;">Preview</button>
      									<button id="Submit" type="submit" style="padding-left:10px;">Submit</button>
      								</div>
      							</div>
	    					</form>	
	    				</div>
	    			</div>
	    			<div class="col-lg-2">
	    			</div>
	    		</div>
	    	</div>
	    </section>

		<hr class="light">
		<footer>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <ul class="list-inline">
	                        <li>
	                            <a href="#">Home</a>
	                        </li>
	                        <li class="footer-menu-divider">&sdot;</li>
	                        <li>
	                            <a href="#about">About</a>
	                        </li>
	                        <li class="footer-menu-divider">&sdot;</li>
	                        <li>
	                            <a href="#services">Services</a>
	                        </li>
	                        <li class="footer-menu-divider">&sdot;</li>
	                        <li>
	                            <a href="#contact">Contact</a>
	                        </li>
	                        <li data-color='#3b5998' class="social-icon li-right">
	                            <i class="fa fa-facebook-official fa-2x"></i>
	                        </li>
	                        <li data-color='#55acee' class="social-icon li-right">
	                            <i class="fa fa-twitter fa-2x"></i>
	                        </li>
	                        <li data-color='#0077b5' class="social-icon li-right">
	                            <i class="fa fa-linkedin fa-2x"></i>
	                        </li>                      
	                    </ul>
	                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
	                </div>
	            </div>
	        </div>
	    </footer>
	</body>

	<script type="text/javascript">
		$('#Submit').on('click', function(){
			$('#createForm').Submit();
		});

		$('#free').on('change', function(){
			if($('#free').is(":checked"))
			{
				//document.getElementById('price').disabled = "true";
				//$('#price').disabled("true");
			}else{
				document.getElementById('price').disabled = "false";
			}
		});

		// clear the data on the form on form load
		jQuery(document).ready(function(){
			document.getElementById('createForm').reset();
			document.getElementById('price').disabled = "false";	
		});

		// clear the data on the form 
		$("#Clear").on('click', function(){
			document.getElementById('createForm').reset();
			document.getElementById('price').setAttribute('disabled',false);
		});
	</script>
</html>	    
