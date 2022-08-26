<?php

include ("connect.php");


function showitems():void {

    global $db;
    $items = $db->query("SELECT * FROM todo_items ORDER BY id DESC");

    if ($items->rowCount() === 0){ ?> 
        <h2>Du har inget att göra</h2> 
        <?php 
    } else {
        foreach ($items as $item) { ?> 
    
            <div class="item">
            <?php if($item['checked']== 0) { ?>
                    <a class="undone"href="index.php?done=<?php echo $item['id']?>">KLAR</a>
                    
                    <?php } else { ?>
                    <a class="done"href="index.php?done=<?php echo $item['id']?>">KLAR</a>
                    
                    <?php } ?>
                
                <h2 class="hell"><?php echo $item['title']?></h2>
                <p class="body"><?php echo $item['body']?></p>
                <p class="timestamp"><?php echo $item['time']?></p>

                
                <a class="edit"href="edit.php?id=<?php echo $item['id']?>">Ändra</a>
                <a class="remove"href="index.php?delete=<?php echo $item['id']?>">X</a>
              
                
            </div>
            <?php
        }
    }
}

function createToDo():void {
    global $db;
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];

        if(empty($title)) {
            header('Location: index.php?message=error');
        } else {

            $query = 'INSERT INTO todo_items(title, body, checked) VALUES(?,?, 0)';
            $statement = $db->prepare($query);
            $statement->execute([$title, $body]);

            header('Location:index.php');

        }
    }
}

function editToDo():void {
    global $db;
    if (isset($_POST['edit'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $id = $_POST['id'];

        $query = "UPDATE todo_items SET title = '$title', body = '$body' WHERE id = '$id'";
        $statement = $db->prepare($query);
        $statement->execute();
        header("Location:index.php");   
    }
}

function deleteTodo():void {
    if (isset($_GET['delete'])) {
    global $db;
    $id = $_GET['delete'];
    $sql = "DELETE FROM todo_items WHERE id = '$id'";
    $db->query($sql);
    }
}

function done():void {
    global $db;
    if (isset($_GET['done'])) {
        
        $id = $_GET['done'];
        $item = $db->query("SELECT * FROM todo_items WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
        $value = $item['checked'];
        
        if($value == 0) {
            $sql = "UPDATE todo_items SET checked = 1 WHERE id = '$id'";
            $db->query($sql);
            header("Location:index.php");
        } else { 
            $sql = "UPDATE todo_items SET checked = 0 WHERE id = '$id'";
            $db->query($sql);
            header("Location:index.php");
        }
    }
}




?>

