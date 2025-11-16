<<<<<<< HEAD
<?php
// ============1===========
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost" ; 
$username = "root" ;
$password = "" ; 
$db = "db_jurnal_modul2" ;
$port = 3306;

// ===========2============
// Definisikan $conn untuk melakukan koneksi ke database
$conn = mysqli_connect($host,$username,$password,$db,$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
=======
<?php
// ============1===========
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost" ; 
$username = "root" ;
$password = "" ; 
$db = "db_jurnal_modul2" ;
$port = 3306;

// ===========2============
// Definisikan $conn untuk melakukan koneksi ke database
$conn = mysqli_connect($host,$username,$password,$db,$port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
>>>>>>> 86abad06d8b827ae82f2d0e1376c162497a65b94
