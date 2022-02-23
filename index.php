<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Dewan Datatables PHP - www.dewankomputer.com</title>
	<!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand text-white" href="index.php">
	    Dewan Komputer
	  </a>
	</nav>
	
	<div class="container mb-5">
		<h2 align="center" style="margin: 30px;">Menampilkan Data dari Database ke Tabel dengan Datatables PHP</h2>

		<div class="table-responsive">
			<table id="data" class="table table-striped table-bordered" style="width:100%">
			    <thead>
			        <tr>
			            <td>No</td>
			            <td>Nama Mahasiswa</td>
			            <td>Alamat</td>
			            <td>Jurusan</td>
			            <td>Jenis Kelamin</td>
			            <td>Tanggal Masuk</td>
			            <td>Aksi</td>
			        </tr>
			    </thead>
			    <tbody>
			        <?php
			            include 'koneksi.php';
			            $no = 1;
			            $query = "SELECT * FROM tbl_mahasiswa_search ORDER BY id DESC";
			            $dewan1 = $db1->prepare($query);
			            $dewan1->execute();
			            $res1 = $dewan1->get_result();
		                while ($row = $res1->fetch_assoc()) {
		                    $id = $row['id'];
		                    $nama_mahasiswa = $row['nama_mahasiswa'];
		                    $alamat = $row['alamat'];
		                    $jurusan = $row['jurusan'];
		                    $jenis_kelamin = $row['jenis_kelamin'];
		                    $tgl_masuk = $row['tgl_masuk'];
			        ?>
			            <tr>
			                <td><?php echo $no++; ?></td>
			                <td><?php echo $nama_mahasiswa; ?></td>
			                <td><?php echo $alamat; ?></td>
			                <td><?php echo $jurusan; ?></td>
			                <td><?php echo $jenis_kelamin; ?></td>
			                <td><?php echo $tgl_masuk; ?></td>
			                <td><button style='font-size: 11px;' data-id="<?php echo $id; ?>" class='btn btn-primary' id='detail' name='detail' title='Lihat Detail'><i class='fa fa-search'></i></button></td>
			            </tr>
			        <?php } ?>
			    </tbody>
			</table>
		</div>

		<div id="viewModal" class="modal fade mr-tp-100" role="dialog">
		    <div class="modal-dialog modal-lg flipInX animated">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h4 class="modal-title" id="myModalLabel" >View Data</h4>
		                <button type="button" class="close" data-dismiss="modal" >
		                    <span aria-hidden="true">&times;</span>
		                    <span class="sr-only">Close</span>
		                </button>
		            </div>
		            <div class="modal-body">
		            	<div class="form-group">
		            		<label>ID</label>
		            		<input type="text" id="id" class="form-control" readonly="">
		            	</div>
		            	<div class="form-group">
		            		<label>Nama Mahasiswa</label>
		            		<input type="text" id="nama_mahasiswa" class="form-control" readonly="">
		            	</div>
		            	<div class="form-group">
		            		<label>Alamat</label>
		            		<input type="text" id="alamat" class="form-control" readonly="">
		            	</div>
		            	<div class="form-group">
		            		<label>Jurusan</label>
		            		<input type="text" id="jurusan" class="form-control" readonly="">
		            	</div>
		            	<div class="form-group">
		            		<label>Jenis Kelamin</label>
		            		<input type="text" id="jenis_kelamin" class="form-control" readonly="">
		            	</div>
		            	<div class="form-group">
		            		<label>Tanggal Masuk</label>
		            		<input type="text" id="tgl_masuk" class="form-control" readonly="">
		            	</div>
		            </div>
		            <div class="modal-footer">
		            	<button class="btn btn-default" data-dismiss="modal">
		            		Close
		            	</button>
		            </div>
		        </div>
		    </div>
		</div>
		
    </div>

    <div class="p-2 text-white bg-secondary text-center">© <?php echo date('Y'); ?> Copyright:
	    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
	</div>
	
    <!-- Untuk Keperluan Demo Saya Menggunakan JQuery Online, Jika sobat menggunakan untuk keperluan developmen/production maka download JQuery pada situs resminya -->
    <!-- JQuery -->
    <script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
  	<script src="js/bootstrap.min.js"></script>
    <!-- DataTable -->
  	<script src="js/datatables.min.js"></script>

	<script type="text/javascript">
	    $(document).ready(function() {
	        let table = $('#data').DataTable();

	        $('#data tbody').on( 'click', '#detail', function () {
		        var current_row = $(this).parents('tr');
		        if (current_row.hasClass('child')) {
		            current_row = current_row.prev();
		        }
		        var data = table.row( current_row ).data();
		        let id = $(this).attr("data-id");

		        document.getElementById("id").value = id;
		        document.getElementById("nama_mahasiswa").value = data[1];
		        document.getElementById("alamat").value = data[2];
		        document.getElementById("jurusan").value = data[3];
		        document.getElementById("jenis_kelamin").value = data[4];
		        document.getElementById("tgl_masuk").value = data[5];

		        $("#viewModal").modal("show");
		    });

	    });
	</script>
</body>
</html>