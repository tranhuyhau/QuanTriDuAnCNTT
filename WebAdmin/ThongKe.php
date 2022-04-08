<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<?php
session_start();
require_once("../db/connect.php");

?>

<body>
    <?php
    require_once("./menu.php");

    ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thống kê
            </div>

            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <div class="form-group">
                            Từ: <input type="date" class="form-control" placeholder="Tìm kiếm" name="date_start">
                        </div>
                        <div class="form-group">
                            đến :<input type="date" class="form-control" placeholder="Tìm kiếm" name="date_end">
                        </div>
                        <button type="submit" class="btn btn-default" name="Search_date_Nhan">Thống kê đơn đã nhận</button>
                        <button type="submit" class="btn btn-default" name="Search_date_Huy">Thống kê đơn đã hủy</button>
                        <button type="submit" class="btn btn-default" name="Search_date_SP">Sản phẩm bán chạy</button>
                    </form>
                    <?php
                    if (isset($_POST["Search_date_Nhan"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"]; ?>
                        <p>Kết quả từ " <?php echo $date_start ?> " đến " <?php echo $date_end ?> "</p>
                    <?php }
                    if (isset($_POST["Search_date_Huy"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"]; ?>
                        <p>Kết quả từ " <?php echo $date_start ?> " đến "<?php echo $date_end ?>"</p>
                    <?php }
                    if (isset($_POST["Search_date_SP"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"]; ?>
                        <p>Kết quả từ " <?php echo $date_start ?> " đến "<?php echo $date_end ?>"</p>
                    <?php }
                    ?>
                </div>
                <br />

                <?php
                if (isset($_POST["Search_date_Nhan"])) {
                    $_SESSION["trangthai"] = 2;
                    if ($date_start != "" && $date_end == "") {
                        $sql = "SELECT date(NgayMua) AS Datee, day(NgayMua) AS Ngay, month(NgayMua) AS Thang, year(NgayMua) AS Nam, SUM(TongTien) AS TongTien FROM `hoadon` 
                            WHERE NgayMua BETWEEN '$date_start' AND NOW() AND TrangThai = 2 GROUP BY day(NgayMua)";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <p style="text-align: center;">Không có dữ liệu</p>
                        <?php
                        } else { ?>
                            <div class="container">
                                <div id="chart"></div>
                            </div>
                        <?php }
                        $chart_data = '';
                        $Tong = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $chart_data .= "{ Date:'" . $row["Datee"] . "', NgayMua:'" . $row["Ngay"] . "',ThangMua:'" . $row["Thang"] . "',NamMua:'" . $row["Nam"] . "', TongTien:" . $row["TongTien"] . "}, ";
                            $Tong += $row["TongTien"];
                        }
                        $chart_data = substr($chart_data, 0, -2); ?>
                        <p>Tổng tiền: <?php echo number_format($Tong) ?></p>
                        <?php }
                    if ($date_start != "" && $date_end != "") {
                        $sql = "SELECT date(NgayMua) AS Datee, day(NgayMua) AS Ngay, month(NgayMua) AS Thang, year(NgayMua) AS Nam, SUM(TongTien) AS TongTien FROM `hoadon` 
                            WHERE NgayMua BETWEEN '$date_start' AND '$date_end' AND TrangThai = 2 GROUP BY day(NgayMua)";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <p style="text-align: center;">Không có dữ liệu</p>
                        <?php
                        } else { ?>
                            <div class="container">
                                <div id="chart"></div>
                            </div>
                        <?php }
                        $chart_data = '';
                        $Tong = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $chart_data .= "{ Date:'" . $row["Datee"] . "', NgayMua:'" . $row["Ngay"] . "',ThangMua:'" . $row["Thang"] . "',NamMua:'" . $row["Nam"] . "', TongTien:" . $row["TongTien"] . "}, ";
                            $Tong += $row["TongTien"];
                        }
                        $chart_data = substr($chart_data, 0, -2); ?>
                        <p>Tổng tiền: <?php echo number_format($Tong) ?></p>
                    <?php
                    }
                    if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                        <script>
                            alert("Ngày bắt đầu không hợp lệ");
                            window.location.href = "ThongKe.php";
                        </script>
                    <?php }
                    if ($date_start == "" && $date_end == "") { ?>
                        <script>
                            alert("Hãy nhập ngày");
                            window.location.href = "ThongKe.php";
                        </script>
                        <?php }
                } else if (isset($_POST["Search_date_Huy"])) {
                    $_SESSION["trangthai"] = 3;
                    if ($date_start != "" && $date_end == "") {
                        $sql = "SELECT date(NgayMua) AS Datee, day(NgayMua) AS Ngay, month(NgayMua) AS Thang, year(NgayMua) AS Nam, SUM(TongTien) AS TongTien FROM `hoadon` 
                            WHERE NgayMua BETWEEN '$date_start' AND NOW() AND TrangThai = 3 GROUP BY day(NgayMua)";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <p style="text-align: center;">Không có dữ liệu</p>
                        <?php
                        } else { ?>
                            <div class="container">
                                <div id="chart"></div>
                            </div>
                        <?php }
                        $chart_data = '';
                        $Tong = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $chart_data .= "{ Date:'" . $row["Datee"] . "', NgayMua:'" . $row["Ngay"] . "',ThangMua:'" . $row["Thang"] . "',NamMua:'" . $row["Nam"] . "', TongTien:" . $row["TongTien"] . "}, ";
                            $Tong += $row["TongTien"];
                        }
                        $chart_data = substr($chart_data, 0, -2); ?>
                        <p>Tổng tiền: <?php echo number_format($Tong) ?></p>
                        <?php }
                    if ($date_start != "" && $date_end != "") {
                        $sql = "SELECT date(NgayMua) AS Datee, day(NgayMua) AS Ngay, month(NgayMua) AS Thang, year(NgayMua) AS Nam, SUM(TongTien) AS TongTien FROM `hoadon` 
                            WHERE NgayMua BETWEEN '$date_start' AND '$date_end' AND TrangThai = 3 GROUP BY day(NgayMua)";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <p style="text-align: center;">Không có dữ liệu</p>
                        <?php
                        } else { ?>
                            <div class="container">
                                <div id="chart"></div>
                            </div>
                        <?php }
                        $chart_data = '';
                        $Tong = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $chart_data .= "{ Date:'" . $row["Datee"] . "', NgayMua:'" . $row["Ngay"] . "',ThangMua:'" . $row["Thang"] . "',NamMua:'" . $row["Nam"] . "', TongTien:" . $row["TongTien"] . "}, ";
                            $Tong += $row["TongTien"];
                        }
                        $chart_data = substr($chart_data, 0, -2); ?>
                        <p>Tổng tiền: <?php echo number_format($Tong) ?></p>
                    <?php
                    }
                    if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                        <script>
                            alert("Ngày bắt đầu không hợp lệ");
                            window.location.href = "ThongKe.php";
                        </script>
                    <?php }
                    if ($date_start == "" && $date_end == "") { ?>
                        <script>
                            alert("Hãy nhập ngày");
                            window.location.href = "ThongKe.php";
                        </script>
                    <?php }
                } else if (isset($_POST["Search_date_SP"])) { ?>
                    <table class="table table-striped">
                        <thead>
                            <td>STT</td>
                            <td>ID sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Xuất xứ</td>
                            <td>Đơn giá</td>
                            <td>Số lượng</td>
                            <td>Thành tiền</td>
                        </thead> <?php
                                    if ($date_start != "" && $date_end == "") {
                                        $sql = "SELECT `IDSanPham`, `TenSanPham`, `XuatXu`, `DonGia`, SUM(SoLuong) AS SoLuong, SUM(ThanhTien) AS ThanhTien FROM `cthoadon` 
                                        INNER JOIN hoadon ON hoadon.ID = cthoadon.ID_HoaDon WHERE hoadon.NgayMua BETWEEN '$date_start' AND NOW() AND cthoadon.TrangThai = 2 
                                        GROUP BY IDSanPham ORDER BY SoLuong DESC ";
                                        $result = mysqli_query($connection, $sql);
                                        if (mysqli_num_rows($result) == 0) { ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;">Chưa có sản phẩm nào được mua!!!</td>
                                            </tr>
                                  <?php } else {
                                            $dem = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $dem++;
                                        ?>
                                            <tr>
                                                <td><?php echo $dem ?></td>
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
                                            }
                                    if ($date_start != "" && $date_end != "") {
                                        $sql = "SELECT `IDSanPham`, `TenSanPham`, `XuatXu`, `DonGia`, SUM(SoLuong) AS SoLuong, SUM(ThanhTien) AS ThanhTien FROM `cthoadon` 
                                        INNER JOIN hoadon ON hoadon.ID = cthoadon.ID_HoaDon WHERE hoadon.NgayMua BETWEEN '$date_start' AND '$date_end' AND cthoadon.TrangThai != 3 
                                        GROUP BY IDSanPham ORDER BY SoLuong DESC ";
                                        $result = mysqli_query($connection, $sql);
                                        if (mysqli_num_rows($result) == 0) { ?>
                                            <tr>
                                                <td colspan="7" style="text-align: center;">Chưa có sản phẩm nào được mua!!!</td>
                                            </tr>
                                  <?php } else {
                                            $dem = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $dem++;
                                        ?>
                                            <tr>
                                                <td><?php echo $dem ?></td>
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
                                    }
                                    if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                            <script>
                                alert("Ngày bắt đầu không hợp lệ");
                                window.location.href = "ThongKe.php";
                            </script>
                        <?php }
                                    if ($date_start == "" && $date_end == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "ThongKe.php";
                            </script>
                        <?php }
                        ?>
                    </table>
                <?php }
                ?>
            </div>
        </div>
</body>
<script>
    Morris.Bar({
        element: 'chart',
        data: [<?php echo $chart_data; ?>],
        xkey: 'Date',
        ykeys: ['TongTien'],
        labels: ['Tổng tiền'],
        hideHover: 'auto',
    });
    var thisDate, thisData;
    $("#chart").on('click', function() {
        thisDate = $(".morris-hover-row-label").html();
        thisDataHtml = $(".morris-hover-point").html().split(":");
        thisData = thisDataHtml[1].trim();

        // alert !!
        // alert("Data: " + thisData + "\nDate: " + thisDate);
        window.location.href = "./ChiTietThongKe.php?Date=" + thisDate;
    })
</script>

</html>