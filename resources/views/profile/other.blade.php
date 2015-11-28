@extends ('master.template')

    @section('content')

    <style>
       .media
        {
            /*box-shadow:0px 0px 4px -2px #000;*/
            margin: 20px 0;
            padding:30px;
        }
        .dp
        {
            border:10px solid #eee;
            transition: all 0.2s ease-in-out;
        }
        .dp:hover
        {
            border:2px solid #eee;
            transform:rotate(360deg);
            -ms-transform:rotate(360deg);  
            -webkit-transform:rotate(360deg);  
            /*-webkit-font-smoothing:antialiased;*/
        }
        figcaption.ratings
        {
            color:#f1c40f;
            font-size:15px;
        }
        figcaption.ratings a:hover
        {
            color:#f39c12;
            text-decoration:none;
        }
    </style>
	    
    <section background-color="#FFF0D0">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object dp img-circle" 
                                    src="https://scontent-ord1-1.xx.fbcdn.net/hprofile-xaf1/v/t1.0-1/p160x160/11796445_1072902849389603_4952296916086825822_n.jpg?oh=e8e226b2ce0b0b754ad5afbfc596d3c0&oe=56C9993A" style="width: 100px;height:100px;">
                            </a>
                            <div class="media-body">
                                @foreach ($user as $usr)
                                <h4 class="media-heading"><b>{{ $usr->first_name }} {{ $usr->last_name  }}</b></h4>
                                <h5>{{ $usr->name  }}</h5>
                                <h6>
                                    <i>
                                        Member Since: <?php echo DATE("F", strtotime($usr->created_at)); echo ', ';
                                                        echo DATE("Y", strtotime($usr->created_at));?>
                                    </i>
                                </h6>
                                @endforeach
                                <figure>
                                    <figcaption class="ratings">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 text-center">
                    <div class="well">
                        <h4 style="text-align:left; padding-left:20px; padding-bottom:5px;">Active products from {{ $usr->first_name }}</h4>
                        <div class="container">
                            @foreach (array_chunk($items->getCollection()->all(),3) as $row)
                                <div class="row">
                                    @foreach($row as $item)
                                        <div class="col-md-3 itemclick">
                                            <div id="item-<?php echo $item->id; ?>"class='thumbnail'>
                                            <img src="{{ $item->primary_image_path }}" alt="{{ $item->title }}">
                                            <h5>{{ $item->id }} {{ $item->title }} {{ $item->updated_at}}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        {!! $items->render() !!} 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $( document ).ready(function(){
            $('.itemclick').on('click', function(){

            });
        });
    </script>
@stop

