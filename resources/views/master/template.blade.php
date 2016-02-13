<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/../css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/../font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/../css/jquery-ui.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="/../css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/../css/creative.css" type="text/css">
</head>

<body id="page-top">

    <!-- jQuery -->
    <script src="/../js/jquery.js"></script>
    <script src="/../js/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/../js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/../js/jquery.easing.min.js"></script>
    <script src="/../js/jquery.fittext.js"></script>
    <script src="/../js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/../js/creative.js"></script>

    <!-- Chosen jQuery -->
    <script src="/../chosen/chosen.jquery.js"></script>
    <link rel="stylesheet" href="/../chosen/chosen.css" type="text/css">

    @include('partials.nav')

    @yield('content')

    @include('partials.footer')
    
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var university_objects = <?php echo json_encode($university_list) ?>;
            var university_list = [];

            university_objects.forEach( function (university_obj)
            {
                university_list.push(university_obj.name);
            });

            // DB returns first element as 'Choose University...', delete this from universities list
            jQuery("#university_name").autocomplete({
                source: university_list,
//                select: function(event, ui){
//                    jQuery("#university_name").val(ui.item.value)
//                }
            });

            jQuery("#searchsubmit").click(function(){
                var stringy = jQuery("#searchTerm").val() + " " + jQuery("#university_name").val();
                $('#headerForm').submit();                
            })
        });
    </script>
</html>
