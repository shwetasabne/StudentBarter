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

	    <script src="/../js/jquery.js"></script>
	    <script src="/../js/bootstrap.min.js"></script>
	    
		<script src="/../bootstrap-slider/js/bootstrap-slider.js"></script>

		<!--Gallery CSS and JS -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.4/hammer.min.js"></script>
		<link rel="stylesheet" href="/../css/gallery.css">
		<script src="/../js/gallery.js"></script>

		<style>
           .media
            {
                /*box-shadow:0px 0px 4px -2px #000;*/
                margin: 20px 0;
                padding:30px;
            }
            .dp
            {
                border:10px solid #eee;
                transition: all 0.2s ease-in-out;
            }
            .dp:hover
            {
                border:2px solid #eee;
                transform:rotate(360deg);
                -ms-transform:rotate(360deg);
                -webkit-transform:rotate(360deg);
                /*-webkit-font-smoothing:antialiased;*/
            }
            figcaption.ratings
            {
                color:#f1c40f;
                font-size:15px;
            }
            figcaption.ratings a:hover
            {
                color:#f39c12;
                text-decoration:none;
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
	                <form class="navbar-form navbar-left" role="search">
	                    <div class="input-group">
	                          <div class="input-group-btn">
	                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
	                            <ul class="dropdown-menu">
	                              <li><a href="#">Action</a></li>
	                              <li><a href="#">Another action</a></li>
	                              <li><a href="#">Something else here</a></li>
	                              <li role="separator" class="divider"></li>
	                              <li><a href="#">Separated link</a></li>
	                            </ul>
	                          </div><!-- /btn-group -->
	                          <input type="text" class="input-group-lg" aria-label="...">
	                        </div><!-- /input-group -->
	                </form>
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
	    <section style="padding-top:50px;">

	    	<div class = "container">
	    		<div class="row">
	    			<div class="col-lg-8">
	    				<h2> Product Title</h2>
	    			</div>
	    		</div>
				<div class="row">
					
	                    <div class="col-lg-8">
	                        <!-- Top part of the slider -->
	                        <div class="row">

	                        	<div class="gallery">
	                        		<div class="images">
	                        			<div class="image active">
	                        				<div class="content" style="background-image: url(/../uploads/1.jpg)"></div>
	                        			</div>
	                        			<!--
	                        			<div class="image">
	                        				<div class="content" style="background-image: url(/../uploads/2.png)"></div>
	                        			</div>
	                        			<div class="image">
	                        				<div class="content" style="background-image: url(/../uploads/3.jpg)"></div>
	                        			</div>
	                        			<div class="image">
	                        				<div class="content" style="background-image: url(/../uploads/4.jpg)"></div>
	                        			</div>
	                        			<div class="image">
	                        				<div class="content" style="background-image: url(/../uploads/4.jpg)"></div>
	                        			</div>	
	                        			-->                        			
	                        		</div>
	                        		<!--
	                        		<div class="thumbs">
	                        			<div class="thumb active" style="background-image: url(/../uploads/1.jpg)"></div>
	                        			<div class="thumb active" style="background-image: url(/../uploads/2.png)"></div>
	                        			<div class="thumb active" style="background-image: url(/../uploads/3.jpg)"></div>
	                        			<div class="thumb active" style="background-image: url(/../uploads/4.jpg)"></div>
	                        			<div class="thumb active" style="background-image: url(/../uploads/4.jpg)"></div>
	                        		</div>
	                        		-->
	                        	</div>

	                        </div>
	                    </div>


	                    <div class="col-lg-4">
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">
	                    			<h3 class="panel-title">Overview</h3>
	                    		</div>
	                    		<div class="panel-body">
	                    			<table class="table" style="margin-bottom: 0px;">
	                    				<tr>
	                    					<td>Price</td>
	                    					<td><font color="blue">$120</font></td>
	                    				</tr>
	                    				<tr>
	                    					<td>Delivery</td>
	                    					<td>Yes</td>
	                    				</tr>
	                    				<tr>
	                    					<td>Pick Up</td>
	                    					<td>No</td>
	                    				</tr>
	                    				<tr>
	                    					<td>Location</td>
	                    					<td>University of Texas at Dallas</td>
	                    				</tr>
	                    			</table>
	                    		</div>
	                    		<div class="panel-footer">
	                    			<h3 class="panel-title">
	                    				<button type="submit" class="btn btn-primary btn-md">
	                    					Contact Seller
	                    				</button>
	                    			</h3>
	                    		</div>
	                    	</div>
	                    </div>

	                    <div class="col-lg-4">
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">
	                    			<h3 class="panel-title">User Details</h3>
	                    		</div>
	                    		<div class="panel-body">
	                				<div class="media">
	                					<a class="pull-left" href="#">
	                						<img class="media-object dp img-circle" src="https://scontent-ord1-1.xx.fbcdn.net/hprofile-xaf1/v/t1.0-1/p160x160/11796445_1072902849389603_4952296916086825822_n.jpg?oh=e8e226b2ce0b0b754ad5afbfc596d3c0&oe=56C9993A" style="width: 100px;height:100px;">
	                					</a>
	                					<div class="media-body">
	                						<h4 class="media-heading">Yashodhan Chinchore </h4>
	                						<h5>Georgia Institute of Technology</h5>
               							    <figure>
				                                <figcaption class="ratings">
				                                    <span class="fa fa-star"></span>
				                                    <span class="fa fa-star"></span>
				                                    <span class="fa fa-star"></span>
				                                    <span class="fa fa-star"></span>
				                                    <span class="fa fa-star-o"></span>
				                                </figcaption>
				                            </figure>
	                					</div>
	                				</div>
	                    		</div>
	                    	</div>
	                    </div>

	                    <div class="col-lg-8">
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">
	                    			<h3 class="panel-title">Details</h3>
	                    		</div>
	                    		<div class="panel-body">
	                    			Class A product. Never been used. Slightly broken.
	                    			<hr id="#car #book #vehicle" class="hash" style="border-color:lightgrey; max-width:100%; border-width:1px;"/>
	                    			Keywords : #car #book #vehicle
	                    		</div>
	                    	</div>
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
		$( document ).ready(function(){
			$('.gallery').gallery();
		});
	</script
</html>