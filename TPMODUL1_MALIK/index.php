<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap nilai nama dari form
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // Tangkap nilai email dari form
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak valid";
    }

    // Tangkap nilai NIM dari form
    $nim = trim($_POST["nim"]);
    if (empty($nim)) {
        $nimErr = "NIM wajib diisi";
    } elseif (!is_numeric($nim)) {
        $nimErr = "NIM harus berupa angka";
    }

    // Tangkap nilai jurusan (dropdown)
    $jurusan = $_POST["jurusan"];
    if (empty($jurusan)) {
        $jurusanErr = "Jurusan wajib dipilih";
    }

    // Tangkap nilai alasan (textarea)
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: white;
      border-radius: 12px;
      padding: 30px;
      max-width: 600px;
      width: 100%;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .logo {
      display: block;
      margin: 0 auto 20px;
      max-width: 150px;
      height: auto;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
      font-size: 24px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
      font-weight: 500;
      font-size: 14px;
    }

    input[type="text"],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 5px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input[type="text"]:focus,
    select:focus,
    textarea:focus {
      outline: none;
      border-color: #667eea;
    }

    textarea {
      min-height: 100px;
      resize: vertical;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .error {
      color: #e74c3c;
      font-size: 12px;
      display: block;
      margin-bottom: 15px;
      min-height: 18px;
    }

    button[type="submit"] {
      width: 100%;
      padding: 14px;
      background: #28a745;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 10px;
    }

    button[type="submit"]:hover {
      background: #218838;
    }

    .success-box {
      margin-top: 30px;
      padding: 25px;
      background: #d4edda;
      border: 1px solid #c3e6cb;
      border-radius: 8px;
    }

    .success-box .logo {
      max-width: 80px;
      margin-bottom: 15px;
    }

    .success-title {
      font-size: 18px;
      font-weight: 600;
      color: #155724;
      margin-bottom: 20px;
      text-align: left;
    }

    .data-item {
      display: flex;
      padding: 12px 0;
      border-bottom: 1px solid #c3e6cb;
    }

    .data-item:last-child {
      border-bottom: none;
    }

    .data-label {
      font-weight: 600;
      color: #333;
      min-width: 150px;
    }

    .data-value {
      color: #555;
      flex: 1;
    }

    select {
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .form-container {
        padding: 20px;
      }

      h2 {
        font-size: 20px;
      }

      .data-item {
        flex-direction: column;
      }

      .data-label {
        margin-bottom: 5px;
      }
    }
  </style>
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  
  <form method="post" action="">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
    <span class="error"><?php echo $namaErr; ?></span>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
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
    <textarea name="alasan"><?php echo htmlspecialchars($alasan); ?></textarea>
    <span class="error"><?php echo $alasanErr; ?></span>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // Tampilkan hasil input jika semua valid
  if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($namaErr) && empty($emailErr) && empty($nimErr) && empty($jurusanErr) && empty($alasanErr)) {
      echo '<div class="success-box">';
      echo '<img src="EAD.png" alt="Logo EAD" class="logo">';
      echo '<div class="success-title">Data Pendaftaran Berhasil</div>';
      
      echo '<div class="data-item">';
      echo '<div class="data-label">Nama</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($nama) . '</div>';
      echo '</div>';
      
      echo '<div class="data-item">';
      echo '<div class="data-label">Email</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($email) . '</div>';
      echo '</div>';
      
      echo '<div class="data-item">';
      echo '<div class="data-label">NIM</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($nim) . '</div>';
      echo '</div>';
      
      echo '<div class="data-item">';
      echo '<div class="data-label">Jurusan</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($jurusan) . '</div>';
      echo '</div>';
      
      echo '<div class="data-item">';
      echo '<div class="data-label">Alasan Bergabung</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($alasan) . '</div>';
      echo '</div>';
      
      echo '</div>';
  }
  ?>
</div>
</body>
</html>