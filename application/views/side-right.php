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
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>


   

        

        <div class="container">

            

                <!-- Post Content Column -->

                <div class="col-md-8">

                    

                </div>


                <!-- Sidebar Widgets Column -->
            <div class="right_col col-md-4">
                
                    <marquee direction="down" scrollamount="2" scrolldelay="500" onmouseover="this.stop()" onmouseout="this.start()" style="height:500px; border:1px solid #eaeaea;">
                        <!-- Subtitle -->
                        <div style=" height:360px">
                            <?php foreach($results as $row) { ?>
                            <div class="panel panel-white post panel-shadow">
                                <div class="post-heading">
                                    <div class="pull-left image">
                                        <img src="<?php echo base_url($row->gambar) ?>" class="img-circle avatar" alt="user profile image">
                                    </div>
                                    <div class="pull-left meta">
                                        <div class="title h5">
                                            <a href="#"><b><?php ?></b></a>
                                        </div>
                                        <h6 class="text-muted time">1 minute ago</h6>
                                    </div>
                                </div>
                                <div class="post-description">
                                    <p style="color:#000000; font-size:12px;">Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css hmtl js framework. Codes for developers and web designers</p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Subtitle -->

                    </marquee>
                
                    <p><br/></p>
                    <aside id="categories-3" class="widget widget_categories" style="border:2px solid #eaeaea;">
                        <h1 class="widget-title">Statistik</h1>
                        <div align="center">
                            <p align="center"><img src="./images/beranda/4.png" alt="4" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/0.png" alt="0" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/2.png" alt="2" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/5.png" alt="5" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/1.png" alt="1" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"><img src="./images/beranda/7.png" alt="7" title="Angka ini merupakan total hits/kunjungan ke setiap halaman"> </p>
                            <div style="margin-top:6px; text-align:center"><img src="./images/beranda/hariini.png" align="absmiddle"> Pengunjung hari ini : <strong>11</strong> <br>
                                <img src="./images/beranda/total.png" align="absmiddle"> Total pengunjung : <strong>87801</strong> <br>
                                <img src="./images/beranda/hariini.png" align="absmiddle"> Hits hari ini : <strong>28</strong> <br>
                                <img src="./images/beranda/online.png" align="absmiddle"> Pengunjung Online: <strong>2</strong><br></div>
                        </div>
                    </aside>
                    
                    <aside id="categories-3" class="widget widget_categories" style="border:2px solid #eaeaea;">
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
            
    </div>
        


        <!-- END #gtco-header -->

       

  

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>

</body>

</html>
