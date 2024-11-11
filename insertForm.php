<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="skrypty.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php require ("menu.php"); ?>
    <form id="form" action="insert.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nazwa" placeholder="nazwa" required>
    <p>Obrazek: <input type="file" name="obrazek" required></p>
    <p>Opis: <textarea name="opis" cols="30" rows="10" required></textarea></p>
    <input type="date" name="premiera" placeholder="premiera" required>
    <input type="text" name="producent" placeholder="producent" required>
    <input type="text" name="wydawca" placeholder="wydawca" required>
    <p>
    Konsola: </br>
<?php
    $conn = new mysqli("localhost", "root", "", "retro");
    $sql = "SELECT id, nazwa FROM konsole ORDER BY nazwa";
    $result = $conn->query($sql);
    while($row = $result->fetch_object()) {
    echo "<input type='checkbox' id='check' name='konsole[]' value='{$row->id}'>";
    echo "<label for='check'>{$row->nazwa}</label><br>";
    }
    $conn->close();
?>
    </select>
    </p>
    <input type="submit" value="Dodaj grę">
    </form>
</body>

</html>