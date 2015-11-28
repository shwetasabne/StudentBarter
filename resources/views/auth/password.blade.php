@extends ('master.template')
    @section('content')

        <section background-color="#FFF0D0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <h2 class="section-heading" style="text-align:center;">Reset Password</h2>
                        <hr class="primary">
                        <div class="well">
                        <!-- resources/views/auth/password.blade.php -->
                        <form method="POST" action="/password/email">
                            {!! csrf_field() !!}

                            @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div align="center">
                                Email
                                <input type="email" name="email" value="{{ old('email') }}">
                            </div>

                            <div align="center" style="padding-top:20px;">
                                <button type="submit" class="btn btn-primary btn-md">
                                    Submit
                                </button>

                        </form>
                        </div> <!-- div class="well"-->
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </section>
@stop
