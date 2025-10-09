<?php
// **********************  1  **************************
// Inisialisasi variabel
$nama = $email = $nomor = $film = $tiket = "";
$namaErr = $emailErr = $nomorErr = $filmErr = $tiketErr = "";


// **********************  2  **************************
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // **********************  3  **************************
    // Ambil nilai Nama dari form
    // silakan taruh kode kalian di bawah
    //buatkan validasi yang sesuai
      $nama = trim($_POST["nama"]);
      if (empty($nama)) {
        $namaErr = "Nama Wajib Diisi";
      }
    // **********************  4  **************************
    // Ambil nilai Email dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $email = trim($_POST["email"]);
    if (empty($email)) {
      $emailErr = "Email Wajib Diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Format Email Tidak Valid";
    }
    // **********************  5  **************************
    // Ambil nilai Nomor HP dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $nomor = trim($_POST["nomor"]);
    if (empty($nomor)) {
      $nomorErr = "Nomor Telepon Wajib Diisi";
    } elseif (!ctype_digit($nomor)) {
      $nomorErr = "Nomor Telepon Hanya Boleh Angka";
    }
    // **********************  6  **************************
    // Ambil nilai Film (dropdown)
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
     $film = $_POST["film"];
    if (empty($film)) {
        $filmErr = "Film wajib dipilih";
    }
    // **********************  7  **************************
    // Ambil nilai Jumlah Tiket dari form
    // silakan taruh kode kalian di bawah
    // buatkan validasi yang sesuai
    $tiket = trim($_POST["jumlah"]);
    if (empty($tiket)) {
      $tiketErr = "Jumlah Tiket Wajib Diisi";
    } elseif (!ctype_digit($tiket)) {
      $tiketErr = "Tiket Hanya Boleh Diisi Dengan Angka";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pemesanan Tiket Bioskop</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
  <!-- **********************  8  **************************
       Tambahkan nilai atribut di dalam src dengan nama file gambar logo bioskop
  -->
  <img src="EAD.png" alt="Logo Bioskop EAD" class="logo">
  <h2>Form Pemesanan Tiket Bioskop</h2>
  <form method="post" action="">
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label for ="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label for ="email">Email:</label>
    <input type="text" id ="email" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label for ="nomor">Nomor HP:</label>
    <input type="text" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
    <span class="error"><?php echo $nomorErr ? "* $nomorErr" : ""; ?></span>
    <label>Pilih Film:</label>

    <select name="film">
      <option value="">-- Pilih Film --</option>
      <option value="Interstellar">Interstellar</option>
      <option value="Inception">Inception</option>
      <option value="Oppenheimer">Oppenheimer</option>
      <option value="Avengers: Endgame">Avengers: Endgame</option>
    </select>
    <span class="error"><?php echo $filmErr; ?></span>

    <!-- Isi atribut value untuk menampilkan nilai variabel di dalam (...)-->
    <label for ="jumlah tiket">Jumlah Tiket:</label>
    <input type="text"id="jumlah" name="jumlah" value="<?php echo $tiket; ?>">
    <span class="error"><?php echo $tiketErr ? "* $tiketErr" : ""; ?></span>

    <button type="submit">Pesan Tiket</button>
  </form>
  
  <!-- **********************  9  ************************** -->
  <!-- Tampilkan hasil input dalam tabel jika semua valid -->
  <!-- silakan taruh kode kalian di bawah -->
  <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$filmErr && !$tiketErr) { ?>
  <div class ="container">
    <h3> Data Pemesanan:</h3>
    <div class ="table-container">
      <table>
        <thread>
          <tr>
            <th width ="15%">nama</th>
            <th width ="20%">email</th>
            <th width ="15%">nomor</th>
            <th width ="15%">film</th>
            <th width ="15%">tiket</th>
  </tr>
  </thread>
  <tbody>
    <tr>
      <td><?php echo $nama; ?></td>
      <td><?php echo $email; ?></td>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $film; ?></td>
      <td><?php echo $tiket; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  <?php } ?>
  
  <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$filmErr && !$tiketErr)
  
  ?>
</div>
</body>
</html>
