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

	/* Not Need */ 
	@import url(http://fonts.googleapis.com/css?family=Roboto:500);
	body {/* background-color: rgb(230, 235, 240);*/ }

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

	<script src="jquery-1.11.3.min.js">
	$(document).ready(function(){
    		$('[data-toggle="floatLabel"]').attr('data-value', $(this).val()).on('keyup change', function() {
                	$(this).attr('data-value', $(this).val());
        	});
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
		<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6">
		        	<div class="form-group">
				<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" required value="{{ old('first_name') }}">
                      
                                </div>
                        </div>
			<div class="col-xs-6 col-sm-6 col-md-6">
                        	<div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name"  value="{{ old('last_name') }}">
                      
                                </div>
                        </div>
                </div>

                            <div class="form-group">
                            	<input type="text" name="univlist" list="univlist" class="form-control input-sm" placeholder="University">
			    		<datalist id="univlist" style="width:150px;height:150px;line-height:3em;overflow: scroll;">
                                    <option value="Arizona State University"></option>
                                    <option value="Auburn University"></option>
                                    <option value="Baylor College of Medicine"></option>
                                    <option value="Boston College"></option>
                                    <option value="Boston University"></option>
                                    <option value="Brandeis University"></option>
                                    <option value="Brigham Young University"></option>
                                    <option value="California Institute of Technology"></option>
                                    <option value="Carnegie Mellon University"></option>
                                    <option value="Case Western Reserve University"></option>
                                    <option value="City University of New York City College"></option>
                                    <option value="Clemson University"></option>
                                    <option value="Colorado State University"></option>
                                    <option value="Columbia University"></option>
                                    <option value="Cornell University"></option>
                                    <option value="Dartmouth College"></option>
                                    <option value="Drexel University"></option>
                                    <option value="Duke University"></option>
                                    <option value="Emory University"></option>
                                    <option value="Florida State University"></option>
                                    <option value="George Mason University"></option>
                                    <option value="Georgetown University"></option>
                                    <option value="Georgia Institute of Technology"></option>
                                    <option value="Harvard University"></option>
                                    <option value="Indiana University Bloomington"></option>
                                    <option value="Indiana University-Purdue University"></option>
                                    <option value="Iowa State University"></option>
                                    <option value="Kansas State University"></option>
                                    <option value="Kent State University"></option>
                                    <option value="Lehigh University"></option>
                                    <option value="Lousiana State University - Baton Rouge"></option>
                                    <option value="Massachusetts Institute of Technology"></option>
                                    <option value="Mayo Medical School"></option>
                                    <option value="Medical College of Wisconsin"></option>
                                    <option value="Medical University of South Carolina"></option>
                                    <option value="Michigan State University"></option>
                                    <option value="Mount Sinai School of Medicine"></option>
                                    <option value="New York University"></option>
                                    <option value="North Carolina State University"></option>
                                    <option value="Northeastern University"></option>
                                    <option value="Northwestern University"></option>
                                    <option value="Oregon Health and Science University"></option>
                                    <option value="Oregon State University"></option>
                                    <option value="Pennsylvania State University - University Park"></option>
                                    <option value="Portland State University"></option>
                                    <option value="Princeton University"></option>
                                    <option value="Purdue University - West Lafayette"></option>
                                    <option value="Rensselaer Polytechnic Institute"></option>
                                    <option value="Rice University"></option>
                                    <option value="Rockefeller University"></option>
                                    <option value="Rutgers, The State University of New Jersey - New Brunswick"></option>
                                    <option value="Saint Louis University"></option>
                                    <option value="San Diego State University"></option>
                                    <option value="Southern Methodist University"></option>
                                    <option value="Stanford University"></option>
                                    <option value="State University of New York Health Science Center"></option>
                                    <option value="State University of New York at Albany"></option>
                                    <option value="State University of New York at Buffalo"></option>
                                    <option value="State University of New York at Stony Brook"></option>
                                    <option value="Syracuse University"></option>
                                    <option value="Temple University"></option>
                                    <option value="Texas A&M University - College Station"></option>
                                    <option value="Texas Tech University"></option>
                                    <option value="The George Washington University"></option>
                                    <option value="The Johns Hopkins University"></option>
                                    <option value="The Ohio State University - Columbus"></option>
                                    <option value="The University of Alabama at Birmingham"></option>
                                    <option value="The University of Connecticut - Storrs"></option>
                                    <option value="The University of Georgia"></option>
                                    <option value="The University of Montana - Missoula"></option>
                                    <option value="The University of New Mexico - Albuquerque"></option>
                                    <option value="The University of Texas Health Science Center Houston"></option>
                                    <option value="The University of Texas Health Science Center San Antonio"></option>
                                    <option value="The University of Texas M. D. Anderson Cancer Center"></option>
                                    <option value="The University of Texas Medical Branch at Galveston"></option>
                                    <option value="The University of Texas Southwestern Medical Center"></option>
                                    <option value="The University of Texas at Austin"></option>
                                    <option value="The University of Texas at Dallas"></option>
                                    <option value="Thomas Jefferson University"></option>
                                    <option value="Tufts University"></option>
                                    <option value="Tulane University"></option>
                                    <option value="University of Alaska - Fairbanks"></option>
                                    <option value="University of Arizona"></option>
                                    <option value="University of California, Berkeley"></option>
                                    <option value="University of California, Davis"></option>
                                    <option value="University of California, Irvine"></option>
                                    <option value="University of California, Los Angeles"></option>
                                    <option value="University of California, Riverside"></option>
                                    <option value="University of California, San Diego"></option>
                                    <option value="University of California, San Francisco"></option>
                                    <option value="University of California, Santa Barbara"></option>
                                    <option value="University of California, Santa Cruz"></option>
                                    <option value="University of Central Florida"></option>
                                    <option value="University of Chicago"></option>
                                    <option value="University of Cincinnati"></option>
                                    <option value="University of Colorado at Boulder"></option>
                                    <option value="University of Colorado at Denver"></option>
                                    <option value="University of Delaware"></option>
                                    <option value="University of Florida"></option>
                                    <option value="University of Hawaii at Manoa"></option>
                                    <option value="University of Houston"></option>
                                    <option value="University of Idaho"></option>
                                    <option value="University of Illinois at Chicago"></option>
                                    <option value="University of Illinois at Urbana-Champaign"></option>
                                    <option value="University of Iowa"></option>
                                    <option value="University of Kansas - Lawrence"></option>
                                    <option value="University of Kentucky"></option>
                                    <option value="University of Maryland, Baltimore"></option>
                                    <option value="University of Maryland, Baltomore County"></option>
                                    <option value="University of Maryland, College Park"></option>
                                    <option value="University of Massachusetts Amherst"></option>
                                    <option value="University of Massachusetts Medical School, Worcester"></option>
                                    <option value="University of Medicine and Dentistry, New Jersey"></option>
                                    <option value="University of Miami"></option>
                                    <option value="University of Michigan - Ann Arbor"></option>
                                    <option value="University of Minnesota, Twin Cities"></option>
                                    <option value="University of Missouri - Columbia"></option>
                                    <option value="University of Nebraska - Lincoln"></option>
                                    <option value="University of Nebraska Medical Center"></option>
                                    <option value="University of New Hampshire - Durham"></option>
                                    <option value="University of North Carolina at Chapel Hill"></option>
                                    <option value="University of Notre Dame"></option>
                                    <option value="University of Oklahoma - Norman"></option>
                                    <option value="University of Oregon"></option>
                                    <option value="University of Pennsylvania"></option>
                                    <option value="University of Pittsburgh"></option>
                                    <option value="University of Rhode Island"></option>
                                    <option value="University of Rochester"></option>
                                    <option value="University of South Carolina - Columbia"></option>
                                    <option value="University of South Florida"></option>
                                    <option value="University of Southern California"></option>
                                    <option value="University of Tennessee - Knoxville"></option>
                                    <option value="University of Utah"></option>
                                    <option value="University of Vermont"></option>
                                    <option value="University of Virginia"></option>
                                    <option value="University of Washington"></option>
                                    <option value="University of Wisconsin - Madison"></option>
                                    <option value="University of Wyoming"></option>
                                    <option value="Utah State University"></option>
                                    <option value="Vanderbilt University"></option>
                                    <option value="Virginia Commonwealth University"></option>
                                    <option value="Virginia Polytechnic Institute and State University"></option>
                                    <option value="Wake Forest University"></option>
                                    <option value="Washington State University"></option>
                                    <option value="Washington University in St. Louis"></option>
                                    <option value="Wayne State University"></option>
                                    <option value="Yale University"></option>
                                    <option value="Yeshiva University"></option>
	                        </datalist>
   			</div>

			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="{{ old('email') }}">
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

			<input type="submit" value="Register" class="btn btn-info btn-block">
			<a href="javascript:document.getElementById('myform').reset();" style="color:blue; margin: 0 auto; display:block; font-size: 0.8em; text-align: center">Reset</a>
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
                            <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </footer>
    	</body>
</html>
