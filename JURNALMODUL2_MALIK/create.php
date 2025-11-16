<<<<<<< HEAD
<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $director = $_POST["director"];
    $release_year = $_POST["release_year"];

    // ===============2===============
    // Definisikan $query untuk melakukan tambah data ke database
    $query = "INSERT INTO movies (title, genre, director, release_year)
              VALUES ('$title','$genre','$director','$release_year')";
    mysqli_query($conn, $query);

    // ==============3================
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
    } else {
        echo "
        <script>
            alert('Failed to add movie'); 
            window.location='list_movies.php';
        </script>
        ";
        exit;
    }
}
=======
<?php
include 'connect.php';

// ==============1===============
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel2 untuk menyimpan data yang dikirim dari POST
if (isset($_POST["create"])) {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $director = $_POST["director"];
    $release_year = $_POST["release_year"];

    // ===============2===============
    // Definisikan $query untuk melakukan tambah data ke database
    $query = "INSERT INTO movies (title, genre, director, release_year)
              VALUES ('$title','$genre','$director','$release_year')";
    mysqli_query($conn, $query);

    // ==============3================
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: list_movies.php");
    } else {
        echo "
        <script>
            alert('Failed to add movie'); 
            window.location='list_movies.php';
        </script>
        ";
        exit;
    }
}
>>>>>>> 86abad06d8b827ae82f2d0e1376c162497a65b94
