@extends ('master.template')
    @section('content')
        <section background-color="#FFF0D0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <h2 class="section-heading" style="text-align:center;">Create New Password</h2>
                        <hr class="primary">
                        <div class="well">

                            <!-- resources/views/auth/reset.blade.php -->

                            <form method="POST" action="/password/reset" class="form-horizontal">
                                {!! csrf_field() !!}
                                <input type="hidden" name="token" value="{{ $token }}">
                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="email" style="text-align: left;">Email</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="email" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="password" style="text-align: left;">Password</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="password" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label for="confirmPassword" style="text-align: left;">Confirm Password</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div align="center">
                                        <button type="submit" class="btn btn-primary btn-md">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- div class="well"-->
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </section>

@stop
