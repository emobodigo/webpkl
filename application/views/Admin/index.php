<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kominfo - Admin</title>
	<link href="<?php echo base_url(); ?>/cssAdmin/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link href="<?php echo base_url(); ?>/cssAdmin/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/cssAdmin/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>/jsAdmin/html5shiv.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Kominfo</span>Admin</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	 <!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger"> <h5><?php echo $_SESSION['error'] ?></h5></div>
        <?php } ?>
        <?php if(isset($_SESSION['login'])){?>
        <div class="alert alert-info"> <h5><?php echo $_SESSION['login'] ?></h5></div>
        <?php } ?>
        <?php if(isset($_SESSION['upload'])){?>
        <div class="alert alert-success"> <h5><?php echo $_SESSION['upload'] ?></h5></div>
        <?php } ?>
        <?php if(isset($_SESSION['warning'])){?>
        <div class="alert alert-warning"> <h5><?php echo $_SESSION['warning'] ?></h5></div>
        <?php } ?>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
        
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-newspaper-o color-blue"></em>
							<div class="large"><?php echo $allnews ?></div>
							<div class="text-muted">Berita</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?php echo $alltamu ?></div>
							<div class="text-muted">Pesan</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo $alluser ?></div>
							<div class="text-muted">User</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-bar-chart color-red"></em>
							<div class="large"><?php echo $allvisitor ?></div>
							<div class="text-muted">Visitor</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

        <div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Bermanfaat Sekali</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $satu; ?>" ><span class="percent"><?php echo $satu ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Cukup Bermanfaat</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $dua; ?>" ><span class="percent"><?php echo $dua; ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Kurang Bermanfaat</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $tiga; ?>" ><span class="percent"><?php echo $tiga; ?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Tidak Bermanfaat</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $empat; ?>" ><span class="percent"><?php echo $empat; ?>%</span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
		<div class="row" >
            <div class="panel-heading" style="background-color: white" >
						Slideshow
						<a href="<?php echo site_url('admin/viewtambahSlideshow') ?>"><span class="pull-right btn btn-success"><em class="fa fa-plus"></em></span></a></div>
            <?php 
   
    foreach($slider as $row){ ?>
			<div class="col-xs-7 col-md-4" >
                <?php $gambar = $row->foto1; 
                                           ?>
                <div class="card-deck">
                  <div class="card bg-primary">
                      <img class="img-responsive" src="<?php echo base_url('images/'. $gambar); ?>" alt="<?php echo $row->caption ?>" >
                     <div class="card-body text-center">
                         <br>
                    <p class="card-text"><?php echo anchor('admin/deleteSlideshow/'. $row->id,  '<i class="btn btn-danger fa fa-trash"></i>' , array('onclick' => "return confirm('yakin ingin menghapus item ini?');"));?>&nbsp;<?php echo anchor('admin/showEditSlideshow/'. $row->id,  '<i class="btn btn-info fa fa-edit"></i>');?></p>
                         
                     </div>
                    </div>
                </div>
                <br>
            </div>
            <?php } ?>
            

		</div><!--/.row-->
		
		
	</div>	<!--/.main-->
	
	<script src="<?php echo base_url(); ?>/jsAdmin/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/jquery.miniNoty.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/chart-data.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>/jsAdmin/custom.js"></script>
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
    <script>
        $().ready(function () {

      $(".nav menu li").each(function(n) {
            $(this).attr("href", "link" + n);
      });

});
    </script>
    <script>
        var i=0;
        $('li.parent').each(function(){
        i++;
        var newID='#sub-item'+i;
        $(this).attr('href',newID);
        $(this).val(i);
    });
    </script>
		
</body>
</html>