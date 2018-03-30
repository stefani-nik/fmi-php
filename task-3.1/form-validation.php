<?php

function validate_form(){

    
    // For some reason my $_POST variable is always empty 
    // So I had to use the php://input for getting the data
    // I guess it is some problem in the configurations in php.ini
    // I will be glad if I get an advice :)
    
    $data = get_data_from_request();
    $subjectErr = $lecturerErr = $descriptionErr = "";
    $subject = $data[0];
    $lecturer = $data[1];
    $description = $data[2];
       
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


    function helper($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    return array($subjectErr, $lecturerErr, $descriptionErr);
}

function get_data_from_request(){
    $data = explode("&",file_get_contents("php://input"));
    $subject = explode("=", $data[0])[1];
    $lecturer = explode("=", $data[1])[1];
    $description = explode("=", $data[2])[1];
    
    return array($subject, $lecturer, $description);
}

?>