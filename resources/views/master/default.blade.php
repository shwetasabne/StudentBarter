@extends ('master.template')

    @section('content')

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

    <section class="bg-primary" id="about">
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

@stop



