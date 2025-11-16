<<<<<<< HEAD
<?php
include 'connect.php';

// ===============1==============
// If statement untuk mengambil GET request dari URL kemudian simpan di variabel id
if (isset($_GET['id'])) {
    $id = $_GET["id"];

    // ==============2=============
    // Definisikan $query untuk menghapus data menggunakan $id
    $delete_query = "DELETE FROM movies WHERE id = $id";
    mysqli_query($conn, $delete_query);

    // =============3=============
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
    } else {
        echo "
        <script>
            alert('Failed to delete book'); 
            window.location='list_movies.php';
        </script>";
        exit;
    }
}

mysqli_close($conn);
=======
<?php
include 'connect.php';

// ===============1==============
// If statement untuk mengambil GET request dari URL kemudian simpan di variabel id
if (isset($_GET['id'])) {
    $id = $_GET["id"];

    // ==============2=============
    // Definisikan $query untuk menghapus data menggunakan $id
    $delete_query = "DELETE FROM movies WHERE id = $id";
    mysqli_query($conn, $delete_query);

    // =============3=============
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
    } else {
        echo "
        <script>
            alert('Failed to delete book'); 
            window.location='list_movies.php';
        </script>";
        exit;
    }
}

mysqli_close($conn);
>>>>>>> 86abad06d8b827ae82f2d0e1376c162497a65b94
