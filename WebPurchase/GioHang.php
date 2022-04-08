<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./TieuDe.css">
    <link rel="stylesheet" href="./Home.css">
    <link rel="stylesheet" href="./GioHang.css">
</head>

<body>
    <?php
    require_once("../db/connect.php");
    require_once("./header.php");
    ?>
    <div class="container" style="background: white;">
        <div class="Tieu_de" style="margin-top: 10px;">
            <div>
                Giỏ hàng
            </div>
        </div>

        <h3>Thông tin giỏ hàng</h3>
        <table class="table table-striped">
            <thead>
                <td>STT</td>
                <td>Tên</td>
                <td>Xuất xứ</td>
                <td>Đơn giá/kg</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td>Xóa</td>
            </thead>
            <?php
            $sql = "SELECT TenSanPham, XuatXu, DonGia, SoLuong, ThanhTien, ID FROM giohang WHERE IDTK = $ID_TK";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) == 0) { ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Chưa có gì trong giỏ hàng !!!</td>
                </tr>
                <?php
            } else {
                if (isset($_GET['delete_id_phu'])) {
                    $id = $_GET['delete_id_phu'];
                    $sql_soluong = "SELECT IDSanPham, SoLuong FROM giohang WHERE ID = '$id'";
                    $row = mysqli_fetch_row(mysqli_query($connection, $sql_soluong));
                    $sql_update = "UPDATE sanpham SET SoLuong = SoLuong + $row[1] WHERE ID = $row[0]";
                    mysqli_query($connection, $sql_update);
                    $sql_delete_phu = 'DELETE FROM giohang WHERE ID = ' . $id . '';
                    mysqli_query($connection, $sql_delete_phu); ?>
                    <script>
                        window.location.href = './GioHang.php';
                    </script>
                <?php
                }
                $dem = 0;
                $Tong = 0;
                while ($row = mysqli_fetch_row($result)) {
                    $dem++;
                ?>
                    <tr>
                        <td><?php echo $dem ?></td>
                        <td><?php echo $row[0] ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><?php echo number_format($row[2]) ?><sup>vnđ</sup></td>
                        <td><?php echo $row[3] ?></td>
                        <td><?php echo number_format($row[4]) ?><sup>vnđ</sup></td>
                        <td><a href="?delete_id_phu=<?php echo $row[5] ?>" style="color: blue;">Xóa</a></td>
                    </tr>
                <?php
                    $Tong += $row[4];
                } ?>
                <tfoot>
                    <td colspan="5" style="text-align: right; border-right: 1px solid #333;">Tổng:</td>
                    <td><?php echo number_format($Tong) ?> <sup>vnđ</sup></td>
                    <td></td>
                </tfoot>
            <?php
            }
            ?>
        </table>
        <style>
            input,
            textarea,
            select {
                min-width: 300px;
                width: 50%;
                background: #F7F7F7;
                border: 1px solid #D6D6D6;
                padding: 5px 10px;
            }
        </style>
        <?php
        if (isset($_POST["Dat_Hang"])) {
            if(mysqli_num_rows($result) == 0){
                ?>
                    <script>
                        alert("Chưa có gì trong giỏ hàng !!!");
                    </script>
                <?php
            }
            else{
                $ho_ten = $_POST['ho_ten'];
                $sdt = $_POST['sdt'];
                $tinh_tp = $_POST['tinhtp'];
                $Quan_Huyen = $_POST['quanhuyen'];
                $xa = $_POST["xa"];
                $DiaChiCuThe = $_POST['DiaChiCuThe'];
                $ghi_chu = $_POST['ghi_chu'];
                $sql1 = "INSERT INTO `hoadon`(`IDTK`, `TenKH`, `DiaChi`, `SDT`, `TongTien`, `NgayMua`, `GhiChu`, TrangThai) 
                        VALUES ('$ID_TK','$ho_ten','$tinh_tp - $Quan_Huyen - $xa - $DiaChiCuThe','$sdt','$Tong', NOW(),'$ghi_chu', '1')";

                if (mysqli_query($connection, $sql1) === true) {
                    $last_id_DH = mysqli_insert_id($connection);
                    $sql_giohang = "SELECT * FROM giohang";
                    $result = mysqli_query($connection, $sql_giohang);
                    $data = [];
                    while ($row = mysqli_fetch_array($result)) {
                        $data[] = $row;
                    }
                    foreach ($data as $chitiet) {
                        $sql3 = "INSERT INTO `cthoadon`(`ID_HoaDon`, `IDSanPham`, `TenSanPham`, `XuatXu`, `DonGia`, `SoLuong`, `ThanhTien`) 
                                    VALUES ('$last_id_DH','$chitiet[2]','$chitiet[3]','$chitiet[4]','$chitiet[5]','$chitiet[6]', '$chitiet[7]')";
                        mysqli_query($connection, $sql3);
                    }
                    ?>
                    <script>
                        alert("Đặt hàng thành công");
                        window.location.href = "./GioHang.php";
                    </script>
                <?php
                    $delete_giohang = "DELETE FROM giohang WHERE IDTK = $ID_TK";
                    mysqli_query($connection, $delete_giohang);
                } else { ?>
                    <script>
                        alert("Lỗi đặt hàng");
                    </script>
                <?php
                    }
            }
            
        }   ?>
            
        <div style="margin-left: 2%;">
            <h3>Thông tin khách hàng</h3>
            <form action="" method="post" style="margin: auto;max-width: 50%;">
                <div class="item_donhang">
                    <p>Họ và tên: <span>*</span></p><input type="text" name="ho_ten" required>
                </div>
                <div class="item_donhang">
                    <p>Điện thoại: <span>*</span></p><input type="text" name="sdt" maxlength="10" pattern="[10]{A-Za-z}" required>
                </div>
                <div class="item_donhang">
                    <p>Tỉnh/thành phố: <span>*</span></p><select class="" id="city" aria-label=".form-select-sm" name="tinhtp">
                        <option value="" selected></option>
                    </select>
                </div>
                <div class="item_donhang">
                    <p>Quận huyện: <span>*</span></p><select class="" id="district" aria-label=".form-select-sm" name="quanhuyen">
                        <option value="" selected></option>
                    </select>
                </div>
                <div class="item_donhang">
                    <p>Xã: <span>*</span></p><select class="" id="ward" aria-label=".form-select-sm" name="xa">
                        <option value="" selected></option>
                    </select>
                </div>
                <div class="item_donhang">
                    <p>Địa chỉ cụ thể: </p><input type="text" name="DiaChiCuThe">
                </div>
                <div class="item_donhang">
                    <p style="align-self: flex-start;">Ghi chú: </p><textarea name="ghi_chu" id="" cols="30" rows="10" maxlength="200" placeholder="Tối đa 200 ký tự"></textarea>
                </div>
                <div style="margin-bottom: 10px; margin-left: 10%;">
                    <button type="button" class="btn btn-success"><a href="./Home.php" style="text-decoration: none;">Tiếp tục mua hàng</a></button>
                    <button class="btn btn-danger" name="Dat_Hang" type="submit">Đặt hàng</button>
                </div>
            </form>
        </div>
    </div>
    <?php
        require_once("./footer.php");
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="./popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "./data.json", //Đường dẫn đến file chứa dữ liệu hoặc api do backend cung cấp
        method: "GET", //do backend cung cấp
        responseType: "application/json", //kiểu Dữ liệu trả về do backend cung cấp
    };
    //gọi ajax = axios => nó trả về cho chúng ta là một promise
    var promise = axios(Parameter);
    //Xử lý khi request thành công
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }

        // xứ lý khi thay đổi tỉnh thành thì sẽ hiển thị ra quận huyện thuộc tỉnh thành đó
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Name === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Name);
                }
            }
        };

        // xứ lý khi thay đổi quận huyện thì sẽ hiển thị ra phường xã thuộc quận huyện đó
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name);
                }
            }
        };
    }
</script>

</html>