<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./TieuDe.css">
  <link rel="stylesheet" href="./Home.css">
</head>

<body>
  <form action="" method="post">
    <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" name="tinhtp">
      <option value="" selected>Chọn tỉnh thành</option>
    </select>

    <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm" name="quanhuyen">
      <option value="" selected>Chọn quận huyện</option>
    </select>

    <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm" name="xa">
      <option value="" selected>Chọn phường xã</option>
    </select>
    <input type="submit" value="Gửi" name="gui">
  </form>

  <?php
  if (isset($_POST["gui"])) {
    if($_POST["tinhtp"] == ""){
      echo "chưa chọn";
    }
    echo $_POST["tinhtp"];
    echo "\n";
    echo $_POST["quanhuyen"];
    echo "\n";
    echo $_POST["xa"];
  }
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
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