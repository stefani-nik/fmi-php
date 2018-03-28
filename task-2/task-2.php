<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 2</title>
    <link rel="stylesheet" type="text/css" href="task-2.css">
</head>
<body>

<?php

    $subject = $lecturer = $description = $group = $credits = "";
    $subjectErr = $lecturerErr = $descriptionErr = $groupErr = $creditsErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["subject"])) {
             $subjectErr = "Полето предмет е задължително";
        }
        else {
            $subject = helper($_POST["subject"]);

            if (!(strlen($subject) < 150)) {
                $subjectErr = "Максималната дължина на полето е 150 символа";
            }
        }

        if (empty($_POST["lecturer"])) {
            $lecturerErr = "Полето описание е задължително";
        }
        else {
            $lecturer = helper($_POST["lecturer"]);

            if (!(strlen($lecturer) < 200)) {
                $lecturerErr = "Максималната дължина на полето е 200 символа";
            }
        }

        if (empty($_POST["description"])) {
            $descriptionErr = "Полето описание е задължително";
        }
        else {
            $description = helper($_POST["description"]);

            if (strlen($description) < 10) {
                $descriptionErr = "Минималната дължина на полето е 10 символа";
            }
        }

        if (empty($_POST["group"])) {
            $groupErr = "Изберете една от посочените групи";
        }
        else {
            $group = helper($_POST["group"]);
        }

        if (empty($_POST["credits"])) {
            $creditsErr = "Полето кредити е задължително";
        }
        else {
            $credits = helper($_POST["credits"]);

            if (!is_int($credits) || $credits < 0) {
                $creditsErr = "Изберете цяло положително число";
            }
        }

    }


    function helper($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<h1>Избираеми дисциплини</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
        <label>Предмет</label>
        <span class="error">* <?php echo $subjectErr; ?> </span>
        <input type="text" name="subject"/>
    </div>
    <div>
        <label>Преподавател</label>
        <span class="error">* <?php echo $lecturerErr; ?> </span>
        <input type="text" name="lecturer"/>
    </div>
    <div>
        <label>Описание</label>
        <span class="error">* <?php echo $descriptionErr; ?> </span>
        <textarea name="description" rows="5" cols="65"></textarea>
    </div>
    <div>
        <label>Група</label>
        <span class="error">* <?php echo $groupErr; ?> </span>
        <select name="group">
            <option></option>
            <option value="m">М</option>
            <option value="am">ПМ</option>
            <option value="bcs">ОКН</option>
            <option value="ccs">ЯКН</option>
        </select>
    </div>
    <div>
        <label>Кредити</label>
        <span class="error">* <?php echo $creditsErr; ?> </span>
        <input type="number" name="credits" value="0"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Запиши ме"/>
    </div>
</form>

</body>
</html>