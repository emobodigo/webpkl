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


</head>

<body>

    <div class="gtco-loader"></div>

    <div id="page">


        <header id="gtco-header" class="gtco-cover" role="banner">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-left">
                        <div class="display-t">
                            <div class="display-tc">
                                <div class="row">
                                    <div class="col-md-5 text-center header-img">
                                        <div style="height:100px;"></div>
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                                <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                                                <li data-target="#myCarousel" data-slide-to="4"></li>
                                                <li data-target="#myCarousel" data-slide-to="5"></li>
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner">
                                                <?php
                                                    $i  = 1;
                                                    foreach ($datagambar as $row) {
                                                    $Player     = $row->foto1;
                                                    $item_class = ($i == 1) ? 'item active' : 'item';
                                                    ?>
                                                    <div class="<?php echo $item_class; ?>">
                                                        <a href="#">
                                                            <img src="<?php echo base_url('images/'. $Player); ?>" class="img-responsive" style="height:300px; width: 600px" />
                                                        </a>
                                                    </div>
                                                    <?php
                                                    $i++;
                                                    }
                                                    ?>
                                            </div>

                                            <!-- Left and right controls -->
                                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
    <span class="sr-only">Previous</span>
  </a>
                                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
    <span class="sr-only">Next</span>
  </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 copy" id="TeksUtama">
                                        <img src="<?php echo base_url() ?>/images/kominfo.png" alt="Gambar logo kominfo" class="img-responsive" style="height: 200px">
                                        <h1>Menyalurkan segala informasi.</h1>
                                        <p>Media informasi masyarakat dan pemerintah, kunjungi halaman kami untuk lebih banyak informasi.</p>
                                        <p><a href="#section2" class="btn btn-white">JELAJAHI LEBIH BANYAK</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END #gtco-header -->

        <div class="gtco-services gtco-section">
            <div class="row">

                <!-- Post Content Column -->
                <div class="col-md-1 col-sm-0 col-xs-0"></div>
                <div class="col-md-7 col-sm-12 col-xs-12" id="section2">
                    <?php 
                        $div1 = array_slice($all_data,0, 11, true);
                        foreach ($div1 as $row){ ?>
                    <?php
                            $image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
                        ?>
                        <div class="list-group">
                            <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="row" style="padding: 5px 5px 5px 5px">
                                    <div class="col-md-3 col-sm-3 col-xs-5">
                                        <img src="<?php echo base_url('upload/'. $image) ?>" class="img-responsive shadow">
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-7">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h3 class="mb-1" style="font-family: 'Roboto', Arial, sans-serif;">
												<?php echo $row->judul; ?>
												<br>
												<small><?php echo $row->tglposting; ?></small>
												<br>
												<small><?php echo $row->deskripsi; ?></small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <?php } ?>
                        <div class="col-md-12 text-center">
                            <p><a href="<?php echo site_url('berita') ?>" class="btn btn-info">Lihat lebih banyak berita</a></p>
                        </div>
                </div>


                <!-- Sidebar Widgets Column -->

                <div class="col-md-3">
                    <div class="service-wrap">
                        <h3 class="text-center">Buku Tamu</h3>
                        <div class="service">
                            <?php $div2 = array_slice($tamu, 0, 4) ?>
                            <?php foreach($div2 as $row) { ?>
                            <div>
                                <p style="font-weight:bold; margin-bottom:0;">
                                    <?php echo $row->tanggal; ?>
                                </p>
                                <p style="margin-bottom:0;">
                                    <?php echo $row->pesan; ?>
                                </p>
                                <p style="color:#0289ff; margin-bottom:0;">
                                    <?php echo $row->email; ?>
                                </p>
                                <hr>
                            </div>
                            <?php } ?>
                            <a href="<?php echo site_url("interaksi") ?>" class="btn btn-primary btn-block" style="font-size:9px;">Lihat lebih dari Buku Tamu <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>

                    <div class="service-wrap">
                        <div class="service">
                            <img src="<?php echo base_url() ?>/images/pengaduan.jpg">
                            <p>Pengaduan masyarakat adalah layanan yang diperuntukan masyarakat yang ingin melaporkan keluhannya ke pemerintah.</p>
                            <a href="<?php echo site_url('interaksi/') ?>" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                    <div class="service-wrap">
                        <div class="service">
                            <img src="<?php echo base_url() ?>/images/ppid.jpg">
                            <p>PPID adalah layanan yang bisa digunakan untuk mengetahui informasi yang ada pada suatu daerah.</p>
                            <a href="<?php echo site_url('welcome/getData') ?>" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1"></div>
            </div>
        </div>

        <!-- <div class="gtco-services gtco-section" style="padding: 2em 0 0;">
            <div class="gtco-container">
                <div class="row row-pb-md">
                    <div class="col-md-4 col-sm-4 service-wrap">
                        <div class="service">
                            <img src="<?php echo base_url() ?>/images/pengaduan.jpg">
                            <p>Pengaduan masyarakat adalah layanan yang diperuntukan masyarakat yang ingin melaporkan keluhannya ke pemerintah.</p>
                            <a href="#" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 service-wrap">
                        <div class="service">
                            <img src="<?php echo base_url() ?>/images/ppid.jpg">
                            <p>PPID adalah layanan yang bisa digunakan untuk mengetahui informasi yang ada pada suatu daerah.</p>
                            <a href="#" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 service-wrap">
                        <div class="service">
                            <img src="<?php echo base_url() ?>/images/map.png" style="height:91px; width:220px;">
                            <p>Lihat lokasi kantor Dinas Kominfo menggunakan google map.<br/><br/><br/></p>
                            <a href="https://www.google.co.id/maps/place/Dinas+Komunikasi+dan+Informatika/@-7.9265295,112.650667,18z/data=!4m8!1m2!2m1!1sdinas+Komunikasi+dan+informatika+kabupaten+Malang!3m4!1s0x2dd6298e932f9373:0xa947325c3d98a709!8m2!3d-7.9264446!4d112.6511093" target="_blank" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>

                    <div class="clearfix visible-md-block visible-sm-block"></div>

                </div>
            </div>
        </div> -->
        <!-- END .gtco-services -->
        <div class="gtco-section gtco-products" style="padding-top: 0;">
            <div class="gtco-heading text-center">
                <br>
                <h2 style="text-weight:bold">Temukan Lokasi Kantor Kami</h2>
                <p>Lokasi kantor kami dalam tampilan google map. klik salah satu kantor untuk melihat lebih dekat lokasi.</p>
            </div>
            <div class="gtco-container">
                <div id="map">My map will go here</div>

                <script>
                    function myMap() {
                        var myLatlng = {
                            lat: -7.996620,
                            lng: 112.632632
                        };

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 11,
                            center: myLatlng
                        });

                        var arjosari = {
                            lat: -7.9247804,
                            lng: 112.6496503
                        };
                        var marker1 = new google.maps.Marker({
                            position: arjosari,
                            map: map,
                            title: 'Arjosari'
                        });

                        var kantorpusat = {
                            lat: -7.982815,
                            lng: 112.6229573
                        };
                        var marker2 = new google.maps.Marker({
                            position: kantorpusat,
                            map: map,
                            title: 'Kantor Pusat'
                        });

                        var radiokanjuruhan = {
                            lat: -8.1301236,
                            lng: 112.5633204
                        };
                        var marker3 = new google.maps.Marker({
                            position: radiokanjuruhan,
                            map: map,
                            title: 'Dinas Pengairan'
                        });

                        var kantorbupati = {
                            lat: -8.1414421,
                            lng: 112.5663904
                        };
                        var marker4 = new google.maps.Marker({
                            position: kantorbupati,
                            map: map,
                            title: 'Kantor Bupati'
                        });

                        map.addListener('center_changed', function() {
                            // 3 seconds after the center of the map has changed, pan back to the
                            // marker.
                            window.setTimeout(function() {
                                map.panTo(marker.getPosition());
                            }, 3000);
                        });

                        marker1.addListener('click', function() {
                            map.setZoom(15);
                            map.setCenter(marker1.getPosition());
                        });

                        marker2.addListener('click', function() {
                            map.setZoom(15);
                            map.setCenter(marker2.getPosition());
                        });

                        marker3.addListener('click', function() {
                            map.setZoom(15);
                            map.setCenter(marker3.getPosition());
                        });

                        marker4.addListener('click', function() {
                            map.setZoom(15);
                            map.setCenter(marker4.getPosition());
                        });
                    }

                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPqwgc0qWBB9VpRU3qrZ-WLqFIJ1nMw-0&callback=myMap"></script>
                <div class="service-wrap text-center">
                    <div class="service">
                        <br>
                        <p style="margin-bottom:0;">Alamat : Jl. Raya Malang No. 0, Kota Malang</p>
                        <p style="margin-bottom:0;">Telp. (0341) 1234567,</p>
                        <p style="margin-bottom:0;">Fax (0341) 1234567, 12345678, 1234567</p>
                        <p style="margin-bottom:0;">Email: kominfomalangkab@<span class="skimlinks-unlinked">kominfo.malangkab.go.id</span></p>
                        <p style="margin-bottom:0;">Situs Web :&nbsp; <a href="http://www.kominfo.malangkab.go.id/">http://www.kominfo.malangkab.go.id/</a></p>
                    </div>
                </div>
        
                <!-- <p style="margin-bottom:0;">Alamat : Jl. Raya Malang No. 0, Kota Malang</p>
                <p style="margin-bottom:0;">Telp. (0341) 1234567,</p>
                <p style="margin-bottom:0;">Fax (0341) 1234567, 12345678, 1234567</p>
                <p style="margin-bottom:0;">Email: kominfomalangkab@<span class="skimlinks-unlinked">kominfo.malangkab.go.id</span></p>
                <p style="margin-bottom:0;">Situs Web :&nbsp; <a href="http://www.kominfo.malangkab.go.id/">http://www.kominfo.malangkab.go.id/</a></p> -->

            </div>
        </div>
    </div>

    <!--  <div class="gtco-section gtco-products" style="padding-top: 0;">
            <div class="gtco-container">
                <div class="row row-pb-sm">
                    <div class="col-md-8 col-md-offset-2 gtco-heading text-center">
                        <h2 style="text-weight:bold">Berita Terkini</h2>
                        <p>Berita terbaru saat ini. klik pada gambar untuk mengetahui detail dari berita yang disajikan.</p>
                    </div>
                </div>
                <div class="row row-pb-sm">
                    <div class="col-md-4 col-sm-4">
                        <?php 
                        $div1 = array_slice($all_data,0, 2, true);
                        $div2 = array_slice($all_data,2, 1, true);
                        $div3 = array_slice($all_data,3, 2, true);
                        foreach ($div1 as $row){ ?>
                        <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                        <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item two-row bg-img animate-box" style="background-image: url(<?php echo base_url('upload/'. $image) ?>)">
                            <div class="overlay">
                                <i class="ti-arrow-top-right"></i>
                                <div class="copy">
                                    <h3>
                                        <?php echo $row->judul; ?> </h3>
                                    <p>
                                        <?php echo $row->deskripsi; ?> </p>
                                </div>
                            </div>

                            <img src="<?php echo base_url() ?>/images/s1.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                        </a>
                        <?php } ?>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <?php foreach ($div2 as $row){ ?>
                        <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                        <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item one-row bg-img animate-box" style="background-image: url(<?php echo base_url('upload/'. $image) ?>">
                            <div class="overlay">
                                <i class="ti-arrow-top-right"></i>
                                <div class="copy">
                                    <h3>
                                        <?php echo $row->judul; ?>
                                    </h3>
                                    <p>
                                        <?php echo $row->deskripsi; ?>
                                    </p>
                                </div>
                            </div>
                            <img src="<?php echo base_url() ?>/images/p.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                        </a>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-4">


                        <?php foreach ($div3 as $row){ ?>
                        <?php
$image = !empty($row->foto1) ? $row->foto1 : "/images/default.png";
?>
                            <a href="<?php echo site_url("berita/showBerita/") ?><?php echo $row->iddata ?>" class="gtco-item two-row bg-img animate-box" style="background-image: url(<?php echo base_url('upload/'. $image) ?>">
                                <div class="overlay">
                                    <i class="ti-arrow-top-right"></i>
                                    <div class="copy">
                                        <h3>
                                            <?php echo $row->judul; ?>
                                        </h3>
                                        <p>
                                            <?php echo $row->deskripsi; ?>
                                        </p>
                                    </div>
                                </div>
                                <img src="<?php echo base_url() ?>/images/s4.jpg" class="hidden" alt="Free HTML5 Website Template by GetTemplates.co">
                            </a>
                            <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><a href="<?php echo site_url('berita') ?>" class="btn btn-info">Lihat lebih banyak berita</a></p>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- END .gtco-products -->

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
    <script>
        function pageScroll() {
    	window.scroll(0,770);
    }
    </script>
    <script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

</body>

</html>
