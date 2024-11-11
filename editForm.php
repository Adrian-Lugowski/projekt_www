<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Gra</title>
    <link rel="stylesheet" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="skrypty.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php 
    require ("menu.php"); 
    $id = $_GET['id'];
    $sql = "SELECT nazwa, obrazek, opis, premiera, producent, wydawca FROM gry WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
?>
    <form id="form" action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="nazwa" placeholder="nazwa" value="<?php echo $row->nazwa; ?> " required>
    <p> Obecny obrazek: <img src="obrazki/<?php echo $row->obrazek; ?>" alt="<?php echo $row->nazwa; ?>"></p>
    <p> Obrazek: <input type="file" name="obrazek" required></p>
    <p> Opis: <textarea name="opis" cols="30" rows="10" value="<?php echo $row->opis; ?>" required></textarea></p>
    <input type="date" name="premiera" placeholder="premiera" value="<?php echo $row->premiera; ?>" required>
    <input type="text" name="producent" placeholder="producent" value="<?php echo $row->producent; ?>" required>
    <input type="text" name="wydawca" placeholder="wydawca" value="<?php echo $row->wydawca; ?>" required>
    <p>
    Galeria: </br>
    <input type="file" name="galeria1">
    <input type="file" name="galeria2">
    <input type="file" name="galeria3">
    <input type="file" name="galeria4">
    <input type="file" name="galeria5"></br>
    Link embed do wideo youtube: </br>
    <input type="text" name="wideo1">
    <input type="text" name="wideo2">
    <input type="text" name="wideo3">
    <input type="text" name="wideo4">
    <input type="text" name="wideo5"></br>
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
    <input type="submit" value="Zaktualizuj grę">
    </form>
</body>

</html>
