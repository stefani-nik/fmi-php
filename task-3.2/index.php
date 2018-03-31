<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 2</title>
    <link rel="stylesheet" type="text/css" href="content/style.css">
</head>
<body>
    <?php
        include ('form-validation.php');
        include('db-manager.php');
        require_once('functions.php');
        $requestParsed = parseRequest();
        processRequest($requestParsed);
    ?>  
</body>
</html>
