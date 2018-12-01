<!DOCTYPE html>
<?php 

?>
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
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
                <li class="active">Balas Pesan</li>
            </ol>
        </div>
        <!--/.row-->
        <?php echo  form_open_multipart('interaksi/reply'); ?>
        
            <?php
                   if($ambilid->num_rows() != 0){
        foreach ($ambilid->result() as $row){
            ?>
            <div class="form-group">
                <label for="judul">Pesan</label>
                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                <p style="width:700px"><?php echo $row->pesan ?></p>
            </div>
            <div class="form-group">
                <label for="deskripsi">Balas</label>
                <textarea style="width:700px" name="deskripsi" class="form-control" rows="5" cols="50" id="deskripsi"><?php echo $row->reply ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php } } ?>
            </form>
        
    
    </div>
    <!--/.main-->

    <script src="<?php echo base_url(); ?>/jsAdmin/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/chart.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/ckfinder/ckfinder.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/chart-data.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/easypiechart.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/easypiechart-data.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/custom.js"></script>
    <script>
        window.onload = function() {
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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');

    </script>

</body>

</html>

