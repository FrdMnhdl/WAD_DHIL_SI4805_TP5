<?php
include 'connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ===========1============
// Definisikan $query untuk mengambil data buku + nama kategori dengan JOIN berdasarkan id
$query = "
    SELECT 
        books.*, 
        categories.category_name AS category_name 
    FROM 
        books 
    JOIN 
        categories ON books.category_id = categories.id 
    WHERE 
        books.id = ?
";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php if (!$book): ?>
        <div class='alert alert-danger text-center mt-5'>
            <h3>Buku tidak ditemukan!</h3>
            <a href="list_books.php" class="btn btn-primary mt-3">Kembali ke Daftar Buku</a>
        </div>
    <?php else: ?>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Detail Buku</h1>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!-- ====================2================= -->
                            <!-- Isi attribute value gunakan htmlspecialchars untuk judul buku yang diisi dengan nilai dari database -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="title" value="<?php echo htmlspecialchars($book['title']); ?>" disabled>
                                <label for="title">Judul Buku</label>
                            </div>
                            
                            <!-- ====================3================= -->
                            <!-- Isi attribute value gunakan htmlspecialchars untuk kategori yang diisi dengan nilai dari database -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="category" value="<?php echo htmlspecialchars($book['category_name']); ?>" disabled>
                                <label for="category">Kategori</label>
                            </div>
                            
                            <!-- ====================4================= -->
                            <!-- Isi attribute value gunakan htmlspecialchars untuk penulis yang diisi dengan nilai dari database -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="author" value="<?php echo htmlspecialchars($book['author']); ?>" disabled>
                                <label for="author">Penulis</label>
                            </div>
                            
                            <!-- ====================5================= -->
                            <!-- Isi attribute value gunakan (int) untuk stok yang diisi dengan nilai dari database -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="stock" value="<?php echo (int)$book['stock']; ?>" disabled>
                                <label for="stock">Stok</label>
                            </div>
                            
                            <a href="form_update_book.php?id=<?= $id ?>" class="btn btn-warning mb-2 w-100">Edit</a>
                            <form action="delete.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-danger w-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>