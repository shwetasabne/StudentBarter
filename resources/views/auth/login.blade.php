CTYPE html>
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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('status'))
                <div class="text-center">
                    <h3>{{ Session::get('status') }}</h3>
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="/auth/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center">
                    </div>
                    <div class="col-lg-4 text-center">
                        <h2 class="section-heading">Student Barter</h2>
                        <hr class="primary">
                        <div class="well">
                            <div class="form-group">
                                <div class="profile-userpic">
                                    <!--img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""-->

                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" style="
                                    align-self: center;
                                    text-align: center;
                                    margin-left: 35px;
                                    width:80%;
                                ">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" style="
                                    align-self: center;
                                    text-align: center;
                                    margin-left: 35px;
                                    width:80%;
                                ">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">
                                    Submit
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="/password/email">Forgot Password</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="register">Register</a>
                        </div>
                        <div class="text-center">
                        </div>
                        <div class="text-center">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">Buy</a>
                                </li>
                                <li class="footer-menu-divider">&sdot;</li>
                                <li>
                                    <a href="#">Sell</a>
                                </li>
                                <li class="footer-menu-divider">&sdot;</li>
                                <li>
                                    <a href="#">Lease</a>
                                </li>                                           
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
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
</html>     

