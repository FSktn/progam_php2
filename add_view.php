<!doctype html>
<html>
<head><title>Item toevoegen</title></head>
<body>
<h1>Nieuw agenda-item</h1>
<?php if ($errors): ?>
    <ul style="color:red">
        <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
    </ul>
<?php endif; ?>
<form method="post">
    Onderwerp: <input name="onderwerp" required><br>
    Datum: <input type="date" name="datum" required><br>
    Tijd: <input type="time" name="tijd" required><br>
    Prioriteit (1-5): <input type="number" min="1" max="5" name="prioriteit" required><br>
    Beschrijving:<br>
    <textarea name="beschrijving" rows="4" cols="40"></textarea><br>
    <button type="submit">Opslaan</button>
</form>
<a href="index.php">Annuleren</a>
</body>
</html>