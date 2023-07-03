<?php 
    require_once "../function.php";
    check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "../contents/headscript.php" ?>
    
</head>

<body>
    <?php include_once "../contents/navbar_admin.php"; ?>

    <div class="wrapper">
    	<div class="header">
	        <div class="row no-gutters">
	            <div class="col-auto">
	                <button class="btn  btn-link text-dark menu-btn"><img src="../assets/img/menu.png" alt=""><span class="new-notification"></span></button>
	            </div>
	            <div class="col-auto">
                    <div class="container py-4" >
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">List Transaksi Berjalan</h1>
                        </div>
                    </div>
	            </div>
	        </div>
    	</div>
    	<div class="container-fluid bg-warning">
	        <div class="row">
	            <div class="container">
	                <div class="row  py-2 ">
	                    
       				</div>
   				</div>
    		</div>
    	</div>

   		<br />
   		<div class="container">
   			<div class="row">
   				<div class="container py-4">
   				</div>
   			</div>
   			<div class="row">
   				<table class="table table-striped">
			  		<thead>
					    <tr>
					      <th scope="col">ID Transaksi</th>
					      <th scope="col">Nama</th>
					      <th scope="col">Email</th>
					      <th scope="col">Nomor Telepon</th>
					      <th scope="col">Alamat</th>
					      <th scope="col">Layanan</th>
					      <th scope="col">Harga</th>
					      <th scope="col">Aksi</th>
					    </tr>
			  		</thead>
			  		<tbody>
			    <?php 
					require_once "../koneksi.php";
					$conn = open_connection();

					$query = "SELECT * FROM pesanan";
					$hasil = mysqli_query($conn, $query);
					function tampil_data_table(){

					}

					while($row = mysqli_fetch_assoc($hasil) ){
						echo "<tr>";
						echo "<td> $row[order_id] </td>";
						echo "<td> $row[nama] </td>";
						echo "<td> $row[email] </td>";
						echo "<td> $row[nomor] </td>";
						echo "<td> $row[alamat] </td>";
						echo "<td> $row[layanan_order] </td>";
						echo "<td> $row[harga_order] </td>";
						echo "<td> 
							<a class='btn btn-sm btn-primary' href='form_order_update.php?order_id=$row[order_id]'><i class='fa fa-edit'></i></a> 
							<a class='btn btn-sm btn-danger' href='action_order_delete.php?order_id=$row[order_id]' onclick='return confirm(\"Apakah Anda yakin ingin menyelesaikan pesanan ini?\")'><i class='fa fa-check'></i></a>
							</td>";

						echo "</tr>";
					}
					
			    ?>
			  		</tbody>
				</table>
   			</div>
   			
   		</div>
    </div>
    



    <?php include_once "../contents/footer.php" ?>
</body>
</html>