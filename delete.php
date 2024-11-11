<?php
require("db.php");
require("session.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT obrazek FROM gry WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        $image_path = "obrazki/" . $row->obrazek;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
    
    $sql = "DELETE FROM gry WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Usunięto pomyślnie";
    } else {
        echo "Błąd: " . $conn->error;
    }
    $sql = "DELETE FROM konsole_gry WHERE idGry='$id'";
    $conn->query($sql);
    $conn->close();
    header("Location: index.php");
}
?>
