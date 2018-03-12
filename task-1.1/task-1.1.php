<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="task-1.1.css">
</head>
<body>

<?php

    function renderTable($rowsCnt, $colsCnt){
        $result = "<table>";

        for($row = 1; $row <= $rowsCnt; $row++ ) {
            $result .= "<tr><th>${row}</th>";

            for ($col = 2; $col <= $colsCnt; $col++){

                if($row == 1)
                {
                    $result .= "<th>${col}</th>";
                }
                else {
                    $multiplied = $row * $col;
                    $result .= "<td>{$multiplied}</td>";
                }

            }
            $result .= "</tr>";
        }

        return $result."</table>";
    }

   echo renderTable(9,9);
?>

</body>
</html>