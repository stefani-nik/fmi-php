<?php
function parseRequest() 
{
    $param = "";
    
    if(isset($_GET['id']))
    {
        $param = $_GET['id'];  
    }
    return $param;
    
}

function processRequest($param){

    if(empty($param)){
        include('views/post.php');
    }
    else{
        include('views/edit.php');
    }
}
?>