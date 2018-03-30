<?php

$servername = "localhost";
$user = "root";
$pass = "";
$db = "fmiWEB";

function get_dbc(){

    global $servername, $user, $pass, $db;
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$db", $user, $pass);
        echo "Connection successful </br>";
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        echo "Creating database.. ";
        create_db();
    }
    return $connection;
}

function create_db(){
    global $servername, $user, $pass, $db;

    try {
        $connection = new PDO("mysql:host=$servername", $user, $pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS $db";
        $connection->exec($sql);
        echo "Successfully created database $db </br>";
        create_table();
    }
    catch (PDOException $e) {
        echo "Creating database $db failed: " . $e->getMessage();
    }
}

function create_table(){

    $connection = get_dbc();
    $table = "electives";
    // Create table if it does not exist
    $sqlElectives = "CREATE TABLE IF NOT EXISTS $table (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      title VARCHAR(128),
                      description VARCHAR(1024),
                      lecturer VARCHAR(128)
                    );";

    try {
        $connection->exec($sqlElectives);
        echo "Table Electives created successfully </br>";
        insert_in_table();
    }
    catch (PDOException $e) {
        echo "Creating table Electives failed: " . $e->getMessage();
    }
}

function insert_in_table(){

    $connection = get_dbc();
    $sqlInput = "INSERT INTO electives (title, description, lecturer)
                  VALUES
                (\"Programming with Go\", \"Let's learn Go\", \"Nikolay Batchiyski\"),
                (\"AKDU\", \"Let's Graduate\", \"Svetlin Ivanov\"),
                (\"Web technologies\", \"Let's learn the web\", \"Milen Petrov\");";

    try{
        $connection->exec($sqlInput);
        echo "Insertion successful </br>";
        create_column();
    }
    catch(PDOException $e){
        echo "Inserting into table Electives failed : ". $e->getMessage();
    }
}

function create_column(){

    $connection = get_dbc();
    $table = "electives";
    $column = "created_at";
    $sqlAddColumn = "ALTER TABLE $table ADD $column DATE";

    try{
        $connection->exec($sqlAddColumn);
        echo "Successfully added column CREATED_AT </br>";
    }
    catch(PDOException $e){
        echo "Creating column CREATED_AT failed : ". $e->getMessage();
    }

}

function post_to_db(){

        $data = get_data_from_request();
        $connection = get_dbc();
        $table = "electives";
        $subject = $data[0];
        $description = $data[1];
        $lecturer = $data[2];
        $created_at = date('Y-m-d H:i:s');

        $sqlInsert = "INSERT INTO $table  (title, description, lecturer, created_at)
                      VALUES ('$subject','$description','$lecturer','$created_at')";

        try{
            $connection->exec($sqlInsert);
            echo "Your successfully added the elective $subject";
        }
        catch (PDOException $e){
            echo "Adding $subject to the database failed : ". $e->getMessage();
        }

}
?>