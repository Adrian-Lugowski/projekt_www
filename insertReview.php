<?php
    require ("session.php");
    require ("db.php");
    $idGry = $_POST["idGry"];
    $nick = $_SESSION["login"];
    $ocena = $_POST["ocena"];
    $tresc = $_POST["tresc"];
    $conn = new mysqli("localhost", "root", "", "retro");
    $sql = "INSERT INTO recenzje (idGry, nick, ocena, tresc) VALUES ('$idGry', '$nick', '$ocena', '$tresc')";
    $conn->query($sql);
    $conn->close();
    header("location: details.php?id=$idGry");
?>