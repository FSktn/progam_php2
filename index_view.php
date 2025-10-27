<!doctype html>
<html>
<head><title>Agenda Overzicht</title></head>
<body>
<h1>Mijn Agenda</h1>
<a href="add.php">Nieuw item toevoegen</a>
<table border="1">
    <tr><th>Datum</th><th>Onderwerp</th><th>Acties</th></tr>
    <?php foreach ($items as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['datum']) ?></td>
        <td><?= htmlspecialchars($row['onderwerp']) ?></td>
        <td>
            <a href="detail.php?id=<?= $row['id'] ?>">Detail</a> |
            <a href="edit.php?id=<?= $row['id'] ?>">Wijzig</a> |
            <a href="delete.php?id=<?= $row['id'] ?>">Verwijder</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>