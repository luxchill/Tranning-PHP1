<?php
require_once "../models/connect.php";
deleteCar($_GET['id']);
header("location: ../views/table.php");
?>