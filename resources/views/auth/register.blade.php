@extends ('master.template')
    @section('content')
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
            @if (Session::has('success'))
                <div text-align="center" class="alert alert-success">
                    <strong>Congrats!</strong> {{ Session::get('success') }}<br><br>
                </div>
            @endif
        </section>
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
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".chosen").chosen();

		    jQuery("#clearUniv").on("click", function() {
		        jQuery("#univClear").val('Choose University...').trigger('chosen:updated');;
				document.getElementById('myform').reset();	
		    });
		});

	</script>
@stop
