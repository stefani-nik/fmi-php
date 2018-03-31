<?php

function validate_form(){

    $subjectErr = $lecturerErr = $descriptionErr = "";
    $subject = helper($_POST["subject"]);
    $lecturer = helper($_POST["lecturer"]);
    $description = helper($_POST["description"]);

    if (empty($subject)) {
        $subjectErr = "Полето предмет е задължително";
    }
    else {
        if (!(strlen($subject) < 150)) {
            $subjectErr = "Максималната дължина на полето е 150 символа";
        }
    }

    if (empty($lecturer)) {
        $lecturerErr = "Полето описание е задължително";
    }
    else {

        if (!(strlen($lecturer) < 200)) {
            $lecturerErr = "Максималната дължина на полето е 200 символа";
        }
    }

    if (empty($description)) {
        $descriptionErr = "Полето описание е задължително";
    }
    else {

        if (strlen($description) < 10) {
            $descriptionErr = "Минималната дължина на полето е 10 символа";
        }
    }

    return array($subjectErr, $lecturerErr, $descriptionErr);
}

function helper($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>