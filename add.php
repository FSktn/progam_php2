<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'config.php';
    $onderwerp = trim($_POST['onderwerp'] ?? '');
    $datum = $_POST['datum'] ?? '';
    $tijd = $_POST['tijd'] ?? '';
    $prioriteit = (int)($_POST['prioriteit'] ?? 0);
    $beschrijving = trim($_POST['beschrijving'] ?? '');

    if (!$onderwerp) $errors[] = 'Onderwerp verplicht';
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $datum)) $errors[] = 'Ongeldige datum';
    if (!preg_match('/^\d{2}:\d{2}:\d{2}$/', $tijd)) $errors[] = 'Ongeldige tijd';
    if ($prioriteit < 1 || $prioriteit > 5) $errors[] = 'Prioriteit moet 1-5 zijn';

    if (!$errors) {
        $stmt = $conn->prepare("INSERT INTO j_agenda (onderwerp, datum, tijd, prioriteit, beschrijving)
                                VALUES (?,?,?,?,?)");
        $stmt->bind_param('sss is', $onderwerp, $datum, $tijd, $prioriteit, $beschrijving);
        $stmt->execute();
        header('Location: index.php');
        exit;
    }
}
include 'add_view.php';
?>