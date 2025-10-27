<!doctype html>
<html>
<head><title>Detail</title></head>
<body>
<h1><?= htmlspecialchars($item['onderwerp']) ?></h1>
<ul>
    <li>Datum: <?= $item['datum'] ?></li>
    <li>Tijd: <?= $item['tijd'] ?></li>
    <li>Prioriteit: <?= $item['prioriteit'] ?></li>
    <li>Beschrijving: <?= nl2br(htmlspecialchars($item['beschrijving'])) ?></li>
</ul>
<a href="index.php">Terug naar overzicht</a>
</body>
</html>