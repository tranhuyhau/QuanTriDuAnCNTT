<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="document.forms['old'].submit()">
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
                <center style="width: 100%; margin: auto;">
                    <h1>Sửa sản phẩm</h1>
                    <?php
                    $sql_lsp = "SELECT * FROM loaisanpham";
                    $result_lsp = mysqli_query($connection, $sql_lsp);
                    $sql_xx = "SELECT * FROM xuatxu";
                    $result_xx = mysqli_query($connection, $sql_xx);
                    $IDSP_Update = $_GET["IDSP_Update"];
                    $sql = "SELECT sanpham.*, loaisanpham.Ten, xuatxu.XuatXu FROM sanpham 
                            INNER JOIN loaisanpham ON sanpham.ID_LoaiSanPham = loaisanpham.ID 
                            INNER JOIN xuatxu ON sanpham.XuatXu = xuatxu.ID WHERE sanpham.ID = $IDSP_Update ORDER BY NgayNhap DESC";
                    $row_old = mysqli_fetch_array(mysqli_query($connection, $sql));
                    ?>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" style="display: flex;justify-content: space-around;width: 100%;">
                        <div>
                            <center style="font-size: 20px;">Sản phẩm ban đầu</center>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Loại sản phẩm</label>
                                <div class="col-sm-10">
                                    <select name="loaisanpham_old" id="" class="form-control">
                                        <option value="<?php echo $row_old["ID_LoaiSanPham"] ?>"><?php echo $row_old["Ten"] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ảnh</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" name="image_old" readonly placeholder="Tên ảnh" value="<?php echo $row_old["Image"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Tên sản phẩm</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="" placeholder="Tên sản phẩm" name="tensanpham_old" readonly value="<?php echo $row_old["TenSanPham"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Giá nhập</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="" placeholder="Giá nhập" name="gianhap_old" readonly value="<?php echo $row_old["GiaNhap"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Giá bán</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="" placeholder="Giá bán" name="giaban_old" readonly value="<?php echo $row_old["GiaBan"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="" placeholder="Số lượng" name="soluong_old" readonly value="<?php echo $row_old["SoLuong"] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Xuất xứ</label>
                                <div class="col-sm-10">
                                    <select name="xuatxu_old" id="" class="form-control">
                                        <option value="<?php echo $row_old[8] ?>"><?php echo $row_old["XuatXu"] ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <center style="font-size: 20px;">Sản phẩm sau khi đổi</center>
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
                                <center>Nếu để trống thì sẽ lấy dữ liệu cũ</center>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="btn_submit">Sửa</button>
                                    <a href="./SanPham.php"><button type="button" class="btn btn-secondary">Trở về</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["btn_submit"])) {
        $loaisanpham_old = $_POST["loaisanpham_old"];
        $image_old = $_POST["image_old"];
        $tensanpham_old = $_POST["tensanpham_old"];
        $gianhap_old = $_POST["gianhap_old"];
        $giaban_old = $_POST["giaban_old"];
        $soluong_old = $_POST["soluong_old"];
        $xuatxu_old = $_POST["xuatxu_old"];

        $loaisanpham = $_POST["loaisanpham"];
        $image = $_FILES["Image"]["name"];
        $tensanpham = $_POST["tensanpham"];
        $gianhap = $_POST["gianhap"];
        $giaban = $_POST["giaban"];
        $soluong = $_POST["soluong"];
        $xuatxu = $_POST["xuatxu"];

        if ($loaisanpham == "") {
            $loaisanpham = $_POST["loaisanpham_old"];
        }
        if ($tensanpham == "") {
            $tensanpham = $_POST["tensanpham_old"];
        }
        if ($gianhap == "") {
            $gianhap = $_POST["gianhap_old"];
        }
        if ($giaban == "") {
            $giaban = $_POST["giaban_old"];
        }
        if ($soluong == "") {
            $soluong = $_POST["soluong_old"];
        }
        if ($xuatxu == "") {
            $xuatxu = $_POST["xuatxu_old"];
        }
        $sql_lsp = "SELECT * FROM loaisanpham WHERE ID = $loaisanpham";
        $row_lsp = mysqli_fetch_row(mysqli_query($connection, $sql_lsp));
        $sql_xx = "SELECT * FROM xuatxu WHERE ID = $xuatxu";
        $row_xx = mysqli_fetch_row(mysqli_query($connection, $sql_xx));
        if ($image != "") {
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
                echo "<p style='text-align: center;'>Ảnh đã có</p>";
                $check_img == false;
                die();
            }

            $sql_insert = "UPDATE `sanpham` SET `ID_LoaiSanPham`= $loaisanpham,`Image`='$image',`TenSanPham`='$tensanpham',
            `GiaNhap`=$gianhap,`GiaBan`=$giaban,`SoLuong`=$soluong,`XuatXu`='$xuatxu' WHERE ID = $IDSP_Update";
            if (mysqli_query($connection, $sql_insert)) {
                move_uploaded_file($_FILES["Image"]["tmp_name"], "../uploads/" . $_FILES["Image"]["name"]);
                unlink("../uploads/$image_old");
                $sql_history = "INSERT INTO `lichsusanpham`(`LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`, `NgayThaoTac`, `ThaoTac`) 
                VALUES ('$row_old[9] -> $row_lsp[1]','$image_old -> $image','$tensanpham_old -> $tensanpham','$giaban_old -> $giaban','$gianhap_old -> $gianhap', '$soluong_old -> $soluong', '$row[7]','$row_old[10] -> $row_xx[1]', NOW(),'Sửa')";
                mysqli_query($connection, $sql_history);
    ?>
                <script>
                    alert("Sửa thành công");
                    window.location.href = "SanPham.php";
                </script>
    <?php
            }
        }else{
            $image = $image_old;
            $sql_insert = "UPDATE `sanpham` SET `ID_LoaiSanPham`= $loaisanpham,`Image`='$image',`TenSanPham`='$tensanpham',
            `GiaNhap`=$gianhap,`GiaBan`=$giaban,`SoLuong`=$soluong,`XuatXu`='$xuatxu' WHERE ID = $IDSP_Update";
            if (mysqli_query($connection, $sql_insert)) {
                $sql_history = "INSERT INTO `lichsusanpham`(`LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`, `NgayThaoTac`, `ThaoTac`) 
                VALUES ('$row_old[9] -> $row_lsp[1]','$image_old -> $image','$tensanpham_old -> $tensanpham','$gianhap_old -> $gianhap','$giaban_old -> $giaban', '$soluong_old -> $soluong', '$row_old[7]','$row_old[10] -> $row_xx[1]', NOW(),'Sửa')";
                mysqli_query($connection, $sql_history);
    ?>
                <script>
                    alert("Sửa thành công");
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