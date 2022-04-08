-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 05:08 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trai_cay`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ID` int(11) NOT NULL,
  `Id_HoaDon` int(11) NOT NULL,
  `TraiCay` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`ID`, `Id_HoaDon`, `TraiCay`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
(20, 30, 'Giỏ 2', 80000, 2, 160000),
(22, 31, 'Táo xanh', 4, 20000, 80000),
(25, 33, 'Giỏ 2', 11, 80000, 880000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `ID_KhachHang` int(11) NOT NULL,
  `TongTien` float NOT NULL,
  `Ngay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`ID`, `ID_KhachHang`, `TongTien`, `Ngay`) VALUES
(30, 32, 160000, '2021-09-28 00:45:04'),
(31, 33, 140000, '2021-09-28 09:44:36'),
(33, 35, 880000, '2021-09-28 10:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ID` int(11) NOT NULL,
  `TenKhachHang` varchar(30) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `GhiChu` varchar(1000) NOT NULL,
  `NgayDatHang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ID`, `TenKhachHang`, `SDT`, `DiaChi`, `Email`, `GhiChu`, `NgayDatHang`) VALUES
(32, 'HuyHau', '0123456789', 'hà nội / 123 / 456', '', '', '2021-09-28 00:45:04'),
(33, 'HuyHau', '0123456789', 'hà nội / 123 / 456', '', '', '2021-09-28 09:44:36'),
(35, 'HuyHau', '0123456789', 'hà nội / 123 / 456', '', '', '2021-09-28 10:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `ID` int(11) NOT NULL,
  `NgayGui` datetime NOT NULL,
  `HoTen` varchar(30) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ChuDe` varchar(100) NOT NULL,
  `NoiDung` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`ID`, `NgayGui`, `HoTen`, `DiaChi`, `SDT`, `Email`, `ChuDe`, `NoiDung`) VALUES
(4, '2021-09-28 20:20:31', 'HuyHau', '123', '456', 'tranhuy.hau.2001@gmail.com', 'asd', 'Quả ngon lắm ♥♥'),
(5, '2021-09-28 20:41:33', 'HuyHau', '123', '456', 'tranhuy.hau.2001@gmail.com', 'asd', 'Ngon quá');

-- --------------------------------------------------------

--
-- Table structure for table `nhomtraicay`
--

CREATE TABLE `nhomtraicay` (
  `ID` int(11) NOT NULL,
  `TenNhom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhomtraicay`
--

INSERT INTO `nhomtraicay` (`ID`, `TenNhom`) VALUES
(1, 'Trái cây ngoại nhập'),
(2, 'Trái cây nội'),
(3, 'Giỏ trái cây'),
(4, 'Mâm quả');

-- --------------------------------------------------------

--
-- Table structure for table `table_dathang`
--

CREATE TABLE `table_dathang` (
  `ID` int(11) NOT NULL,
  `TenTraiCay` varchar(30) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan_admin`
--

CREATE TABLE `taikhoan_admin` (
  `ID` int(11) NOT NULL,
  `Tai_Khoan` varchar(30) NOT NULL,
  `Mat_Khau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan_admin`
--

INSERT INTO `taikhoan_admin` (`ID`, `Tai_Khoan`, `Mat_Khau`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `ID` int(11) NOT NULL,
  `Img` varchar(100) NOT NULL,
  `TieuDe` varchar(1000) NOT NULL,
  `ChiTiet` mediumtext NOT NULL,
  `NgayDang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`ID`, `Img`, `TieuDe`, `ChiTiet`, `NgayDang`) VALUES
(1, 'Nho Mau Don__Han Quoc.jpg', 'ĂN NHO CÓ TÁC DỤNG GÌ', '<b><u>+ Phòng ngừa bệnh mạch máu não và bệnh tim mạch: </b></u><br>\r\n\r\nNhiều người không biết rằng, nho có tác dụng ngăn ngừa sự hình thành huyết khối tốt hơn cả aspirin, đồng thời làm giảm lượng cholesterol huyết thanh. Ngoài ra nho còn làm giảm sự gắn kết tiểu cầu và ngăn ngừa các bệnh về mạch máu não, các bệnh liên quan đến tim mạch.<br>\r\n\r\nCụ thể trong nho có chứa flavonoid là một chất có khả năng chống oxy hóa mạnh. Do đó nó có khả năng ngăn chặn sự oxy hóa hình thành do cholesterol xấu có thể gây tắc mạch máu và một số bệnh tuần hoàn khác.<br>\r\n\r\nNgoài ra chất flavonoid còn hỗ trợ đẩy lùi tình trạng mảng bám và thành mạch giúp thanh lọc máu và đào thải các độc tố ra ngoài cơ thể. Đó chính là lý do mà nho tuy nhỏ nhưng lại có võ lớn, giúp bảo vệ sức khỏe tim mạch của bạn.<br>\r\n\r\n \r\n\r\n<b><u>+ Tạo hưng phấn cho não bộ: </b></u><br>\r\n\r\nNho có chứa nhiều Vitamin, axit hữu cơ, axit amin và đường glucose  …có tác dụng kích thích dây thần kinh não. Do vậy những người bị suy nhược thần kinh hay mệt mỏi thì nên ăn nho thường xuyên để cải thiện tốt hơn.<br>\r\n\r\n \r\n\r\n<b><u>+Phòng chống cảm lạnh: </b></u><br>\r\n\r\nNho có chứa một hàm lượng lớn chất xơ, cụ thể trong nước ép nho có chứa hàng chục chất dinh dưỡng  giúp tăng cường hệ thống miễn dịch bằng cách làm tăng số lượng lớn tế bào Delta T và Game trong cơ thể. Do vậy mà hãy tăng cường uống nước ép nho để có thể thoát khỏi nguy cơ của tình trạng bệnh này.<br>\r\n\r\nNgoài việc uống nước ép nho nguyên chất, bạn có thể sử dụng thêm vani với hàm lượng chất béo, chuối và dâu tây để thay đổi vị dễ uống và đồng thời bổ sung thêm một số vitamin khác cho cơ thể.<br>\r\n\r\n \r\n\r\n<b><u>+Tạm biệt nếp nhăn:</b></u><br>\r\n\r\nTrong nho có chứa nhiều chất oxy hóa và các axit béo thiết yếu giúp bạn duy trì một làn da tươi trẻ. Một số loại dầu chiết xuất từ hạt nho bán tại các cửa hàng thực phẩm có tác dụng xóa nếp nhăn hiệu quả. Bạn nên thoa tinh dầu đó vào vùng da bị nhăn trước khi đi ngủ bạn sẽ thấy công hiệu bất ngờ sau một thời gian sử dụng.<br>\r\n\r\n \r\n\r\n<b><u>+Tiêu đờm:</b></u><br>\r\n\r\nNhững người mắc bệnh về đường phổi nên ăn nho nhiều hơn. Bởi nho giúp cho các tế bào phổi giải độc, ngoài ra còn có tác dụng long đờm. Đồng thời nho còn làm giám các triệu chứng của viêm đường hô hấp hoặc ngứa rát cổ họng do bệnh lý hay nguyên nhân nào khác.<br>\r\n\r\n \r\n\r\n<b><u>+Giảm cân:</b></u><br>\r\n\r\nNước ép nho giúp phòng chống bệnh hiệu quả<br>\r\n\r\nĂn nho xanh có tác dụng gì? Một vài nghiên cứu cho thấy, nho xanh, nho đen chứa nhiều vitamin tốt cho cơ thể. Bởi vậy mà phụ nữ có thể ăn nho hàng ngày để duy trì vóc dáng đồng thời bảo vệ sức khỏe tim mạch thật tốt.<br>\r\n\r\n \r\n\r\n<b><u>+Chống Virus:</b></u><br>\r\n\r\nNước ép nho giúp hồi phục sức khỏe nhanh chóng nhất là đối với bệnh nhân bị xơ cứng động mạch và bệnh nhân viêm thận. Đồng thời nho còn giúp những bệnh nhân phẫu thuật ghép nội tạng hồi phục sức khỏe, làm giảm các biến chứng, và chống lại virus.<br>\r\n\r\n \r\n\r\n<b><u>+Tăng cảm giác ngon miệng:</b></u><br>\r\n\r\nMột cách chế biến nho giúp tăng cảm giác ăn ngon miệng, đồng thời giảm đau đó chính là nho khô. Bởi vậy mà không chỉ có nho tươi, nho khô cũng là thực phẩm giàu chất dinh dưỡng và cực kỳ tốt cho sức khỏe. Qua đó chắc hẳn các bạn đã giải đáp được câu hỏi “ ăn nho khô có tác dụng gì”.<br>\r\n\r\n \r\n\r\n<b><u>+Cải thiện tình trạng bệnh tiểu đường:</b></u><br>\r\n\r\nĐây là lý do vì sao mà những bệnh nhân bị bệnh tiểu đường thường được các bác sĩ khuyến cáo nên ăn nhiều nho. Theo một số nghiên cứu của trường Đại học Y Dược, những người bị bệnh tiểu đường nhờ ăn nho mà có thể giảm được 10% lượng đường trong máu.<br>\r\n\r\n \r\n\r\n \r\n\r\n<b><u>+ Phòng ngừa sỏi thận:</b></u><br>\r\n\r\nCác thầy cô Cao Đẳng Y Dược Thành Phố Hồ Chí Minh cho rằng, ăn nhiều nho sẽ làm giảm lượng axit uric trong cơ thể. Thậm chí nó còn có thể loại bỏ được lượng axit này ra khỏi hệ thống đường tiết niệu. Nhờ đó mà bạn có thể tránh khỏi được nguy cơ mắc bệnh sỏi thận nếu như ăn tăng cường ăn nho.<br>\r\n\r\n \r\n\r\n<b><u>+ Nho giúp tăng cường hệ miễn dịch:</b></u><br>\r\n\r\nNgoài những tác dụng của nho kể trên thì chắc hẳn các bạn không biết trong nho có chứa nhiều vitamin A,C,K giúp tăng cường sức khỏe trong cơ thể đặc biệt là hệ miễn dịch. Do vậy việc ăn nho thường xuyên giúp bạn phòng tránh được các vi khuẩn gây một số bệnh ốm vặt hơn.<br>\r\n\r\n \r\n\r\n<b><u>Những điều bạn chưa biết về tác dụng của quả nho:</b></u><br>\r\n\r\nMỗi loại nho có tác dụng khác nhau:<br>\r\n\r\nToàn bộ quả nho đều tốt cho sức khỏe: Bạn nên rửa sạch và ăn nho cả quả. Một số người có thói quen bóc vỏ và nhả hạt. Như vậy dinh dưỡng sẽ bị mất đi. Bên cạnh đó, màu sắc quả nho cũng có những lợi ích khác nhau.<br>\r\n\r\n<b><u>Ăn nho đỏ có tác dụng gì?</b></u><br>\r\n\r\nNho đỏ có chứa nhiều enzyme đảo được, làm mềm mạch máu. Bên cạnh đó nó còn có tác dụng bảo vệ tim mạch bằng cách làm chậm sự tích tụ của cholesterol trên thành động mạch. Đó chính là lý do bạn nên ăn nho đỏ cả vỏ nhé.<br>\r\n\r\n<b><u>Ăn nho xanh có tác dụng gì?</b></u><br>\r\n\r\nNho xanh có tác dụng rất tốt cho làn da của bạn. Nó phù hợp với những người có làn da yếu, dễ mọc mụn, nhăn nheo, sạm nắng…Ngoài ra những người bị bệnh đường hô hấp, ho nhiều cũng nên ăn nhiều nho xanh hơn.<br>\r\n\r\n<b><u>Ăn nho tím có tác dụng gì?</b></u><br>\r\n\r\nNho tím có khả năng ngăn ngừa lão hóa hiệu quả.Trong nho tím có chứa nhiều flavonoid và anthocyanin giúp phòng ngừa dấu hiệu lão hóa nhờ loại bỏ những gốc tự do trong cơ thể và làm giảm nếp nhăn.<br>\r\n<b><u>Ăn nho đen có tác dụng gì?</b></u><br>\r\n\r\nNho đen có chứa hàm lượng lớn Magie, kali, Canxi hơn so với những loại nho khác. Ngoài ra nó còn bổ sung những khoáng chất cần thiết giúp cơ thể chống lại được mệt mỏi, căng thẳng.<br>', '2021-09-08 12:18:00'),
(2, 'Tao Queen.jpg', 'Ăn táo có tác dụng gì', 'Ăn táo tốt ......', '2021-09-27 00:00:00'),
(3, 'chuoi.jpg', 'Ăn chuối có tác dụng gì', '<b><u>+ Phòng ngừa bệnh mạch máu não và bệnh tim mạch: </b></u><br>  Nhiều người không biết rằng, nho có tác dụng ngăn ngừa sự hình thành huyết khối tốt hơn cả aspirin, đồng thời làm giảm lượng cholesterol huyết thanh. Ngoài ra nho còn làm giảm sự gắn kết tiểu cầu và ngăn ngừa các bệnh về mạch máu não, các bệnh liên quan đến tim mạch.<br>  Cụ thể trong nho có chứa flavonoid là một chất có khả năng chống oxy hóa mạnh. Do đó nó có khả năng ngăn chặn sự oxy hóa hình thành do cholesterol xấu có thể gây tắc mạch máu và một số bệnh tuần hoàn khác.<br>  Ngoài ra chất flavonoid còn hỗ trợ đẩy lùi tình trạng mảng bám và thành mạch giúp thanh lọc máu và đào thải các độc tố ra ngoài cơ thể. Đó chính là lý do mà nho tuy nhỏ nhưng lại có võ lớn, giúp bảo vệ sức khỏe tim mạch của bạn.<br>     <b><u>+ Tạo hưng phấn cho não bộ: </b></u><br>  Nho có chứa nhiều Vitamin, axit hữu cơ, axit amin và đường glucose  …có tác dụng kích thích dây thần kinh não. Do vậy những người bị suy nhược thần kinh hay mệt mỏi thì nên ăn nho thường xuyên để cải thiện tốt hơn.<br>     <b><u>+Phòng chống cảm lạnh: </b></u><br>  Nho có chứa một hàm lượng lớn chất xơ, cụ thể trong nước ép nho có chứa hàng chục chất dinh dưỡng  giúp tăng cường hệ thống miễn dịch bằng cách làm tăng số lượng lớn tế bào Delta T và Game trong cơ thể. Do vậy mà hãy tăng cường uống nước ép nho để có thể thoát khỏi nguy cơ của tình trạng bệnh này.<br>  Ngoài việc uống nước ép nho nguyên chất, bạn có thể sử dụng thêm vani với hàm lượng chất béo, chuối và dâu tây để thay đổi vị dễ uống và đồng thời bổ sung thêm một số vitamin khác cho cơ thể.<br>     <b><u>+Tạm biệt nếp nhăn:</b></u><br>  Trong nho có chứa nhiều chất oxy hóa và các axit béo thiết yếu giúp bạn duy trì một làn da tươi trẻ. Một số loại dầu chiết xuất từ hạt nho bán tại các cửa hàng thực phẩm có tác dụng xóa nếp nhăn hiệu quả. Bạn nên thoa tinh dầu đó vào vùng da bị nhăn trước khi đi ngủ bạn sẽ thấy công hiệu bất ngờ sau một thời gian sử dụng.<br>     <b><u>+Tiêu đờm:</b></u><br>  Những người mắc bệnh về đường phổi nên ăn nho nhiều hơn. Bởi nho giúp cho các tế bào phổi giải độc, ngoài ra còn có tác dụng long đờm. Đồng thời nho còn làm giám các triệu chứng của viêm đường hô hấp hoặc ngứa rát cổ họng do bệnh lý hay nguyên nhân nào khác.<br>     <b><u>+Giảm cân:</b></u><br>  Nước ép nho giúp phòng chống bệnh hiệu quả<br>  Ăn nho xanh có tác dụng gì? Một vài nghiên cứu cho thấy, nho xanh, nho đen chứa nhiều vitamin tốt cho cơ thể. Bởi vậy mà phụ nữ có thể ăn nho hàng ngày để duy trì vóc dáng đồng thời bảo vệ sức khỏe tim mạch thật tốt.<br>     <b><u>+Chống Virus:</b></u><br>  Nước ép nho giúp hồi phục sức khỏe nhanh chóng nhất là đối với bệnh nhân bị xơ cứng động mạch và bệnh nhân viêm thận. Đồng thời nho còn giúp những bệnh nhân phẫu thuật ghép nội tạng hồi phục sức khỏe, làm giảm các biến chứng, và chống lại virus.<br>     <b><u>+Tăng cảm giác ngon miệng:</b></u><br>  Một cách chế biến nho giúp tăng cảm giác ăn ngon miệng, đồng thời giảm đau đó chính là nho khô. Bởi vậy mà không chỉ có nho tươi, nho khô cũng là thực phẩm giàu chất dinh dưỡng và cực kỳ tốt cho sức khỏe. Qua đó chắc hẳn các bạn đã giải đáp được câu hỏi “ ăn nho khô có tác dụng gì”.<br>     <b><u>+Cải thiện tình trạng bệnh tiểu đường:</b></u><br>  Đây là lý do vì sao mà những bệnh nhân bị bệnh tiểu đường thường được các bác sĩ khuyến cáo nên ăn nhiều nho. Theo một số nghiên cứu của trường Đại học Y Dược, những người bị bệnh tiểu đường nhờ ăn nho mà có thể giảm được 10% lượng đường trong máu.<br>        <b><u>+ Phòng ngừa sỏi thận:</b></u><br>  Các thầy cô Cao Đẳng Y Dược Thành Phố Hồ Chí Minh cho rằng, ăn nhiều nho sẽ làm giảm lượng axit uric trong cơ thể. Thậm chí nó còn có thể loại bỏ được lượng axit này ra khỏi hệ thống đường tiết niệu. Nhờ đó mà bạn có thể tránh khỏi được nguy cơ mắc bệnh sỏi thận nếu như ăn tăng cường ăn nho.<br>     <b><u>+ Nho giúp tăng cường hệ miễn dịch:</b></u><br>  Ngoài những tác dụng của nho kể trên thì chắc hẳn các bạn không biết trong nho có chứa nhiều vitamin A,C,K giúp tăng cường sức khỏe trong cơ thể đặc biệt là hệ miễn dịch. Do vậy việc ăn nho thường xuyên giúp bạn phòng tránh được các vi khuẩn gây một số bệnh ốm vặt hơn.<br>     <b><u>Những điều bạn chưa biết về tác dụng của quả nho:</b></u><br>  Mỗi loại nho có tác dụng khác nhau:<br>  Toàn bộ quả nho đều tốt cho sức khỏe: Bạn nên rửa sạch và ăn nho cả quả. Một số người có thói quen bóc vỏ và nhả hạt. Như vậy dinh dưỡng sẽ bị mất đi. Bên cạnh đó, màu sắc quả nho cũng có những lợi ích khác nhau.<br>  <b><u>Ăn nho đỏ có tác dụng gì?</b></u><br>  Nho đỏ có chứa nhiều enzyme đảo được, làm mềm mạch máu. Bên cạnh đó nó còn có tác dụng bảo vệ tim mạch bằng cách làm chậm sự tích tụ của cholesterol trên thành động mạch. Đó chính là lý do bạn nên ăn nho đỏ cả vỏ nhé.<br>  <b><u>Ăn nho xanh có tác dụng gì?</b></u><br>  Nho xanh có tác dụng rất tốt cho làn da của bạn. Nó phù hợp với những người có làn da yếu, dễ mọc mụn, nhăn nheo, sạm nắng…Ngoài ra những người bị bệnh đường hô hấp, ho nhiều cũng nên ăn nhiều nho xanh hơn.<br>  <b><u>Ăn nho tím có tác dụng gì?</b></u><br>  Nho tím có khả năng ngăn ngừa lão hóa hiệu quả.Trong nho tím có chứa nhiều flavonoid và anthocyanin giúp phòng ngừa dấu hiệu lão hóa nhờ loại bỏ những gốc tự do trong cơ thể và làm giảm nếp nhăn.<br> <b><u>Ăn nho đen có tác dụng gì?</b></u><br>  Nho đen có chứa hàm lượng lớn Magie, kali, Canxi hơn so với những loại nho khác. Ngoài ra nó còn bổ sung những khoáng chất cần thiết giúp cơ thể chống lại được mệt mỏi, căng thẳng.<br>', '2021-09-17 12:59:00'),
(5, 'Thanh long.jpg', 'Ăn thanh long có tác dụng gì', '<b><u>+ Phòng ngừa bệnh mạch máu não và bệnh tim mạch: </b></u><br>  Nhiều người không biết rằng, nho có tác dụng ngăn ngừa sự hình thành huyết khối tốt hơn cả aspirin, đồng thời làm giảm lượng cholesterol huyết thanh. Ngoài ra nho còn làm giảm sự gắn kết tiểu cầu và ngăn ngừa các bệnh về mạch máu não, các bệnh liên quan đến tim mạch.<br>  Cụ thể trong nho có chứa flavonoid là một chất có khả năng chống oxy hóa mạnh. Do đó nó có khả năng ngăn chặn sự oxy hóa hình thành do cholesterol xấu có thể gây tắc mạch máu và một số bệnh tuần hoàn khác.<br>  Ngoài ra chất flavonoid còn hỗ trợ đẩy lùi tình trạng mảng bám và thành mạch giúp thanh lọc máu và đào thải các độc tố ra ngoài cơ thể. Đó chính là lý do mà nho tuy nhỏ nhưng lại có võ lớn, giúp bảo vệ sức khỏe tim mạch của bạn.<br>     <b><u>+ Tạo hưng phấn cho não bộ: </b></u><br>  Nho có chứa nhiều Vitamin, axit hữu cơ, axit amin và đường glucose  …có tác dụng kích thích dây thần kinh não. Do vậy những người bị suy nhược thần kinh hay mệt mỏi thì nên ăn nho thường xuyên để cải thiện tốt hơn.<br>     <b><u>+Phòng chống cảm lạnh: </b></u><br>  Nho có chứa một hàm lượng lớn chất xơ, cụ thể trong nước ép nho có chứa hàng chục chất dinh dưỡng  giúp tăng cường hệ thống miễn dịch bằng cách làm tăng số lượng lớn tế bào Delta T và Game trong cơ thể. Do vậy mà hãy tăng cường uống nước ép nho để có thể thoát khỏi nguy cơ của tình trạng bệnh này.<br>  Ngoài việc uống nước ép nho nguyên chất, bạn có thể sử dụng thêm vani với hàm lượng chất béo, chuối và dâu tây để thay đổi vị dễ uống và đồng thời bổ sung thêm một số vitamin khác cho cơ thể.<br>     <b><u>+Tạm biệt nếp nhăn:</b></u><br>  Trong nho có chứa nhiều chất oxy hóa và các axit béo thiết yếu giúp bạn duy trì một làn da tươi trẻ. Một số loại dầu chiết xuất từ hạt nho bán tại các cửa hàng thực phẩm có tác dụng xóa nếp nhăn hiệu quả. Bạn nên thoa tinh dầu đó vào vùng da bị nhăn trước khi đi ngủ bạn sẽ thấy công hiệu bất ngờ sau một thời gian sử dụng.<br>     <b><u>+Tiêu đờm:</b></u><br>  Những người mắc bệnh về đường phổi nên ăn nho nhiều hơn. Bởi nho giúp cho các tế bào phổi giải độc, ngoài ra còn có tác dụng long đờm. Đồng thời nho còn làm giám các triệu chứng của viêm đường hô hấp hoặc ngứa rát cổ họng do bệnh lý hay nguyên nhân nào khác.<br>     <b><u>+Giảm cân:</b></u><br>  Nước ép nho giúp phòng chống bệnh hiệu quả<br>  Ăn nho xanh có tác dụng gì? Một vài nghiên cứu cho thấy, nho xanh, nho đen chứa nhiều vitamin tốt cho cơ thể. Bởi vậy mà phụ nữ có thể ăn nho hàng ngày để duy trì vóc dáng đồng thời bảo vệ sức khỏe tim mạch thật tốt.<br>     <b><u>+Chống Virus:</b></u><br>  Nước ép nho giúp hồi phục sức khỏe nhanh chóng nhất là đối với bệnh nhân bị xơ cứng động mạch và bệnh nhân viêm thận. Đồng thời nho còn giúp những bệnh nhân phẫu thuật ghép nội tạng hồi phục sức khỏe, làm giảm các biến chứng, và chống lại virus.<br>     <b><u>+Tăng cảm giác ngon miệng:</b></u><br>  Một cách chế biến nho giúp tăng cảm giác ăn ngon miệng, đồng thời giảm đau đó chính là nho khô. Bởi vậy mà không chỉ có nho tươi, nho khô cũng là thực phẩm giàu chất dinh dưỡng và cực kỳ tốt cho sức khỏe. Qua đó chắc hẳn các bạn đã giải đáp được câu hỏi “ ăn nho khô có tác dụng gì”.<br>     <b><u>+Cải thiện tình trạng bệnh tiểu đường:</b></u><br>  Đây là lý do vì sao mà những bệnh nhân bị bệnh tiểu đường thường được các bác sĩ khuyến cáo nên ăn nhiều nho. Theo một số nghiên cứu của trường Đại học Y Dược, những người bị bệnh tiểu đường nhờ ăn nho mà có thể giảm được 10% lượng đường trong máu.<br>        <b><u>+ Phòng ngừa sỏi thận:</b></u><br>  Các thầy cô Cao Đẳng Y Dược Thành Phố Hồ Chí Minh cho rằng, ăn nhiều nho sẽ làm giảm lượng axit uric trong cơ thể. Thậm chí nó còn có thể loại bỏ được lượng axit này ra khỏi hệ thống đường tiết niệu. Nhờ đó mà bạn có thể tránh khỏi được nguy cơ mắc bệnh sỏi thận nếu như ăn tăng cường ăn nho.<br>     <b><u>+ Nho giúp tăng cường hệ miễn dịch:</b></u><br>  Ngoài những tác dụng của nho kể trên thì chắc hẳn các bạn không biết trong nho có chứa nhiều vitamin A,C,K giúp tăng cường sức khỏe trong cơ thể đặc biệt là hệ miễn dịch. Do vậy việc ăn nho thường xuyên giúp bạn phòng tránh được các vi khuẩn gây một số bệnh ốm vặt hơn.<br>     <b><u>Những điều bạn chưa biết về tác dụng của quả nho:</b></u><br>  Mỗi loại nho có tác dụng khác nhau:<br>  Toàn bộ quả nho đều tốt cho sức khỏe: Bạn nên rửa sạch và ăn nho cả quả. Một số người có thói quen bóc vỏ và nhả hạt. Như vậy dinh dưỡng sẽ bị mất đi. Bên cạnh đó, màu sắc quả nho cũng có những lợi ích khác nhau.<br>  <b><u>Ăn nho đỏ có tác dụng gì?</b></u><br>  Nho đỏ có chứa nhiều enzyme đảo được, làm mềm mạch máu. Bên cạnh đó nó còn có tác dụng bảo vệ tim mạch bằng cách làm chậm sự tích tụ của cholesterol trên thành động mạch. Đó chính là lý do bạn nên ăn nho đỏ cả vỏ nhé.<br>  <b><u>Ăn nho xanh có tác dụng gì?</b></u><br>  Nho xanh có tác dụng rất tốt cho làn da của bạn. Nó phù hợp với những người có làn da yếu, dễ mọc mụn, nhăn nheo, sạm nắng…Ngoài ra những người bị bệnh đường hô hấp, ho nhiều cũng nên ăn nhiều nho xanh hơn.<br>  <b><u>Ăn nho tím có tác dụng gì?</b></u><br>  Nho tím có khả năng ngăn ngừa lão hóa hiệu quả.Trong nho tím có chứa nhiều flavonoid và anthocyanin giúp phòng ngừa dấu hiệu lão hóa nhờ loại bỏ những gốc tự do trong cơ thể và làm giảm nếp nhăn.<br> <b><u>Ăn nho đen có tác dụng gì?</b></u><br>  Nho đen có chứa hàm lượng lớn Magie, kali, Canxi hơn so với những loại nho khác. Ngoài ra nó còn bổ sung những khoáng chất cần thiết giúp cơ thể chống lại được mệt mỏi, căng thẳng.<br>', '2021-10-05 07:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `traicay`
--

CREATE TABLE `traicay` (
  `ID` int(11) NOT NULL,
  `ID_NhomTraiCay` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `TenTraiCay` varchar(30) NOT NULL,
  `ThongTin` varchar(10000) NOT NULL,
  `GiaBan` float NOT NULL,
  `Xuat_xu` varchar(30) NOT NULL,
  `NgayNhap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `traicay`
--

INSERT INTO `traicay` (`ID`, `ID_NhomTraiCay`, `img`, `TenTraiCay`, `ThongTin`, `GiaBan`, `Xuat_xu`, `NgayNhap`) VALUES
(10, 1, 'Nho Mau Don__Han Quoc.jpg', 'Nho mẫu đơn - Hàn quốc', '', 30000, 'Hàn Quốc', '0000-00-00 00:00:00'),
(15, 1, 'KIWI vang.jpg', 'KiWi vàng', '', 40000, 'TQ', '0000-00-00 00:00:00'),
(16, 1, 'Le Nam Phi.jpg', 'Lê Nam Phi', ' -LêForelle được trồng ở nhiều nơi nhưng chủ yếu là ở Nam Phi vì nơi đây có khí hậu hợp thích hợp cho giống cây này phát triển.\r\n- LêNamPhi màu xanh xen lẫn màu vàng có vệt đỏ rực rỡ khi quả chín. Quả hình chuông nhỏ, tròn và thon đều, bên trong thịt trắng với hương vị thơm mát, ngọt nhẹ.\r\n- Sẽ càng tuyệt vời hơn nữa khi bạn thưởng thức Lê Nam Phi ngọt ngào kèm với phomat tươi trong các dĩa salad.\r\n- Bên cạnh hương vị tuyệt vời thì Lê Nam Phi có giá trị dinh dưỡng rất cao khi một trái lê có thể cung cấp 10% hàm lượng vitamin C và hàm lượng canxi khá lớn giúp tăng cường hệ miễn dịch, làm đẹp da, chắc xương.', 50000, 'Nam Phi', '2021-09-11 00:00:00'),
(23, 2, 'Tao xanh.jpg', 'Táo xanh', '', 20000, 'VN', '2021-09-03 00:00:00'),
(24, 3, 'Gio 2.jpg', 'Giỏ 2', '', 80000, 'VN', '2021-09-01 00:00:00'),
(25, 4, 'Mam Qua.jpg', 'Mâm 1', '', 100000, 'VN', '0000-00-00 00:00:00'),
(26, 1, 'KIWI xanh.jpg', 'KiWi xanh', '', 50000, 'TQ', '2021-10-04 09:09:18'),
(27, 1, 'cam uc.jpg', 'cam uc', '', 15000, 'úc', '2021-10-06 22:17:39'),
(28, 1, 'cherry my.png', 'cherry', '', 50000, 'Mỹ', '2021-10-06 22:20:07'),
(29, 1, 'Xoai uc.png', 'Xoài úc', '', 30000, 'Úc', '2021-10-06 22:20:33'),
(30, 1, 'Tao Queen.jpg', 'Táo queen ', '', 60000, 'NEW ZEALAND', '2021-10-06 22:27:29'),
(31, 2, 'bon bon.jpg', 'Bòn bon', '', 10000, 'VN', '2021-10-06 22:29:13'),
(32, 2, 'Buoi Da Xanh.jpg', 'Bưởi da xanh', '', 20000, 'VN', '2021-10-06 22:30:15'),
(33, 2, 'chuoi.jpg', 'Chuối', '', 15000, 'VN', '2021-10-06 22:30:42'),
(34, 2, 'Mang Cut Bao Loc.jpg', 'Măng cụt', '', 30000, 'VN', '2021-10-06 22:31:09'),
(35, 2, 'quýt.jpg', 'Quýt', '', 30000, 'VN', '2021-10-06 22:31:27'),
(36, 2, 'Thanh long.jpg', 'Thanh long', '', 25000, 'VN', '2021-10-06 22:31:45'),
(37, 2, 'Xoai Cat Hoa Loc.jpg', 'Xoài cát lộc', '', 40000, 'VN', '2021-10-06 22:32:08'),
(39, 3, 'Gio 3.jpg', 'Giỏ 3', '', 60000, 'VN', '2021-10-06 22:33:30'),
(41, 3, 'Gio 5.jpg', 'Giỏ 5', '', 70000, 'VN', '2021-10-06 22:34:08'),
(42, 3, 'Gio 6.jpg', 'Giỏ 6', '', 90000, 'VN', '2021-10-06 22:34:37'),
(43, 3, 'Gio Trai Cay 1.jpg', 'Giỏ 1', '', 40000, 'VN', '2021-10-06 22:35:27'),
(44, 3, 'Gio 4.jpg', 'Giỏ 4', '', 60000, 'VN', '2021-10-06 22:35:48'),
(45, 4, 'Mam 2.jpg', 'Mâm 2', '', 100000, 'VN', '2021-10-06 22:38:48'),
(46, 4, 'Mam 3.jpg', 'Mâm 3', '', 100000, 'VN', '2021-10-06 22:39:12'),
(47, 4, 'Mam 4.jpg', 'Mâm 4', '', 100000, 'VN', '2021-10-06 22:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Id_HoaDon` (`Id_HoaDon`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_KhachHang` (`ID_KhachHang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhomtraicay`
--
ALTER TABLE `nhomtraicay`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_dathang`
--
ALTER TABLE `table_dathang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `taikhoan_admin`
--
ALTER TABLE `taikhoan_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `traicay`
--
ALTER TABLE `traicay`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_NhomTraiCay` (`ID_NhomTraiCay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhomtraicay`
--
ALTER TABLE `nhomtraicay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_dathang`
--
ALTER TABLE `table_dathang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `taikhoan_admin`
--
ALTER TABLE `taikhoan_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `traicay`
--
ALTER TABLE `traicay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`Id_HoaDon`) REFERENCES `hoadon` (`ID`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ID_KhachHang`) REFERENCES `khach_hang` (`ID`);

--
-- Constraints for table `traicay`
--
ALTER TABLE `traicay`
  ADD CONSTRAINT `traicay_ibfk_1` FOREIGN KEY (`ID_NhomTraiCay`) REFERENCES `nhomtraicay` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
