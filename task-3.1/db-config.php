<?php

$servername = "localhost";
$user = "root";
$pass = "";
$db = "fmiWEB";

function get_dbc(){

    global $servername, $user, $pass, $db;
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$db", $user, $pass);
        echo "<div class='infobox'> Connection successful </div>";
    }
    catch (PDOException $e) {

           if($e->getCode() == 1049) {
               echo "<div class='errorbox'> Creating database.. </div>";
               create_db();
               $connection = new PDO("mysql:host=$servername;dbname=$db", $user, $pass);
           }
           else{
            echo "<div class='errorbox'>Connection failed: " . $e->getMessage() . "</div>";
           }

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

        echo "<div class='infobox'> Successfully created database $db</div>";
        create_table();
    }
    catch (PDOException $e) {
        echo "<div class='errorbox'> Creating database $db failed: " . $e->getMessage() . "</div>";
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
        echo "<div class='infobox'> Table Electives created successfully </div>";
        insert_in_table();
    }
    catch (PDOException $e) {
        echo "<div class='errorbox'> Creating table Electives failed: " . $e->getMessage() . "</div>";
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
        echo "<div class='infobox'> Insertion successful </div>";
        create_column();
    }
    catch(PDOException $e){
        echo "<div class='errorbox'> Inserting into table Electives failed : ". $e->getMessage() . "</div>";
    }
}

function create_column(){

    $connection = get_dbc();
    $table = "electives";
    $column = "created_at";
    $sqlAddColumn = "ALTER TABLE $table ADD $column DATE";

    try{
        $connection->exec($sqlAddColumn);
        echo "<div class='infobox'> Successfully added column CREATED_AT </div>";
    }
    catch(PDOException $e){
        echo "<div class='errorbox'> Creating column CREATED_AT failed : ". $e->getMessage() . "</div>";
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
            echo "<div class='infobox'> Your successfully added the elective $subject </div>";
        }
        catch (PDOException $e){
            echo "<div class='errorbox'> Adding $subject to the database failed : ". $e->getMessage() . "</div>";
        }

}
?>