<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Definisikan $query untuk mengambil data buku berdasarkan id
$query = "SELECT * FROM books WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$book = mysqli_fetch_assoc($result);

// Jika buku tidak ditemukan, redirect
if (!$book) {
    header("Location: list_books.php");
    exit;
}

// ====================2================= 
// Ambil semua kategori dari tabel categories
$categories = mysqli_query($conn, "SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <div class="card shadow p-4">
            <h3 class="mb-4 text-dark">Edit Data Buku</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <div class="form-floating mb-3">
                    <!-- ====================3================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk judul buku yang diisi dengan nilai dari database -->
                    <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($book['title']); ?>" required>
                    <label>Judul Buku</label>
                </div>
                <!-- ====================4================= -->
                <!-- Isi attribute name dropdown untuk kategori yang harus diisi -->
                 <div class="form-floating mb-3">
                    <select class="form-select" id="selectCategory" name="category_id" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                            <!-- ====================4================= -->
                            <!-- 
                            - Buat option yang datanya mengambil dari $category 
                            - valuenya itu id  
                            - jika id $category option sama dengan yang ada di $book maka tambahkan selected
                            - menampilkan nama kategori dan gunakan htmlspecialchars  
                            -->
                            <option value="<?php echo $category['id']; ?>" <?php echo ($book['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category['category_name']); ?>
                            </option>
                       <?php endwhile; ?>
                    </select>
                    <label for="selectCategory">Kategori</label>
                </div>
                <div class="form-floating mb-3">
                    <!-- ====================5================= -->
                    <!-- Isi attribute value gunakan htmlspecialchars untuk penulis buku yang diisi dengan nilai dari database -->
                     <input type="text" class="form-control" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
                    <label>Penulis</label>
                </div>
                <div class="form-floating mb-3">
                    <!-- ====================6================= -->
                    <!-- Isi attribute value gunakan (int) untuk stok yang diisi dengan nilai dari database -->
                     <input type="number" class="form-control" name="stock" value="<?php echo (int)$book['stock']; ?>" min="0" required>
                    <label>Stok</label>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>

</html>