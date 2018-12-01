<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kominfo - Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="<?php echo base_url() ?>/cssAdmin/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>/cssAdmin/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url() ?>/jsAdmin/html5shiv.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $this->session->userdata('nama') ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><?php echo $this->session->userdata('jabatan') ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">

            <li><a href="<?php echo site_url('admin')?>"><em class="fa fa-home">&nbsp;</em> Beranda</a></li>
            <li><a href="<?php echo site_url('user') ?>"><em class="fa fa-users">&nbsp;</em> User</a></li>
            <li><a  href="<?php echo site_url('pageadmin')?>"><em class="fa fa-file">&nbsp;&nbsp;&nbsp;</em>Pages</a></li>
            <li><a  href="<?php echo site_url('pageadmin/navigate')?>"><em class="fa fa-code">&nbsp;</em> Navigasi</a></li>
            <li><a  href="<?php echo site_url('interaksi/admintamu')?>"><em class="fa fa-comments-o">&nbsp;</em> Buku Tamu
            <?php if($reader != 0){ ?><span class="pull-right btn btn-danger"><?php echo $reader ?></span><?php } ?></a></li>
            <li><a href="<?php echo site_url('admin/goBerita')?>"><em class="fa fa-newspaper-o">&nbsp;</em> Berita</a></li>
            <li><a href="<?php echo site_url('admin/uploadAdmin')?>"><em class="fa fa-download">&nbsp;&nbsp;</em> Upload</a></li>
			<li><a href="<?php echo site_url('login/logout') ?>"><em class="fa fa-power-off">&nbsp;&nbsp;</em> Keluar</a></li>
		</ul>
	</div>!--/.sidebar-->
		
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/chart.min.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/chart-data.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/easypiechart.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/easypiechart-data.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>/jsAdmin/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>