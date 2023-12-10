<?php
require_once "../models/connect.php";
require_once "../views/session.php";

if(empty($_POST['category_id'])){
    $_SESSION['errors']['category_id'] = "Vui long chon category name";
}else{
    unset($_SESSION['errors']['category_id']);
}

if(empty($_POST['name'])){
    $_SESSION['errors']['name'] = "Vui long nhap name";
}else{
    unset($_SESSION['errors']['name']);
}

if(empty($_POST['brand'])){
    $_SESSION['errors']['brand'] = "Vui long nhap brand";
}else{
    unset($_SESSION['errors']['brand']);
}

if(empty($_FILES['img']['tmp_name'])){
    $_SESSION['errors']['img'] = "Vui long dang anh";
}else{
    unset($_SESSION['errors']['img']);
}

if(empty($_POST['describe'])){
    $_SESSION['errors']['describe'] = "Vui long nhap describe car";
}else{
    unset($_SESSION['errors']['describe']);
}

if(empty($_SESSION['errors'])){
    $img = file_get_contents($_FILES['img']['tmp_name']);
    $imgBase64 = base64_encode($img);
    insert($_POST['category_id'], $_POST['name'], $_POST['brand'], $imgBase64, $_POST['describe']);
    header("location: ../views/table.php");
}else{
    header("location: ../views/create.php");
}







?>