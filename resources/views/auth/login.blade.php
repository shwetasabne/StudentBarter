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

@stop
