<?php
    include_once "function.php";

    //session_start();
    if(isset($_SESSION['username'])){
        redirect("admin/admin.php");
    } 
    
    if(isset($_POST['username']) && isset($_POST['password'])){
        require 'koneksi.php';
        $conn = open_connection();
        $query = "SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
        $hasil = mysqli_query($conn, $query);
    
        if($isi = mysqli_fetch_assoc($hasil)){
            $_SESSION['username'] = $isi['username'];
            redirect("admin/admin.php");
        } else {
            echo '<div class="alert alert-danger" role="alert">Username dan Password tidak valid</div>';
        }

    }
    ?>

    <?php include_once "contents/headscript.php"; ?>

    <div class="row no-gutters vh-100 proh bg-orange">
        <div class="col align-self-center px-3 text-center">
            <h1 style="color: white;">SHOESIT ADMIN PANEL</h1>
            <h2 class="text-white "><span class="font-weight-light"></span>Login</h2>
            <form action="login.php" class="form-signin shadow" method="POST">
                <div class="form-group float-label">
                    <input type="text" name="username" id="inputEmail" class="form-control" required autofocus>
                    <label for="inputEmail" class="form-control-label">Username</label>
                </div>

                <div class="form-group float-label">
                    <input type="password" name="password" id="inputPassword" class="form-control" required>
                    <label for="inputPassword" class="form-control-label" >Kata Sandi</label>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-default btn-rounded shadow">
                            <span>Login</span>
                            <i class="material-icons">arrow_forward</i>
                        </button>
                    </div>
                </div>
                <div class="row" style="margin: 10px 3px;">
                    <div class="col-auto">
                        <a href="home.php"><< Kembali ke Home</a>   
                    </div>
                </div>

            </form>
        </div>
    </div>
    

    <?php include_once "contents/footer.php"; ?>	