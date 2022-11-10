<?php
    $host="127.0.0.1";
    $user="davan";
    $pass="davan123";
    $port=3306;
    $dbname="my_davan";
    $query="SELECT id, nis, nama, tanggal_lahir, kelas, alamat FROM siswa";
    // if($mysqli->connect_er)
    $mysqli = new mysqli($host, $user,$pass,$dbname,$port);
    $result =$mysqli->query($query);

    // if($mysqli->connect_errno ) {
    //         printf("Connect failed: %s<br />", $mysqli->connect_error);
    //         exit();
    // }
    // printf('Connected successfully.<br />');
    // $mysqli->close();
    // if(!isset($mysqli->server_info)){
    //     echo "sql connection is closed";
    // }else{
    //     echo $mysqli->server_info;
    //     echo "success connect";
    //     $mysqli->close();
    // }

    echo "<html><header><title>Daftar Siswa</title>";
    echo "<style>table, th, td {border:1px solid black;}</style>";
    echo "</header>";
    echo "<body>";
    echo "<h1>System Informasi Sekolah</h1>";
    echo "<p>:: Selamat datang di SMK Bakti bangsa .untuk masuk ke sistem informasi klik Link Dibawah ::</p>";
    echo "<br/><br/>";
    echo "<table >";
    echo "<tr><th>id</th><th>nis</td><th>nama</th><th>tanggal lahir</th><th>kelas</th><th>alamat</th><th>Action</th></tr>";
    if($result->num_rows >0){
        while($row=$result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["nis"]."</td>";
            echo "<td>".$row["nama"]."</td>";
            echo "<td>".$row["tanggal_lahir"]."</td>";
            echo "<td>".$row["kelas"]."</td>";
            echo "<td>".$row["alamat"]."</td>";
            echo "<td><a href='/delete-siswa.php?id=".$row["id"]."'>Delete</a> | <a href='/edit-siswa.php?id=".$row["id"]."'>Edit </a></td>";
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "<p><a href='/'>Home</a> | <a href='/tambah-siswa.php'>Tambah Siswa</a></p> ";
    echo "</body>";
    echo "</html>";

?>
