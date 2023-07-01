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
                            <h1 class="h3 mb-0 text-gray-800">List Layanan</h1>
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
                <div class="col-sm-6">
                    <a href="form_layanan.php" class="btn btn-primary mb-2" ><i class="fas fa-plus"></i> Tambah Layanan</a>
                    <a href="export_layanan.php" class="btn btn-info mb-2" style="color: #fff" ><i class="fas fa-file-export"></i> Export Data</a>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID Layanan</th>
                                <th scope="col">Nama Layanan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Waktu Pengerjaan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                require_once "../koneksi.php";
                                $conn = open_connection();

                                $query = "SELECT * FROM dft_harga ";
                                $hasil = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_assoc($hasil) ){
                                    echo "<tr>";
                                    echo "<td> $row[kodel] </td>";
                                    echo "<td> $row[layanan] </td>";
                                    echo "<td> $row[ket] </td>";
                                    echo "<td> $row[waktu] </td>";
                                    echo "<td> Rp. $row[harga] </td>";
                                    echo "<td> 
                                        <a class='btn btn-sm btn-primary' href='form_layanan_update.php?kodel=$row[kodel]'><i class='fa fa-edit'></i></a> 
                                        <a class='btn btn-sm btn-danger' href='action_layanan_delete.php?kodel=$row[kodel]'><i class='fa fa-trash'></i></a>
                                        </td>";

                                    echo "</tr>";
                                }
                                
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    



    <?php include_once "../contents/footer.php" ?>
</body>
</html>
