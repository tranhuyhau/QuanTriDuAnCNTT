<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./TieuDe.css">
    <link rel="stylesheet" href="./Home.css">
    <link rel="stylesheet" href="./GioHang.css">
</head>

<body>
    <?php
    require_once("../db/connect.php");
    require_once("./header.php");
    ?>
    <div class="container" style="background: white;">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Đơn hàng
            </div>
        </div>

        <h3>đơn hàng</h3>
        <table class="table table-striped">
            <thead>
                <td>STT</td>
                <td>Tên người nhận</td>
                <td>Địa chỉ</td>
                <td>SĐT</td>
                <td>Tổng tiền</td>
                <td>Ngày mua</td>
                <td>Ghi chú</td>
                <td>Trạng thái</td>
            </thead>
            <?php
            $IDHoaDon = $_GET["IDHoaDon"];
            $sql = "SELECT TenKH, DiaChi, SDT, TongTien, NgayMua, GhiChu, trangthai.TenTT FROM hoadon 
            INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE hoadon.ID = $IDHoaDon";
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
                    <td><?php echo number_format($row[3]) ?><sup>vnđ</sup></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php echo $row[5] ?></td>
                    <td><?php echo $row[6] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="container" style="background: white;">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Chi tiết đơn hàng
            </div>
        </div>

        <h3>Chi tiết</h3>
        <table class="table table-striped">
            <thead>
                <td>STT</td>
                <td>Tên sản phẩm</td>
                <td>Xuất xứ</td>
                <td>Đơn giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
            </thead>
            <?php
            $sql = "SELECT TenSanPham, XuatXu, DonGia, SoLuong, ThanhTien FROM cthoadon 
             WHERE ID_HoaDon = $IDHoaDon";
            $result = mysqli_query($connection, $sql);
            $dem = 0;
            while ($row = mysqli_fetch_row($result)) {
                $dem++;
            ?>
                <tr>
                    <td><?php echo $dem ?></td>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo number_format($row[2]) ?><sup>vnđ</sup></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo number_format($row[4]) ?><sup>vnđ</sup></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
        require_once("./footer.php");
    ?>
</body>

</html>