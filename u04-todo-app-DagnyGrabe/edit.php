<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>To-Do</title>
    <?php
        
      
        include("crud.php");
        
        
        ?>
</head>
<body>
    <h1>To Do</h1>

    
   <?php 
    $id = $_GET['id'];
    

    global $db;
    $item = $db->query("SELECT * FROM todo_items WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    
    
    ?>

    
    <form action="<?php echo $_PHP_SELF ?>" method="POST" autocomplete="off">
        <input hidden name="id" value="<?php echo $id?> "/>
        <input type="text"
               name="title"
               value="<?php echo $item['title']?>"
               placeholder="Skriv något"/>
        <input type="text"
               name="body"
               value="<?php echo $item['body']?>"
               placeholder="Skriv något"/>
               
        <button type="submit" name="edit">Uppdatera till</button>
    </form>
   <?php 
    editToDo();?>
    
    
    
</body>
</html>
