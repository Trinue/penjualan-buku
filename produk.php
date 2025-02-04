<?php
session_start();
if (empty($_SESSION["username"])) {
    header('Location: http://localhost/penjualan-buku/login.php');
    exit;
}

require_once('components.php');
$components = new Components();

?>
<html>
    <head>
              <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
      <!-- FontAwesome -->
      <script src="https://kit.fontawesome.com/7cb1654f53.js" crossorigin="anonymous"></script>
      <title>Keranjang || Sibulain</title>
        <link rel="icon" type="image/png" href="images/home.png">
        <title>ALL PRODUCT | SibulainStore</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    .cari{
    display: inline-block;
    width: 400px;
    font-size: 20px;
    /* border-radius: 30px; */
}
.buton3{
    display: inline-block;
    background: #ff523b;
    color: #fff;
    padding: 2px 8px;
    margin: 0;
    transition: background 0.5s;
    font-size: 20px;
}
.buton3:hover{
    background: #563434;
}
    </style>
    </head>
    
    <body>


        
        <?= $components->navbar() ?>
    
   
    <!--------Product--------->
    <div class="small">
        <div class="row row2">
            <div class="col">
                <h2>All BOOKS SIBULAIN</h2>
            </div>
            <div class="col">
            <form method="GET">
                <input type="text" class="cari" name="cari" placeholder=" Search Books" >  
                <input type="submit" name="tombolSubmit" class="buton3">
            </div>
            <div class="col">
                <select name="sortir" >
                    <option value="NULL">Default Sorting</option>
                    <option value="judul">Sort By Name</option>
                    <option value="harga">Sort By Price</option>
                    <option value="stok">Sort By Stok</option>
                </select>
            </div>
        </div>
    </form>
        <div class="row">
            <?php 
                include "koneksi.php";
                if(isset($_GET['tombolSubmit'])){
                    $sortir = $_GET['sortir'];
                    $keyword = $_GET['cari'];
                    if("$sortir" != "NULL"){
                        $query = mysqli_query($conn, "SELECT * FROM buku ORDER BY $sortir");    
                    }
                    else{
                        if($keyword){
                            $query = mysqli_query($conn, "SELECT * FROM buku WHERE judul like '%$keyword%'");
                        }
                        else{
                            $query = mysqli_query($conn, "SELECT * FROM buku");        
                        }
                    }
                }
                else{
                    $query = mysqli_query($conn, "SELECT * FROM buku");
                }
                $no = 0;
                while($ambil_data = mysqli_fetch_array($query)){
            ?>
            <div class="col-4">
                <a href="detail.php?id=<?= $ambil_data['kd_buku'] ?>">
                    <img src="images/<?= $ambil_data['foto'] ?>" >
                </a>
                <h4><?= $ambil_data['pengarang'] ?></h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>Rp.<?= number_format($ambil_data['harga'],2,',','.') ?></p>
            </div>
            <?php
                }
            ?>
        </div>        
    </div>
    


<!-----fotter--------->
<div class="fotter">
    <div class="contrainer">
        <div class="row">
            <div class="fotter-col1">
                <h3>Access</h3>
                <p>Access with your phone</p><br>
                <img src="images/fb.png" >
                <img src="images/tw.png">
                <img src="images/ig.png"  >
            </div>
            </div>
        </div>

        <hr>
        <p class="copyright">CopyRight SIBULAIN</p>
    </div>
</div>



</body>
</html>
