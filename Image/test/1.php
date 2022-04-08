<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 20;
        $b = 15;
        $c = 30;
        if($a > $b && $a > $c){
            echo $a;
        }
        else if($b > $a && $b > $c){
            echo $b;
        }
        else
            echo $c;
    ?>
</body>
</html>