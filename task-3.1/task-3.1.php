<?php

    include ('form-validation.php');
    include('db-config.php');
   
    $errors = array("","","");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $errors = validate_form();
        if(count(array_filter($errors)) == 0){
           post_to_db();
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 2</title>
    <link rel="stylesheet" type="text/css" href="task-3.1.css">
</head>
<body>

<h1>Избираеми дисциплини</h1>
<form name="electives" method="POST" action="task-3.1.php">
    <div>
        <label>Предмет</label>
        <span class="error">* <?php echo $errors[0]; ?> </span>
        <input type="text" name="subject"/>
    </div>
    <div>
        <label>Преподавател</label>
        <span class="error">* <?php echo $errors[1]; ?> </span>
        <input type="text" name="lecturer"/>
    </div>
    <div>
        <label>Описание</label>
        <span class="error">* <?php echo $errors[2]; ?> </span>
        <textarea name="description" rows="5" cols="65"></textarea>
    </div>
    <div>
        <input type="submit" name="submit" value="Запиши ме"/>
    </div>
</form>

</body>
</html>