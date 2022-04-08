<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../WebPurchase/Login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center">ĐỔI MẬT KHẨU</h2>
                <div class="form-group"><input class="form-control" type="password" name="password_old" placeholder="Mật khẩu cũ"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Mật khẩu mới"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Mật khẩu mới (Nhập lại)"></div>
                <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="submit">Đổi mật khẩu</button></div>
                <div class="form-group"><button class="btn btn-success btn-block" type="button" name="prev"><a href="./Ql_KH.php" style="color: white;">Trở về</a></button></div>
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
    if(isset($_POST["submit"])){
        $password_old = $_POST["password_old"];
        $password = $_POST["password"];
        $password_repeat = $_POST["password-repeat"];
        if($password == "" || $password_repeat == "" || $password_old==""){
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
        if($password == $password_old){
            ?>
                <script>
                    alert("Mật khẩu mới phải khác mật khẩu cũ !")
                </script>
            <?php
            return;
        }
        $IDTK = $_SESSION["ID_TK"];
        $sql = "SELECT * from taikhoan_admin WHERE ID = $IDTK";
        $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_array($result)){
            if($row["MatKhau"] != $password_old){
                ?>
                    <script>
                        alert("Mật khẩu cũ không đúng");
                    </script>
                <?php
                die();
            }
        }
        $sql_update = "UPDATE taikhoan_admin SET MatKhau = '$password' WHERE ID = $IDTK";
        var_dump($sql_update);
        if(mysqli_query($connection, $sql_update)){
            ?>
                <script>
                    alert("Đổi mật khẩu thành công");
                    window.location.href = "./Login.php";
                </script>
            <?php
        }
    }
?>