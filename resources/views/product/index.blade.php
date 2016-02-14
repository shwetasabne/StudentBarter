@extends ('master.template')

    @section('content')

	    <meta property="fb:app_id" content="1434213290179457" />
	    <meta property="og:url"           content="<?php echo $current_url; ?>" />
    	<meta property="og:type"          content="website" />
    	<meta property="og:title"         content="<?php echo $item->title; ?>" />
    	<meta property="og:description"   content="<?php echo $item->description; ?>" />
    	<meta property="og:image"         content="url(/../uploads/{!! $item->primary_image_path !!})" />
		<!--Gallery CSS and JS -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.4/hammer.min.js"></script>
		<link rel="stylesheet" href="/../css/gallery.css">
		<script src="/../js/gallery.js"></script>

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
	 	<div id="fb-root"></div>
    	<script>
    	(function(d, s, id) {
		      var js, fjs = d.getElementsByTagName(s)[0];
		      if (d.getElementById(id)) return;
		      js = d.createElement(s); js.id = id;
		      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
		      fjs.parentNode.insertBefore(js, fjs);
		    }(document, 'script', 'facebook-jssdk'));
    	</script>
	    <section style="padding-top:50px;">
			<div class="alert alert-success" id="mailsent" style="display: none; text-align: center;">Your mail has been sent!</div>

		    @if($show_deleted_div)
		    	<div class="alert alert-danger">
	        		<strong>Whoops!</strong>This product has been deleted!!<br><br>
	        	</div>
		    @endif
		    @if($show_expired_div)
		    	<div class="alert alert-danger">
	        		<strong>Whoops!</strong> This product has expired already!!<br><br>
	        	</div>
		    @endif
	    	<div class = "container">
	    		<div class="row" style="padding-top:20px;">
	    			@if ($show_edit_button)
	    			<div class="col-lg-4">
	    				<button id="edit-product" class="btn btn-primary btn-md">
	                    	Edit
	                    </button>
	    			</div>
	    			@endif
	    			@if($show_submit_button)
		    			<div class="col-lg-4" style="text-align:right;">
		    				<button id="submit-product" class="btn btn-primary btn-md">
		                    	Submit
		                    </button>
		    			</div>
		    		@elseif ($show_delete_button)
		    			<div class="col-lg-4" style="text-align:right;">
		    				<button id="delete-product" class="btn btn-primary btn-md">
		                    	Delete
		                    </button>
		    			</div>		    		
	    			@endif
	    		</div>
	    		<div class="row">
	    			<div class="col-lg-4">
	    				<h2>{!! $item->title !!}</h2>
	    			</div>
	    			@if($item->state == 'ACTIVE')
		    			<div class="col-lg-4" style="text-align:right;">
							<div class="fb-share-button" style="margin-top : 30px;"
							        data-href="<?php echo $current_url; ?>" 
							        data-layout="button_count">
							</div>
		    			</div>
	    			@endif
	    		</div>
				<div class="row">
					
	                    <div class="col-lg-8">
	                        <!-- Top part of the slider -->
	                        <div class="row">
	                        	<div class="gallery">
	                        		<div class="images">
	                        			<div class="image active">
	                        				<div class="content" style="background-image: url(/../uploads/{!! $item->primary_image_path !!})"></div>
	                        			</div>
	                        			@if ($has_more_image)
	                        				@foreach($images as $img)
	                        					<div class="image">
	                        						<div class="content" 
	                        							style="background-image: url(/../uploads/{!! $img->image_path !!})">
	                        						</div>
	                        					</div>
	                        				@endforeach
	                        			@endif                       			
	                        		</div>
	                        		@if ($has_more_image)
	                        			<div class="thumbs">
	                        			<div class="thumb active" 
	                        					style="background-image: url(/../uploads/{!! $item->primary_image_path !!})">
	                        				</div>
	                        			@foreach($images as $img)
	                        				<div class="thumb active" 
	                        					style="background-image: url(/../uploads/{!! $img->image_path !!})">
	                        				</div>
	                        			@endforeach
	                        			</div>
	                        		@endif
	                        	</div>

	                        </div>
	                    </div>


	                    <div class="col-lg-4">
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">
	                    			<h3 class="panel-title">Overview</h3>
	                    		</div>
	                    		<div class="panel-body">
	                    			<table class="table" style="margin-bottom: 0px;">
	                    				<tr>
	                    					<td>Price</td>
	                    					<td>
		                    					<font color="blue">
		                    					{{ $free }}
		                    					</font>
	                    					</td>
	                    				</tr>
	                    				<tr>
	                    					<td>Delivery</td>
	                    					<td>{{ $delivery }}</td>
	                    				</tr>
	                    				<tr>
	                    					<td>Pick Up</td>
	                    					<td>{{ $pickup }}</td>
	                    				</tr>
	                    				<tr>
	                    					<td>Location</td>
	                    					<td>{{ $item->university_name }}</td>
	                    				</tr>
	                    			</table>
	                    		</div>
	                    		<div class="panel-footer">
	                    			<h3 class="panel-title">
	                    				<button type="submit" class="btn btn-primary btn-md"
	                    						style="width:100%; margin:0px auto;" 
												data-toggle="modal" data-target="#myModal">
	                    						<?php if($item->state != "ACTIVE") echo "disabled"; ?>
	                    					Contact Seller
	                    				</button>
	                    			</h3>
	                    		</div>
	                    	</div>
	                    </div>


						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<?php if( !Auth::check() ):?>
									<div class="modal-header" style="text-align: center; border-color:#337ab7;">
										<button type="button" class="close" data-dismiss="modal" style="">&times;</button>
										<h4>Please Login First!</h4>
										<a href="/auth/login">
											<input class="btn btn-success" value="Login">
										</a>
									</div>
									<?php else:?>
									<div class="modal-header" style="color:#fff; background-color:#337ab7; border-color:#337ab7;">
										<button type="button" class="close" data-dismiss="modal" style="color:#fff;">&times;</button>
										<h4 class="modal-title">Contact {!! $item->first_name !!}  {!! $item->last_name!!}</h4>
									</div>
									<form class="contact" name="interested">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="modal-body">
										<input type="text" id="subject" value="I am interested in {!! $item->title !!}" name="subject" class="form-control col-xs-12">
				                    </div>
									<div class="modal-body">
										<textarea name="message" id="message" class="form-control col-xs-12" style="height:400px;">&#13;&#10;Hi {!! $item->first_name !!}, &#13;&#10;&#13;&#10;I am interested in "{!! $item->title !!}" for ${!! $item->price !!} posted on the Student Barter website. &#13;&#10;&#13;&#10;Is the item still available. &#13;&#10;&#13;&#10;Thanks.  &#13;&#10;&#13;&#10; <?php echo URL::full(); ?> </textarea>
									</div>
									</form>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<input class="btn btn-success" type="submit" value="Send!" id="submit">
									</div>
									<?php endif;?>
								</div>
							</div>
						</div>


	                    <div class="col-lg-4">
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">
	                    			<h3 class="panel-title">User Details</h3>
	                    		</div>
	                    		<div class="panel-body">
	                				<div class="media">
	                					<a class="pull-left" href="#">
	                						<img class="media-object dp img-circle" src="https://scontent-ord1-1.xx.fbcdn.net/hprofile-xaf1/v/t1.0-1/p160x160/11796445_1072902849389603_4952296916086825822_n.jpg?oh=e8e226b2ce0b0b754ad5afbfc596d3c0&oe=56C9993A" style="width: 100px;height:100px;">
	                					</a>
	                					<div class="media-body">
	                						<h4 class="media-heading">{!! $item->first_name !!}  {!! $item->last_name!!}</h4>
	                						<h5>{!! $item->university_name !!}</h5>
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
	                    </div>

	                    <div class="col-lg-8">
	                    	<div class="panel panel-primary">
	                    		<div class="panel-heading">
	                    			<h3 class="panel-title">Details</h3>
	                    		</div>
	                    		<div class="panel-body">
	                    			{!! $item->description !!}
	                    			<hr id="#car #book #vehicle" class="hash" style="border-color:lightgrey; max-width:100%; border-width:1px;"/>
	                    			Keywords: {!! $keyword_str !!}
	                    			<hr class="hash" style="border-color:lightgrey; max-width:100%; border-width:1px;"/>
	                    			Categories: {!! $category_str !!}
	                    		</div>
	                    	</div>
	                    </div>
                </div>
	    	</div>


	    </section>
	<script type="text/javascript">
		$( document ).ready(function(){

			$('.gallery').gallery();

			$("input#submit").click(function(){
				$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

				var subject = $('#subject').val();
				var message = $('#message').val();
				var productid = <?php echo $item->id?>;
				$.ajax({
					type: "POST",
					url: "/product/interestedmail", //process to mail
					data: {subject:subject, message:message, productid:productid},
					success: function(msg){
						$("#myModal").modal('hide'); //hide popup 
						$("#mailsent").show();
//						$("#thanks").html(msg) //hide button and show thank you
					},
					error: function(){
						alert("failure");
					}
				});
			});

			$('#submit-product').on('click', function(){
				$('<form action="/product/updatestate" method="POST">' + 
					'<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
    				'<input type="hidden" name="id" value="' + <?php echo $item->id; ?> + '">' +
    				'<input type="hidden" name="state" value="' + "ACTIVE" + '">' +
    				'</form>').submit();
			});

			$('#delete-product').on('click', function(){
				$('<form action="/product/updatestate" method="POST">' + 
					'<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
    				'<input type="hidden" name="id" value="' + <?php echo $item->id; ?> + '">' +
    				'<input type="hidden" name="state" value="' + "DELETED" + '">' +
    				'</form>').submit();
			});

			$('#edit-product').on('click', function(){
			    alert("This is pending.. ")
            //	$('<form action="/product/edit" method="GET">' + 
			//		'<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
    		//		'<input type="hidden" name="id" value="' + <?php echo $item->id; ?> + '">' +
    		//		'</form>').submit();
			});
		});

	</script>
@stop

