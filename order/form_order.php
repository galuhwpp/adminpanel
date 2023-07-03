<?php 
	include_once "../koneksi.php";
	include_once "../function.php";
	$list_produk = get_data_layanan();

	$order_id = $_POST['order_id'] ?? '' ;
	$email = $_POST['email'] ?? '' ;
	$nomor = $_POST['nomor'] ?? '' ;
	$alamat = $_POST['alamat'] ?? '' ;
	$layanan_order = $_POST['layanan_order'] ?? '' ;
	$harga_order = $_POST['harga_order'] ?? '' ;

	$isError = FALSE;
	$error = '';
	if(isset($_POST['submit'])){

		//validasi data
		if($nama == ''){
			$isError = TRUE;
			$error = 'ID harap diisi!!';
		}

		//simpan data ke database
		if(!$isError){
			$conn = open_connection();
			$query = "INSERT INTO pesanan (nama, email, nomor, alamat, layanan_order, harga_order) VALUES ('$nama','$email','$nomor','$alamat','$layanan_order', $harga_order) ";
			$hasil = mysqli_query($conn, $query);
			if($hasil){
				redirect('order/terimakasih.php');
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
    <?php include_once "../contents/navbar.php"; ?>

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
   			<center><h3 class="mb-3 my-3">Form Order</h3></center>
    		<br />
    		<div class="alert alert-warning" role="alert">
        		<h6>Silahkan masukan data diri dan produk yang akan diorder</h6>
    		</div>
    		
    		<br />

    		<?php if($isError): ?>
    			<div class="alert alert-danger" role="alert">
  					<?= $error ?>
				</div>
    		<?php endif; ?>

    		<form method="POST">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="nama">Nama</label>
			      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" value="<?= $nama ?>" >
			    </div>
			    <div class="form-group col-md-6">
			      <label for="no_hp">Nomor Handphone</label>
			      <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="085..." value="<?= $no_hp ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="alamat">Alamat</label>
			    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" value="<?= $alamat ?>">
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <label for="kode_produk">Nama Produk</label>
			      <div class="col-md-12">
			      	<select class="form-control" id="kode_produk" name="kode_produk">
			      		<option>-- Pilih Produk --</option>
			      		<?php 
			      			if(count($list_produk) > 0) {
			      				foreach ($list_produk as $prod => $nama_produk) {
			      					$terpilih = '' ;
			      					if($kode_produk == $prod ){
			      						$terpilih = 'selected';
			      					}
			      					echo "<option value='$prod' $terpilih > $nama_produk </option>";
			      				}
			      			}			      			
			      		?>
			      	</select>
			      </div>
			    </div>
			    <div class="form-group col-md-2">
			      <label for="jumlah_item">Order</label>
			      <input type="text" class="form-control" id="jumlah_item" name="jumlah_item" value="<?= $jumlah_item ?>">
			    </div>
			  </div>
			  <button type="submit" class="btn btn-info" name="submit">Submit</button>
			</form>

    	</div>
    </div>
    
    



    <?php include_once "../contents/footer.php"; ?>
</body>
</html>