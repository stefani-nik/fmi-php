<h1>Редактиране на дисциплина</h1>

<form name="electives" method="POST">
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
        <textarea name="description" rows="5" cols="65">
        </textarea>
    </div>
    <div>
        <input type="submit" name="submit" value="Редактирай"/>
    </div>
</form>