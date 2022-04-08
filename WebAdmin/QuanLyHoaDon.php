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
                Hóa đơn
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả hóa đơn</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="text_search">
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
                        <td>ID tài khoản</td>
                        <td>Tên khách hàng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tổng tiền</td>
                        <td>Ngày mua</td>
                        <td>Ghi chú</td>
                        <td>Trạng thái</td>
                        <td colspan="3">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon 
                        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE TrangThai = 1 ORDER BY NgayMua DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row["IDTK"] ?></td>
                                    <td><?php echo $row["TenKH"] ?></td>
                                    <td><?php echo $row["DiaChi"] ?></td>
                                    <td><?php echo $row["SDT"] ?></td>
                                    <td><?php echo $row["TongTien"] ?></td>
                                    <td><?php echo $row["NgayMua"] ?></td>
                                    <td><?php echo $row["GhiChu"] ?></td>
                                    <td><?php echo $row["TenTT"] ?></td>
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>">Chi tiết</a></td>
                                    <td><a href="?IDHD_Nhan=<?php echo $row["ID"] ?>">Đã nhận hàng</a></td>
                                    <td><a href="?IDHD_Huy=<?php echo $row["ID"] ?>">Đã hủy hàng</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
                         WHERE (hoadon.ID = '$text_search' OR TenKH LIKE '%$text_search%' 
                         OR DiaChi LIKE '%$text_search%' OR SDT LIKE '%$text_search%') AND TrangThai = 1 ORDER BY NgayMua DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row["IDTK"] ?></td>
                                    <td><?php echo $row["TenKH"] ?></td>
                                    <td><?php echo $row["DiaChi"] ?></td>
                                    <td><?php echo $row["SDT"] ?></td>
                                    <td><?php echo $row["TongTien"] ?></td>
                                    <td><?php echo $row["NgayMua"] ?></td>
                                    <td><?php echo $row["GhiChu"] ?></td>
                                    <td><?php echo $row["TenTT"] ?></td>
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>">Chi tiết</a></td>
                                    <td><a href="?IDHD_Nhan=<?php echo $row["ID"] ?>">Đã nhận hàng</a></td>
                                    <td><a href="?IDHD_Huy=<?php echo $row["ID"] ?>">Đã hủy hàng</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search_date"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"];
                        if ($date_start != "" && $date_end == "") {
                            $sql = "SELECT hoadon.*, TenTT FROM hoadon 
                            INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
                             WHERE NgayMua BETWEEN '$date_start' AND NOW() AND TrangThai = 1 ORDER BY NgayMua DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row["IDTK"] ?></td>
                                        <td><?php echo $row["TenKH"] ?></td>
                                        <td><?php echo $row["DiaChi"] ?></td>
                                        <td><?php echo $row["SDT"] ?></td>
                                        <td><?php echo $row["TongTien"] ?></td>
                                        <td><?php echo $row["NgayMua"] ?></td>
                                        <td><?php echo $row["GhiChu"] ?></td>
                                        <td><?php echo $row["TenTT"] ?></td>
                                        <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>">Chi tiết</a></td>
                                        <td><a href="?IDHD_Nhan=<?php echo $row["ID"] ?>">Đã nhận hàng</a></td>
                                        <td><a href="?IDHD_Huy=<?php echo $row["ID"] ?>">Đã hủy hàng</a></td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                        if ($date_start != "" && $date_end != "") {
                            $sql = "SELECT hoadon.*, TenTT FROM hoadon INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai 
                            WHERE NgayMua BETWEEN '$date_start' AND '$date_end' ORDER BY NgayMua DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row["IDTK"] ?></td>
                                        <td><?php echo $row["TenKH"] ?></td>
                                        <td><?php echo $row["DiaChi"] ?></td>
                                        <td><?php echo $row["SDT"] ?></td>
                                        <td><?php echo $row["TongTien"] ?></td>
                                        <td><?php echo $row["NgayMua"] ?></td>
                                        <td><?php echo $row["GhiChu"] ?></td>
                                        <td><?php echo $row["TenTT"] ?></td>
                                        <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>">Chi tiết</a></td>
                                        <td><a href="?IDHD_Nhan=<?php echo $row["ID"] ?>">Đã nhận hàng</a></td>
                                        <td><a href="?IDHD_Huy=<?php echo $row["ID"] ?>">Đã hủy hàng</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                            <script>
                                alert("Ngày bắt đầu không hợp lệ");
                                window.location.href = "QuanLyHoaDon.php";
                            </script>
                        <?php }
                        if ($date_start == "" && $date_end == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "QuanLyHoaDon.php";
                            </script>
                        <?php }
                    } else {
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon 
                        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE TrangThai = 1 ORDER BY NgayMua DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="10" style="text-align: center;">Chưa có hóa đơn nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $dem = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row["IDTK"] ?></td>
                                    <td><?php echo $row["TenKH"] ?></td>
                                    <td><?php echo $row["DiaChi"] ?></td>
                                    <td><?php echo $row["SDT"] ?></td>
                                    <td><?php echo $row["TongTien"] ?></td>
                                    <td><?php echo $row["NgayMua"] ?></td>
                                    <td><?php echo $row["GhiChu"] ?></td>
                                    <td><?php echo $row["TenTT"] ?></td>
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>">Chi tiết</a></td>
                                    <td><a href="?IDHD_Nhan=<?php echo $row["ID"] ?>">Đã nhận hàng</a></td>
                                    <td><a href="?IDHD_Huy=<?php echo $row["ID"] ?>">Đã hủy hàng</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <?php
            if (isset($_GET["IDHD_Nhan"])) {
                $IDHD_Nhan = $_GET["IDHD_Nhan"];
                $sql_update = "UPDATE hoadon SET TrangThai = '2' WHERE ID = '$IDHD_Nhan'";
                mysqli_query($connection, $sql_update); 
                $sql_update_ct = "UPDATE cthoadon SET TrangThai = '2' WHERE ID_HoaDon = '$IDHD_Nhan'";
                mysqli_query($connection, $sql_update_ct); ?>
                <script>
                    window.location.href = "./QuanLyHoaDon.php";
                </script>
            <?php }
            if (isset($_GET["IDHD_Huy"])) {
                $IDHD_Huy = $_GET["IDHD_Huy"];
                $sql_update = "UPDATE hoadon SET TrangThai = '3' WHERE ID = '$IDHD_Huy'";
                mysqli_query($connection, $sql_update); 
                $sql_update_ct = "UPDATE cthoadon SET TrangThai = '3' WHERE ID_HoaDon = '$IDHD_Huy'";
                mysqli_query($connection, $sql_update_ct); ?>
                <script>
                    window.location.href = "./QuanLyHoaDon.php";
                </script>
            <?php }
            ?>
        </div>
</body>

</html>