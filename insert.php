<?php
    require("db.php");
    require("session.php");
    $idKonsoli = $_POST['konsole'];
    $idUzytkownika = $_SESSION["id"];
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $premiera = $_POST["premiera"];
    $producent = $_POST["producent"];
    $wydawca = $_POST["wydawca"];
    $obrazek = basename($_FILES["obrazek"]["name"]);
    move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/$obrazek");
    $sql = "INSERT INTO gry (idUzytkownika, nazwa, obrazek, opis, premiera, producent, wydawca) VALUES ('$idUzytkownika', '$nazwa', '$obrazek',
    '$opis', '$premiera', '$producent', '$wydawca')";
    $conn->query($sql);
    $sql = "SELECT id FROM gry WHERE nazwa='$nazwa'";
    $result = $conn->query($sql);
    $idGry = $result->fetch_object()->id;
    foreach($idKonsoli as $id_kon){
        $sql = "INSERT INTO konsole_gry (idGry, idKonsoli) VALUES ('$idGry', '$id_kon')";
        $conn->query($sql);
    }
    $conn->close();
    header("location: index.php");
?>