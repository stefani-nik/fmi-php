<?php

    $errors = array("","","");
    $elective = (object) array("title" => "", "lecturer" => "", "description" => "" );
    
    $id = $_GET["id"];
    $elective = get_from_db($id);

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $errors = validate_form();
        if(count(array_filter($errors)) == 0){
            update_entity($id);
            $elective = get_from_db($id);
        }
}
?>

<h1>Редактиране на дисциплина</h1>

<form method="POST">
    <div>
        <label>Предмет</label>
        <span class="error">* <?php echo $errors[0]; ?> </span>
        <input type="text" name="subject" value="<?php echo $elective["title"] ?>"/>
    </div>
    <div>
        <label>Преподавател</label>
        <span class="error">* <?php echo $errors[1]; ?> </span>
        <input type="text" name="lecturer" value="<?php echo $elective["lecturer"] ?>"/>
    </div>
    <div>
        <label>Описание</label>
        <span class="error">* <?php echo $errors[2]; ?> </span>
        <textarea name="description" rows="5" cols="65"><?php echo $elective["description"] ?></textarea>
    </div>
    <div>
        <label>Създадена на:</label>
        <p><?php echo $elective["created_at"] ?></p>
    </div>
    <div>
        <input type="submit" name="submit" value="Редактирай"/>
    </div>
</form>