<?php 

require_once("../../config/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM enemies WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $enemy = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
            
        $stmt = $db->prepare("UPDATE enemies 
        SET name = :name, 
            description = :description,
            isBoss = :isBoss,
            health = :health, 
            strength = :strength, 
            defense = :defense

        WHERE id = :id");
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':isBoss', $_POST['isBoss']);
        $stmt->bindValue(':health', $_POST['health']);
        $stmt->bindValue(':strength', $_POST['strength']);
        $stmt->bindValue(':defense', $_POST['defense']);
        $stmt->bindValue(':id',  $_POST['id']);

        if ($stmt->execute()){ 
            header("Location: create_enemy.php"); 
            exit;
        }
    }
    catch(PDOException $e){
        die ("Error al actualizar".$e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar enemigo</title>
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method = 'POST'>
    <input type="hidden" name="id" value="<?= $enemy['id']?>">
    <label for="nameInput">Nombre:</label>
        <input type="text" name="name" id="nameInput" value="<?= $enemy['name'] ?>">
        
        <label for="descriptionInput">Descripción:</label>
        <input type="text" name="description" id="descriptionInput" value="<?= $enemy['description'] ?>">

        <select name="isBoss" id="typeIsBoss">
            <option value="0">No es Jefe</option>
            <option value="1">Es jefe</option>
        </select>

        <label for="healthInput">Vida:</label>
        <input type="number" name="health" id="healthInput" value="<?= $enemy['health']  ?>">

        <label for="strengthInput">Fuerza:</label>
        <input type="number" name="strength" id="strengthInput" value="<?= $enemy['strength']  ?>">

        <label for="defenseInput">Defensa:</label>
        <input type="number" name="defense" id="defenseInput" value="<?= $enemy['defense']  ?>">

        <button type="submit">Actualizar Enemigo</button>
    </form>    



</body>
</html>