<?php 
	require_once "../koneksi.php";
	require_once "../function.php";



	$kode 		= $_POST['id'] ?? '' ;
	$layanan 	= $_POST['layanan'] ?? '' ;
	$ket 		= $_POST['ket'] ?? '' ;
	$harga      = $_POST['harga'] ?? '' ;
	$nis 		= $_POST['nis'] ?? '' ;
	
	$isError = FALSE;
	$error = '';
	if(isset($_POST['submit'])){

		//validasi data
		if($kode == ''){
			$isError = TRUE;
			$error = 'Kode Software harap diisi!!';
		}
		if($layanan == ''){
			$isError = TRUE;
			$error = 'Nama Software harap diisi!!';
		}

		//simpan data ke database
		if(!$isError){
			$conn = open_connection();
			$query = "INSERT INTO dft_harga (id, layanan, ket, harga) VALUES ('$kode','$layanan','$ket','$harga' ) ";
			$hasil = mysqli_query($conn, $query);
			if($hasil){
				redirect('layanan/admin_layanan.php');
			} else {
				$isError = TRUE;
				$error = "gagal menyimpan ke database : " . mysqli_error($conn) ;
			}
		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "../contents/headscript.php"; ?>
    
</head>

<body>
    <?php include_once "../contents/navbar_admin.php"; ?>

    <div class="wrapper">
    	<div class="header">
	        <div class="row no-gutters">
	            <div class="col-auto">
	                <button class="btn  btn-link text-dark menu-btn"><img src="../assets/img/menu.png" alt=""><span class="new-notification"></span></button>
	            </div>
	            <!-- <div class="col text-center"><img src="assets/img/logo.png" alt="" class="header-logo"></div> -->
	            <div class="col-auto">
	            </div>
	        </div>
    	</div>
    	<div class="container-fluid bg-warning text-orange">
	        <div class="row">
	            <div class="container">
	                <div class="row  py-4 ">
	                    
	                </div>
	            </div>
       		</div>
   		</div>

   		<div class="container">
   			<center><h3 class="mb-3 my-3">Form Tambah Software</h3></center>
    		<br />
    		
    		
    		<br />

    		<?php if($isError): ?>
    			<div class="alert alert-danger" role="alert">
  					<?= $error ?>
				</div>
    		<?php endif; ?>

    		<form method="POST">
			  
			    <div class="form-group">
			      <label for="kd_software">ID Layanan</label>
			      <input type="text" class="form-control" id="id" name="id" placeholder="Masukan ID" value="" >
			    </div>
			 
			  
			  <div class="form-group">
			    <label for="nama">Nama Layanan</label>
			    <input type="text" class="form-control" id="layanan" name="layanan" placeholder="Masukan Nama layanan" value="">
			  </div>

			  <div class="form-group">
			    <label for="nama">basis</label>
			    <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukan keterangan" value="">
			  </div>

			  <div class="form-group">
			    <label for="nama">Harga</label>
			    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga" value="">
			  </div>

			 
			  <button type="submit" class="btn btn-info" name="submit">Submit</button>
			</form>

    	</div>
    </div>
    
    <?php include_once "../contents/footer.php"; ?>
</body>
</html>