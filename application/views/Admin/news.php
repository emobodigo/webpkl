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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />

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
                <a class="navbar-brand" href=""><span>Kominfo</span>Admin</a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger"> <h5><?php echo $_SESSION['error'] ?></h5></div>
        <?php } ?>
        <?php if(isset($_SESSION['success'])){?>
        <div class="alert alert-success"> <h5><?php echo $_SESSION['success'] ?></h5></div>
        <?php } ?>
        <?php if(isset($_SESSION['warning'])){?>
        <div class="alert alert-success"> <h5><?php echo $_SESSION['warning'] ?></h5></div>
        <?php } ?>
        <?php if(isset($_SESSION['login'])){?>
        <div class="alert alert-info"> <h5><?php echo $_SESSION['login'] ?></h5></div>
        <?php } ?>
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
                <li class="active">Berita</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-11">
                <h1 class="page-header">Berita</h1>
            </div>
            <div class="col-lg-1">
                <a href="<?php echo site_url('admin/tambahBerita') ?>" class="btn btn-success page-header"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        <!--/.row-->

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tanggal Posting</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th style="width:100px;">Detail Nomor</th>
                    <th style="width:300px;">Detail News</th>
                    <th>Edittorial</th>
                    <th style="width:150px;">Action</th>
                </tr>

            </thead>
            <?php foreach($results as $row) { ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $row->tglposting ?>
                    </td>
                    <td>
                        <?php echo $row->judul ?>
                    </td>
                    <td>
                        <?php echo $row->deskripsi ?>
                    </td>
                    <td>
                        <?php echo $row->detailyn?>
                    </td>
                    <td>
                        <?php echo substr($row->detailnews, -100,600) ?>
                    </td>
                    <td>
                        <?php echo $row->editorial?>
                    </td>
                    <td>
                        <div class="row">
                            <?php echo anchor('admin/showEditBerita/'. $row->iddata, '<i class="btn btn-info fa fa-edit"></i>');?>
                            <?php echo anchor('admin/hapusBerita/'. $row->iddata, '<i class="btn btn-danger fa fa-trash"></i>' , array('onclick' => "return confirm('yakin ingin menghapus item ini?');"));?>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>

        <div class="col-sm-12">
            <p class="back-link">
                <?php echo $this->pagination->create_links(); ?>
            </p>
        </div>
    </div>
    <!--/.main-->

    <script src="<?php echo base_url(); ?>/jsAdmin/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/jsAdmin/chart.min.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#book-table').DataTable();
        });

    </script>
    <script>
    window.onload = function(){
    $('a').click(function () {
     $.miniNoty('Berita berhasil dihapus', $(this).attr('success'))
     return false;
})
}
    </script>

</body>

</html>
