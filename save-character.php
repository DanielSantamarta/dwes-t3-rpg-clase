<?php
    require_once 'configuracion/db.php';

    echo "Nombre introducido: ". $_POST["name"]."<br>";
    echo "Descripcion introducida: ". $_POST["description"]."<br>";

    $name = $_POST["name"];
    $description = $_POST["description"];

    $stmt = $db->prepare("INSERT INTO characters (name, description) 
        VALUES (:name, :description)");
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':description',$description);

    if($stmt->execute()){
        echo"Personaje creado";
    }else{
        echo "ERROR";
    }

