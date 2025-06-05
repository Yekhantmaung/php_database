<?php

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=phpdatabase" , "root" , "");
        $pdo -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        $data = "INSERT INTO newtable (name,email) VALUE(:a,:b)";
        $move = $pdo->prepare($data);
        $move -> bindParam(':a',$a);
        $move -> bindParam(':b',$b);
        $a = "Your Name .. ";
        $b = "Your Email ..";
        $move -> execute();

        $hide = "DELETE FROM newtable WHERE id=:id";
        $none = $pdo->prepare($hide);
        $none -> bindParam(':id',$id);
        $id = 1;
        $none -> execute();

        $change = "UPDATE newtable SET name=:name WHERE id=:id";
        $switch = $pdo->prepare($change);
        $switch -> bindParam(':name',$name);
        $switch -> bindParam(':id',$id);
        $name = "Switch Name";
        $id = 2;
        $switch -> execute();

        $show = "SELECT * FROM newtable";
        $out = $pdo->prepare($show);
        $out -> execute();
        $newtable = $out->fetchALl(PDO::FETCH_ASSOC);
        foreach ($newtable as $user) {
            echo "ID is : ".$user['id']."<br>"."NAME is : ".$user['name']."<br>"."Email is : ".$user['email']."<br>";
        }

    }catch (PDOEXCEPTION $error) {
        echo "Database Connected Failed.".$error->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>******</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="alert alert-success">
        <?php
        echo "DATABASE CONNECTED SUCCESSFULLY."."<br>";
        echo "DATABASE    ADD    SUCCESSFULLY."."<br>";
        echo "DATABASE   DELETE  SUCCESSFULLY."."<br>";
        echo "DATABASE   UPDATE  SUCCESSFULLY."."<br>";
        ?>
        </div>
    </div>
</div>
    
</body>
</html>