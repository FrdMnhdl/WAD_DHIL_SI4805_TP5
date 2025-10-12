<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $categoryId = $_POST['category_id'];
    $author = $_POST['author'];
    $stock = $_POST['stock'];

    // ===============2===============
    // Definisikan $query untuk melakukan tambah data ke database
    $query = "INSERT INTO books (title, category_id, author, stock) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sisi", $title, $categoryId, $author, $stock);

    // ==============3================
    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: list_books.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to add book'); 
            window.location='list_books.php';
        </script>
        ";
        exit;
    }
}
?>