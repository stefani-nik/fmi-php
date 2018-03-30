<?php

function validate_form(){
    
    $subjectErr = $lecturerErr = $descriptionErr = "";
    $subject = $lecturer = $description = "";
    
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


    function helper($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    return array($subjectErr, $lecturerErr, $descriptionErr);
}

?>