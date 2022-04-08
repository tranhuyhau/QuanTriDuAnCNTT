//Đổi màu
document.getElementById('blue').onclick = function(){
    document.getElementById('btn').style.background = "blue"
};

document.getElementById('red').onclick = function(){
    document.getElementById('btn').style.background = "red"
};

document.getElementById('yellow').onclick = function(){
    document.getElementById('btn').style.background = "yellow"
};

//Tính tuổi
document.getElementById('xemtuoi').onclick = function(){
    var hoten = document.getElementById('hoten');
    var namsinh = document.getElementById('namsinh');
    var d = new Date();
    var tuoi = d.getFullYear() - namsinh.value;
    alert('Bạn ' + hoten.value + ' năm nay ' + tuoi + ' tuổi');
}

// Thay đổi ảnh
var img_main = document.getElementById("img_main");
var img_dog=document.getElementById("img_dog");
var img_cat=document.getElementById("img_cat");
var img_pig=document.getElementById("img_pig");
var dog=document.getElementById('dog');
var cat=document.getElementById('cat');
var pig=document.getElementById('pig');
dog.onclick = function()
{
    img_main.src = img_dog.src;
}
cat.onclick = function()
{
    img_main.src = img_cat.src;
}
pig.onclick = function()
{
    img_main.src = img_pig.src;
}

//Đăng nhập
// var taikhoan = document.getElementById('taikhoan').value;
// var matkhau = document.getElementById('matkhau').value;
// document.getElementById("dangnhap").onclick = function(){
//     if(taikhoan == "admin" && matkhau == "admin"){
//         alert("Đăng nhập thành công");
//         location.href = "OnTap3.html";
//     }
//     else
//         alert('Lỗi');
// }

// document.getElementById("dangnhap").onclick = function(){
//     alert("Đăng nhập");
// }