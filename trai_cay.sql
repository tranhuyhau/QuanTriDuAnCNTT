-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 01, 2022 lúc 08:31 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trai_cay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `ID` int(11) NOT NULL,
  `ID_HoaDon` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `XuatXu` varchar(100) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`ID`, `ID_HoaDon`, `IDSanPham`, `TenSanPham`, `XuatXu`, `DonGia`, `SoLuong`, `ThanhTien`, `TrangThai`) VALUES
(2, 1, 1, 'Bon Bon', 'Nhật bản', 14000, 6, 84000, 2),
(3, 2, 2, 'Chuối', 'Việt nam', 14000, 4, 56000, 2),
(4, 3, 1, 'Bon Bon', 'Nhật bản', 14000, 8, 112000, 3),
(5, 3, 2, 'Chuối', 'Việt nam', 14000, 5, 70000, 3),
(6, 10, 17, 'Bưởi', 'Nhật bản', 32, 4, 128, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `XuatXu` varchar(100) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ID`, `IDTK`, `IDSanPham`, `TenSanPham`, `XuatXu`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES
(11, 1, 17, 'Bưởi', 'Nhật bản', 32, 2, 64);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `IDTK` int(11) NOT NULL,
  `TenKH` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `TongTien` float NOT NULL,
  `NgayMua` datetime NOT NULL,
  `GhiChu` varchar(200) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID`, `IDTK`, `TenKH`, `DiaChi`, `SDT`, `TongTien`, `NgayMua`, `GhiChu`, `TrangThai`) VALUES
(1, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '12345', 84168, '2022-01-15 01:00:30', '', 2),
(2, 1, 'HuyHau', 'Tỉnh Hải Dương - Huyện Ninh Giang - Xã Văn Hội - ', '12345', 56000, '2022-01-02 11:37:57', '', 2),
(3, 1, 'HuyHau', 'Tỉnh Phú Thọ - Huyện Cẩm Khê - Xã Phú Khê - ', '12345', 182000, '2022-01-05 13:47:00', '', 3),
(4, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '1234', 56473, '2022-01-05 14:34:00', '', 2),
(5, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '1234', 56473, '2022-01-05 14:29:00', '', 2),
(6, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '1234', 56473, '2022-01-20 14:34:00', '', 2),
(7, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '1234', 56473, '2022-01-15 14:34:00', '', 2),
(8, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '1234', 56473, '2022-01-02 14:34:00', '', 2),
(9, 1, 'HuyHau', 'Tỉnh Quảng Ninh - Thành phố Hạ Long - Phường Bãi Cháy - 123', '1234', 56473, '2022-01-23 14:34:00', '', 2),
(10, 1, 'HuyHau', 'Tỉnh Hải Dương - Huyện Gia Lộc - Xã Thống Kênh - ', '12345', 128, '2022-02-28 23:39:01', '', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsusanpham`
--

CREATE TABLE `lichsusanpham` (
  `ID` int(11) NOT NULL,
  `LoaiSanPham` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `GiaNhap` varchar(255) NOT NULL,
  `GiaBan` varchar(255) NOT NULL,
  `SoLuong` varchar(255) NOT NULL,
  `NgayNhap` varchar(255) NOT NULL,
  `XuatXu` varchar(255) NOT NULL,
  `NgayThaoTac` datetime NOT NULL,
  `ThaoTac` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichsusanpham`
--

INSERT INTO `lichsusanpham` (`ID`, `LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`, `NgayThaoTac`, `ThaoTac`) VALUES
(5, '4 -> 4', 'rem 2.jpg -> rem 2.jpg', 'Lê -> Lê', '33 -> 33', '21 -> 21', '43 -> 43', '2022-02-16 13:15:02', '2 -> 2', '2022-02-17 01:18:55', 'Sửa'),
(6, 'Trái cây ngoại nhập -> Trái cây ngoại nhập', 'rem 2.jpg -> rem 2.jpg', 'Lê -> Táo', '33 -> 33', '21 -> 21', '43 -> 43', '2022-02-16 13:15:02', 'Nhật bản -> Nhật bản', '2022-02-18 10:07:55', 'Sửa'),
(7, 'Trái cây ngoại nhập -> Mâm quả', 'rem 2.jpg -> rem 2.jpg', 'Lê -> Lê', '33 -> 33', '21 -> 21', '43 -> 43', '2022-02-16 13:15:02', 'Nhật bản -> Nhật bản', '2022-02-18 10:08:58', 'Sửa'),
(8, 'Mâm quả -> Mâm quả', 'rem 2.jpg -> rem 2.jpg', 'Lê -> Lê', '33 -> 33', '21 -> 21', '43 -> 43', '2022-02-16 13:15:02', 'Nhật bản -> Việt nam', '2022-02-18 10:09:25', 'Sửa'),
(9, 'Mâm quả', 'rem 2.jpg', 'Lê', '21', '33', '43', '2022-02-16 13:15:02', 'Việt nam', '2022-02-18 10:19:52', 'Xóa'),
(10, 'Trái cây ngoại nhập', 'nezuko.jpg', 'Bưởi', '12', '32', '44', '2022-02-18 10:36:21', '2022-01-02 08:32:52', '2022-02-18 10:36:21', 'Thêm'),
(11, 'Trái cây ngoại nhập', 'nezuko.jpg', 'Bưởi', '12', '32', '44', '2022-02-18 10:36:21', 'Nhật bản', '2022-02-18 10:38:44', 'Xóa'),
(12, 'Mâm quả', 'miku 2.png', 'Bưởi', '12', '32', '44', '2022-02-18 10:39:06', 'Nhật bản', '2022-02-18 10:39:06', 'Thêm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`ID`, `Ten`, `NgayThem`) VALUES
(4, 'Trái cây ngoại nhập', '2022-01-19 09:38:00'),
(5, 'Trái cây nội', '2022-01-19 09:38:00'),
(6, 'Mâm quả', '2022-01-19 09:38:00'),
(17, 'Mâmm', '2022-02-09 09:10:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `ID_LoaiSanPham` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `GiaNhap` float NOT NULL,
  `GiaBan` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `XuatXu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `ID_LoaiSanPham`, `Image`, `TenSanPham`, `GiaNhap`, `GiaBan`, `SoLuong`, `NgayNhap`, `XuatXu`) VALUES
(17, 6, 'miku 2.png', 'Bưởi', 12, 32, 38, '2022-02-18 10:39:06', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_admin`
--

CREATE TABLE `taikhoan_admin` (
  `ID` int(11) NOT NULL,
  `TenTK` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_admin`
--

INSERT INTO `taikhoan_admin` (`ID`, `TenTK`, `MatKhau`) VALUES
(1, 'admin', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_kh`
--

CREATE TABLE `taikhoan_kh` (
  `ID` int(11) NOT NULL,
  `TenTK` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `NgayDK` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_kh`
--

INSERT INTO `taikhoan_kh` (`ID`, `TenTK`, `MatKhau`, `TrangThai`, `NgayDK`) VALUES
(1, 'kh1', '123', 1, '2022-01-03 13:10:00'),
(2, 'kh2', '123', 0, '2022-01-02 13:10:00'),
(3, 'kh3', '1', 1, '2022-01-30 09:35:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `ID` int(11) NOT NULL,
  `TenTT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`ID`, `TenTT`) VALUES
(1, 'Đang giao hàng'),
(2, 'Đã nhận hàng'),
(3, 'Đã hủy hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatxu`
--

CREATE TABLE `xuatxu` (
  `ID` int(11) NOT NULL,
  `XuatXu` varchar(100) NOT NULL,
  `NgayThem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `xuatxu`
--

INSERT INTO `xuatxu` (`ID`, `XuatXu`, `NgayThem`) VALUES
(1, 'Việt nam', '2022-01-01 08:32:46'),
(2, 'Nhật bản', '2022-01-02 08:32:52'),
(3, 'Hàn quốcc', '2022-01-03 08:32:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HoaDon` (`ID_HoaDon`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDTK` (`IDTK`),
  ADD KEY `TrangThai` (`TrangThai`);

--
-- Chỉ mục cho bảng `lichsusanpham`
--
ALTER TABLE `lichsusanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_LoaiSanPham` (`ID_LoaiSanPham`),
  ADD KEY `XuatXu` (`XuatXu`);

--
-- Chỉ mục cho bảng `taikhoan_admin`
--
ALTER TABLE `taikhoan_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `taikhoan_kh`
--
ALTER TABLE `taikhoan_kh`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lichsusanpham`
--
ALTER TABLE `lichsusanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `taikhoan_admin`
--
ALTER TABLE `taikhoan_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoan_kh`
--
ALTER TABLE `taikhoan_kh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`ID_HoaDon`) REFERENCES `hoadon` (`ID`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_kh` (`ID`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDTK`) REFERENCES `taikhoan_kh` (`ID`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`TrangThai`) REFERENCES `trangthai` (`ID`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_LoaiSanPham`) REFERENCES `loaisanpham` (`ID`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`XuatXu`) REFERENCES `xuatxu` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
