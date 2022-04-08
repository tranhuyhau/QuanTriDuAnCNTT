<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center">ĐĂNG KÝ</h2>
                <div class="form-group"><input class="form-control" type="text" name="usename" placeholder="Tài khoản"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mật khẩu"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Mật khẩu (Nhập lại)"></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" value="yes" name="checkboxx">Tôi đồng ý với các điều khoản.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="submit">Đăng ký</button></div><a class="already" href="./Login.php">Bạn đã có tài khoản? Đăng nhập tại đây.</a>
            </form>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</html>
<?php
    require_once("../db/connect.php");
    if(isset($_POST["submit"])){
        $password = $_POST["password"];
        $password_repeat = $_POST["password-repeat"];
        $usename = $_POST["usename"];
        if($password == "" || $password_repeat == "" || $usename==""){
            ?>
                <script>
                    alert("Không được trống mục nhập")
                </script>
            <?php
            return;
        }
        if($password != $password_repeat){
            ?>
                <script>
                    alert("Mật khẩu nhập lại sai !")
                </script>
            <?php
            return;
        }
        if($_POST["checkboxx"] != "yes"){
            ?>
                <script>
                    alert("Bạn chưa chấp nhận điều khoản")
                </script>
            <?php
            return;
        }
        
        $sql = "select * from taikhoan_kh";
        $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($result)){
            if($row["TenTK"] == $usename){
                ?>
                    <script>
                        alert("Tài khoản đã tồn tại");
                    </script>
                <?php
                die();
            }
        }
        $sql_insert = "INSERT INTO `taikhoan_kh`(`TenTK`, `MatKhau`, `NgayDK`, `TrangThai`) VALUES ('$usename','$password', NOW(),'1')";
        if(mysqli_query($connection, $sql_insert)){
            ?>
                <script>
                    alert("Đăng ký thành công");
                    window.location.href = "Login.php";
                </script>
            <?php
        }
    }
?>