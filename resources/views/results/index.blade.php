@extends ('master.template')


    @section('content')

		<script src="/../bootstrap-slider/js/bootstrap-slider.js"></script>
	    <section id="now_showing">

	    @if(Session::has('status'))
	    	<div class="alert alert-danger">
        		<strong>Whoops!</strong> {{ Session::get('status') }} !!<br><br>
        	</div>
	    @endif

	    	<form id="formget" role="form" method="GET" action="/results/">
		    	<div class="container-fluid">
		    		<div class="row">

		    			<div class="col-lg-3 text-center">
		    				<h5 style="text-align: left;">Filter Your Search</h5>
		    				<div class="well text-left">
		    					<div class="container">
		    						<div class="row">
			    						<ul style="list-style-type: none;" class="ul-bring-left">
			    							<li class="my-cat-all" style="padding-left:15px">All Wares</li>
			    							<li class="my-cat-sub" style="padding-left:25px">Furniture</li>
			    							<li class="my-cat-sub" style="padding-left:25px">Home Appliances</li>
			    							<li class="my-cat-sub" style="padding-left:25px">Vehicle</li>
			    							<li class="my-cat-sub" style="padding-left:25px">Vehicle</li>
			    							<li class="my-cat-sub" style="padding-left:25px">Study Tools</li>
			    							<li class="my-cat-sub" style="padding-left:25px">Books</li>
			    						</ul>
		    						</div>
		    					</div>
		    					<hr style="max-width:90%">
		    					<div class="container">
		    						<div class="row">
                                        <input type="hidden" name="searchTerm" value="<?php if(isset ($searchTerm)) echo $searchTerm?>" >
                                        <input type="hidden" name="university_name" value="<?php if(isset ($university_name)) echo $university_name?>" >
				                        <div style="text-align:left" class="col-lg-1">
				                          	<div class="radio">
				                          		<label><input type="radio" id="new" <?php if($new_check == 1) echo "checked" ;?> class="getradio" name="usage" value="new">New</label>
				                          	</div>  
				                        </div>
				                        <div style="text-align:left" class="col-lg-1">
				                          	<div class="radio">
				                          		<label><input type="radio" id="used" <?php if($used_check == 1) echo "checked" ;?> class="getradio" name="usage" value="used">Used</label>
				                          	</div>
				                        </div>
				                        <div style="text-align:left" class="col-lg-1">
				                          	<div class="radio">
				                          		<label><input type="radio" id="all" <?php if($all_check == 1) echo "checked" ;?> class="getradio" name="usage" value="all">All</label>
				                          	</div>
				                        </div>                           
				                    </div>
		    					</div>
		    					<hr style="max-width:90%">
		    					<div class="container">
		    						<div class = "row my-filter-chk" style="padding-left:15px">
		    							<div class="checkbox">
		    								<label>
		    									<input id="delivery" <?php if($delivery_check == 1) echo "checked" ;?> class="getchk" name="delivery" type="checkbox" value="">Delivery
		    								</label>
		    							</div>
		    							<div class="checkbox">
		    								<label>
		    									<input id="pickup" <?php if($pickup_check == 1) echo "checked" ;?> class="getchk" name="pickup" type="checkbox" value="">Pick Up
		    								</label>
		    							</div>
		    							<div class="checkbox">
		    								<label>
		    									<input id="freeonly" <?php if($freeonly_check == 1) echo "checked" ;?> class="getchk" name="freeonly" type="checkbox" value="">Free Only
		    								</label>
		    							</div>
		    						</div>
		    					</div>
		    					<hr style="max-width:90%">
		    					<div class="container">
		    						<div class = "row my-filter-chk">
										<label for="universities" style="padding-left:30px;">Search in other universities</label>
		    						</div>
		    						<div class = "row my-filter-chk ui-widget" style="padding-left:15px">
									    <input type="text" placeholder="Choose University" name="univ" id="univ" />
									    <button type="submit" id="searchsubmit" value="Search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
		    						</div>
		    					</div>	    				
		    				</div>
		    			</div>
		    			<div class="col-lg-9 text-center">
		    				<div class="container">
		    					<div class="row">
									<div class="col-lg-4">
										<h5 style="text-align: left;">
					    					<span><a href="#">Furniture</a></span>
					    					<span>  </span>>
					    					<span> Chairs </span>
					    				</h5>
									</div>
									<div class = "col-lg-1">
									</div>
									<div class="col-lg-4">
			                           <h5 style="text-align: right;">
					    					<span>Sort By :</span>
					    					<select name="sortfield" style="font-family: 'Open Sans','Helvetica Neue',Arial,sans-serif; font-size:16px; font-weight:500">
					    						<option value="date_desc" <?php if($sort_date == 1) echo "selected";?> >Most recent</option>
					    						<option value="price_asc" <?php if($sort_price_asc == 1 ) echo "selected"; ?> >Lowest Price</option>
											    <option value="price_desc" <?php if($sort_price_desc == 1) echo "selected" ;?>>Highest Price</option>
					    					</select>
			                            </h5>	
									</div>
		    					</div>
		    				</div>
		    				
                            <!--h5 style="text-align: left;">
		    					<span>Sort By :</span>
		    					<span>  </span>>
		    					<span> Chairs </span>
                            </h5-->
		    				<div class="well">
		    					<div class="container">
									<div class="col-lg-10">
										@if (!sizeof($items))
											<h4 style="text-align:center;">Oh Shit !! No Results Found for Selected University :-(</h4>
											<label for="university">C'mon Lets try another university !</label>
											<div class = "row my-filter-chk ui-widget" style="padding-left:15px">
											    <input type="text" placeholder="Choose University" name="university" id="university" />
											    <button type="submit" id="searchsubmit" value="Search" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
				    						</div>
										@endif
									</div>
		    						@foreach (array_chunk($items->getCollection()->all(),3) as $row)
		    							<div class="row">
		    								@foreach($row as $item)
												<div class="col-md-3 itemclick">
													<div id="<?php echo $item->id; ?>"class='thumbnail'>
													
													<img src="/../uploads/{{ $item->primary_image_path }}" alt="{{ $item->title }}">
													<!--div class = "body">
														{{ $item->description }}
													</div-->
													<h5>{{ $item->id }} {{ $item->title }} {{ $item->updated_at}}</h5>
													</div>
												</div>
											@endforeach
		    							</div>
		    						@endforeach
		    					</div>
		    				</div>
		    				<div class="row">
		    							{!! $items->appends($request)->render() !!}
		    				</div>
		    			</div>
		    		</div>
		    	</div>
	    	</form>
	    </section>

	<script type="text/javascript">
		$( document ).ready(function(){
			$('.getchk').on('change', function(){
				if($('#delivery').is(":checked"))
				{
					$('#delivery').val("true");
				}
				if($('#pickup').is(":checked"))
				{
					$('#pickup').val("true");
				}
				if($('#freeonly').is(":checked"))
				{
					$('#freeonly').val("true");
				}
				if ($('#new').is(":checked")) 
				{
					$('#new').val("new");
				}
				if ($('#used').is(":checked")) 
				{
					$('#used').val("used");
				}
				if ($('#all').is(":checked")) 
				{
					$('#all').val("all");
				}				
				$('#formget').submit();
			});

			$('.getradio').on('change', function(){
				if($('#delivery').is(":checked"))
				{
					$('#delivery').val("true");
				}
				if($('#pickup').is(":checked"))
				{
					$('#pickup').val("true");
				}
				if($('#freeonly').is(":checked"))
				{
					$('#freeonly').val("true");
				}
				if ($('#new').is(":checked")) 
				{
					$('#new').val("new");
				}
				if ($('#used').is(":checked")) 
				{
					$('#used').val("used");
				}
				if ($('#all').is(":checked")) 
				{
					$('#all').val("all");
				}
				$('#formget').submit();
			});

			$('select').on('change',function(){
				if($('#delivery').is(":checked"))
				{
					$('#delivery').val("true");
				}
				if($('#pickup').is(":checked"))
				{
					$('#pickup').val("true");
				}
				if($('#freeonly').is(":checked"))
				{
					$('#freeonly').val("true");
				}
				if ($('#new').is(":checked")) 
				{
					$('#new').val("new");
				}
				if ($('#used').is(":checked")) 
				{
					$('#used').val("used");
				}
				if ($('#all').is(":checked")) 
				{
					$('#all').val("all");
				}	
				$('#formget').submit();
			});

			$('.itemclick').on('click', function(){
				//alert($(this).find(".thumbnail").attr("id"));
				var id = $(this).find(".thumbnail").attr("id");
				window.location.href = "/product/?item="+id;
			});

			var university_objects = <?php echo json_encode($university_list) ?>;
            var university_list = [];

            university_objects.forEach( function (university_obj)
            {
                university_list.push(university_obj.name);
            });

            // DB returns first element as 'Choose University...', delete this from universities list
	    	// delete does not support autocomplete, delete first value from DB side
            // delete(university_list[0]);

/*            jQuery("#univ").autocomplete({
                source: university_list
            });

            jQuery("#university").autocomplete({
                source: university_list
            }); */
		});
	</script>
@stop
