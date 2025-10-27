<?php
require_once 'config.php';
$sql = "SELECT id, onderwerp, datum FROM j_agenda ORDER BY datum, tijd";
$result = $conn->query($sql);
$items = $result->fetch_all(MYSQLI_ASSOC);
include 'index_view.php';
?>