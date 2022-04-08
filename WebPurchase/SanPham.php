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
    require_once("./header.php")
    ?>
    <?php
    $sql_lsp = 'SELECT * FROM `loaisanpham` WHERE ID = ' . $_GET["IDSanPham"] . '';
    $result_lsp = mysqli_query($connection, $sql_lsp);
    $row = mysqli_fetch_row($result_lsp); ?>
    <div class="container">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                <?php echo $row[1] ?>
            </div>
        </div>
        <div class="row">
            <?php
            $data_page = [];
            $sql_page = 'SELECT COUNT(ID) as SoLuong FROM sanpham WHERE ID_LoaiSanPham=' . $_GET["IDSanPham"] . ' ';
            $result_page = mysqli_query($connection, $sql_page);
            while ($row_page = mysqli_fetch_array($result_page)) {
                $data_page[] = $row_page;
            }
            $number = 0;
            if ($data_page != null && count($data_page) > 0) {
                $number = $data_page[0]['SoLuong'];
            }
            $pages = ceil($number / 12);
            if($pages != 0){
                // // // // // // // // // // // // // // // // // //
                $curent_page = 1;
                if (isset($_GET['page'])) {
                    $curent_page = $_GET['page'];
                }
                $index = ($curent_page - 1) * 12;
                $data = [];
                $sql = 'SELECT sanpham.* FROM sanpham WHERE ID_LoaiSanPham = ' . $_GET["IDSanPham"] . ' ORDER BY NgayNhap DESC LIMIT ' . $index . ', 12';
                //var_dump($sql);           
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $data[] = $row;
                }
                foreach ($data as $traicay) {
                    $sql_xx = 'select * from xuatxu where ID = ' . $traicay["XuatXu"] . '';
                    $row_xx = mysqli_fetch_row(mysqli_query($connection, $sql_xx));
                    echo '<div class="col" style="margin:10px 0px"><a href="./ChiTietSanPham.php?ID='.$traicay["ID"].'&IDLSP='.$traicay["ID_LoaiSanPham"].'" style="color: black;">
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
            <div class="Phan_Trang">
                <ul class="pagination pagination-lg">
                    <?php
                        for($i = 0; $i < $pages; $i++){
                            echo '<li class="page-item"><a class="page-link" href="?IDSanPham='. $_GET["IDSanPham"] .'&page='.($i + 1).'">'.($i + 1).'</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <?php }
            else{ ?>
                <p style="text-align: center;">Chưa có hàng !</p>
            <?php }
            ?>
    </div>
    <?php
        require_once("./footer.php");
    ?>
</body>

</html>