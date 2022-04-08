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
                Tài khoản
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID</td>
                        <td>Tên tài khoản</td>
                        <td>Mật khẩu</td>
                        <td>Trạng thái</td>
                        <td>Ngày đăng ký</td>
                    </thead>
                    <?php
                    if (isset($_GET["IDTK"])) {
                        $IDTK = $_GET["IDTK"];
                        $sql = "SELECT * FROM taikhoan_kh WHERE ID = $IDTK";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Chưa có tài khoản nào !!!</td>
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
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        <style>
            .search {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 10px 0px;
            }

            input,
            textarea,
            select {
                min-width: 150px;
                width: 50%;
                background: #F7F7F7;
                border: 1px solid #D6D6D6;
                padding: 5px 10px;
                height: 32px;
            }

            p {
                margin: 0px;
            }
        </style>
        <form action="" method="post" style="max-width: 300px;">
            <div class="search">
                <p>Tên khách hàng: </p><input type="text" name="tenkh">
            </div>
            <div class="search">
                <p>Địa chỉ: </p><input type="text" name="diachi">
            </div>
            <div class="search">
                <p>Số điện thoại: </p><input type="text" name="sdt">
            </div>
            <div class="search">
                <p>Tổng tiền: </p><input type="text" name="tongtien">
            </div>
            <div class="search">
                <p>Ngày mua (bắt đầu): </p><input type="date" name="ngaybd">
            </div>
            <div class="search">
                <p>Ngày mua (kết thúc): </p><input type="date" name="ngaykt">
            </div>
            <div class="search">
                <p>Trạng thái</p>
                <select class="" name="trangthai">
                    <option value=""></option>
                    <?php
                    $sql_tt = "SELECT * FROM trangthai ";
                    $result_tt = mysqli_query($connection, $sql_tt);
                    while ($row_tt = mysqli_fetch_row($result_tt)) {
                        echo '<option value="' . $row_tt[0] . '">' . $row_tt[1] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div style="margin-bottom: 10px; margin-left: 10%;">
                <button type="submit" class="btn btn-success" name="all">Tất cả đơn hàng</button>
                <button class="btn btn-danger" name="search" type="submit">Tìm kiếm</button>
            </div>
        </form>
        <div class="panel panel-default">
            <div class="panel-heading">
                Các đơn hàng
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>Tên khách hàng</td>
                        <td>Địa chỉ</td>
                        <td>SĐT</td>
                        <td>Tổng tiền</td>
                        <td>Ngày mua</td>
                        <td>Ghi chú</td>
                        <td>Trạng thái</td>
                        <td>Chi tiết</td>
                    </thead>
                    <?php
                    if (isset($_POST["all"])) {
                        if (isset($_GET["IDTK"])) {
                            $IDTK = $_GET["IDTK"];
                            $sql = "SELECT hoadon.*, trangthai.TenTT FROM hoadon 
                                INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai 
                                WHERE IDTK = $IDTK ORDER BY NgayMua DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="9" style="text-align: center;">Chưa có đơn hàng nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                $giao = 0;
                                $nhan = 0;
                                $huy = 0;
                                while ($row = mysqli_fetch_row($result)) {
                                    $dem++;
                                    if($row[8] == 1)
                                        $giao += 1;
                                    if($row[8] == 2)
                                        $nhan += 1;
                                    if($row[8] == 3)
                                        $huy += 1;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td><?php echo $row[3] ?></td>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo number_format($row[5]) ?><sup>vnđ</sup></td>
                                        <td><?php echo $row[6] ?></td>
                                        <td><?php echo $row[7] ?></td>
                                        <td><?php echo $row[9] ?></td>
                                        <td><a href="./ChiTietDonHangDaDat.php?IDTK=<?php echo $IDTK ?>&&IDHD=<?php echo $row[0] ?>">Xem</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                    }
                    if (isset($_POST["search"])) {
                        $tenkh = $_POST["tenkh"];
                        $diachi = $_POST["diachi"];
                        $sdt = $_POST["sdt"];
                        $tongtien = $_POST["tongtien"];
                        $ngaybd = $_POST["ngaybd"];
                        $ngaykt = $_POST["ngaykt"];
                        $trangthai = $_POST["trangthai"];
                        if ($ngaybd == "" && $ngaykt != "") { ?>
                            <script>
                                alert("Không có ngày bắt đầu !");
                            </script>
                            <?php } else {
                            if ($ngaykt == "" && $ngaybd == "") {
                                $sql_search = "SELECT hoadon.*, trangthai.TenTT FROM hoadon 
                                INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
                                WHERE IDTK = $IDTK AND (TenKH LIKE '%$tenkh%' AND TrangThai LIKE '%$trangthai%' AND DiaChi LIKE '%$diachi%' AND SDT LIKE '%$sdt%' AND TongTien LIKE '%$tongtien%')";
                            }
                            if ($ngaykt == "" && $ngaybd != "") {
                                $sql_search = "SELECT hoadon.*, trangthai.TenTT FROM hoadon 
                                INNER JOIN trangthai ON trangthai.ID = hoadon.TrangThai
                                WHERE IDTK = $IDTK AND (NgayMua BETWEEN '$ngaybd' AND NOW() AND TenKH LIKE '%$tenkh%' AND TrangThai LIKE '%$trangthai%' AND DiaChi LIKE '%$diachi%' AND SDT LIKE '%$sdt%' AND TongTien LIKE '%$tongtien%')";
                            }
                            $result_search = mysqli_query($connection, $sql_search);
                            if (mysqli_num_rows($result_search) == 0) { ?>
                                <tr>
                                    <td colspan="9" style="text-align: center;">Chưa có đơn hàng nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $dem = 0;
                                $giao = 0;
                                $nhan = 0;
                                $huy = 0;
                                while ($row = mysqli_fetch_row($result_search)) {
                                    $dem++;
                                    if($row[8] == 1)
                                        $giao += 1;
                                    if($row[8] == 2)
                                        $nhan += 1;
                                    if($row[8] == 3)
                                        $huy += 1;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td><?php echo $row[3] ?></td>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo number_format($row[5]) ?><sup>vnđ</sup></td>
                                        <td><?php echo $row[6] ?></td>
                                        <td><?php echo $row[7] ?></td>
                                        <td><?php echo $row[9] ?></td>
                                        <td><a href="./ChiTietDonHangDaDat.php?IDTK=<?php echo $IDTK ?>&&IDHD=<?php echo $row[0] ?>">Xem</a></td>
                                    </tr>
                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <div style="display: flex; justify-content: space-around;margin-bottom: 10px;">
                <p>Số đơn đang giao: <?php if(isset($giao)) echo $giao; else echo 0; ?></p>
                <p>Số đơn đã nhận: <?php if(isset($nhan)) echo $nhan; else echo 0; ?></p>
                <p>Số đơn đã hủy: <?php if(isset($huy)) echo $huy; else echo 0; ?></p>
            </div>
        </div>
        <a href="./Ql_KH.php" style="color: white;text-decoration: none;"><button class="btn btn-danger" name="" type="" style="margin-bottom: 10px;">Trở về</button></a>
    </div>
    </div>
</body>

</html>