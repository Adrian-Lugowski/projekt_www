<?php
require("session.php");
require("db.php");
$idUzytkownika = $_SESSION['id'];
$tresc = $_POST['tresc'];


$stmt = $conn->prepare("INSERT INTO zgloszenia (idUzytkownika, tresc) VALUES (?, ?)");
$stmt->bind_param("is", $idUzytkownika, $tresc);

if ($stmt->execute()) {
    echo "Zgłoszenie zostało dodane.";
} else {
    echo "Błąd: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
