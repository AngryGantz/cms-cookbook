        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="description" content="">
		<?php if(! isset($metaOptions)) $metaOptions = null; ?>
		<meta name="keywords" content="{{ Meta::getMetaKeywords($metaOptions) }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!--google fonts-->
{{-- 	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
 --}}
	    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    
	    <!--jquery ui stylesheet-->
	    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	    <!--selectric stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/selectric.css"/>
	    <!--font awesome stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/font-awesome.min.css"/>
	    <!--swipe box stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/swipebox.css"/>
	    <!-- mean menu stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/meanmenu.css"/>
	    <!--slick slider stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/slick.css"/>
	    <link rel="stylesheet" href="/assets/majestic/css/slick-theme.css"/>
		<!--bootstrap stylesheets-->
		<link rel="stylesheet" href="/assets/majestic/css/bootstrap.css"/>
		<link rel="stylesheet" href="/assets/majestic/css/bootstrap-theme.css"/>


	    <!--animate stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/animate.css"/>
	    <!--main stylesheet-->
	    <link rel="stylesheet" href="/assets/majestic/css/main.css"/>

	    <!-- site favicon -->
	    <link rel="icon" href="/assets/majestic/images/favicon.png" />


		<title>{{  $title or 'Food & Health' }} </title>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
