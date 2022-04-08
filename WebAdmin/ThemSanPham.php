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
                Sản phẩm
            </div>
            <div class="panel-body">
                <center style="width: 70%; margin: auto;">
                    <h1>Thêm sản phẩm</h1>
                    <!-- <form action="" method="post">
                        <p>Loại sản phẩm: <input type="text" name="loai_SP"></p>
                        <button type="submit" class="btn btn-primary" name="btn_save">Thêm</button>
                        <a href="./LoaiSanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                    </form> -->
                    <?php
                    $sql_lsp = "SELECT * FROM loaisanpham";
                    $result_lsp = mysqli_query($connection, $sql_lsp);
                    $sql_xx = "SELECT * FROM xuatxu";
                    $result_xx = mysqli_query($connection, $sql_xx);
                    ?>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Loại sản phẩm</label>
                            <div class="col-sm-10">
                                <select name="loaisanpham" id="" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result_lsp)) { ?>
                                        <option value="<?php echo $row["ID"] ?>"><?php echo $row["Ten"] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Ảnh</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="" name="Image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" placeholder="Tên sản phẩm" name="tensanpham">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Giá nhập</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="" placeholder="Giá nhập" name="gianhap" oninput="this.value = Math.abs(this.value)" min="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="" placeholder="Giá bán" name="giaban" oninput="this.value = Math.abs(this.value)" min="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Số lượng</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="" placeholder="Số lượng" name="soluong" oninput="this.value = Math.abs(this.value)" min="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Xuất xứ</label>
                            <div class="col-sm-10">
                                <select name="xuatxu" id="" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($result_xx)) { ?>
                                        <option value="<?php echo $row["ID"] ?>"><?php echo $row["XuatXu"] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" name="btn_submit">Thêm</button>
                                <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btn_submit"])) {
        $loaisanpham = $_POST["loaisanpham"];
        $image = $_FILES["Image"]["name"];
        $tensanpham = $_POST["tensanpham"];
        $gianhap = $_POST["gianhap"];
        $giaban = $_POST["giaban"];
        $soluong = $_POST["soluong"];
        $xuatxu = $_POST["xuatxu"];
        $check = true;
        if ($loaisanpham == "" || $image == "" || $tensanpham == "" || $gianhap == "" || $giaban == "" || $soluong == "" || $xuatxu == "") {
            $check = false;
            echo "<p style='text-align: center;'>Thiếu thông tin</p>";
            die();
        }
        if ($check == true) {
            $check_img = true;
            $folder_path = "../uploads/";
            $file_path = $folder_path . $_FILES["Image"]["name"];
            $ex = array('jpg', 'png');
            $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
            if (!in_array($file_type, $ex)) {
                echo "<p style='text-align: center;'>Loại file không hợp lệ</p>";
                $check_img == false;
                die();
            }
            $check_fake_img = getimagesize($_FILES["Image"]["tmp_name"]);
            if ($check_fake_img == false) {
                echo "<p style='text-align: center;'>Tệp không phải là hình ảnh</p>";
                $check_img = false;
                die();
            }
            if (file_exists($file_path)) {
                echo "<p style='text-align: center;'>Tên ảnh đã có</p>";
                $check_img == false;
                die();
            }
            $sql_lsp = "SELECT * FROM loaisanpham WHERE ID = $loaisanpham";
            $row_lsp = mysqli_fetch_row(mysqli_query($connection, $sql_lsp));
            $sql_xx = "SELECT * FROM xuatxu WHERE ID = $xuatxu";
            $row_xx = mysqli_fetch_row(mysqli_query($connection, $sql_xx));
            $sql_insert = "INSERT INTO `sanpham`(`ID_LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`) 
                VALUES ( $loaisanpham, '$image', '$tensanpham', $gianhap, $giaban, $soluong, NOW(), $xuatxu)";
            var_dump($sql_insert);
            if (mysqli_query($connection, $sql_insert)) {
                $sql_history = "INSERT INTO `lichsusanpham`(`LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`, `NgayThaoTac`, `ThaoTac`) 
                VALUES ('$row_lsp[1]','$image','$tensanpham','$gianhap','$giaban', '$soluong', NOW(),'$row_xx[1]', NOW(),'Thêm')";
                mysqli_query($connection, $sql_history);
                move_uploaded_file($_FILES["Image"]["tmp_name"], "../uploads/" . $_FILES["Image"]["name"]);
    ?>
                <script>
                    alert("Thêm thành công");
                    window.location.href = "SanPham.php";
                </script>
    <?php
            }
        }
    }
    ?>
    </div>
</body>

</html>