<?php
//main class what is model for all controls
class DBcon
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "todolist";
    private $conn;

    //costruct db connection and catch error if unsucessful

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }
//------------Control Methods------------------------

    //fetching results for index page to show all records

    public function fetch()
    {
        $data = [];
        //grabbing data from lists
        $query = "SELECT * FROM list";
        $sql = $this->conn->query($query);
        if ($sql) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //inset function to insert values in the database,
    //while also checking if any of the values are missing
    public function insert()
    {
        $params = [
            'submit',
            'name',
            'comment'
        ];

        foreach ($params as $param) {
            if (!isset($_POST[$param])) {
                return;
            }
        }

        if (empty($_POST['name'])) {
            echo "<script>alert('Ievadiet tekstu visos lauciņos')</script>";
            echo "<script>window.location.href = 'add.php';</script>";

            return;
        }

        $title = $_POST['name'];
        $comment = $_POST['comment'];

        $query = "INSERT INTO list(Title, Comment) VALUES ('$title','$comment')";
        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Uzdevums pievienots')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }
    }

    //Database single record fetch
    public function edit(int $id)
    {
        $data = [];
        $query = "SELECT * FROM list WHERE Listid = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    //Database update
    public function update(int $id)
    {
        if (isset($_POST['update'])) {
            if (isset($_POST['name']) and isset($_POST['comment'])) {
                if (!empty($_POST['name'])) {

                    $title = $_POST['name'];
                    $comment = $_POST['comment'];
                   $checkbox = $_POST['completed'];

                    $query = "UPDATE list SET Title ='$title', Comment = '$comment', Checkbox = '$checkbox' WHERE Listid='$id'";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('Uzdevums izmainīts')</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }
                } else {
                    echo "<script> alert('Ievadiet tekstu lauciņā Virsraksts')</script>";
                    echo "<script>window.location.href = 'edit.php?id=$id';</script>";
                }
            }
        }
    }

    //Delete function
    public function delete(int $id)
    {
        if (isset($_POST['delete'])) {
            $query = "DELETE FROM list WHERE Listid = '$id'";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('Uzdevums izdzēsts')</script>";
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Kļūda')</script>";
            }
        }
    }
}