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
            <h1 class="text-center">Darāmo Lietu sarakts</h1>
            <hr id="line">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Virstakts</th>
                    <th>Komentārs</th>
                    <th>Izveidots</th>
                    <th>Labot</th>
                </tr>
                </thead>
                <tbody>
                    <!--php code to fetch everything-->
                <?php

                include 'db.php';
                $database = new DBcon();
                $rows = $database->fetch();

                $i = 1;
                if (!empty($rows)) {
                    foreach ($rows as $row) {
                        ?>
                        <!--Checkbox variable is being used to create diffrent colour tasks (red-in progress, green - done) -->
                        <tr class="<?= $row['Checkbox'] == 1 ? "table-success" : 'table-danger';?>">
                            <td><?php echo $row['Title']; ?></td>
                            <td><?php echo $row['Comment']; ?></td>
                            <td><?php
                            //As time zone set in db is 1 hour off  , some changes are required(can be used just in Riga time zone)
                                    $seconds_ago= (time()-(strtotime($row['Created'])));
                                if ($seconds_ago >=2419200){
                                    echo "Vairāk kā mēnesi atpakaļ";
                                } else if ($seconds_ago >=1209600-3600){
                                    echo "2 nedēļas atpakaļ";
                                }
                                else if ($seconds_ago >=604800-3600){
                                    echo "1 nedēļu atpakaļ";
                                }
                                else if ($seconds_ago >=432000-3600){
                                    echo "5 dienas atpakaļ";
                                }
                                else if ($seconds_ago >=259200-3600){
                                    echo "3 dienas atpakaļ";
                                }
                                else if ($seconds_ago >=172800-3600){
                                    echo "2 dienas atpakaļ";
                                }
                                else if ($seconds_ago >=86400-3600){
                                    echo "1 dienu atpakaļ";
                                }
                                else if ($seconds_ago >=21600-3600){
                                    echo "6 stundas atpakaļ";
                                }
                                else if ($seconds_ago >=3600 -3600){
                                    echo "1 stundu atpakaļ";
                                }
                                else if ($seconds_ago <=3600-3600){
                                    echo "nesen";
                                }
                                
                            ?>
                            <td>
                                <a class="btn btn-info" href="edit.php?id=<?php echo $row['Listid']; ?>" role="button">Labot</a>
                            </td>
                        </tr>

                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <a class="btn btn-success" href="add.php" role="button">Pievienot</a>
</div>
</body>
</html>