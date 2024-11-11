<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="request.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    require ("menu.php");
    $login = $_SESSION["login"];
    $sql = "SELECT ocena, tresc, data, g.id AS idGry, nazwa FROM recenzje r, gry g WHERE g.id = idGry AND nick = '$login'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_object()) {
            echo "<hr>";
            echo "<p>Nazwa gry: <a href='details.php?id={$row->idGry}'>{$row->nazwa}</a> </p>";
            echo "<p>Ocena: {$row->ocena} </p>";
            echo "<p>Treść: {$row->tresc} </p>";
            echo "<p>Data: {$row->data} </p>";
            echo "<hr>";
        }
    } else {
    echo "<br>Nie ma żadnych recenzji";
    }
    $conn->close();
?>
</body>
<?php require("footer.php"); ?>
</html>