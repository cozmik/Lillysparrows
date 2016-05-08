<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lillysparrows | Home </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '195095480833016',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div style="position:absolute; height: 80%; width: 80%; margin-left: 10%; opacity: 0.4">
    
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     viewBox="0 0 200 200" style="enable-background:new 0 0 200 200;" xml:space="preserve">
<style type="text/css">
    .st0{fill:none;}
    .st1{fill:#EC008C;}
    .st2{fill:#808285;}
    .st3{font-family:'Tahoma';}
    .st4{font-size:92.668px;}
</style>
<g id="XMLID_8_">
    <circle id="XMLID_1_" class="st0" cx="100" cy="100" r="89.7"/>
    <circle id="XMLID_3_" class="st1" cx="100" cy="10.3" r="6.2"/>
    <circle id="XMLID_4_" class="st1" cx="185.3" cy="72" r="6.2"/>
    <circle id="XMLID_5_" class="st1" cx="152.8" cy="172.6" r="6.2"/>
    <circle id="XMLID_6_" class="st1" cx="47.4" cy="172.6" r="6.2"/>
    <circle id="XMLID_7_" class="st1" cx="14.7" cy="72" r="6.2"/>

    <animateTransform attributeName="transform"
             attributeType="XML"
             type="rotate"
             from="0 100 100"
             to="360 100 100"
             dur="1200s"
             repeatCount="indefinite" />
</g>
<text id="XMLID_2_" transform="matrix(1 0 0 1 29.3462 119.3271)" class="st2 st3 st4">LS</text>
</svg>
</div>

    <header class="navbar navbar-inverse navbar-fixed-top primary-pink" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" class="home">LillySparrows</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="index ajaxd"><a href="#/home">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu dCategories">
                        	<!-- load category list with php -->
                        </ul>
                    </li>
                    <li class="story ajaxed"><a href="#/stories">Stories</a></li>
                    <li class="aboutUs"><a href="#/about-us">About Lillysparrows</a></li>
            
                </ul>
            </div>
        </div>
    </header><!--/header-->