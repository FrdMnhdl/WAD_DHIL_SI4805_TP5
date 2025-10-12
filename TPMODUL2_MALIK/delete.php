<?php
include 'connect.php';

// ===============1==============
// If statement untuk mengambil POST request (bukan GET untuk delete)
// Kemudian simpan di variabel id
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // ==============2=============
    // Definisikan $query untuk menghapus data menggunakan $id
    $delete_query = "DELETE FROM books WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    // =============3=============
    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: list_books.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to delete book'); 
            window.location='list_books.php';
        </script>";
        exit;
    }
} else {
    // Jika tidak ada POST id, redirect ke list
    header("Location: list_books.php");
    exit;
}
?>