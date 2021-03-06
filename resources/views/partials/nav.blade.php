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
            <a class="navbar-brand page-scroll" href="/">Start Bootstrap</a>
        </div>

       <div class="navbar-header ui-widget">
           
            <div class="input-group" style="padding-top:10px;">
                <form id="headerForm" method="GET" action="/results/">
                    <input type="text" id="searchTerm" name="searchTerm" value="<?php if(isset ($searchTerm)) echo $searchTerm; ?>" placeholder="Keywords...">
                    <input type="text" placeholder="Choose University" name="university_name" id="university_name" 
                        value="<?php if(isset ($university_name)) echo $university_name; ?>">
                    <button type="button" id="searchsubmit" value="Search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div> 
       </div>            

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/product/create">Sell</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="#services"><?php echo Auth::user()->first_name; ?></a>
                    </li>
                    <li>
                        <a href="/auth/logout">Sign Out</a>
                    </li>
                @else
                    <li>
                        <a href="/auth/login">Sign In</a>
                    </li>
                    <li>
                        <a style="border:1px solid #f05f40; border-radius: 5px;" href="/auth/register">Sign Up</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

