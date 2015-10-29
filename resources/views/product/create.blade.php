<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

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

		<style>
			/*body{
	    		background-color: #525252;
			}*/

			.centered-form{
	    		margin-top: 60px;
			}

			.centered-form .panel{
	    		background: rgba(255, 255, 255, 0.8);
	    		box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
			}


			/* Basic Style */
			.form-group {
	    		position: relative;   
			}

			.form-group [data-toggle="floatLabel"] {
	    		height: 44px;
	    		padding-top: 16px;
			}

			.form-group [data-toggle="floatLabel"] + label {
	    		font-size: 12px;
	    		left: 12px;
	    		opacity: 1;
	    		position: absolute;
	    		top: 3px;
	    		transition: all 0.3s ease-in-out;
			}

			.form-group [data-toggle="floatLabel"]:required + label {
	    		color: rgb(255, 0, 0);
			}

			/* Custom Styles */

			.form-group.form-group-textarea {
	    		background-color: rgb(255, 255, 255);
	    		border-radius: 1px;
	    		box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
	    		margin: 20px 15px ;
	    		padding: 10px 0px 2px;
	    		position: relative;
			}

			.form-group.form-group-textarea textarea {
	    		height: 34px;
	    		resize: none;
			}

			.form-group.form-group-textarea label {
	    		color: rgb(160, 160, 160);
	    		font-family: 'Roboto', sans-serif;
	    		font-size: 12px;
	    		font-weight: 500;
			}

			.form-group.form-group-textarea .form-control {
	    		border-radius: 0px;
	    		border-width: 0px;
	    		box-shadow: none;
			}

			.form-group.form-group-textarea [data-toggle="floatLabel"] + label {
	    		top: 5px;
			}

			/* Positioning */

			.form-group [data-toggle="floatLabel"][data-value=""] {
	    		padding-top: 6px;
			}

			.form-group [data-toggle="floatLabel"][data-value=""] + label {
	    		opacity: 0;
	    		top: 18px;
			}
	</style>


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

	    <section id="productinfo">

	    	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-1">
	    			</div>
	    			<div class="col-lg-10">
	    				<h2 class="section-heading" style="text-align: center;">Product Info</h2>
	    				<div class="well well-lg">
	    					<form class="form-horizontal">
	    						<div class="form-group">
	    							<div class="col-lg-3 ">
      								<label for="title" style="text-align: left;">Title</label>
      								<input type="text" class="form-control" id="title" placeholder="20 Characters">
    								</div>
	    						</div>
	    						<div class="form-group">
    							<div class="col-lg-5">
        							<label for="description" style="text-align: left;">Description</label>
      								<textarea class="form-control" id="description" name="description" rows="4" placeholder="100 Characters"></textarea>
      							</div>
      							</div>
      							<div class="form-group">
    							<div class="col-lg-5">
        							<label for="category" style="text-align: left;">Category</label>
        							<div class="well well-lg">
        							</div>
      							</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-5">
      									<label for="transport" style="text-align: left;">Transport</label>
      									<!-- <div class="well well-lg"> -->
      									<div class="container">
      										<div class="row">
      											<div style="text-align:left" class="col-lg-2">
	      											<div class="checkbox">
	      											<label><input type="checkbox" id="delivery">Delivery</label>
	      											</div>	
      											</div>
      											<div style="text-align:left" class="col-lg-2">
	      											<div class="checkbox">
	      											<label><input type="checkbox" id="delivery">Pickup</label>
	      											</div>
      											</div>      										
      										</div>
      									</div>
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-5">
      									<label for="pricing" style="text-align: left;">Pricing</label>
      									<!-- <div class="well well-lg"> -->
      									<div class="container">
      										<div class="row">
      											<div style="text-align:left" class="col-lg-2">
	      											<div class="checkbox">
	      											<label><input type="checkbox" id="free">Free</label>
	      											</div>	
      											</div>
      										</div>
      										<div class="row" style = "padding-top:10px;">
      											<div style="text-align:left" class="col-lg-1">
	      											<p style="text-align: left;">Price</p>
	      										</div>
	      										<div style="text-align:left;" class="col-lg-2">
      												<input type="number" class="form-control" min="1" id="price" name="price">
      											</div>      										
      										</div>
      									</div>			
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-10">
      									<label for="images" style="text-align: left;">Images</label>
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="col-lg-10">
      									<label for="keywords" style="text-align: left;">Keywords</label>
      								</div>
      								<div class="col-lg-8">
      									<input type="text" class="form-control" id="keywords" name="keywords" placeholder="Maximum 5 keywords">
      								</div>
      							</div>
      							<div class="form-group">
      								
      							</div>
	    					</form>	
	    				</div>
	    			</div>
	    			<div class="col-lg-1">
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
	<script src="./../../public/js/jquery.1.11.2.min.js" type="text/javascript"/>
	<script>
	$('#description').characterCounter(200);
	</script>
</html>	    