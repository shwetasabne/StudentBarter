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

	    <!-- Chosen jQuery -->
	    <script src="/../js/jquery.js" type="text/javascript"></script>
	    <script src="/../chosen/chosen.jquery.js"></script>

            <link rel="stylesheet" href="/../chosen/chosen.css" type="text/css">

	<style>
	body{
	    background-color: #525252;
	}

	.centered-form{
	    margin-top: 60px;
	}

	.centered-form .panel{
	    background: rgba(255, 255, 255, 0.8);
	    box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
	}

	/* Not Need */ 
	@import url(http://fonts.googleapis.com/css?family=Roboto:500);
	body { background-color: rgb(230, 235, 240); }

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

	.form-group [data-toggle="floatLabel"][data-value =""] {
	    padding-top: 6px;
	}

	.form-group [data-toggle="floatLabel"][data-value =""] + label {
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

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
		<div class="text-center">
                            <h2 class="section-heading">Student Barter</h2>
                            <hr class="primary">
		</div>
                <div class="panel panel-default">
                        <div class="panel-heading">
	                         <h3 class="panel-title">Please Sign Up <small>It's free!</small></h3>
                        </div>
                        <div class="panel-body">

	<form id="myform" role="form" method="POST" action="/auth/register">
		<input type="hidden" name="_token" value ="{{ csrf_token() }}"> 
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
		        	<div class="form-group">
						<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" required value="{{ old('first_name') }}">
                    </div>
            </div>
			<div class="col-xs-6 col-sm-6 col-md-6">
            	<div class="form-group">
        	        <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="{{ old('last_name') }}">
                </div>
            </div>
        </div>

            <div class="form-group">
				<select id="univClear" name="university_id" class="chosen">
					@foreach ($university_list as $university)
						<option value={{$university->id}}> {{$university->name}}</option>
					@endforeach
				</select>
   			</div>

			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value ="{{ old('email') }}">
            </div>

			<div class="row">
                        	<div class="col-xs-6 col-sm-6 col-md-6">
        	                        <div class="form-group">
                	                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                        	        </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
	                                <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                        </div>
                                </div>
                        </div>

			<input type="submit" value ="Register" class="btn btn-info btn-block">
			<a href="#" id="clearUniv" style="color:blue; margin: 0 auto; display:block; font-size: 0.8em; text-align: center">Reset</a>
			</form>
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
                            <p class="copyright text-muted small">Copyright &copy; Your Company 2015. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </footer>
    	</body>


	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".chosen").chosen();

		    jQuery("#clearUniv").on("click", function() {
		        jQuery("#univClear").val('Choose University...').trigger('chosen:updated');;
				document.getElementById('myform').reset();	
		    });
		});

	</script>
</html>
