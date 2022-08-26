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
        createToDo();
        deleteTodo();
        done();
        
        ?>
</head>
<body>
<h1>To Do</h1>
    <div class="container">
        
        <div class="add_section">
            
            <h2 class="hej">Lägg till något i din lista</h2>

            <form action="" method="POST" autocomplete="off">
                <?php if(isset($_GET['message']) && $_GET['message']== 'error') {?>
                
                <input type="text"
                    name="title"
                    placeholder="Obligatorisk"
                    style="border-color:red"/>
                    <?php } else {?>
                    <input type="text"
                    name="title"
                    placeholder="Titel"/>
                    <?php } ?>
                <input type="text"
                    name="body"
                    placeholder="Beskrivning"/>
       
                <button type="submit" name="add">Lägg till</button>
            </form>
        </div>
        <div class="todos">
          <h2 class="hej">Att Göra</h2>
        <?php showitems();
        ?>
        </div>
    </div>
    
</body>
</html>
