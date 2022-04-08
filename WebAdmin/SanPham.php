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
        <div class="panel panel-default">
            <div class="panel-heading">
                Sản phẩm
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả sản phẩm</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ID hoặc tên" name="text_search">
                        </div>
                        <button type="submit" class="btn btn-default" name="Search">Tìm kiếm</button>
                        <div class="form-group">
                            Từ: <input type="date" class="form-control" placeholder="Tìm kiếm" name="date_start">
                        </div>
                        <div class="form-group">
                            đến :<input type="date" class="form-control" placeholder="Tìm kiếm" name="date_end">
                        </div>
                        <button type="submit" class="btn btn-default" name="Search_date">Tìm kiếm theo ngày</button>
                        <div class="form-group" style="margin-top: 5px;">
                            <button type="submit" class="btn btn-default" name="Quantity">Số lượng nhỏ hơn</button>
                            <input type="number" class="form-control" placeholder="" name="text_quantity" min="0" oninput="this.value = Math.abs(this.value)">
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["Search"])) {
                        $text_search = $_POST["text_search"] ?>
                        <p>Kết quả liên quan đến " <?php echo $text_search ?> "</p>
                    <?php }
                    ?>
                </div>
                <div style="text-align: center;display: flex;justify-content: space-evenly;">
                    <a href="./ThemSanPham.php">Thêm sản phẩm</a>
                    <a href="./LichSuSanPham.php">Lịch sử</a>
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
                        <td colspan="2">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID ORDER BY NgayNhap DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                $dem++;
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
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID 
                            WHERE sanpham.ID = '$text_search' OR TenSanPham LIKE '%$text_search%' OR GiaNhap = '$text_search' OR 
                            GiaBan = '$text_search' OR xuatxu.XuatXu LIKE '%$text_search%' OR SoLuong = '$text_search' OR 
                            loaisanpham.Ten LIKE '%$text_search%' ORDER BY NgayNhap DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                $dem++;
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
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search_date"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"];
                        if ($date_start != "" && $date_end == "") {
                            $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID WHERE NgayNhap BETWEEN '$date_start' AND NOW() ORDER BY NgayNhap DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                while ($row = mysqli_fetch_row($result)) {
                                    $dem++;
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
                                        <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                        <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                        if ($date_start != "" && $date_end != "") {
                            $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID WHERE NgayNhap BETWEEN '$date_start' AND '$date_end' ORDER BY NgayNhap DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                while ($row = mysqli_fetch_row($result)) {
                                    $dem++;
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
                                        <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                        <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                            <script>
                                alert("Ngày bắt đầu không hợp lệ");
                                window.location.href = "SanPham.php";
                            </script>
                        <?php }
                        if ($date_start == "" && $date_end == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "SanPham.php";
                            </script>
                        <?php }
                    } else if (isset($_POST["Quantity"])) {
                        $text_quantity = $_POST["text_quantity"];
                        if($text_quantity == ""){ ?>
                            <script>
                                alert("Chưa nhập số lượng");
                                window.location.href = "SanPham.php";
                            </script>
                        <?php }
                        $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                        INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                        INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID WHERE SoLuong < $text_quantity ORDER BY SoLuong ASC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                $dem++;
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
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID ORDER BY NgayNhap DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có sản phẩm nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result)) {
                                $dem++;
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
                                    <td><a href="./SuaSanPham.php?IDSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
</body>

</html>