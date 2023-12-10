<?php
require_once "../models/connect.php";
require_once "../views/session.php";

$imgPath = '';

if (empty($_FILES['img']['tmp_name'])) {
    $imgPath = $_POST['imgNew'];
} else {
    $imgNew = file_get_contents($_FILES['img']['tmp_name']);
    $imgPath = base64_encode($imgNew);
}

if (empty($_POST['name'])) {
    $_SESSION['errors']['name'] = 'Name từ 3 -> 50 kí tự';
} else {
    unset($_SESSION['errors']['name']);
}

if (empty($_POST['brand'])) {
    $_SESSION['errors']['brand'] = 'Brand từ 3 -> 50 kí tự';
} else {
    unset($_SESSION['errors']['brand']);
}

if (empty($_POST['describe'])) {
    $_SESSION['errors']['describe'] = 'Describe từ 3 -> 50 kí tự';
} else {
    unset($_SESSION['errors']['describe']);
}

if (!empty($_SESSION['errors'])) {
    header("location: ../views/update.php?id=" . $_POST['id']);
} else {
    updateCar($_POST['name'], $_POST['brand'], $imgPath, $_POST['describe'], $_POST['id']);
    header("location: ../views/table.php");
}
?>
