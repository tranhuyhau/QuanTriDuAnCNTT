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
                Tài khoản khách hàng
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả tài khoản</button>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm ID hoặc tên tk" name="text_search">
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
                        <td>Tên tài khoản</td>
                        <td>Mật khẩu</td>
                        <td>Trạng thái</td>
                        <td>Ngày đăng ký</td>
                        <td>Đơn hàng đã đặt</td>
                        <td colspan="2">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT * FROM taikhoan_kh ORDER BY NgayDK DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $sql_ = "SELECT * FROM taikhoan_kh ORDER BY NgayDK DESC";
                            $result_ = mysqli_query($connection, $sql_);
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result_)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row[0] ?></td>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><a href="./DonHangDaDat.php?IDTK=<?php echo $row[0] ?>">Xem</a></td>
                                    <td><a href="?IDTK_Mo=<?php echo $row[0] ?>">Mở tài khoản</a></td>
                                    <td><a href="?IDTK_Khoa=<?php echo $row[0] ?>">Khóa tài khoản</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search"])) {
                        $sql = "SELECT * FROM taikhoan_kh WHERE ID = '$text_search' OR TenTK LIKE '%$text_search%' ORDER BY NgayDK DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $sql_ = "SELECT * FROM taikhoan_kh WHERE ID = '$text_search' OR TenTK LIKE '%$text_search%' ORDER BY NgayDK DESC";
                            $result_ = mysqli_query($connection, $sql_);
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result_)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row[0] ?></td>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><a href="./DonHangDaDat.php?IDTK=<?php echo $row[0] ?>">Xem</a></td>
                                    <td><a href="?IDTK_Mo=<?php echo $row[0] ?>">Mở tài khoản</a></td>
                                    <td><a href="?IDTK_Khoa=<?php echo $row[0] ?>">Khóa tài khoản</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else 
                    if (isset($_POST["Search_date"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"];
                        if ($date_start != "" && $date_end == "") {
                            $sql = "SELECT * FROM taikhoan_kh WHERE NgayDK BETWEEN '$date_start' AND NOW() ORDER BY NgayDK DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $sql_ = "SELECT * FROM taikhoan_kh WHERE NgayDK BETWEEN '$date_start' AND NOW() ORDER BY NgayDK DESC";
                                $result_ = mysqli_query($connection, $sql_);
                                $dem = 0;
                                while ($row = mysqli_fetch_row($result_)) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row[0] ?></td>
                                        <td><?php echo $row[1] ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td><?php echo $row[3] ?></td>
                                        <td><?php echo $row[4] ?></td>
                                        <td><a href="./DonHangDaDat.php?IDTK=<?php echo $row[0] ?>">Xem</a></td>
                                        <td><a href="?IDTK_Mo=<?php echo $row[0] ?>">Mở tài khoản</a></td>
                                        <td><a href="?IDTK_Khoa=<?php echo $row[0] ?>">Khóa tài khoản</a></td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                        if ($date_start != "" && $date_end != "") {
                            $sql = "SELECT * FROM taikhoan_kh WHERE NgayDK BETWEEN '$date_start' AND '$date_end' ORDER BY NgayDK DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                                </tr>
                                <?php
                            } else {
                                $sql_ = "SELECT * FROM taikhoan_kh WHERE NgayDK BETWEEN '$date_start' AND '$date_end' ORDER BY NgayDK DESC";
                                $result_ = mysqli_query($connection, $sql_);
                                $dem = 0;
                                while ($row = mysqli_fetch_row($result_)) {
                                    $dem++;
                                ?>
                                    <tr>
                                        <td><?php echo $dem ?></td>
                                        <td><?php echo $row[0] ?></td>
                                        <td><?php echo $row[1] ?></td>
                                        <td><?php echo $row[2] ?></td>
                                        <td><?php echo $row[3] ?></td>
                                        <td><?php echo $row[4] ?></td>
                                        <td><a href="./DonHangDaDat.php?IDTK=<?php echo $row[0] ?>">Xem</a></td>
                                        <td><a href="?IDTK_Mo=<?php echo $row[0] ?>">Mở tài khoản</a></td>
                                        <td><a href="?IDTK_Khoa=<?php echo $row[0] ?>">Khóa tài khoản</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                            <script>
                                alert("Ngày bắt đầu không hợp lệ");
                                window.location.href = "QL_KH.php";
                            </script>
                        <?php }
                        if ($date_start == "" && $date_end == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "QL_KH.php";
                            </script>
                    <?php }
                    } else {
                        $sql = "SELECT * FROM taikhoan_kh ORDER BY NgayDK DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="8" style="text-align: center;">Chưa có tài khoản nào !!!</td>
                            </tr>
                            <?php
                        } else {
                            $sql_ = "SELECT * FROM taikhoan_kh ORDER BY NgayDK DESC";
                            $result_ = mysqli_query($connection, $sql_);
                            $dem = 0;
                            while ($row = mysqli_fetch_row($result_)) {
                                $dem++;
                            ?>
                                <tr>
                                    <td><?php echo $dem ?></td>
                                    <td><?php echo $row[0] ?></td>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><a href="./DonHangDaDat.php?IDTK=<?php echo $row[0] ?>">Xem</a></td>
                                    <td><a href="?IDTK_Mo=<?php echo $row[0] ?>">Mở tài khoản</a></td>
                                    <td><a href="?IDTK_Khoa=<?php echo $row[0] ?>">Khóa tài khoản</a></td>
                                </tr>
                            <?php
                            }
                        }
                    }
                    ?>
            </div>
            <?php
            if (isset($_GET["IDTK_Mo"])) {
                $IDTK_Mo = $_GET["IDTK_Mo"];
                $sql_update = "UPDATE taikhoan_kh SET TrangThai = '1' WHERE ID = '$IDTK_Mo'";
                mysqli_query($connection, $sql_update); ?>
                <script>
                    window.location.href = "./Ql_KH.php";
                </script>
            <?php }
            if (isset($_GET["IDTK_Khoa"])) {
                $IDTK_Khoa = $_GET["IDTK_Khoa"];
                $sql_update = "UPDATE taikhoan_kh SET TrangThai = '0' WHERE ID = '$IDTK_Khoa'";
                mysqli_query($connection, $sql_update); ?>
                <script>
                    window.location.href = "./Ql_KH.php";
                </script>
            <?php }
            ?>
        </div>
</body>

</html>