<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<?php 
    if($ambilid->num_rows() != 0){
        foreach ($ambilid->result() as $row){

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Web Kominfo New</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="gettemplates.co" />

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

    <div id="page">

        <div class="gtco-container">

            <div class="left_col">
            
                <div class="row">
                <!-- Post Content Column -->
                <div class="col-md-8">

                    <!-- Title -->
                    <br>
                    <h1 class="mt-4"><?php echo $row->judul; ?></h1>

                    <hr>

                    <!-- Date/Time -->
                    <p><?php echo $row->tglposting; ?></p>
                    <hr>
                    <img class="img-responsive" src="<?php echo base_url('upload/'. $row->foto1) ?>" >
                    
                    
                    <!-- Post Content -->
                    <p class="text-justify"><?php echo $row->detailnews; ?> </p>
                   
                    <!-- End Post Content -->
                </div>
                <?php } } ?>
                    <br>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="gtco-section gtco-products" style="padding-top: 0;">
                        <div class="gtco-container">
                            <div class="row row-pb-sm">
                                <div class="col-md-12 col-sm-12">
                                    <?php 
                        $div1 = array_slice($all_data,0, 1, true);
                        $div2 = array_slice($all_data,1, 1, true);
                        $div3 = array_slice($all_data,2, 1, true);
                        $div4 = array_slice($all_data,3, 1, true);
                        $div5 = array_slice($all_data,4, 1, true);
                        ?> 
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <?php foreach ($div1 as $row){ ?>
                                            <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                                            <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item two-row bg-img animate-box img-rounded" style="background-image: url(<?php echo base_url('upload/'. $image) ?>); width:170px; height:170px; margin-bottom:0.5em;">
                                                <div class="overlay">
                                                    <i class="ti-arrow-top-right"></i>
                                                    <div class="copy">
                                                        <h3><?php echo $row->judul; ?></h3>
                                                        
                                                    </div>
                                                </div>
                                                <img src="images/s1.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <?php foreach ($div2 as $row){ ?>
                                            <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                                            <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item two-row bg-img animate-box img-rounded" style="background-image: url(<?php echo base_url('upload/'. $image) ?>); width:170px; height:170px; margin-bottom:0.5em;">
                                                <div class="overlay">
                                                    <i class="ti-arrow-top-right"></i>
                                                    <div class="copy">
                                                        <h3><?php echo $row->judul; ?></h3>
                                                        
                                                    </div>
                                                </div>
                                                <img src="images/s2.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                                            </a>
                                            <?php }?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <?php foreach ($div3 as $row){ ?>
                        <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                                    <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item one-row bg-img animate-box img-rounded" style="background-image: url(<?php echo base_url('upload/'. $image) ?>); width:350px; height:170px; margin-bottom:0.5em;">
                                        <div class="overlay">
                                            <i class="ti-arrow-top-right"></i>
                                            <div class="copy">
                                                <h3><?php echo $row->judul; ?></h3>
                                                
                                            </div>
                                        </div>
                                        <img src="images/p.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                                    </a>
                                    <?php } ?>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <?php foreach ($div4 as $row){ ?>
                        <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                                            <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item two-row bg-img animate-box img-rounded" style="background-image: url(<?php echo base_url('upload/'. $image) ?>) ; width:170px; height:170px; margin-bottom:0.5em;">
                                                <div class="overlay">
                                                    <i class="ti-arrow-top-right"></i>
                                                    <div class="copy">
                                                        <h3><?php echo $row->judul;?></h3>
                                                       
                                                    </div>
                                                </div>
                                                <img src="images/s3.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                                            </a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <?php foreach ($div5 as $row){ ?>
                        <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                                            <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item two-row bg-img animate-box img-rounded" style="background-image: url(<?php echo base_url('upload/'. $image) ?>); width:170px; height:170px; margin-bottom:0.5em;">
                                                <div class="overlay">
                                                    <i class="ti-arrow-top-right"></i>
                                                    <div class="copy">
                                                        <h3><?php echo $row->judul;?></h3>
                                                        
                                                    </div>
                                                </div>
                                                <img src="images/s2.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                                            </a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p><a href="<?php echo site_url('berita') ?>" target="_blank" class="btn btn-info">Lihat lebih banyak berita</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <aside id="categories-3" class="widget widget_categories" style="">
                        <h1 class="widget-title">Statistik</h1>
                        <div align="center">
                            <div style="margin-top:6px; text-align:left"><img src="<?php echo base_url()?>/images/visitor1.png"  style="width:28px; height:28px;" align="absmiddle"> Pengunjung hari ini : <strong><?php echo $online ?></strong> <br>
                                <img src="<?php echo base_url()?>/images/visitor.png"  style="width:28px; height:28px;" align="absmiddle"> Total pengunjung : <strong><?php echo $h; ?></strong> <br>
                                <img src="<?php echo base_url()?>/images/hits.png"  style="width:28px; height:28px;" align="absmiddle"> Hits hari ini : <strong><?php echo $hits ?></strong> <br>
                                <!-- BEGIN: Powered by Supercounters.com -->
<img src="<?php echo base_url()?>/images/browser.png"  style="width:28px; height:28px;" align="absmiddle"> Pengunjung Online : &nbsp;<script type="text/javascript" src="//widget.supercounters.com/ssl/online_i.js"></script><script type="text/javascript">sc_online_i(1507101,"00000","#46b8da");</script><br><noscript><a href="http://www.supercounters.com/">Free Online Counter code</a></noscript>

<!-- END: Powered by Supercounters.com -->
                          </div>
                        </div>
                        <br>
                    </aside>

                    <aside id="categories-3" class="widget widget_categories" style="">
                        <h1 class="widget-title">Polling</h1>
                        <div class="container">
    <div class="row">
        <div class="col-md-3" style="padding-left: 8px;">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-arrow-right"></span>Apakah Website ini bermanfaat?
                    </h3>
                </div>
                <?php echo  form_open_multipart('welcome/vote'); ?>
                <div class="panel-body" >
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="vote" value="1">
                                    Bermanfaat Sekali
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="vote" value="2">
                                    Cukup Bermanfaat
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="vote" value="3">
                                    Kurang Bermanfaat
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="vote" value="4">
                                    Tidak Bermanfaat
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php ?>
                
                <div class="panel-footer">
                    <?php if($validate == 0) { ?>
                    <button type="submit" style="height: 25px;" class="btn btn-info btn-sm text-center">
                        Vote</button>
                    <?php } else { ?>
                    <button type="submit" disabled style="height: 25px;" class="btn btn-info btn-sm text-center">
                        Vote</button>
                    <div class="alert alert-warning"> <h5>Anda sudah melakukan vote</h5>
                    <?php } ?>
                    <?php if(isset($_SESSION['sukses'])){?>
                        <div class="alert alert-success"> <h5><?php echo $_SESSION['sukses'] ?></h5></div>
                    <?php } ?>
            </div>
                </form>
        </div>
        
    </div>

                    </aside>
                </div>


                <!-- Sidebar Widgets Column -->
               

            
                </div>
        </div>
        </div>


        <!-- END #gtco-header -->

        
        <!-- END .gtco-services -->


    </div>

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
