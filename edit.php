<?php
//connecting to database and handling all methods
require_once "db.php";

$database = new DBcon();
$id = $_REQUEST['id'];
$row = $database->edit($id);
$database->update($id);
$database->delete($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap 5 css framework-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To Do List</title>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Uzdevuma labošana</h1>
            <hr id="line">
        </div>
    </div>
<!--form for updates  -->
    <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Virsrakts</label>
                    <input type="text" id="name" name="name" value="<?= $row['Title'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="comment">Apraksts</label>
                    <input type="text" id="comment" name="comment" value="<?= $row['Comment'] ?>" class="form-control">
                </div>
                <div class="form-group">

                    <label for="completed">Vai uzdevums izpildīts?</label>

                    <input type="hidden" id="completed" name="completed" value="0">
                    <input type="checkbox" id="completed" name="completed" value="1" <?= $row['Checkbox'] == 1 ? "checked" : '';?>>
                    
                    
                </div>
                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary mt-3">Labot</button>
                    <button type="submit" name="delete" class="btn btn-danger mt-3">Delete</button>
                    <a class="btn btn-warning mt-3" href="index.php" role="button">Atpakaļ</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>