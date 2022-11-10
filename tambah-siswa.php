<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $host="127.0.0.1";
    $user="davan";
    $pass="davan123";
    $port=3306;
    $dbname="my_davan";
    $query="SELECT id, nis, nama, tanggal_lahir, kelas, alamat FROM siswa";
    // if($mysqli->connect_er)
    $mysqli = new mysqli($host, $user,$pass,$dbname,$port);
    $result =$mysqli->query($query);


    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $query = "INSERT INTO siswa( nis, nama, tanggal_lahir, kelas, alamat) VALUES('".$nis."', '".$nama."', '".$tanggal_lahir."',".$kelas.", '".$alamat."' )";
    try {
        if ($mysqli->query($query)){
          echo "Success menambah siswa <br/>";
          header('Location: daftar-siswa.php');
          exit();
        }else{
           echo "gagal";
        }
    } catch (\Throwable $th) {
        echo $query;
        //throw $th;
    }
    


 }else {
    echo "<html><header><title>Daftar Siswa</title>";
echo "<style>table, th, td {border:1px solid black;}</style>";
echo "</header>";
echo "<body>";
echo "<h1>System Informasi Sekolah</h1>";
echo "<p>Tambah Siswa</p>";
echo "<label>";
echo "<hr/>";
echo "<br/><br/>";
echo "<form  method='POST'>";
echo "<label for='nis'> nis: </label><br/>";
echo "<input type='text' id='nis' name='nis' /><br/>";

echo "<label for='nama'> nama: </label><br/>";
echo "<input type='text' id='nama' name='nama' /><br/>";

echo "<label for='tanggal_lahir'> tanggal_lahir: </label><br/>";
echo "<input type='date' id='tanggal_lahir' name='tanggal_lahir' /><br/>";

echo "<label for='kelas'> kelas: </label><br/>";
echo "<input type='number' id='kelas' name='kelas' /><br/>";

echo "<label for='alamat'> alamat: </label><br/>";
echo "<input type='text' id='alamat' name='alamat' /><br/>";
echo "<br/><br/>";
echo "<button>Tambah</button>";
echo "</form>";



 echo "</body>";
echo "</html>";
 }

?>
