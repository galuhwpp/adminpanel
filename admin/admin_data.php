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
                            <h1 class="h3 mb-0 text-gray-800">List Admin</h1>
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
   			<div class="col-sm-12">
   				<a href="form_admin.php" class="btn btn-primary mb-2" ><i class="fas fa-plus"></i> Tambah Admin</a>
   			</div>
   			<div class="col-sm-12">
   				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Username</th>
					  <th scope="col">Password</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php 
						require_once "../koneksi.php";
						$conn = open_connection();

						$query = "SELECT * FROM users ";
						$hasil = mysqli_query($conn, $query);

						while($row = mysqli_fetch_assoc($hasil) ){
							echo "<tr>";
							echo "<td> $row[id] </td>";
							echo "<td> $row[username] </td>";
							echo "<td> $row[password] </td>";
							echo "<td> 
								<a class='btn btn-sm btn-primary' href='form_admin_update.php?id=$row[id]'><i class='fa fa-edit'></i></a> 
								<a class='btn btn-sm btn-danger' href='action_admin_delete.php?id=$row[id]'><i class='fa fa-trash'></i></a>
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