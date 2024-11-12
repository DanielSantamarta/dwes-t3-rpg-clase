<?php
require_once 'configuracion/db.php';
require_once("./model/Character.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $character = new character();
    $character  ->setName($_POST['name']) 
                ->setDescription($_POST['description']);
   
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

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea tu personaje</title>
</head>
<body>
    <h1>Crea tu personaje</h1>
    <form action="create-character.php" method="POST">
        <input name="name" type= "text" placeholder="nombre">
        <input name="description" type= "text" placeholder="descripcion">
        <input type= "submit">
    </form>
</body>
</html>