<?php
// Inisialisasi variabel
$nama = $email = $nim = $jurusan = $alasan = "";
$namaErr = $emailErr = $nimErr = $jurusanErr = $alasanErr = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  1  **************************
    // Tangkap nilai nama dari form
    $nama = trim($_POST["nama"]);
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // **********************  2  **************************
    // Tangkap nilai email dari form
    $email = trim($_POST["email"]);
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email tidak valid";
    }

    // **********************  3  **************************
    // Tangkap nilai NIM dari form
    $nim = trim($_POST["nim"]);
    if (empty($nim)) {
        $nimErr = "NIM wajib diisi";
    } elseif (!is_numeric($nim)) {
        $nimErr = "NIM harus berupa angka";
    }

    // **********************  4  **************************
    // Tangkap nilai jurusan (dropdown)
    $jurusan = isset($_POST["jurusan"]) ? $_POST["jurusan"] : "";
    if (empty($jurusan)) {
        $jurusanErr = "Jurusan wajib dipilih";
    }

    // **********************  5  **************************
    // Tangkap nilai alasan (textarea)
    $alasan = trim($_POST["alasan"]);
    if (empty($alasan)) {
        $alasanErr = "Alasan bergabung wajib diisi";
    }

    // Cek apakah semua data valid
    if (empty($namaErr) && empty($emailErr) && empty($nimErr) && empty($jurusanErr) && empty($alasanErr)) {
        $isSuccess = true;
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
      padding: 40px;
      max-width: 650px;
      width: 100%;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    }

    .logo {
      display: block;
      margin: 0 auto 20px;
      max-width: 120px;
      height: auto;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
      font-size: 22px;
      font-weight: 600;
    }

    .form-group {
      margin-bottom: 20px;
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
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      font-size: 14px;
      transition: all 0.3s;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    input[type="text"]:focus,
    select:focus,
    textarea:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    textarea {
      min-height: 100px;
      resize: vertical;
    }

    .error {
      color: #dc3545;
      font-size: 13px;
      display: block;
      margin-top: 5px;
      font-weight: 500;
    }

    button[type="submit"] {
      width: 100%;
      padding: 15px;
      background: #28a745;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 10px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    button[type="submit"]:hover {
      background: #218838;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    button[type="submit"]:active {
      transform: translateY(0);
    }

    /* Success Box Styling */
    .success-box {
      margin-top: 30px;
      padding: 25px;
      background: #d4edda;
      border: 2px solid #c3e6cb;
      border-radius: 10px;
    }

    .success-box .logo-small {
      display: block;
      margin: 0 auto 15px;
      max-width: 70px;
      height: auto;
    }

    .success-title {
      font-size: 18px;
      font-weight: 700;
      color: #155724;
      margin-bottom: 20px;
      text-align: left;
    }

    .data-row {
      display: flex;
      padding: 10px 0;
      border-bottom: 1px solid #b8dcc5;
      align-items: flex-start;
    }

    .data-row:last-child {
      border-bottom: none;
    }

    .data-label {
      font-weight: 600;
      color: #155724;
      min-width: 160px;
      flex-shrink: 0;
    }

    .data-value {
      color: #155724;
      flex: 1;
      word-break: break-word;
    }

    select {
      cursor: pointer;
      background-color: white;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .form-container {
        padding: 25px;
      }

      h2 {
        font-size: 18px;
      }

      .data-row {
        flex-direction: column;
        gap: 5px;
      }

      .data-label {
        min-width: auto;
      }
    }
  </style>
</head>
<body>
<div class="form-container">
  <img src="EAD.png" alt="Logo EAD" class="logo">
  <h2>Form Pendaftaran Keanggotaan Lab - EAD Laboratory</h2>
  
  <form method="post" action="">
    <div class="form-group">
      <label>Nama:</label>
      <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>" placeholder="Masukkan nama lengkap">
      <?php if (!empty($namaErr)): ?>
        <span class="error"><?php echo $namaErr; ?></span>
      <?php endif; ?>
    </div>

    <div class="form-group">
      <label>Email:</label>
      <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="contoh@email.com">
      <?php if (!empty($emailErr)): ?>
        <span class="error"><?php echo $emailErr; ?></span>
      <?php endif; ?>
    </div>

    <div class="form-group">
      <label>NIM:</label>
      <input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>" placeholder="Masukkan NIM">
      <?php if (!empty($nimErr)): ?>
        <span class="error"><?php echo $nimErr; ?></span>
      <?php endif; ?>
    </div>

    <div class="form-group">
      <label>Jurusan:</label>
      <select name="jurusan">
        <option value="">-- Pilih Jurusan --</option>
        <option value="Sistem Informasi" <?php echo ($jurusan == "Sistem Informasi") ? "selected" : ""; ?>>Sistem Informasi</option>
        <option value="Informatika" <?php echo ($jurusan == "Informatika") ? "selected" : ""; ?>>Informatika</option>
        <option value="Teknik Industri" <?php echo ($jurusan == "Teknik Industri") ? "selected" : ""; ?>>Teknik Industri</option>
      </select>
      <?php if (!empty($jurusanErr)): ?>
        <span class="error"><?php echo $jurusanErr; ?></span>
      <?php endif; ?>
    </div>

    <div class="form-group">
      <label>Alasan Bergabung:</label>
      <textarea name="alasan" placeholder="Tulis alasan Anda ingin bergabung dengan EAD Laboratory"><?php echo htmlspecialchars($alasan); ?></textarea>
      <?php if (!empty($alasanErr)): ?>
        <span class="error"><?php echo $alasanErr; ?></span>
      <?php endif; ?>
    </div>

    <button type="submit">Daftar</button>
  </form>

  <?php
  // **********************  6  **************************
  // Tampilkan hasil input jika semua valid
  if ($isSuccess) {
      echo '<div class="success-box">';
      echo '<img src="EAD.png" alt="Logo EAD" class="logo-small">';
      echo '<div class="success-title">Data Pendaftaran Berhasil</div>';
      
      echo '<div class="data-row">';
      echo '<div class="data-label">Nama</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($nama) . '</div>';
      echo '</div>';
      
      echo '<div class="data-row">';
      echo '<div class="data-label">Email</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($email) . '</div>';
      echo '</div>';
      
      echo '<div class="data-row">';
      echo '<div class="data-label">NIM</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($nim) . '</div>';
      echo '</div>';
      
      echo '<div class="data-row">';
      echo '<div class="data-label">Jurusan</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($jurusan) . '</div>';
      echo '</div>';
      
      echo '<div class="data-row">';
      echo '<div class="data-label">Alasan Bergabung</div>';
      echo '<div class="data-value">: ' . htmlspecialchars($alasan) . '</div>';
      echo '</div>';
      
      echo '</div>';
  }
  ?>
</div>
</body>
</html>