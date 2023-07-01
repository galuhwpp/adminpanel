<?php 
	require_once "../koneksi.php";
	require_once "../function.php";
	check_login();
	$list_user = get_data_user();

	$param_kode_user = $_GET['id'];

	$conn = open_connection();

	$query = "SELECT * FROM users WHERE id = '$param_kode_user' ";
	$hasil = mysqli_query($conn, $query);
	$data_lama = array();
	if($row = mysqli_fetch_assoc($hasil)) {
		$data_lama = $row;
	}

	$kode 		= $_POST['id'] ?? $data_lama['id'] ;
	$username 	= $_POST['username'] ?? $data_lama['username'] ;
	$password 	= $_POST['password'] ?? $data_lama['password'] ;
	
	$isError = FALSE;
	$error = '';
	if(isset($_POST['submit'])){

		//validasi data
		if($kode == ''){
			$isError = TRUE;
			$error = 'kode user harap diisi!!';
		}
		if($username == ''){
			$isError = TRUE;
			$error = 'username user harap diisi!!';
		}

		//simpan data ke database
		if(!$isError){
			$conn = open_connection();
			$query = "UPDATE users SET 
						id ='$kode',
						username = '$username',
						password = '$password'

					WHERE 
						id = '$data_lama[id]' ";
			$hasil = mysqli_query($conn, $query);
			if($hasil){
				redirect('admin/admin_data.php');
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
   			<center><h3 class="mb-3 my-3">Update Data Admin</h3></center>
    		<br />
    		
    		<br />

    		<?php if($isError): ?>
    			<div class="alert alert-danger" role="alert">
  					<?= $error ?>
				</div>
    		<?php endif; ?>

    		<form method="POST">
			  
			    <div class="form-group">
			      <label for="kode">Kode Admin</label>
			      <input type="text" class="form-control" id="id" name="id" placeholder="Masukan Kode user" value="<?= $kode ?>" >
			    </div>
			 
			  
			  <div class="form-group">
			    <label for="username">username user</label>
			    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username user" value="<?= $username ?>">
			  </div>

			  <div class="form-group">
			    <label for="password">password</label>
			    <input type="text" class="form-control" id="password" name="password" placeholder="Masukan password" value="<?= $password ?>">
			  </div>
			 
			  <button type="submit" class="btn btn-info" name="submit">Submit</button>
			</form>

    	</div>
    </div>
    
    



    <?php include_once "../contents/footer.php" ?>
</body>
</html>