<?php

// $host = 'dpg-clqto6ie9h4c73aq5lf0-a.oregon-postgres.render.com'; change = localhost
$dbname = 'keoke123';
// $user = 'postgres'; change = root
$pass = '';


try {
    $connect = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "success";
} catch (PDOException $e) {
    die($e->getMessage());
}

function selectCategories(){
    global $connect;
    $sql = "SELECT * FROM categories";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function selectAll(){
    global $connect;
    $sql = "SELECT car.id, car.name_car, car.brand, car.img, car.describe, categories.name FROM car INNER JOIN categories ON car.category_id = categories.id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function insert($category_id, $name_car, $brand, $img, $describe){
    global $connect;
    $sql = "INSERT INTO car (category_id, name_car, brand, img, describe) VALUES (:category_id, :name_car, :brand, :img, :describe)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":category_id", $category_id);
    $stmt->bindParam(":name_car", $name_car);
    $stmt->bindParam(":brand", $brand);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":describe", $describe);
    $stmt->execute();
}

function deleteCar($id){
    global $connect;
    $sql = "DELETE FROM car WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function selectEdit($id){
    global $connect;
    $sql = "SELECT car.id, car.name_car, car.brand, car.img, car.describe, categories.name FROM car INNER JOIN categories ON car.category_id = categories.id WHERE car.id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function updateCar($name_car, $brand, $img, $describe, $id){
    global $connect;
    $sql = "UPDATE car SET name_car = :name_car, brand = :brand, img = :img, describe = :describe WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":name_car", $name_car);
    $stmt->bindParam(":brand", $brand);
    $stmt->bindParam(":img", $img);
    $stmt->bindParam(":describe", $describe);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}



?>