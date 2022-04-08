<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/css/all.min.css">
</head>
<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center">ĐĂNG NHẬP</h2>
                <div class="form-group"><input class="form-control" type="text" name="taiKhoan" placeholder="Tài khoản"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mật khẩu"></div>
                <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="submit">Đăng nhập</button></div><a class="already" href="./Signup.php">Bạn chưa có tài khoản? Đăng ký tại đây.</a>
                <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="submit2">Xem trước <i class="fas fa-arrow-right"></i></button></div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</html>
<?php
    require_once("../db/connect.php");
    session_start();
    
    if(isset($_POST["submit2"])){
        unset($_SESSION["ID_TK"]);
        ?>
            <script>
                window.location.href = "Home.php";
            </script>
        <?php
    }
    if(isset($_POST["submit"])){
        $taikhoan = $_POST["taiKhoan"];
        $password = $_POST["password"];

        $sql = "select * from taikhoan_kh where TenTK = '$taikhoan' and MatKhau = '$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_row($result);
        if($row == null){
            ?>
                <script>
                    alert("Sai tài khoản hoặc mật khẩu");
                </script>
            <?php
        }
        else{
            if($row[3] == 0){
                ?>
                    <script>
                        alert("Tài khoản đã bị khóa");
                    </script>
                <?php
            }
            else{
                $_SESSION["ID_TK"] = $row[0];
                ?>
                    <script>
                        alert("Đăng nhập thành công");
                        window.location.href = "Home.php";
                    </script>
                <?php
            }
            
        }
    }
?>