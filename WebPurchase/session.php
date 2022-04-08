<?php
    session_start();
    $kiemtra=(isset($_SESSION["logined"]) && $_SESSION["logined"]!=0)?1:0;
    if($kiemtra==0)
    {
        ?>
            <script>
                alert("Vui long đăng nhập để tiếp tục");
                window.location.href="./dangnhap.php";
            </script>

        <?php
        exit();
    }

?>