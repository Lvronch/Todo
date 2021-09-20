<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap 5 css framework-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To Do List</title>
    
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Pievieno uzdevumu</h1>
            <hr id="line">
        </div>
      </div>
      <!--Form creation and database connection -->
      <?php
        
            include "db.php";
            $database = new DBcon();
            $insert = $database->insert();

      ?>
      <div class="row">
        <div class="col-md-5 mx-auto">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Virsrakts</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Apraksts</label>
                    <input type="text" name="comment" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" id="addbtn" name="submit" class="btn btn-primary mt-3">Pievienot</button>
                    <a class="btn btn-warning mt-3" href="index.php" role="button">Atpakaļ</a>
                </div>
            </form>
        </div>
      </div>
    </div>  
</body>
</html>