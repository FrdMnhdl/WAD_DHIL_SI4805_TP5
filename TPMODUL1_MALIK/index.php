<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************
    // Tangkap nilai nama dari form
    // silakan taruh kode kalian di bawah
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // **********************  2  **************************
    // Tangkap nilai email dari form
    // silakan taruh kode kalian di bawah
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak valid";
    }

    // **********************  3  **************************
    // Tangkap nilai NIM dari form
    // silakan taruh kode kalian di bawah
    $nim = trim($_POST["nim"]);
    if (empty($nim)) {
        $nimErr = "NIM wajib diisi";
    } elseif (!is_numeric($nim)) {
        $nimErr = "NIM harus berupa angka";
    }

    // **********************  4  **************************
    // Tangkap nilai jurusan (dropdown)
    // silakan taruh kode kalian di bawah
    $jurusan = $_POST["jurusan"];
    if (empty($jurusan)) {
        $jurusanErr = "Jurusan wajib dipilih";
    }

    // **********************  5  **************************
    // Tangkap nilai alasan (textarea)
    // silakan taruh kode kalian di bawah
    $alasan = trim($_POST["alasan"]);
    if (empty($alasan)) {
        $alasanErr = "Alasan bergabung wajib diisi";
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
      <option value="Sistem Informasi" <?php echo ($jurusan == "Sistem Informasi") ? "selected" : ""; ?>>Sistem Informasi</option>
      <option value="Informatika" <?php echo ($jurusan == "Informatika") ? "selected" : ""; ?>>Informatika</option>
      <option value="Teknik Industri" <?php echo ($jurusan == "Teknik Industri") ? "selected" : ""; ?>>Teknik Industri</option>
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
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($namaErr) && empty($emailErr) && empty($nimErr) && empty($jurusanErr) && empty($alasanErr)) {
      echo '<div class="success-message">';
      echo '<p style="color: green; font-weight: bold; text-align: center;">Data Pendaftaran Berhasil!</p>';
      echo '<img src="EAD.png" alt="Logo EAD" class="logo">';
      echo '<h3>Data Pendaftaran</h3>';
      echo '<table>';
      echo '<tr><th>Field</th><th>Informasi</th></tr>';
      echo '<tr><td>Nama</td><td>' . htmlspecialchars($nama) . '</td></tr>';
      echo '<tr><td>Email</td><td>' . htmlspecialchars($email) . '</td></tr>';
      echo '<tr><td>NIM</td><td>' . htmlspecialchars($nim) . '</td></tr>';
      echo '<tr><td>Jurusan</td><td>' . htmlspecialchars($jurusan) . '</td></tr>';
      echo '<tr><td>Alasan Bergabung</td><td>' . htmlspecialchars($alasan) . '</td></tr>';
      echo '</table>';
      echo '</div>';
  }
  ?>
</div>
</body>
</html>