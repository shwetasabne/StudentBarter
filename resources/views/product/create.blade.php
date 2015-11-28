@extends ('master.template')
    @section('content')

      <!-- Dropzone --> 
      <script src="/../js/dropzone.js" type="text/javascript"></script>
      <link rel="stylesheet" href="/../css/dropzone.css" type="text/css">

      <!-- Hashtag jquery -->
      <script src="/../js/autosize.min.js" type="text/javascript"></script>
      <script src="/../js/jquery.hashtags.js" type="text/javascript"></script>`
      <link rel="stylesheet" href="/../css/jquery.hashtags.css" type="text/css">
     
      <!-- Word count http://bavotasan.com/2011/simple-textarea-word-counter-jquery-plugin/--> 
      <script src="/../js/jQuery.textareaCounter.js" type="text/javascript"></script>`

    @if (count($errors) > 0)
        <div class="alert alert-danger">
        <strong>Whoops!</strong> Errors in your input !!<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
    @endif


    <section id="productinfo">

      <div class="container">

        <div class="row">

          <div class="col-lg-2">
          </div>

          <div class="col-lg-8">

            <h2 class="section-heading" style="text-align: center;">Product Info</h2>

            <div class="well well-lg">

              <form id="createForm" role="form" method="POST" action="/product" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="filenamestring" id="filenamestringId">
                <div class="form-group">
                  <div class="col-lg-6 ">
                    <label for="title" style="text-align: left;">Title</label>
                    <input type="text" class="form-control" id="title" name="title" maxlength="20" placeholder="20 Characters">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="description" style="text-align: left;">Description</label>
                    <textarea class="form-control" id="description" name="description" maxlength="100" name="description" rows="4" placeholder="100 Characters"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="category" style="text-align: left;">Category</label>
                    <select name="category[]" class="chosen" multiple="true" style="/*width:400px;*/">
                        @foreach ($categories as $category)
                            <option value={{$category->id}}> {{$category->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="transport" style="text-align: left;">Usage</label>
                      <!-- <div class="well well-lg"> -->
                    <div class="container">
                      <div class="row">
                        <div style="text-align:left" class="col-lg-2">
                          <div class="radio">
                          <label><input type="radio" id="delivery" name="usage" value="new">New</label>
                          </div>  
                        </div>
                        <div style="text-align:left" class="col-lg-2">
                          <div class="radio">
                          <label><input type="radio" id="pickup" name="usage" value="used">Used</label>
                          </div>
                        </div>                          
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="transport" style="text-align: left;">Transport</label>
                      <!-- <div class="well well-lg"> -->
                    <div class="container">
                      <div class="row">
                        <div style="text-align:left" class="col-lg-2">
                          <div class="checkbox">
                          <label><input type="checkbox" id="delivery" name="delivery">Delivery</label>
                          </div>  
                        </div>
                        <div style="text-align:left" class="col-lg-2">
                          <div class="checkbox">
                          <label><input type="checkbox" id="pickup" name="pickup">Pickup</label>
                          </div>
                        </div>                          
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="pricing" style="text-align: left;">Pricing</label>
                    <!-- <div class="well well-lg"> -->
                    <div class="container">
                      <div class="row">
                        <div style="text-align:left" class="col-lg-2">
                          <div class="checkbox">
                          <label><input type="checkbox" id="free" name="free">Free</label>
                          </div>  
                        </div>
                      </div>                      
                      <div class="row" style = "padding-top:10px;">
                          <div style="text-align:left" class="col-lg-1">
                            <p style="text-align: left;">Price</p>
                          </div>
                          <div style="text-align:left;" class="col-lg-2">
                            <input type="number" class="form-control" min="1" id="price" name="price">
                          </div>                        
                      </div>
                    </div>      
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-6">
                    <label for="keywords" style="text-align: left;">Keywords</label>
                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Maximum 5 keywords">
                  </div>
                </div>
              </form> 

              <!-- Dropzone stuff begins -->
              <label for="images" style="text-align: left;">Images</label>
              <form id="real-dropzone" 
                    files ='true' role="form" method="POST" 
                    action="/product/uploads" class="dropzone form-horizontal"
              >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div>                
                  <div class="dz-message">
                  </div>

                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>

                  <div class="dropzone-previews" id="dropzonePreview">
                  </div>
                      
                  <h4 style="text-align: center;color:#428bca;">Drop images in this area  
                    <span class="glyphicon glyphicon-hand-down"></span>
                  </h4>
                </div>

                  <!-- Dropzone Preview Template -->
                <div id="preview-template" style="display: none;">
                  <div class="dz-preview dz-file-preview">
                    <div class="dz-image"><img data-dz-thumbnail=""></div>
                    <div class="dz-details">
                        <div class="dz-size"><span data-dz-size=""></span></div>
                        <div class="dz-filename"><span data-dz-name=""></span></div>
                    </div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                    <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                    <div class="dz-success-mark">
                      <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                          <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                          <title>Check</title>
                          <desc>Created with Sketch.</desc>
                          <defs></defs>
                          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                              <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                          </g>
                      </svg>
                    </div>
            
                    <div class="dz-error-mark">
                      <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                        <title>error</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                          <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                              <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                          </g>
                        </g>
                      </svg>
                    </div>

                  </div>
                </div>
              <!-- End Dropzone Preview Template -->
              </form>
              <div style="padding-top:10px" class="form-group">
                  <div class="col-lg-6" align="center">
                    <button class="btn btn-primary btn-md" id="clearButton"
                                  >Clear</button>
                    <button class="btn btn-primary btn-md" id="previewButton"
                                 >Preview</button>
                    <button class="btn btn-primary btn-md" id="submitButton"
                                  >Submit</button>
                  </div>
              </div>
            </div> <!-- end of wel-->
          </div>
          <div class="col-lg-2">
          </div>
        </div>
      </div>
    </section>


  <script type="text/javascript">

    $( document ).ready(function(){

      $('#keywords').hashtags();
      $('#keywords').textareaCounter();

      //Adding chosen
      $(".chosen").data("placeholder","Select Options...").chosen();

      //Free options
      $('#free').on('change', function(){
        if($('#free').is(":checked"))
        {
          $('#price').prop('disabled',true);
        }
        else
        {
          $('#price').prop('disabled',false);
        }

      });

      $("#clearButton").on('click', function(){
          document.getElementById('createForm').reset();  
      });

      //Submit button
      $('#previewButton').on('click', function(){

          var fileNameString = "";
          for(f=0;f<fileList.length;f++)
          {
            if(fileList[f].fileName != "GOO")
            {
                fileNameString = fileList[f].serverFileName+":"+fileNameString;
            }
          }
          $('#filenamestringId').val(fileNameString);
          $('#createForm').submit();

      });

      var photo_counter = 0;
      var filename = "";
      var fileList = new Array;
      var i =0;

      Dropzone.options.realDropzone = { 
      
        uploadMultiple: false,
        parallelUploads: 100,
        maxFilesize: 8,
        previewsContainer: '#dropzonePreview',
        previewTemplate: document.querySelector('#preview-template').innerHTML,
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',
        dictFileTooBig: 'Image is bigger than 8MB',
        maxFiles: 5,

     
        // The setting up of the dropzone
        init:function() {
     
            this.on("addedfile", function() {
                if (this.files[5]!=null){
                  this.removeFile(this.files[0]);
                }
            });

            this.on("removedfile", function(file) {
                var rmvFile = "";
                for(f=0;f<fileList.length;f++)
                {
                  if(fileList[f].fileName == file.name)
                  {
                      rmvFile = fileList[f].serverFileName;
                      fileList[f] = "GOO";
                  }
                }
                if(rmvFile === "")
                {
                    alert("Potential error in removing this file");
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '../product/removeuploads',
                    data: {id: rmvFile},
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        if(rep.code == 200)
                        {
                            photo_counter--;
                            $("#photoCounter").text( "(" + photo_counter + ")");
                        }
     
                    }
                });
     
            } );
        },
        error: function(file, response) {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        },
        success: function(file,response) {
            photo_counter++;
            $("#photoCounter").text( "(" + photo_counter + ")");
            if($.type(response) === "string")
              var msg = response;
            else
              var msg = response.message;
            fileList[i] = {"serverFileName" : msg, "fileName" : file.name,"fileId" : i };
            i++;
        }
     }



    });



  </script>
@stop
