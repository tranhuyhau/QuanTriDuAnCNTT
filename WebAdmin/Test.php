<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a onclick="return confirmAction()" href="#">Click Ngay</a>
    <input type="submit" onclick="confirmAction()" value="Click Ngay" />
</body>
<SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
        if(confirm("Xin chào bạn ! Bạn khỏe không?") == true){
            alert("Có");
        }else{
            alert("không");
        }
        
    }
</SCRIPT>

</html>