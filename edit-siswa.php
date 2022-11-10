<?php
$id=$_GET['id'];
if($id){
    $host="127.0.0.1";
    $user="davan";
    $pass="davan123";
    $port=3306;
    $dbname="my_davan";
    $mysqli = new mysqli($host, $user,$pass,$dbname,$port);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $qupdate = "UPDATE siswa set nis='".$nis."' , nama='".$nama."', tanggal_lahir='".$tanggal_lahir."' ,kelas=".$kelas." ,alamat='".$alamat."' WHERE id=".$id;
    //    echo $qupdate;
        if($mysqli->query($qupdate)){
           header('Location: daftar-siswa.php');
           exit();
        }else{
            echo "error";
        }
        
    }
    
    $query = "SELECT id, nis, nama, tanggal_lahir, kelas, alamat FROM siswa where id=".$id." ;";
    
    try {
        $result = $mysqli->query($query);
        $row = $result->fetch_row();
        if ($row){
          $id = $row[0];
          $nis = $row[1];
          $nama = $row[2];
          $tanggal_lahir = $row[3];
          $kelas = $row[4];
          $alamat = $row[5];
             echo "<html><header><title>Edit Siswa</title>";
           echo "<style>table, th, td {border:1px solid black;}</style>";
echo "</header>";
echo "<body>";
echo "<h1>System Informasi Sekolah</h1>";
echo "<p>Tambah Siswa</p>";
echo "<label>";
echo "<hr/>";
echo "<br/><br/>";
echo "<form  method='POST' >";
echo "<label for='nis'> nis: </label><br/>";
echo "<input type='text' id='nis' name='nis' value='".$nis."' /><br/>";

echo "<label for='nama'> nama: </label><br/>";
echo "<input type='text' id='nama' name='nama' value='".$nama."' /><br/>";

echo "<label for='tanggal_lahir'> tanggal_lahir: </label><br/>";
echo "<input type='date' id='tanggal_lahir' name='tanggal_lahir' value='".$tanggal_lahir."' /><br/>";

echo "<label for='kelas'> kelas: </label><br/>";
echo "<input type='number' id='kelas' name='kelas' value='".$kelas."' /><br/>";

echo "<label for='alamat'> alamat: </label><br/>";
echo "<input type='text' id='alamat' name='alamat' value='".$alamat."' /><br/>";
echo "<br/><br/>";
echo "<button>Update</button>";
echo "</form>";


echo "<a href='/daftar-siswa.php' > Batal </a>";
 echo "</body>";
echo "</html>";
        }else{
           echo "gagal";
        }
    } catch (\Throwable $th) {
        echo $query;
        printf("%s ",$th);
        //throw $th;
    }
    

}
else {
   echo "please masukan id";
}
?>
