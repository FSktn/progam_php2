<?php
require_once 'config.php';
$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM j_agenda WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("DELETE FROM j_agenda WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    header('Location: index.php');
    exit;
}
include 'delete_view.php';
?>