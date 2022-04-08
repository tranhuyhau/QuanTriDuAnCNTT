<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="main" style="display: flex;">
        <div id="PhuongTrinhBac2" style="margin-right: 100px;">
            <h3>Phương trình bậc 2:</h3>
            <form action="" method="post">
                <p>ax<sup>2</sup> + bx + c = 0</p>
                <p>Nhập a: <input type="number" name="ax2"></p>
                <p>Nhập b: <input type="number" name="bx"></p>
                <p>Nhập c: <input type="number" name="c"></p>
                <input type="submit" name="TinhPhuongTrinhBac2" value="Tính phương trình"><br>
            </form>
        </div>
        
        <div id="PhuongTrinh2An">
            <h3>Phương trình 2 ẩn:</h3>
            <form action="" method="post">
                <p>a<sub>1</sub>x + b<sub>1</sub>y = c<sub>1</sub></p>
                <p>a<sub>2</sub>x + b<sub>2</sub>y = c<sub>2</sub></p>
                <div style="display: flex;">
                    <div style="margin-right: 50px;">
                        <p>Nhập a<sub>1</sub>: <input type="number" name="a1"></p>
                        <p>Nhập b<sub>1</sub>: <input type="number" name="b1"></p>
                        <p>Nhập c<sub>1</sub>: <input type="number" name="c1"></p>
                    </div>
                    <div>
                        <p>Nhập a<sub>2</sub>: <input type="number" name="a2"></p>
                        <p>Nhập b<sub>2</sub>: <input type="number" name="b2"></p>
                        <p>Nhập c<sub>2</sub>: <input type="number" name="c2"></p>
                    </div>
                </div>                   
                <input type="submit" name="TinhPhuongTrinh2An" value="Tính phương trình"><br>
            </form>
        </div>
    </div>
    
    <?php
        $a = "";
        $b = "";
        $c = "";
        $a = $_POST['ax2'];
        $b = $_POST['bx'];
        $c = $_POST['c'];
        $delta = pow($b, 2) - 4 * $a * $c;
        if(isset($_POST['TinhPhuongTrinhBac2'])){
            if($delta > 0){
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                echo 'Kết quả: x1 = ' .round($x1, 3)  .', x2 = ' .round($x2, 3);
            }
            else if($delta == 0){
                $x1 = -$b / (2 * $a);
                echo 'Kết quả: x1, x2 = ' .round($x1, 3);
            }
            else if($delta < 0){
                echo 'Kết quả: Vô nghiệm';
            }           
        }

        $a1 = $_POST['a1'];
        $b1 = $_POST['b1'];
        $c1 = $_POST['c1'];
        $a2 = $_POST['a2'];
        $b2 = $_POST['b2'];
        $c2 = $_POST['c2'];
        if(($a1 != 0 || $b1 != 0) && ($a2 != 0 || $b2 != 0)){
            if($a1 / $a2 == $b1 / $b2 && $b1 / $b2 != $c1 / $c2)
                echo 'Kết quả: Vô nghiệm';
            else if($a1 / $a2 == $b1 / $b2 && $b1 / $b2 == $c1 / $c2)
                echo 'Kết quả: Vô số nghiệm';
            else{
                $y = ((($a1 * $c2) - ($a2 * $c1)) / (($a1 * $b1)  - ($a1 * $b2)));
                $x = ($c1 - ($b1 * $y)) / $a1;
                echo 'Kết quả: x = ' .$x .', y = ' .$y;
            }
        }
            
    ?>
</body>
</html>