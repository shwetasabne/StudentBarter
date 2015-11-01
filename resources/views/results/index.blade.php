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
	    <section id="now_showing" bgcolor="#F5F3EE">
	    	<form id="formget" role="form" method="GET" action="/results/">
		    	<div class="container-fluid">
		    		<div class="row">

		    			<div class="col-lg-3 text-center">
		    				<h5 style="text-align: left;">Filter Your Search</h5>
		    				<div class="well text-left">
		    					<div class="container">
		    						<div class="row">
			    						<ul style="list-style-type: none;" class="ul-bring-left">
			    							<li class="my-cat-all">All Wares</li>
			    							<li class="my-cat-sub">Furniture</li>
			    							<li class="my-cat-sub">Home Appliances</li>
			    							<li class="my-cat-sub">Vehicle</li>
			    							<li class="my-cat-sub">Vehicle</li>
			    							<li class="my-cat-sub">Study Tools</li>
			    							<li class="my-cat-sub">Books</li>
			    						</ul>
		    						</div>
		    					</div>
		    					<hr style="max-width:90%">
		    					<div class="container">
		    						<div class = "row my-filter-chk">
		    							<div class="checkbox">
		    								<label>
		    								<input id="delivery" <?php if($delivery_check == 1) echo "checked" ;?> class="getchk" name="delivery" type="checkbox" value="">Delivery
		    								</label>
		    							</div>
		    							<div class="checkbox">
		    								<label><input id="pickup" <?php if($pickup_check == 1) echo "checked" ;?> class="getchk" name="pickup" type="checkbox" value="">Pick Up</label>
		    							</div>
		    							<div class="checkbox">
		    								<label><input id="freeonly" <?php if($freeonly_check == 1) echo "checked" ;?> class="getchk" name="freeonly" type="checkbox" value="">Free Only</label>
		    							</div>
		    						</div>
		    					</div>
		    					<hr style="max-width:90%">
		    					<div class="container">
		    						<div class = "row my-filter-chk">
										<a href="#"><span>Search in other universities</span></a>
		    						</div>
		    					</div>	    					
		    				</div>
		    			</div>
		    			<div class="col-lg-9 text-center">
		    				<div class="container">
		    					<div class="row">
									<div class="col-lg-4">
										<h5 style="text-align: left;">
					    					<span><a href="#">Furniture</a></span>
					    					<span>  </span>>
					    					<span> Chairs </span>
					    				</h5>
									</div>
									<div class = "col-lg-1">
									</div>
									<div class="col-lg-4">
			                           <h5 style="text-align: right;">
					    					<span>Sort By :</span>
					    					<select name="sortfield" style="font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif; font-size:16px; font-weight:500">
					    						<option value="date_desc" <?php if($sort_date == 1) echo "selected";?> >Most recent</option>
					    						<option value="price_asc" <?php if($sort_price_asc == 1 ) echo "selected"; ?> >Lowest Price</option>
											    <option value="price_desc" <?php if($sort_price_desc == 1) echo "selected" ;?>>Highest Price</option>
					    					</select>
			                            </h5>	
									</div>
		    					</div>

		    				</div>
		    				
                            <!--h5 style="text-align: left;">
		    					<span>Sort By :</span>
		    					<span>  </span>>
		    					<span> Chairs </span>
                            </h5-->
		    				<div class="well">
		    					<div class="container">
									<div class="col-lg-10">
										@if (!sizeof($items))
											<h4 style="text-align:center;">No Results Found :-(</h4>
										@endif
									</div>
		    						@foreach (array_chunk($items->getCollection()->all(),3) as $row)
		    							<div class="row">
		    								@foreach($row as $item)
												<div class="col-md-3 itemclick">
													<div id="<?php echo $item->id; ?>"class='thumbnail'>
													
													<img src="{{ $item->primary_image_path }}" alt="{{ $item->title }}">
													<!--div class = "body">
														{{ $item->description }}
													</div-->
													<h5>{{ $item->id }} {{ $item->title }} {{ $item->updated_at}}</h5>
													</div>
												</div>
											@endforeach
		    							</div>
		    						@endforeach
		    					</div>
		    				</div>
		    				<div class="row">
		    							{!! $items->appends($request)->render() !!}
		    				</div>
		    			</div>
		    		</div>
		    	</div>
	    	</form>
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
			$('.getchk').on('change', function(){
				if($('#delivery').is(":checked"))
				{
					$('#delivery').val("true");
				}
				if($('#pickup').is(":checked"))
				{
					$('#pickup').val("true");
				}
				if($('#freeonly').is(":checked"))
				{
					$('#freeonly').val("true");
				}				
				$('#formget').submit();
			});

			$('select').on('change',function(){
				if($('#delivery').is(":checked"))
				{
					$('#delivery').val("true");
				}
				if($('#pickup').is(":checked"))
				{
					$('#pickup').val("true");
				}
				if($('#freeonly').is(":checked"))
				{
					$('#freeonly').val("true");
				}	
				$('#formget').submit();
			});

			$('.itemclick').on('click', function(){
				//alert($(this).find(".thumbnail").attr("id"));
				var id = $(this).find(".thumbnail").attr("id");
				window.location.href = "/product/?item="+id;
			});
		});
	</script>
</html>
