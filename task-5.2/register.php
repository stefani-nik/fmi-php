<?php
    $form_data = array();
    $form_data = json_decode(file_get_contents("php://input"));
    echo  json_encode($form_data);
?>