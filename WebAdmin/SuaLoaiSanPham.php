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
                Loại sản phẩm
            </div>
            <div class="panel-body">
                <center style="width: 500px; margin: auto;">
                    <h1>Sửa loại sản phẩm</h1>
                    <form action="" method="post">
                        <?php
                        if (isset($_GET["IDLSP_Update"])) {
                            $IDLSP_Update = $_GET['IDLSP_Update'];
                            $sql = "SELECT * FROM loaisanpham WHERE ID=$IDLSP_Update";
                            $row = mysqli_fetch_row(mysqli_query($connection, $sql));
                        }
                        ?>
                        <p>Loại sản phẩm cũ: <input type="text" name="loai_SP_old" readonly value="<?php echo $row[1] ?>"></p>
                        <p>Loại sản phẩm mới: <input type="text" name="loai_SP_new"></p>
                        <button type="submit" class="btn btn-primary" name="btn_save">Sửa</button>
                        <a href="./LoaiSanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    </form>
                </center>
                        <?php
                            if(isset($_POST["btn_save"])){
                                $loai_SP_new = $_POST["loai_SP_new"];
                                $sql_update = "UPDATE loaisanpham SET Ten = '$loai_SP_new' WHERE ID = $IDLSP_Update";
                                var_dump($sql_update);
                                mysqli_query($connection, $sql_update);?>
                                <script>
                                    alert("Sửa thành công");
                                    window.location.href = "./LoaiSanPham.php";
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