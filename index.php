<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            color: white;
            border:1px solid black;
        }
    </style>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
    require ("menu.php");
?>
<?php
    $sql = "SELECT DISTINCT g.id, nazwa, obrazek FROM gry g, konsole_gry WHERE idGry = g.id";
    if (isset($_GET["idKon"])) {
    $idKon = $_GET["idKon"];
    $sql .= " AND idKonsoli = $idKon";
    }
    elseif (isset($_GET["fraza"])) {
    $fraza = $_GET["fraza"];
    $sql .= " AND nazwa LIKE '%$fraza%'";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
            echo "<tr>";
                echo "<th>Nazwa gry</th>";
                echo "<th>Obrazek</th>";
            echo "</tr>";
            while($row = $result->fetch_object()) {
            echo "<tr>";
                echo "<th><a href='details.php?id={$row->id}'>{$row->nazwa}</a></th>";
                echo "<th><img src='obrazki/{$row->obrazek}'></th>";
            echo "</tr>";
                }
        echo "</table>";
       } else {
        echo "Brak gier";
    }
?>
</body>
<?php require("footer.php"); ?>
</html>