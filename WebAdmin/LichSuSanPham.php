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
                Lịch sử sản phẩm
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
                    </form>
                    <?php
                    if (isset($_POST["Search"])) {
                        $text_search = $_POST["text_search"] ?>
                        <p>Kết quả liên quan đến " <?php echo $text_search ?> "</p>
                    <?php }
                    ?>
                </div>
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID</td>
                        <td>Loại sản phẩm</td>
                        <td>Ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá nhập</td>
                        <td>Giá bán</td>
                        <td>Số lượng</td>
                        <td>Ngày nhập</td>
                        <td>Xuất xứ</td>
                        <td>Ngày thao tác</td>
                        <td>Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT * FROM lichsusanpham ORDER BY NgayThaoTac DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có lịch sử nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row["ID"] ?></td>
                                    <td><?php echo $row["LoaiSanPham"] ?></td>
                                    <td><?php echo $row["Image"] ?></td>
                                    <td><?php echo $row["TenSanPham"] ?></td>
                                    <td><?php echo $row["GiaNhap"] ?></td>
                                    <td><?php echo $row["GiaBan"] ?></td>
                                    <td><?php echo $row["SoLuong"] ?></td>
                                    <td><?php echo $row["NgayNhap"] ?></td>
                                    <td><?php echo $row["XuatXu"] ?></td>
                                    <td><?php echo $row["NgayThaoTac"] ?></td>
                                    <?php
                                    if ($row["ThaoTac"] == "Xóa") { ?>
                                        <td style="color: red;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    } else if ($row["ThaoTac"] == "Thêm") { ?>
                                        <td style="color: blue;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    } else if ($row["ThaoTac"] == "Sửa") { ?>
                                        <td style="color: #00c80a;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $sql = "SELECT * FROM lichsusanpham WHERE ID = '$text_search' OR LoaiSanPham LIKE '%$text_search%' OR
                        TenSanPham LIKE '%$text_search%' OR GiaNhap = '$text_search' OR GiaBan = '$text_search' OR SoLuong = '$text_search' OR
                        XuatXu LIKE '%$text_search%' OR ThaoTac LIKE '%$text_search%' ORDER BY NgayThaoTac DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có lịch sử nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row["ID"] ?></td>
                                    <td><?php echo $row["LoaiSanPham"] ?></td>
                                    <td><?php echo $row["Image"] ?></td>
                                    <td><?php echo $row["TenSanPham"] ?></td>
                                    <td><?php echo $row["GiaNhap"] ?></td>
                                    <td><?php echo $row["GiaBan"] ?></td>
                                    <td><?php echo $row["SoLuong"] ?></td>
                                    <td><?php echo $row["NgayNhap"] ?></td>
                                    <td><?php echo $row["XuatXu"] ?></td>
                                    <td><?php echo $row["NgayThaoTac"] ?></td>
                                    <?php
                                    if ($row["ThaoTac"] == "Xóa") { ?>
                                        <td style="color: red;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    } else if ($row["ThaoTac"] == "Thêm") { ?>
                                        <td style="color: blue;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    } else if ($row["ThaoTac"] == "Sửa") { ?>
                                        <td style="color: #00c80a;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search_date"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"];
                        if ($date_start != "" && $date_end == "") {
                            $sql = "SELECT * FROM lichsusanpham WHERE NgayThaoTac BETWEEN '$date_start' AND NOW() ORDER BY NgayThaoTac DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="12" style="text-align: center;">Chưa có lịch sử nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row["ID"] ?></td>
                                        <td><?php echo $row["LoaiSanPham"] ?></td>
                                        <td><?php echo $row["Image"] ?></td>
                                        <td><?php echo $row["TenSanPham"] ?></td>
                                        <td><?php echo $row["GiaNhap"] ?></td>
                                        <td><?php echo $row["GiaBan"] ?></td>
                                        <td><?php echo $row["SoLuong"] ?></td>
                                        <td><?php echo $row["NgayNhap"] ?></td>
                                        <td><?php echo $row["XuatXu"] ?></td>
                                        <td><?php echo $row["NgayThaoTac"] ?></td>
                                        <?php
                                        if ($row["ThaoTac"] == "Xóa") { ?>
                                            <td style="color: red;"><?php echo $row["ThaoTac"] ?></td>
                                        <?php
                                        } else if ($row["ThaoTac"] == "Thêm") { ?>
                                            <td style="color: blue;"><?php echo $row["ThaoTac"] ?></td>
                                        <?php
                                        } else if ($row["ThaoTac"] == "Sửa") { ?>
                                            <td style="color: #00c80a;"><?php echo $row["ThaoTac"] ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                                }
                            }
                        }
                        if ($date_start != "" && $date_end != "") {
                            $sql = "SELECT * FROM lichsusanpham WHERE NgayThaoTac BETWEEN '$date_start' AND '$date_end' ORDER BY NgayThaoTac DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="12" style="text-align: center;">Chưa có lịch sử nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row["ID"] ?></td>
                                        <td><?php echo $row["LoaiSanPham"] ?></td>
                                        <td><?php echo $row["Image"] ?></td>
                                        <td><?php echo $row["TenSanPham"] ?></td>
                                        <td><?php echo $row["GiaNhap"] ?></td>
                                        <td><?php echo $row["GiaBan"] ?></td>
                                        <td><?php echo $row["SoLuong"] ?></td>
                                        <td><?php echo $row["NgayNhap"] ?></td>
                                        <td><?php echo $row["XuatXu"] ?></td>
                                        <td><?php echo $row["NgayThaoTac"] ?></td>
                                        <?php
                                        if ($row["ThaoTac"] == "Xóa") { ?>
                                            <td style="color: red;"><?php echo $row["ThaoTac"] ?></td>
                                        <?php
                                        } else if ($row["ThaoTac"] == "Thêm") { ?>
                                            <td style="color: blue;"><?php echo $row["ThaoTac"] ?></td>
                                        <?php
                                        } else if ($row["ThaoTac"] == "Sửa") { ?>
                                            <td style="color: #00c80a;"><?php echo $row["ThaoTac"] ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                            <script>
                                alert("Ngày bắt đầu không hợp lệ");
                                window.location.href = "LichSuSanPham.php";
                            </script>
                        <?php }
                        if ($date_start == "" && $date_end == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "LichSuSanPham.php";
                            </script>
                        <?php }
                    } else {
                        $sql = "SELECT * FROM lichsusanpham ORDER BY NgayThaoTac DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="12" style="text-align: center;">Chưa có lịch sử nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row["ID"] ?></td>
                                    <td><?php echo $row["LoaiSanPham"] ?></td>
                                    <td><?php echo $row["Image"] ?></td>
                                    <td><?php echo $row["TenSanPham"] ?></td>
                                    <td><?php echo $row["GiaNhap"] ?></td>
                                    <td><?php echo $row["GiaBan"] ?></td>
                                    <td><?php echo $row["SoLuong"] ?></td>
                                    <td><?php echo $row["NgayNhap"] ?></td>
                                    <td><?php echo $row["XuatXu"] ?></td>
                                    <td><?php echo $row["NgayThaoTac"] ?></td>
                                    <?php
                                    if ($row["ThaoTac"] == "Xóa") { ?>
                                        <td style="color: red;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    } else if ($row["ThaoTac"] == "Thêm") { ?>
                                        <td style="color: blue;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    } else if ($row["ThaoTac"] == "Sửa") { ?>
                                        <td style="color: #00c80a;"><?php echo $row["ThaoTac"] ?></td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
                <div class="" style="text-align: center;">
                    <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                </div>
            </div>
        </div>
</body>

</html>