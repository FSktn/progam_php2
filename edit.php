<?php
require_once 'config.php';
$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM j_agenda WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $stmt = $conn->prepare("UPDATE j_agenda
                                SET onderwerp=?, datum=?, tijd=?, prioriteit=?, beschrijving=?
                                WHERE id=?");
        $stmt->bind_param('sssisi', $onderwerp, $datum, $tijd, $prioriteit, $beschrijving, $id);
        $stmt->execute();
        header('Location: index.php');
        exit;
    }
}
include 'edit_view.php';
?>