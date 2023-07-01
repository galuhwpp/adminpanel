<?php 
    require_once "../koneksi.php";
    require_once "../function.php";
    check_login();
    $list_layanan = get_data_layanan();

    $param_kode_layanan = $_GET['kodel'] ?? '';

    $conn = open_connection();

    $query = "SELECT * FROM dft_harga WHERE kodel = '$param_kode_layanan' ";
    $hasil = mysqli_query($conn, $query);
    $data_lama = array();
    if($hasil && mysqli_num_rows($hasil) > 0) {
        $data_lama = mysqli_fetch_assoc($hasil);
    }


    $kode       = $_POST['kodel'] ?? $data_lama['kodel'] ;
    $layanan    = $_POST['layanan'] ?? $data_lama['layanan'] ;
    $ket        = $_POST['ket'] ?? $data_lama['ket'] ;
    $waktu      = $_POST['waktu'] ?? $data_lama['waktu'] ;
    $harga      = $_POST['harga'] ?? $data_lama['harga'] ;
    

    
    $isError = FALSE;
    $error = '';
    if(isset($_POST['submit'])){

        //validasi data
        if(empty($kode)){
            $isError = TRUE;
            $error = 'Kode harap diisi!!';
        }
        if(empty($layanan)){
            $isError = TRUE;
            $error = 'Nama layanan harap diisi!!';
        }

        //simpan data ke database
        if(!$isError){
            $conn = open_connection();
            $query = "UPDATE dft_harga SET 
                        kodel ='$kode',
                        layanan = '$layanan',
                        ket = '$ket',
                        waktu = '$waktu',
                        harga = '$harga'
                    
                    WHERE 
                        kodel = '$data_lama[kodel]' ";
            $hasil = mysqli_query($conn, $query);
            if($hasil){
                redirect('layanan/admin_layanan.php');
            } else {
                $isError = TRUE;
                $error = "Gagal menyimpan ke database : " . mysqli_error($conn);
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
            <center><h3 class="mb-3 my-3">Update Data Layanan SHOESIT</h3></center>
            <br />
            
            <br />

            <?php if($isError): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                  <label for="kode_software">Kode Layanan</label>
                  <input type="text" class="form-control" id="kodel" name="kodel" placeholder="Masukan Kode software" value="<?= $kode ?>" >
                </div>
             
              
              <div class="form-group">
                <label for="nama_software">Nama Layanan</label>
                <input type="text" class="form-control" id="layanan" name="layanan" placeholder="Masukan Nama layanan" value="<?= $layanan ?>">
              </div>

              <div class="form-group">
                <label for="basis">Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukan keterangan" value="<?= $ket ?>">
              </div>

              <div class="form-group">
                <label for="versi">Waktu Pengerjaan</label>
                <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukan waktu" value="<?= $waktu ?>">
              </div>

              <div class="form-group">
                <label for="harga_jual">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga jual" value="<?= $harga ?>">
              </div>
             
              <button type="submit" class="btn btn-info" name="submit">Submit</button>
            </form>

        </div>
    </div>

    <?php include_once "../contents/footer.php" ?>
</body>
</html>
