<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            vertical-align: middle !important;
        }
    </style>
</head>

<body>
    <?php
    require_once("../db/connect.php");
    require_once("./menu.php");
    ?>
    <div class="col-md-10 content">
        <?php
        if (isset($_GET["IDLSP_Delete"])) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Loại sản phẩm
                </div>
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p style="font-size: 30px;">Xóa loại sản phẩm</p>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Tên loại sản phẩm</td>
                            <td>Ngày thêm</td>
                        </thead>
                        <?php
                        $IDLSP_Delete = $_GET["IDLSP_Delete"];
                        $sql = "SELECT * FROM loaisanpham WHERE ID=$IDLSP_Delete";
                        $result = mysqli_query($connection, $sql);
                        $dem = 0;
                        while ($row = mysqli_fetch_row($result)) {
                            $dem++;
                        ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sản phẩm bị xóa theo nếu xóa loại sản phẩm
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá nhập</td>
                            <td>Giá bán</td>
                            <td>Số lượng</td>
                            <td>Ngày nhập</td>
                            <td>Xuất xứ</td>
                        </thead>
                        <?php
                        $IDLSP_Delete = $_GET["IDLSP_Delete"];
                        $sql = "SELECT sanpham.*, xuatxu.XuatXu FROM sanpham INNER JOIN XuatXu ON sanpham.XuatXu = xuatxu.ID 
                         WHERE ID_LoaiSanPham=$IDLSP_Delete";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">Không có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                $dem++;
                            ?>
                                <style>
                                    td {
                                        vertical-align: middle !important;
                                    }
                                </style>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row[0] ?></td>
                                    <td><img src="../uploads/<?php echo $row[2] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><?php echo $row[5] ?></td>
                                    <td><?php echo $row[6] ?></td>
                                    <td><?php echo $row[7] ?></td>
                                    <td><?php echo $row[9] ?></td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div>
                <form action="" method="post">
                    <a href="./LoaiSanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    <button type="submit" class="btn btn-primary" name="btn_delete">Xác nhận xóa</button>
                </form>
            </div>
            <?php
            if (isset($_POST["btn_delete"])) {
                $sql_delete = "DELETE FROM sanpham WHERE ID_LoaiSanPham=$IDLSP_Delete";
                mysqli_query($connection, $sql_delete);
                $sql_delete2 = "DELETE FROM loaisanpham WHERE ID=$IDLSP_Delete";
                mysqli_query($connection, $sql_delete2); ?>
                <script>
                    alert("Xóa thành công");
                    window.location.href = "./LoaiSanPham.php";
                </script>
            <?php }
            ?>
        <?php } else if (isset($_GET["IDXX_Delete"])) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Xuất xứ
                </div>
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p style="font-size: 30px;">Xóa xuất xứ</p>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Tên xuất xứ</td>
                            <td>Ngày thêm</td>
                        </thead>
                        <?php
                        $IDXX_Delete = $_GET["IDXX_Delete"];
                        $sql = "SELECT * FROM xuatxu WHERE ID=$IDXX_Delete";
                        $result = mysqli_query($connection, $sql);
                        $dem = 0;
                        while ($row = mysqli_fetch_row($result)) {
                            $dem++;
                        ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $row[0] ?></td>
                                <td><?php echo $row[1] ?></td>
                                <td><?php echo $row[2] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sản phẩm bị xóa theo nếu xóa xuất xứ
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá nhập</td>
                            <td>Giá bán</td>
                            <td>Số lượng</td>
                            <td>Ngày nhập</td>
                            <td>Xuất xứ</td>
                        </thead>
                        <?php
                        $IDXX_Delete = $_GET["IDXX_Delete"];
                        $sql = "SELECT sanpham.*, xuatxu.XuatXu FROM sanpham INNER JOIN XuatXu ON sanpham.XuatXu = xuatxu.ID 
                     WHERE sanpham.XuatXu=$IDXX_Delete";
                        $result = mysqli_query($connection, $sql);
                        var_dump($sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">Không có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                $dem++;
                            ?>
                                <style>
                                    td {
                                        vertical-align: middle !important;
                                    }
                                </style>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row[0] ?></td>
                                    <td><img src="../uploads/<?php echo $row[2] ?>" alt="" style="max-height: 80px;"></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><?php echo $row[5] ?></td>
                                    <td><?php echo $row[6] ?></td>
                                    <td><?php echo $row[7] ?></td>
                                    <td><?php echo $row[9] ?></td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div>
                <form action="" method="post">
                    <a href="./XuatXu.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    <button type="submit" class="btn btn-primary" name="btn_delete">Xác nhận xóa</button>
                </form>
            </div>
            <?php
            if (isset($_POST["btn_delete"])) {
                $sql_delete = "DELETE FROM sanpham WHERE XuatXu=$IDXX_Delete";
                mysqli_query($connection, $sql_delete);
                $sql_delete2 = "DELETE FROM xuatxu WHERE ID=$IDXX_Delete";
                mysqli_query($connection, $sql_delete2); ?>
                <script>
                    alert("Xóa thành công");
                    window.location.href = "./XuatXu.php";
                </script>
            <?php }
        } else if ($_GET["IDSP_Delete"]) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sản phẩm
                </div>
                <div class="panel-body">
                    <div style="text-align: center;">
                        <p style="font-size: 30px;">Xóa sản phẩm</p>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID</td>
                            <td>Ảnh</td>
                            <td>Loại sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá nhập</td>
                            <td>Giá bán</td>
                            <td>Số lượng</td>
                            <td>Ngày nhập</td>
                            <td>Xuất xứ</td>
                        </thead>
                        <?php
                        $IDSP_Delete = $_GET["IDSP_Delete"];
                        $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID WHERE sanpham.ID=$IDSP_Delete ORDER BY NgayNhap DESC";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_row($result);
                        $dem = 1;
                        $img = $row[2];
                        ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $row[0] ?></td>
                                <td><img src="../uploads/<?php echo $row[2] ?>" alt="" style="max-height: 80px;"></td>
                                <td><?php echo $row[9] ?></td>
                                <td><?php echo $row[3] ?></td>
                                <td><?php echo $row[4] ?></td>
                                <td><?php echo $row[5] ?></td>
                                <td><?php echo $row[6] ?></td>
                                <td><?php echo $row[7] ?></td>
                                <td><?php echo $row[10] ?></td>
                            </tr>
                        <?php
                        ?>
                    </table>
                </div>
            </div>
            <div>
                <form action="" method="post">
                    <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    <button type="submit" class="btn btn-primary" name="btn_delete">Xác nhận xóa</button>
                </form>
            </div>
            <?php
            if (isset($_POST["btn_delete"])) {
                $sql_delete = "DELETE FROM sanpham WHERE ID=$IDSP_Delete";
                if (mysqli_query($connection, $sql_delete)) {
                    $sql_history = "INSERT INTO `lichsusanpham`(`LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`, `NgayThaoTac`, `ThaoTac`) 
                        VALUES ('$row[9]','$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]', '$row[7]','$row[10]', NOW(),'Xóa')";
                    mysqli_query($connection, $sql_history);
                    unlink("../uploads/$img");
            ?>
                    <script>
                        alert("Xóa thành công");
                        window.location.href = "./SanPham.php";
                    </script>
        <?php        }
            }
        }
        ?>
    </div>

    </div>
</body>

</html>