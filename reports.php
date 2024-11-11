
<!DOCTYPE html>
<html>
<head>
    <title>Zgłoszenia</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php require('menu.php'); ?>
    <?php
    if ($_SESSION['rola'] !== 'admin') {
        die('Brak dostępu');
    }
$sql = "SELECT z.id, z.idUzytkownika, z.tresc, z.data, u.login FROM zgloszenia z JOIN uzytkownicy u ON z.idUzytkownika = u.id ORDER BY z.data DESC";
$result = $conn->query($sql);
?>
    <h2>Zgłoszenia użytkowników</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Użytkownik</th>
            <th>Treść</th>
            <th>Data</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['login']}</td>
                    <td>{$row['tresc']}</td>
                    <td>{$row['data']}</td>
                  </tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
