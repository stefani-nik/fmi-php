<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="task-1.2.css"/>
</head>
<body>
    <?php
        function showPage($data, $pageId){
            $title = $data[$pageId]['title'];
            $description = $data[$pageId]['description'];
            $lecturer = $data[$pageId]['lecturer'];

            return "<h1>{$title}</h1><h2>{$lecturer}</h2><p>{$description}</p>";
        }

        function showNav($data, $pageId){

            $result = "<nav>";

            foreach ($data as $key => $value){
                $title = $value['title'];

                $result .= "<a href='?page={$key}' ";

                if($key == $pageId){
                    $result .= "class='selected'";
                }

                $result .= "> {$title} </a>";
            }

            return $result . "</nav>";
        }

        $data = [
            'webgl' => [
                'title' => 'Компютърна графика с WebGL',
                'description' => '...',
                'lecturer' => 'доц. П. Бойчев',
            ],
            'go' => [
                'title' => 'Програмиране с Go',
                'description' => '...',
                'lecturer' => 'Николай Бачийски',
            ]
        ];

        $pageId = 'go';

        echo showPage($data, $pageId);
        echo showNav($data, $pageId);
    ?>

</body>
</html>
