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
                Lịch sử đặt hàng
            </div>
        </div>

        <h3>Lịch sử đặt hàng</h3>
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
            $sql = "SELECT TenKH, DiaChi, SDT, TongTien, NgayMua, GhiChu, trangthai.TenTT, hoadon.ID FROM hoadon 
            INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai WHERE IDTK = $ID_TK AND (TrangThai = 2 OR TrangThai = 3) ORDER BY NgayMua DESC";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) == 0) { ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Chưa có đơn hàng !!!</td>
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
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td><?php echo number_format($row[3]) ?><sup>vnđ</sup></td>
                        <td><?php echo $row[4] ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><a href="./ChiTietDonHang.php?IDHoaDon=<?php echo $row[7] ?>" style="color: blue;">Chi tiết</a></td>
                    </tr>
                <?php
                }
            }
            ?>
        </table>
    </div>
    <?php
        require_once("./footer.php");
    ?>
</body>

</html>