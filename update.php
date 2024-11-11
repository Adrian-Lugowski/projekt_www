<?php
    require("db.php");
    require("session.php");
    $idKonsoli = $_POST['konsole'];
    $idUzytkownika = $_SESSION["id"];
    $id = $_POST['id'];
    $nazwa = $_POST["nazwa"];
    $opis = $_POST["opis"];
    $premiera = $_POST["premiera"];
    $producent = $_POST["producent"];
    $wydawca = $_POST["wydawca"];
    $obrazek = basename($_FILES["obrazek"]["name"]);
    move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/$obrazek");
    $galeria1 = basename($_FILES["galeria1"]["name"]);
    move_uploaded_file($_FILES["galeria1"]["tmp_name"], "obrazki/$galeria1");
    $galeria2 = basename($_FILES["galeria2"]["name"]);
    move_uploaded_file($_FILES["galeria2"]["tmp_name"], "obrazki/$galeria2");
    $galeria3 = basename($_FILES["galeria3"]["name"]);
    move_uploaded_file($_FILES["galeria3"]["tmp_name"], "obrazki/$galeria3");
    $galeria4 = basename($_FILES["galeria4"]["name"]);
    move_uploaded_file($_FILES["galeria4"]["tmp_name"], "obrazki/$galeria4");
    $galeria5 = basename($_FILES["galeria5"]["name"]);
    move_uploaded_file($_FILES["galeria5"]["tmp_name"], "obrazki/$galeria5");
    $wideo1 = $_POST["wideo1"];
    $wideo2 = $_POST["wideo2"];
    $wideo3 = $_POST["wideo3"];
    $wideo4 = $_POST["wideo4"];
    $wideo5 = $_POST["wideo5"];
    
    $sql = "UPDATE gry SET idUzytkownika='$idUzytkownika', nazwa='$nazwa', obrazek='$obrazek', opis='$opis', 
    premiera='$premiera', producent='$producent', wydawca='$wydawca' WHERE id='$id'";
    $conn->query($sql);

    $sql = "DELETE FROM galeria WHERE idGry='$id'";
    $conn->query($sql);
    $sql = "INSERT INTO galeria (idGry, obrazek) VALUES ('$id', '$galeria1')";
    $conn->query($sql);
    $sql = "INSERT INTO galeria (idGry, obrazek) VALUES ('$id', '$galeria2')";
    $conn->query($sql);
    $sql = "INSERT INTO galeria (idGry, obrazek) VALUES ('$id', '$galeria3')";
    $conn->query($sql);
    $sql = "INSERT INTO galeria (idGry, obrazek) VALUES ('$id', '$galeria4')";
    $conn->query($sql);
    $sql = "INSERT INTO galeria (idGry, obrazek) VALUES ('$id', '$galeria5')";
    $conn->query($sql);

    $sql = "DELETE FROM wideo WHERE idGry='$id'";
    $conn->query($sql);
    $sql = "INSERT INTO wideo (idGry, wideo) VALUES ('$id', '$wideo1')";
    $conn->query($sql);
    $sql = "INSERT INTO wideo (idGry, wideo) VALUES ('$id', '$wideo2')";
    $conn->query($sql);
    $sql = "INSERT INTO wideo (idGry, wideo) VALUES ('$id', '$wideo3')";
    $conn->query($sql);
    $sql = "INSERT INTO wideo (idGry, wideo) VALUES ('$id', '$wideo4')";
    $conn->query($sql);
    $sql = "INSERT INTO wideo (idGry, wideo) VALUES ('$id', '$wideo5')";
    $conn->query($sql);

    $sql = "DELETE FROM konsole_gry WHERE idGry='$id'";
    $conn->query($sql);
    foreach($idKonsoli as $id_kon){
        $sql = "INSERT INTO konsole_gry (idGry, idKonsoli) VALUES ('$id', '$id_kon')";
        $conn->query($sql);
    }
    $conn->close();
    header("location: index.php");
?>