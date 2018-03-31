<?php

$errors = array("","","");
$elective = (object) array("title" => "", "lecturer" => "", "description" => "" );

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $errors = validate_form();
    if(count(array_filter($errors)) == 0){
        post_to_db();
    }
}


?>

<h1>Добавяне на дисциплини</h1>

<form method="POST" action="">
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
