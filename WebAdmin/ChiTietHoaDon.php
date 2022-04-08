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
                    if (isset($_GET["IDHD"])) {
                        $IDHD = $_GET["IDHD"];
                        $sql = "SELECT hoadon.*, TenTT FROM hoadon 
                        INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
                         WHERE hoadon.ID = $IDHD";
                        $result = mysqli_query($connection, $sql);
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
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <div style="display: flex; flex-direction: column;">
            <form class="navbar-form navbar-left" role="search" method="post">
                Lựa chọn:
                <button type="submit" class="btn btn-default" name="All">Tất cả sản phẩm</button>
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
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết hóa đơn
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID hóa đơn</td>
                        <td>ID sản phẩm</td>
                        <td>Tên sản phẩm</td>
                        <td>Xuất xứ</td>
                        <td>Đơn giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT * FROM cthoadon WHERE ID_HoaDon = $IDHD";
                        $result = mysqli_query($connection, $sql);
                        $dem = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $dem++;
                    ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $row["ID_HoaDon"] ?></td>
                                <td><?php echo $row["IDSanPham"] ?></td>
                                <td><?php echo $row["TenSanPham"] ?></td>
                                <td><?php echo $row["XuatXu"] ?></td>
                                <td><?php echo $row["DonGia"] ?></td>
                                <td><?php echo $row["SoLuong"] ?></td>
                                <td><?php echo $row["ThanhTien"] ?></td>
                            </tr>
                        <?php
                        }
                    } else if (isset($_POST["Search"])) {
                        $sql = "SELECT * FROM cthoadon 
                        WHERE ID_HoaDon = $IDHD AND (TenSanPham LIKE '%$text_search%' OR XuatXu LIKE '%$text_search%' OR DonGia = '$text_search' OR SoLuong = '$text_search' OR ThanhTien = '$text_search')";
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
                                    <td><?php echo $row["ID_HoaDon"] ?></td>
                                    <td><?php echo $row["IDSanPham"] ?></td>
                                    <td><?php echo $row["TenSanPham"] ?></td>
                                    <td><?php echo $row["XuatXu"] ?></td>
                                    <td><?php echo $row["DonGia"] ?></td>
                                    <td><?php echo $row["SoLuong"] ?></td>
                                    <td><?php echo $row["ThanhTien"] ?></td>
                                </tr>
                    <?php
                            }
                        }
                    } else {
                        $sql = "SELECT * FROM cthoadon WHERE ID_HoaDon = $IDHD";
                        $result = mysqli_query($connection, $sql);
                        $dem = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $dem++;
                    ?>
                            <tr>
                                <td><?php echo $dem ?></td>
                                <td><?php echo $row["ID_HoaDon"] ?></td>
                                <td><?php echo $row["IDSanPham"] ?></td>
                                <td><?php echo $row["TenSanPham"] ?></td>
                                <td><?php echo $row["XuatXu"] ?></td>
                                <td><?php echo $row["DonGia"] ?></td>
                                <td><?php echo $row["SoLuong"] ?></td>
                                <td><?php echo $row["ThanhTien"] ?></td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <?php 
        if(isset($_GET["Date"])){ 
            $Date = $_GET["Date"];
            ?>
            <a href="./ChiTietThongKe.php?Date=<?php echo $Date ?>"><button type="button" class="btn btn-secondary">Trở về</button></a>
        <?php }else{ ?>
            <a href="./QuanLyHoaDon.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
        <?php }
        ?>
        
    </div>
    </div>
</body>

</html>