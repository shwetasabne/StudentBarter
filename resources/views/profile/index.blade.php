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

	    <section background-color="#FFF0D0">

			<div class="container">
				<div class="row">
					<div class="row">
						<div class="col-lg-5">
							<div class="media">
								<a class="pull-left" href="#">
									<img class="media-object dp img-circle" src="https://scontent-ord1-1.xx.fbcdn.net/hprofile-xaf1/v/t1.0-1/p160x160/11796445_1072902849389603_4952296916086825822_n.jpg?oh=e8e226b2ce0b0b754ad5afbfc596d3c0&oe=56C9993A" style="width: 100px;height:100px;">
								</a>
								<div class="media-body">
									@foreach ($user as $usr)
									<h4 class="media-heading"><b>{{ $usr->first_name }} {{ $usr->last_name  }}</b></h4>
									<h5>{{ $usr->name  }}</h5>
									<h6><i>Member Since: <?php echo DATE("F", strtotime($usr->created_at)); echo ', ';
															echo DATE("Y", strtotime($usr->created_at));?>
									</i></h6>
									@endforeach
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

					<div class="col-lg-10 text-center">
						<div class="well">
							<h4 style="text-align:left; padding-left:20px; padding-bottom:5px;">Active products from {{ $usr->first_name }}</h4>
							<div class="container">
								@foreach (array_chunk($items->getCollection()->all(),3) as $row)
									<div class="row">
										@foreach($row as $item)
											<div class="col-md-3 itemclick">
												<div id="item-<?php echo $item->id; ?>"class='thumbnail'>

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
									{!! $items->render() !!} 
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
	                    <p class="copyright text-muted small">Copyright &copy; StudentBarter 2015. All Rights Reserved</p>
	                </div>
	            </div>
	        </div>
	    </footer>
	</body>

    <script type="text/javascript">
        $( document ).ready(function(){
            $('.itemclick').on('click', function(){

            });
        });
    </script>
</html>	    
