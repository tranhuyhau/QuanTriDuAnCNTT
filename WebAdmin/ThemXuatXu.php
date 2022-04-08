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
    require_once("../db/connect.php");
    require_once("./menu.php");
    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Xuất xứ
            </div>
            <div class="panel-body">
                <center style="width: 500px; margin: auto;">
                    <h1>Thêm xuất xứ</h1>
                    <form action="" method="post">
                        <p>Xuất xứ: <input type="text" name="xuatxu"></p>
                        <button type="submit" class="btn btn-primary" name="btn_save">Thêm</button>
                        <a href="./XuatXu.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    </form>
                </center>

                <style>
                    p {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }

                    select,
                    input,
                    Textarea {
                        padding: 5px;
                        width: 400px;
                    }
                </style>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btn_save"])) {
        $xuatxu = $_POST['xuatxu'];

        $sql = "insert into xuatxu(XuatXu, NgayThem) values ('$xuatxu', NOW())";
        if (mysqli_query($connection, $sql)) {
    ?>
            <script>
                alert("Thêm thành công");
                window.location.href = './XuatXu.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Lỗi thêm data");
            </script>
    <?php
        }
    }
    ?>
    </div>
</body>

</html>