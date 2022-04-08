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
                Loại sản phẩm
            </div>
            <div class="panel-body">
                <div style="display: flex; flex-direction: column;">
                    <form class="navbar-form navbar-left" role="search" method="post">
                        Lựa chọn:
                        <button type="submit" class="btn btn-default" name="All">Tất cả loại sản phẩm</button>
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
                <div style="text-align: center;">
                    <a href="./ThemLoaiSanPham.php">Thêm loại sản phẩm</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <td>STT</td>
                        <td>ID</td>
                        <td>Tên loại sản phẩm</td>
                        <td>Ngày thêm</td>
                        <td colspan="2">Thao tác</td>
                    </thead>
                    <?php
                    if (isset($_POST["All"])) {
                        $sql = "SELECT * FROM loaisanpham ORDER BY NgayThem DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Chưa có loại sản phẩm nào !!!</td>
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
                                    <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else if (isset($_POST["Search"])) {
                        $sql = "SELECT * FROM loaisanpham WHERE ID = '$text_search' OR Ten LIKE '%$text_search%' ORDER BY NgayThem DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Không tìm thấy !!!</td>
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
                                    <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    } else if (isset($_POST["Search_date"])) {
                        $date_start = $_POST["date_start"];
                        $date_end = $_POST["date_end"];
                        if ($date_start != "" && $date_end == "") {
                            $sql = "SELECT * FROM loaisanpham WHERE NgayThem BETWEEN '$date_start' AND NOW() ORDER BY NgayThem DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Không tìm thấy !!!</td>
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
                                        <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                        <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                    </tr>
                                <?php
                                }
                            }
                        }
                        if ($date_start != "" && $date_end != "") {
                            $sql = "SELECT * FROM loaisanpham WHERE NgayThem BETWEEN '$date_start' AND '$date_end' ORDER BY NgayThem DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) == 0) { ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Không tìm thấy !!!</td>
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
                                        <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                        <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        if (($date_start == "" && $date_end != "") || (strtotime($date_start) > strtotime($date_end) && $date_end != "")) { ?>
                            <script>
                                alert("Ngày bắt đầu không hợp lệ");
                                window.location.href = "LoaiSanPham.php";
                            </script>
                        <?php }
                        if ($date_start == "" && $date_end == "") { ?>
                            <script>
                                alert("Hãy nhập ngày");
                                window.location.href = "LoaiSanPham.php";
                            </script>
                    <?php }
                    } else {
                        $sql = "SELECT * FROM loaisanpham ORDER BY NgayThem DESC";
                        $result = mysqli_query($connection, $sql);
                        if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Chưa có loại sản phẩm nào !!!</td>
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
                                    <td><a href="./SuaLoaiSanPham.php?IDLSP_Update=<?php echo $row[0] ?>">Sửa</a></td>
                                    <td><a href="./XacNhanDelete.php?IDLSP_Delete=<?php echo $row[0] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    </div>
</body>

</html>