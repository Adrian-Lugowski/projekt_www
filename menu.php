<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="menu.css">
</head>
<body>
<?php
   require("session.php");
   require("db.php");
?>
<header>
   <ul class="nav-menu">
      <li><a href="index.php">Strona główna</a></li>
         <li>
            <a href="#">Gry</a>
               <ul class="dropdown">
               <?php
                  $sql = "SELECT id, nazwa FROM konsole";
                  $result = $conn->query($sql);
                  echo "<li><a href='index.php'> Wszyskie</a><li>";
                  while($row = $result->fetch_object()) {
                  echo "<li><a href='index.php?idKon={$row->id}'>{$row->nazwa}</a></li>";
                  }
               ?>
               </ul>
         </li>
   </ul>
   <form>
    <p>
    <input type="text" name="fraza" placeholder="nazwa gry">
    <input type="submit" value="Wyszukaj">
    </p>
</form>
    <a href="insertForm.php">Dodaj grę</a>
<?php
$sql = "SELECT rola FROM uzytkownicy WHERE id=" . intval($_SESSION['id']);
$result = $conn->query($sql);
$rola = $result->fetch_object()->rola;
$_SESSION["rola"] = $rola;
?>
   <div class="user-menu">
         <span><?= $_SESSION["login"] ?></span>
            <ul class="user-menu-dropdown">
               <li><a href="favourites.php">Ulubione</a></li>
               <li><a href="myReviews.php">Moje Recenzje</a></li>
               <li><a href="myGames.php">Dodane gry</a></li>
               <?php 
               if(($_SESSION["rola"]) == "admin"){
               echo ("<li><a href='reports.php'>Zgłoszenia</a></li>");
               }
               ?>
               <li><a href="logout.php">Wyloguj</a></li>
            </ul>
   </div>
</header>
</body>
</html>
