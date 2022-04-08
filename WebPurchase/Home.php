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
    <?php
    $sql_lsp = "SELECT * FROM `loaisanpham`";
    $result_lsp = mysqli_query($connection, $sql_lsp);
    while ($row = mysqli_fetch_row($result_lsp)) { ?>
        <div class="container">
            <div class="Tieu_de" style="margin-top: 10px;">
                <div>
                    <?php echo $row[1] ?>
                </div>
            </div>
            <div class="row">
                <?php

                $data = [];
                $sql = "SELECT * FROM sanpham WHERE ID_LoaiSanPham = $row[0] ORDER BY NgayNhap DESC LIMIT 0,4";
                //var_dump($sql);
                $result = mysqli_query($connection, $sql);
                while ($row_ = mysqli_fetch_array($result)) {
                    $data[] = $row_;
                }
                foreach ($data as $traicay) {
                    $sql_xx = 'select * from xuatxu where ID = ' . $traicay["XuatXu"] . '';
                    $row_xx = mysqli_fetch_row(mysqli_query($connection, $sql_xx));
                    echo '<div class="col-sm-3"><a href="./ChiTietSanPham.php?ID=' . $traicay["ID"] . '&IDLSP=' . $traicay["ID_LoaiSanPham"] . '" style="color: black;">
                            <div class="card" style="width: 18rem;">
                            <img src="../uploads/' . $traicay['Image'] . '" class="card-img-top" id="NgoaiNhap1" alt="...">
                            <div class="card-body">
                                Tên: ' . $traicay['TenSanPham'] . '<br>
                                Xuất sứ: ' . $row_xx[1] . '<br>
                                Giá bán: ' . number_format($traicay['GiaBan']) . '/kg<br>
                                Số lượng:  ' . $traicay['SoLuong'] . 'kg
                            </div>
                            </div></a>
                        </div>';
                }
                ?>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin: 10px 0px;">
                <button class="btn btn-primary me-md-2" type="button" style="background: #00e85d;border-color: #00e85d;"><a href="./SanPham.php?IDSanPham=<?php echo $row[0] ?>">Xem tất cả <i class="fas fa-arrow-right"></i></a></button>
            </div>
        </div>

    <?php    }
    ?>
    <?php
    require_once("./footer.php");
    ?>
</body>

</html>