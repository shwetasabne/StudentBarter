<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
            </div>

           <div class="navbar-header ui-widget">
               
                <div class="input-group" style="padding-top:10px;">
                    <input type="text"  placeholder="Keywords...">
                    <input type="text" placeholder="Choose University" name="universities" id="universities" />
                    <button type="submit" id="searchsubmit" value="Search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                </div> 
           </div>            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Buy. Sell. Lease.</h1>
                <hr>
                <p>One stop credible shop for most student needs</p>
                <a href="#about" class="btn btn-primary btn-xl">Events</a>
                <a href="#about" class="btn btn-primary btn-xl">Things</a>
                <a href="#about" class="btn btn-primary btn-xl">Rent</a>
            </div>
            <hr>
            <div class="header-content-inner">
                <a href="#about" class="btn btn-primary btn-xl">Register Now</a>
            </div>
            </div>
        </div>
    </header>

    <section id="products">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Recently Added Products</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <div class"row">
                    @foreach (array_chunk($items->getCollection()->all(),4) as $row)
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
                    <a href="results" class="btn btn-primary btn-md" role="button">View More</a>
                </div>
            </div>
    </section>

    <section class="bg-primary" id="about" style="padding-top:40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <ul class="text-faded">
                        <li> Carefully reviewed products ensure authenticity</li>
                        <li> Simple product base keeping in mind students requirements </li>
                        <li> Real time numbers indicating the interests in your wares</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Web Serivce API</h3>
                        <p class="text-muted">Use our webservices to build your own.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Support</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Spread the Love</h3>
                        <p class="text-muted">Join us in making this application better!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->

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


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

    <!-- Chosen jQuery -->
    <script src="/../chosen/chosen.jquery.js"></script>
    <link rel="stylesheet" href="/../chosen/chosen.css" type="text/css">

</body>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            var university_objects = <?php echo json_encode($university_list) ?>;
            var university_list = [];

            university_objects.forEach( function (university_obj)
            {
                university_list.push(university_obj.name);
            });

            // DB returns first element as 'Choose University...', delete this from universities list
        // delete does not support autocomplete, delete first value from DB side
            // delete(university_list[0]);

            jQuery("#universities").autocomplete({
                source: university_list
            });    
        });
    </script>

</html>
