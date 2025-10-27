<!doctype html>
<html>
<head><title>Verwijderen</title></head>
<body>
<h1>Weet je zeker dat je dit item wilt verwijderen?</h1>
<p><strong><?= htmlspecialchars($item['onderwerp']) ?></strong> op <?= $item['datum'] ?></p>
<form method="post">
    <button type="submit">Ja, verwijderen</button>
    <a href="index.php">Annuleren</a>
</form>
</body>
</html>