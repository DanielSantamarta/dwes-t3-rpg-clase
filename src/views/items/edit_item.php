<?php 

require_once("../../config/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM items WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
            
        $stmt = $db->prepare("UPDATE items 
        SET name = :name, 
            description = :description,
            type = :type,
            effect = :effect

        WHERE id = :id");
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':description', $_POST['description']);
        $stmt->bindValue(':type', $_POST['type']);
        $stmt->bindValue(':effect', $_POST['effect']);
        $stmt->bindValue(':id',  $_POST['id']);

        if ($stmt->execute()){ 
            header("Location: create_item.php"); 
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
    <title>Editar Objeto</title>
</head>
<body>
    <form action = <?=$_SERVER['PHP_SELF']?> method="POST"> 
        <input type="hidden" name="id" value="<?= $item['id']?>">
        <label for="nameInput">Nombre:</label>
        <input type = "text" name = "name" id = "nameInput" value="<?= $item['name'] ?>">

        <label for="descriptionInput">Descripción:</label>
        <input type="text" name="description" id="descriptionInput" value="<?= $item['description'] ?>">

        <label for="typeInput">Tipo:</label>
        <select name="type" id="typeInput">
            <option value="weapon">Arma</option>
            <option value="armor">Armadura</option>
            <option value="potion">Poción</option>
            <option value="misc">Otro</option>
        </select>

        <label for="effectInput">Effecto:</label>
        <input type = "int" name = "effect" id = "effectInput" value="<?= $item['effect'] ?>">

        <button type="submit">Actualizar objeto</button>
    </form>    



</body>
</html>