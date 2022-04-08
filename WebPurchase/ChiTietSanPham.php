<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./TieuDe.css">
    <link rel="stylesheet" href="./Home.css">
</head>

<body>
    <?php
    require_once("../db/connect.php");
    require_once("./header.php");
    ?>
    <div class="container" style="background: white;">
        <?php
        $IDSanPham = $_GET["ID"];
        $ID_LSP = $_GET["IDLSP"];
        $sql_sp = "SELECT sanpham.*, xuatxu.XuatXu FROM `sanpham` INNER JOIN xuatxu ON xuatxu.ID = sanpham.XuatXu WHERE sanpham.ID = $IDSanPham";
        $row = mysqli_fetch_row(mysqli_query($connection, $sql_sp));
        $gia = number_format($row[5]);
        ?>
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Chi tiết sản phẩm: <?php echo $row[3] ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5" style="display: flex;justify-content: center;align-items: center;margin-bottom: 10px;">
                <img src="../uploads/<?php echo $row[2] ?>" alt="" id="img_main" style="box-shadow: 0px 0px 5px 0px;border-radius: 5%;">
                <div class="row" style="margin-top: 5px;">
                </div>
            </div>
            <style>
                input:focus-visible {
                    outline: none;
                    border: none;
                }

                input {
                    border: none;
                }
            </style>
            <div class="col-md-7">
                <form action="" method="post">
                    <h3 style="padding-bottom: 5px;"><input type="text" name="TenSP" value="<?php echo $row[3] ?>" readonly></h3>
                    <p>Giá: <input type="text" name="DonGia" value="<?php echo $gia ?>" readonly style="text-align: right;">/kg </p>
                    <p>Xuất xứ: <input type="text" name="XuatXu" value="<?php echo $row[9] ?>" readonly> </p>
                    <p>Số lượng hiện có: <input type="text" name="SoLuongCo" value="<?php echo $row[6] ?>" readonly style="text-align: right;">kg</p>
                    <p>Số lượng mua: <input type="number" name="SoLuongMua" min="0" max="<?php echo $row[6] ?>" oninput="this.value = Math.abs(this.value)"></p>
                    <button type="submit" class="btn btn-danger" name="ThemGioHang"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                </form>
                <?php
                if (isset($_POST["ThemGioHang"])) {
                    if (!isset($_SESSION["ID_TK"])) {
                ?>
                        <script>
                            alert("Hãy đăng nhập để đặt hàng !");
                        </script>
                        <?php
                    } else {
                        $Ten = $_POST["TenSP"];
                        $Gia = $row[5];
                        $XuatXu = $_POST["XuatXu"];
                        $ID_TK = $_SESSION["ID_TK"];
                        $SoLuongMua = $_POST["SoLuongMua"];
                        $SoLuongCo = $_POST["SoLuongCo"];
                        if ($SoLuongMua == "" || $SoLuongMua == 0 || $SoLuongMua > $SoLuongCo) {
                        ?>
                            <script>
                                alert("Số lượng mua không phù hợp !");
                            </script>
                            <?php
                        } else {
                            $sql_select = "SELECT * FROM giohang WHERE IDTK = $ID_TK AND IDSanPham = $IDSanPham";
                            if (mysqli_fetch_row(mysqli_query($connection, $sql_select)) == null) {
                                $sql_insert_giohang = "INSERT INTO `giohang`(`IDTK`, `IDSanPham`, `TenSanPham`, `XuatXu`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES ('$ID_TK', '$IDSanPham', '$Ten','$XuatXu', $Gia, $SoLuongMua, $Gia * $SoLuongMua)";
                                var_dump($sql_insert_giohang);
                                if (mysqli_query($connection, $sql_insert_giohang)) {
                                    $sql_update_sanpham = "UPDATE `sanpham` SET `SoLuong`= $SoLuongCo - $SoLuongMua WHERE ID = $IDSanPham";
                                    mysqli_query($connection, $sql_update_sanpham);
                            ?>
                                    <script>
                                        alert("Thêm thành công !");
                                        window.location.href = "./ChiTietSanPham.php?ID=<?php echo $IDSanPham ?>&IDLSP=<?php echo $ID_LSP ?>";
                                    </script>
                                <?php
                                }
                            } else {
                                $sql_update = "UPDATE `giohang` SET `SoLuong`=SoLuong + $SoLuongMua,`ThanhTien`=DonGia * SoLuong WHERE IDTK = $ID_TK AND IDSanPham = $IDSanPham";
                                var_dump($sql_update);
                                if (mysqli_query($connection, $sql_update)) {
                                    $sql_update_sanpham = "UPDATE `sanpham` SET `SoLuong`= $SoLuongCo - $SoLuongMua WHERE ID = $IDSanPham";
                                    mysqli_query($connection, $sql_update_sanpham);
                                ?>
                                    <script>
                                        alert("Thêm thành công !");
                                        window.location.href = "./ChiTietSanPham.php?ID=<?php echo $IDSanPham ?>&IDLSP=<?php echo $ID_LSP ?>";
                                    </script>
                <?php
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container" style="background: white;">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Sản phẩm cùng loại
            </div>
        </div>

        <div class="row">
            <?php
            $data = [];
            $sql = "SELECT * FROM sanpham WHERE ID_LoaiSanPham = $ID_LSP AND ID != $IDSanPham ORDER BY NgayNhap DESC LIMIT 0,4";
            //var_dump($sql);
            $result = mysqli_query($connection, $sql);
            while ($row_ = mysqli_fetch_array($result)) {
                $data[] = $row_;
            }
            foreach ($data as $traicay) {
                $sql_xx = 'select * from xuatxu where ID = ' . $traicay["XuatXu"] . '';
                $row_xx = mysqli_fetch_row(mysqli_query($connection, $sql_xx));
                echo '<div class="col"><a href="./ChiTietSanPham.php?ID=' . $traicay["ID"] . '&IDLSP=' . $traicay["ID_LoaiSanPham"] . '" style="color: black;">
            <div class="card" style="width: 18rem;">
            <img src="../uploads/' . $traicay['Image'] . '" class="card-img-top" id="NgoaiNhap1" alt="...">
            <div class="card-body">
                Tên: ' . $traicay['TenSanPham'] . '<br>
                Xuất sứ: ' . $row_xx[1] . '<br>
                Giá bán: ' . number_format($traicay['GiaBan']) . '<br>
                Số lượng:  ' . $traicay['SoLuong'] . '/kg
            </div>
            </div></a>
        </div>';
            }
            ?>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin: 10px 0px;">
            <button class="btn btn-primary me-md-2" type="button" style="background: #00e85d;border-color: #00e85d;"><a href="./SanPham.php?IDSanPham=<?php echo $ID_LSP ?>">Xem tất cả <i class="fas fa-arrow-right"></i></a></button>
        </div>
    </div>
    
    <?php
        require_once("./footer.php");
    ?>
</body>

</html>