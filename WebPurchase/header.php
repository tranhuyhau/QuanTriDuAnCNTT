<?php
require_once("../db/connect.php");

// if (isset($_POST["submit"])) {
//     $search = $_POST["search"];
//     header("Location: ./search.php?search=$search");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.min.css">
</head>

<body>
    <?php
        session_start();
    ?>
    <div class="container-fuild">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="../WebAdmin/Login.php"><img src="https://traicay141.vn/upload/hinhanh/logo-3974-89140.png" alt=""></a>
            </li>
            <li>
                <form class="d-flex" style="margin-top: 11%;" method="post">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm ..." aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit" name="submit" style="color: white">Tìm kiếm</button>
                </form>
            </li>
            <?php
                if(isset($_POST["submit"])){
                    $search = $_POST["search"];?>
                    <script>
                        window.location.href = 'Search.php?Search=<?php echo $search ?>';
                    </script>
                    <?php
                }  
            ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./Home.php">Trang chủ</a>
            </li>
            <li class="nav-item dropdown" id="dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sản phẩm
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                        $sql_lsp = "SELECT * FROM `loaisanpham`" ;
                        $result_lsp = mysqli_query($connection, $sql_lsp);
                        while($row = mysqli_fetch_row($result_lsp)){
                            echo '<li><a class="dropdown-item" href="./SanPham.php?IDSanPham='.$row[0].'">'.$row[1].'</a></li>';
                        }
                    ?>
                </ul>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="./Tin_Tuc.php">Tin tức</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./Lien_He.php">Liên hệ</a>
            </li> -->
            <?php
                if(!isset($_SESSION["ID_TK"])){?>
                    <li class="nav-item">
                        <button type="button" class="btn btn-success"><a href="./Login.php">Đăng nhập</a></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-danger"><a href="./Signup.php">Đăng ký</a></button>
                    </li>
                <?php }
                else{
                    $ID_TK = $_SESSION["ID_TK"];
                    $sql = "select * from taikhoan_kh where ID = '$ID_TK'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_row($result);
                    ?>
                    <li class="nav-item dropdown" id="dropdown">
                        <button class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: rgba(0,232,93,0.5); color: white;border: 0px;">
                        Tài khoản: <?php echo $row[1] ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./DoiMatKhau.php">Đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="./GioHang.php">Giỏ hàng</a></li>
                        <li><a class="dropdown-item" href="./DonHangHienCo.php">Đơn hàng hiện có</a></li>
                        <li><a class="dropdown-item" href="./LichSuDatHang.php">Lịch sử đặt hàng</a></li>
                        <li><a class="dropdown-item" href="./Login.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                <?php }
            ?>
        </ul>
    </div>
</body>
<script src="./popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</html>