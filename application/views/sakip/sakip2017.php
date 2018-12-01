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

    <!-- Modernizr JS -->
    <script src="<?php echo base_url() ?>/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="<?php echo base_url() ?>/js/respond.min.js"></script>
	<![endif]-->
    <script type="text/javascript" src="<?php echo base_url() ?>/js/crawler.js">
        /* Text and/or Image Crawler Script v1.53 (c)2009-2011 John Davenport Scheuer
                as first seen in http://www.dynamicdrive.com/forums/
                username: jscheuer1 - This Notice Must Remain for Legal Use
                */

    </script>

</head>

<body>

    <div class="gtco-loader"></div>

    <div id="page">

        <div class="gtco-container">

            <div class="left_col">

                <div class="row">
                    <!-- Post Content Column -->

                    <div class="col-md-8">
                        <?php 
                            foreach ($konten as $row){
                        ?>
                        <!-- Title -->
                        <br>
                        <h3 class="mt-4">
                            <?php echo $row->judul ?>
                        </h3>

                        <hr>

                        <!-- Date/Time -->
                        <p style="color:#3ac1bc">Updated on
                            <?php echo $row->tglupdate ?>
                        </p>
                        
                        <!-- Post Content -->
                      
                         
                           
                        <p><?php echo $row->detail?> </p>

                        <!-- End Post Content -->
                    </div>
                        <?php }  ?>



                     <br>
                    <div class="col-md-4">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                                        <div class="col-md-6">
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
                            <p align="center"><img src="./images/beranda/4.png" alt="4" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/0.png" alt="0" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/2.png" alt="2" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/5.png" alt="5" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/1.png" alt="1" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/7.png" alt="7" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"> </p>
                            <div style="margin-top:6px; text-align:center"><img src="./images/beranda/hariini.png" align="absmiddle"> Pengunjung hari ini : <strong>11</strong> <br>
                                <img src="./images/beranda/total.png" align="absmiddle"> Total pengunjung : <strong>87801</strong> <br>
                                <img src="./images/beranda/hariini.png" align="absmiddle"> Hits hari ini : <strong>28</strong> <br>
                                <img src="./images/beranda/online.png" align="absmiddle"> Pengunjung Online: <strong>2</strong><br></div>
                        </div>
                    </aside>

                    <aside id="categories-3" class="widget widget_categories" style="">
                        <h1 class="widget-title">Polling</h1>
                        <div style="padding-left:10px; padding-right:5px" align="center">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td>


                                            <form action="http://kominfo.malangkab.go.id/vote.php" method="post" style="margin:0px; padding:5px 0px">

                                                <input name="choice" type="radio" value="0">
                                                <span style="font-family:Arial; font-size:11px; line-height:15px">
					Bermanfaat sekali</span>
                                                <br>
                                                <input name="choice" type="radio" value="1">
                                                <span style="font-family:Arial; font-size:11px; line-height:15px"> 
					Cukup bermanfaat</span>
                                                <br>
                                                <input name="choice" type="radio" value="2">
                                                <span style="font-family:Arial; font-size:11px; line-height:15px">
                    Kurang bermanfaat</span>
                                                <br>
                                                <input name="choice" type="radio" value="3">
                                                <span style="font-family:Arial; font-size:11px; line-height:15px"> 
                    Tidak bermanfaat</span>

                                                <br><input name="submit" type="submit" value="Pilih" style="margin-top:5px;">
                                                <br>Total <strong>310</strong> votes
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
