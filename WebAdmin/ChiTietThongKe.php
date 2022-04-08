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
    session_start();
    require_once("../db/connect.php");
    require_once("./menu.php");
    $trangthai = $_SESSION['trangthai'];
    if (isset($_GET["Date"])) {
        $Date = $_GET["Date"];
    }
    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thống kê ngày <?php echo $Date ?>
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
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon 
                        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE TrangThai = $trangthai AND NgayMua LIKE '%$Date%' ORDER BY NgayMua DESC";
                        $result = mysqli_query($connection, $sql);
                        var_dump($trangthai);
                        var_dump($sql);
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
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>&Date=<?php echo $Date ?>">Chi tiết</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
                         WHERE (hoadon.ID = '$text_search' OR TenKH LIKE '%$text_search%' 
                         OR DiaChi LIKE '%$text_search%' OR SDT LIKE '%$text_search%') AND TrangThai = $trangthai AND NgayMua LIKE '%$Date%' ORDER BY NgayMua DESC";
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
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>&Date=<?php echo $Date ?>">Chi tiết</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else {
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon 
                        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE TrangThai = $trangthai AND NgayMua LIKE '%$Date%' ORDER BY NgayMua DESC";
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
                                    <td><a href="./ChiTietHoaDon.php?IDHD=<?php echo $row["ID"] ?>&Date=<?php echo $Date ?>">Chi tiết</a></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <a href="./ThongKe.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
</body>

</html>