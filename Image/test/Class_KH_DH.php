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
        $khachHang = array(
            "KH01" => ["thanhtien" => 80000,"ho" => 'Nguyen', "ten" => 'tu', "ngaythang" => '01/09/2021'],
            "KH01" => ["thanhtien" => 100000,"ho" => 'Tran', "ten" => 'Huy', "ngaythang" => '01/08/2021'],
        );

        $sum = 0;
        $customerfind = [];
        foreach($khachHang as $item){
            if($item["ngaythang"] == "01/09/2021")
            {
                $sum += $item["thanhtien"];
            }
            if($item["ho"] == "Nguyen"){
                array_push($customerfind, $item);
            }
        }

        echo "Sum thành tiền từ 01/09/2021 => 30/09/2021 là: " .$sum;

        
    ?>
</body>
</html>