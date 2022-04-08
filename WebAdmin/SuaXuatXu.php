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
                    <h1>Sửa xuất xứ</h1>
                    <form action="" method="post">
                        <?php
                        if (isset($_GET["IDXX_Update"])) {
                            $IDXX_Update = $_GET['IDXX_Update'];
                            $sql = "SELECT * FROM xuatxu WHERE ID=$IDXX_Update";
                            $row = mysqli_fetch_row(mysqli_query($connection, $sql));
                        }
                        ?>
                        <p>Tên xuất xứ cũ: <input type="text" name="xuatxu_old" readonly value="<?php echo $row[1] ?>"></p>
                        <p>Tên xuát xứ mới: <input type="text" name="xuatxu_new"></p>
                        <button type="submit" class="btn btn-primary" name="btn_save">Sửa</button>
                        <a href="./XuatXu.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    </form>
                </center>
                        <?php
                            if(isset($_POST["btn_save"])){
                                $xuatxu_new = $_POST["xuatxu_new"];
                                $sql_update = "UPDATE xuatxu SET XuatXu = '$xuatxu_new' WHERE ID = $IDXX_Update";
                                mysqli_query($connection, $sql_update);?>
                                <script>
                                    alert("Sửa thành công");
                                    window.location.href = "./XuatXu.php";
                                </script>
                            <?php }
                        ?>
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

    </div>
</body>

</html>