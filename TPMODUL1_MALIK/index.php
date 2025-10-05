?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // **********************  1  **************************
  // Tangkap nilai nama dari form 
  // silakan taruh kode kalian di bawah
  if (empty($_POST["nama"])) {
    $namaErr = "Nama wajib diisi";
  } else {
    $nama = $_POST["nama"];
  }

  // **********************  2  **************************
  // Tangkap nilai email dari form 
  // silakan taruh kode kalian di bawah
  if (empty($_POST["email"])) {
    $emailErr = "Email wajib diisi";
  } else {
    $email = $_POST["email"];
  }

  // **********************  3  **************************
  // Tangkap nilai NIM dari form 
  // silakan taruh kode kalian di bawah
  if (empty($_POST["nim"])) {
    $nimErr = "Nim wajib diisi";
  } else {
    $nim = $_POST["nim"];
  }
  // **********************  4  **************************
  // Tangkap nilai jurusan (dropdown) 
  // silakan taruh kode kalian di bawah
  if (empty($_POST["jurusan"])) {
    $jurusanErr = "Jurusan wajib dipilih";
  } else {
    $jurusan = $_POST["email"];
  }

  // **********************  5  **************************
  // Tangkap nilai alasan (textarea)
  // silakan taruh kode kalian di bawah
  if (empty($_POST["alasan"])) {
    $alasanErr = "Alasan wajib dipilih";
  } else {
    $alasan = $_POST["alasan"];
  }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="form-container">
    <img src="EAD.png" alt="Logo EAD" class="logo">
    <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
    <form method="post" action="">
      <label>Nama:</label>
      <input type="text" name="nama" value="<?php echo $nama; ?>">
      <span class="error"><?php echo $namaErr; ?></span>

      <label>Email:</label>
      <input type="text" name="email" value="<?php echo $email; ?>">
      <span class="error"><?php echo $emailErr; ?></span>

      <label>NIM:</label>
      <input type="text" name="nim" value="<?php echo $nim; ?>">
      <span class="error"><?php echo $nimErr; ?></span>

      <label>Jurusan:</label>
      <select name="jurusan">
        <option value="">-- Pilih Jurusan --</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Informatika">Informatika</option>
        <option value="Teknik Industri">Teknik Industri</option>
      </select>
      <span class="error"><?php echo $jurusanErr; ?></span>

      <label>Alasan Bergabung:</label>
      <textarea name="alasan"><?php echo $alasan; ?></textarea>
      <span class="error"><?php echo $alasanErr; ?></span>

      <button type="submit">Daftar</button>
    </form>

    <?php
    // **********************  6  **************************
    // Tampilkan hasil input dalam tabel + logo di atasnya jika semua valid
    // silakan taruh kode kalian di bawah
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($namaErr) && empty($emailErr) && empty($nimErr) && empty($jurusanErr) && empty($alasanErr)) {
        echo "
            <div class='output'>
                <img src='EAD.png' alt='Logo' class='logo'>
                <h3 style='color:green;'>Data Pendaftaran Berhasil</h3>
                <table>
                    <tr><td>Nama</td><td>: $nama</td></tr>
                    <tr><td>Email</td><td>: $email</td></tr>
                    <tr><td>NIM</td><td>: $nim</td></tr>
                    <tr><td>Jurusan</td><td>: $jurusan</td></tr>
                    <tr><td>Alasan Bergabung</td><td>: $alasan</td></tr>
                </table>
            </div>
            ";
      }
    }
    ?>
    </form>
  </div>
</body>

</html>