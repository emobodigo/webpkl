<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Kominfo New</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Modernizr JS -->
    <script src="<?php echo base_url() ?>/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="<?php echo base_url() ?>/js/respond.min.js"></script>
	<![endif]-->

</head>

<body>

    <div class="gtco-loader"></div>


        <nav class="gtco-nav" role="navigation">
            
            <div class="gtco-container-nav">

				<div class="row">
					<div class="col-md-9 col-xs-9 col-sm-9">
						<div id="gtco-logo">
							<a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>/images/Malang.png"  style="height: 40px; width: 60px;"></a>
						</div>
					</div>
					<div class="gtco-contact">
						<div class="gtco-social-icons">
							<a href="<?php echo base_url() ?>"><img  src="<?php echo base_url() ?>/images/Facebook.png" ></a>
							<a href="<?php echo base_url() ?>"><img  src="<?php echo base_url() ?>/images/Twitter.png" ></a>
							<a href="<?php echo base_url() ?>"><img  src="<?php echo base_url() ?>/images/Google+.png" ></a>
							<a href="<?php echo base_url() ?>"><img  src="<?php echo base_url() ?>/images/Youtube.png" ></a>
							<a href="<?php echo base_url() ?>"><img  src="<?php echo base_url() ?>/images/Linkedin.png" ></a>
							
						</div>
					
						
					</div>
				</div>
			</div>
			<div class="gtco-nav-link">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12 text-center menu-1">
                        <ul>
                            <?php foreach($menus as $row) { ?>
                            <?php $coba = $row->punyasub; 
                                if($coba != 1) {    
                            ?>
                            <?php if($row->file == "welcome/nav/"){ ?>
                            <li class=""><a href="<?php echo site_url($row->file); ?><?php echo $row->idhal ?>"><?php echo $row->menu ?></a></li>
                            <?php } else { ?>
                            <li class=""><a href="<?php echo site_url($row->file); ?>"><?php echo $row->menu ?></a></li>
                            
                            <?php }} else { ?>
                            <li class="has-dropdown">
                                <a href="#"><?php echo $row->menu ?></a>
                                <?php if(count($this->MNav->getChild($row->idmenu)) > 0) { ?>
                                <ul class="dropdown">
                                    <?php foreach($this->MNav->getChild($row->idmenu) as $row2) { ?>
                                    <?php if($row2->idhal == 10) { ?>
                                    <li><a href="<?php echo site_url("interaksi/");?>"><?php echo $row2->submenu ?></a></li>
                                    <?php } elseif($row2->idhal == 11) { ?>
                                    <li><a href="<?php echo site_url("interaksi/kontakc");?>"><?php echo $row2->submenu ?></a></li>
                                    <?php } else { ?>
                                    <li><a href="<?php echo site_url("welcome/nav/");?><?php echo $row2->idhal ?>"><?php echo $row2->submenu ?></a></li>
                                    <?php } } } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php }  ?>
                        </ul>
                    </div>
                </div>
			</div>
            
        </nav>

    
      
        

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="<?php echo base_url() ?>/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo base_url() ?>/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="<?php echo base_url() ?>/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?php echo base_url() ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url() ?>/js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="<?php echo base_url() ?>/js/main.js"></script>

</body>

</html>
