<?php
    require_once "../function.php";
    require_once "../koneksi.php";
    check_login();
?>

<html>
<head>
  <title>Stock Software</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
            <h2>Daftar Layanan</h2>
                <div class="data-tables datatable-dark">
                    <table class="table table-striped" id="export_software">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nama Layanan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">harga</th>
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
                            echo "<td> $row[id] </td>";
                            echo "<td> $row[layanan] </td>";
                            echo "<td> $row[ket] </td>";
                            echo "<td> Rp. $row[harga] </td>";
                            echo "</tr>";
                        }
                        
                    ?>
                  </tbody>
                </table>
                    
                </div>
</div>
    
<script>
$(document).ready(function() {
    $('#export_software').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    

</body>

</html>