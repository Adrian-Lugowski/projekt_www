<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="skrypty.js"></script>
    <script src="favourites.js"></script>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
<?php
    require ("menu.php");
    $id = $_GET["id"];
    $idUzytkownika = $_SESSION["id"];
    $sql = "SELECT AVG(ocena) AS srednia FROM recenzje WHERE idGry=$id";
    $result = $conn->query($sql);
    $srednia = $result->fetch_object()->srednia;
    $sql = "SELECT g.idUzytkownika, idKonsoli, k.nazwa AS nazwaKon, g.nazwa, g.obrazek, g.opis, g.premiera, g.producent, g.wydawca 
    FROM gry g, konsole k, konsole_gry WHERE g.id=$id AND idKonsoli=k.id AND idGry=g.id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_object()) {
            ?>
            <div class="container">
                <header class="game-header">
                    <?php echo "<h1 id='game-title'>{$row->nazwa}</h1>";
                        $sql_u = "SELECT id FROM ulubione WHERE idGry = $id AND idUzytkownika = $idUzytkownika";
                        $added = $conn->query($sql_u)->num_rows > 0;
                        $imgSrc = $added ? "obrazki/unlike.png" : "obrazki/like.png"; 
                        $titleText = $added ? "Usuń z ulubionych" : "Dodaj do ulubionych";
                    echo "<img class='fav' data-gra='$id' src='$imgSrc' alt='$titleText' title='$titleText' />";?>
                </header>
                <section class="game-image">
                    <?php echo "<img src='obrazki/{$row->obrazek}'>";?>
                </section>
                <?php 
                if(($_SESSION["rola"]) == "admin" || '{$row->idUzytkownika}'==$idUzytkownika){
                    echo "<a href='editForm.php?id=$id' class='tab-button'>Edytuj </a>";
                    echo "<a href='delete.php?id=$id' class='tab-button'>Usuń</a>";
                }
                ?>
                <section class="game-details">
                <?php
                echo "<strong>Platformy: </strong>";

                $sql_k = "SELECT k.id, k.nazwa FROM konsole k, konsole_gry WHERE idGry = $id AND idKonsoli = k.id LIMIT 2";
                $result_k = $conn->query($sql_k);
                while($row_k = $result_k->fetch_object()) {
                echo "{$row_k->nazwa}, ";
                }
                echo "<p><strong>Producent:</strong> <span id='developer'>{$row->producent}</span></p>";
                echo "<p><strong>Wydawca:</strong> <span id='publisher'>{$row->wydawca}</span></p>";
                echo "<p><strong>Data wydania:</strong> <span id='release-date'>{$row->premiera}</span></p>";
                echo "<p><strong>Średnia ocena:</strong> <span id='average-rating'>$srednia</span></p>";?>
                </section>
                <section class="game-description">
                    <h2>Opis gry</h2>
                    <?php echo "<p id='description'>{$row->opis}</p>"; ?>
                </section>
                <section class="media-gallery">
                    <h2>Galeria</h2>
                        <?php
                            $sql = "SELECT obrazek FROM galeria WHERE idGry=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<img src='obrazki/{$row->obrazek}' alt='Screenshot' id='big'>";
                                echo "<div id='gallery-item'>";
                                while($row = $result->fetch_object()) {
                                    echo "<img src='obrazki/{$row->obrazek}' alt='Screenshot'>";
                                }
                            } else {
                            echo "<br>Brak zdjęć";
                            }
                            echo "</div>"
                        ?>
                </section>
                <section class="game-videos">
                    <h2>Filmy</h2>
                    <div class="video-scroll-container">
                    <?php
                            $sql = "SELECT wideo FROM wideo WHERE idGry=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_object()) {
                                    echo "<div class='video-container'>";
                                    echo "<iframe src='{$row->wideo}' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>";
                                }
                            } else {
                            echo "<br>Brak filmów";
                            }
                        ?>
                    </div>
                </section>
            </div>
            <?php
        }
    } else {
    echo "Nie masz żadnych dzbanów w swojej kolekcji";
    }

?>

<nav class="tab-nav">
    <button onclick="showTab('reviews')" class="tab-button" id="reviews-tab">Recenzje</button>
    <button onclick="showTab('comments')" class="tab-button" id="comments-tab">Komentarze</button>
</nav>

<section class="tab-content" id="reviews-section">
<h2>Dodaj swoją recenzję</h2>

<form id="review-form" action="insertReview.php" method="post">
    <label for="review-text">Twoja recenzja:</label>
    <textarea name="tresc" cols="30" rows="10"></textarea>
    <input type="hidden" name="idGry" value="<?= $id ?>">
    <label for="rating">Ocena:</label>
    <select name="ocena">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <input class="submit-review" type="submit">

    <div id="reviews-container">
    <div class="review">
    <?php
    $sql = "SELECT nick, ocena, tresc, data FROM recenzje WHERE idGry=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_object()) {
            echo "<hr>";
            echo "<p>Nick: {$row->nick} </p>";
            echo "<p>Ocena: {$row->ocena} </p>";
            echo "<p>Treść: {$row->tresc} </p>";
            echo "<p>Data: {$row->data} </p>";
            echo "<hr>";
        }
    } else {
    echo "<br>Nie ma żadnych recenzji";
    }
?>
    </div>
    </div>
    </section>
</form>

<section class="tab-content" id="comments-section">
<h2>Dodaj komentarz</h2>

<form id="review-form" action="insertComment.php" method="post">
    <label for="review-text">Twój komentarz:</label>
    <textarea name="tresc" cols="30" rows="10"></textarea>
    <input type="hidden" name="idGry" value="<?= $id ?>">
    <input class="submit-review" type="submit">

    <div id="reviews-container">
    <div class="comments">
    <?php
    $sql = "SELECT nick, tresc, data FROM komentarze WHERE idGry=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_object()) {
            echo "<hr>";
            echo "<p>Nick: {$row->nick} </p>";
            echo "<p>Treść: {$row->tresc} </p>";
            echo "<p>Data: {$row->data} </p>";
            echo "<hr>";
        }
    } else {
    echo "<br>Nie ma żadnych komentarzy";
    }
    $conn->close();
?>
    </div>
    </div>
    </section>
</form>
<div id="lightbox" class="lightbox" style="display: none;">
        <span class="close" onclick="closeLightbox()">×</span>
        <div id="lightbox-content"></div>
    </div>
</body>
<?php require("footer.php"); ?>
</html>