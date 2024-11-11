<?php
    require ("session.php");
    require ("db.php");
    $idGry = $_POST["idGry"];
    $nick = $_SESSION["login"];
    $tresc = $_POST["tresc"];
    $conn = new mysqli("localhost", "root", "", "retro");
    $sql = "INSERT INTO komentarze (idGry, nick, tresc) VALUES ('$idGry', '$nick', '$tresc')";
    $conn->query($sql);
    $conn->close();
    header("location: details.php?id=$idGry");
?>