<?php
require_once 'config.php';
$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM j_agenda WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();
include 'detail_view.php';
?>