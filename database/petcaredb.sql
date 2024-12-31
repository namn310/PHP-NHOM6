-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 21, 2024 lúc 12:10 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petcaredb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `name`) VALUES
(1, 'admin@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nguyễn Phương Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `idCus` int(11) NOT NULL,
  `nameService` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `goi` varchar(100) NOT NULL,
  `namePet` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `dateBook` varchar(30) NOT NULL,
  `dateCreate` varchar(40) NOT NULL,
  `tinhtrangBook` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id`, `idCus`, `nameService`, `type`, `goi`, `namePet`, `weight`, `dateBook`, `dateCreate`, `tinhtrangBook`) VALUES
(28, 1, 'Spa-grooming', 'Mèo', 'Gói sạch toàn thân', 'petuy', '3,5', '5h chiều ngày 20/6/2024', '12-06-24', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `noidung` varchar(1024) NOT NULL,
  `timeCreate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_product`, `id_user`, `noidung`, `timeCreate`) VALUES
(1, 60, 1, 'sản phẩm đẹp quá', '16-06-24'),
(2, 60, 1, 'Đẹp quá', '16-06-24'),
(3, 60, 1, 'sản phẩm đẹp quá', '16-06-24'),
(6, 28, 1, 'Sản phẩm rất tốt', '16-06-24'),
(67, 16, 2, 'h', '13-08-24'),
(68, 73, 2, 's', '13-08-24'),
(69, 75, 44, 'a', '18-08-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sodienthoai` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `email`, `sodienthoai`, `pass`) VALUES
(1, 'Nguyễn Phương Nam', 'Láng Thượng, Đống Đa, Hà Nội', 'user@gmail.com', '0123456789', '25f9e794323b453885f5181f1b624d0b'),
(2, 'namnnnn', 'Thanh Xuân, Hà Nội', 'nam@gmail.com', '0913456767', '25f9e794323b453885f5181f1b624d0b'),
(34, 'nam', 'Hà Nội', 'namn3102003@gmail.com', '0913439191', '25f9e794323b453885f5181f1b624d0b'),
(44, 'a', 'Hà Nội', 'huyen13102005@gmail.com', '0913439191', '25f9e794323b453885f5181f1b624d0b'),
(45, 'a', 'Hà Nội', 'mzrjnegyddehugxni@hotmail.com', '0913439191', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL,
  `dateadd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`, `dateadd`) VALUES
(1, 'Pate', '07-06-24'),
(2, 'Đồ chơi', '15-06-24'),
(3, 'Thực phẩm chức năng', '07-06-24'),
(4, 'Thức ăn hạt', '21-08-24'),
(5, 'Dụng cụ', '21-08-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id_dichvu` int(11) NOT NULL,
  `ten_dichvu` varchar(100) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `dateCreate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id_dichvu`, `ten_dichvu`, `hinhanh`, `dateCreate`) VALUES
(2, 'Spa-Grooming', '1718460833_spa_cost.webp', '16-08-24'),
(3, 'Dịch vụ khách sạn', '1718462316_hotel pet.jpg', '16-08-24'),
(5, 'Dịch vụ khác', '1718463674_otherservice.jpg', '16-08-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `time_start` varchar(30) NOT NULL,
  `time_end` varchar(30) NOT NULL,
  `status` int(5) NOT NULL,
  `idCat` int(5) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `discounts`
--

INSERT INTO `discounts` (`id`, `name`, `discount`, `time_start`, `time_end`, `status`, `idCat`, `created_at`) VALUES
(9, 'Sinh Nhật Phương Nam', 15, '2024-08-21', '2024-08-25', 1, 1, '21-08-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `idPro` int(11) NOT NULL,
  `create_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `image`, `idPro`, `create_at`) VALUES
(48, '1_1724223599_1720011300.webp', 119, '21-08-24'),
(49, '1_1724223706_1720010862.webp', 120, '21-08-24'),
(50, '2_1724223706_1720010875.webp', 120, '21-08-24'),
(51, '1_1724223764_1720010682.webp', 121, '21-08-24'),
(52, '2_1724223764_1720010849.webp', 121, '21-08-24'),
(53, '1_1724223949_26.webp', 122, '21-08-24'),
(54, '1_1724224012_1720010392.jpg', 123, '21-08-24'),
(55, '2_1724224012_1720010430.jpg', 123, '21-08-24'),
(56, '1_1724224055_1720010304.jpg', 124, '21-08-24'),
(57, '2_1724224055_1720010304.webp', 124, '21-08-24'),
(58, '1_1724224084_1720010193.jpg', 125, '21-08-24'),
(59, '2_1724224084_1720010193.webp', 125, '21-08-24'),
(60, '1_1724224121_1720010077.jpg', 126, '21-08-24'),
(61, '2_1724224121_1720010077.webp', 126, '21-08-24'),
(62, '1_1724224155_1720009907.webp', 127, '21-08-24'),
(63, '1_1724224196_1720009804.webp', 128, '21-08-24'),
(64, '2_1724224196_1720009827.webp', 128, '21-08-24'),
(65, '1_1724224239_1720009651.webp', 129, '21-08-24'),
(66, '1_1724224271_1720009601.jpg', 130, '21-08-24'),
(67, '2_1724224271_1720009601.webp', 130, '21-08-24'),
(68, '1_1724224302_1720009477.jpg', 131, '21-08-24'),
(69, '2_1724224302_1720009477.webp', 131, '21-08-24'),
(70, '1_1724224349_1720009397.jpg', 132, '21-08-24'),
(71, '2_1724224349_1720009397.webp', 132, '21-08-24'),
(72, '1_1724224380_1720009293.jpg', 133, '21-08-24'),
(73, '2_1724224380_1720009293.webp', 133, '21-08-24'),
(74, '1_1724224420_1720007866.jpg', 134, '21-08-24'),
(75, '2_1724224420_1720007866.webp', 134, '21-08-24'),
(76, '1_1724224458_1720007502.jpg', 135, '21-08-24'),
(77, '2_1724224458_1720007502.webp', 135, '21-08-24'),
(78, '1_1724224491_1720007180.webp', 136, '21-08-24'),
(79, '1_1724224528_1720007227.jpg', 137, '21-08-24'),
(80, '2_1724224528_1720007227.webp', 137, '21-08-24'),
(81, '1_1724224561_1720006341.webp', 138, '21-08-24'),
(82, '1_1724224590_1720004598.jpg', 139, '21-08-24'),
(83, '1_1724224624_1720004419 - Copy.webp', 140, '21-08-24'),
(84, '2_1724224624_1720004524 - Copy.webp', 140, '21-08-24'),
(85, '1_1724224665_1720004231.jpg', 141, '21-08-24'),
(86, '2_1724224665_1720004231.webp', 141, '21-08-24'),
(87, '3_1724224665_1720004263.jpg', 141, '21-08-24'),
(88, '4_1724224665_1720004263.webp', 141, '21-08-24'),
(89, '1_1724224697_1720004018.jpg', 142, '21-08-24'),
(90, '1_1724224725_1719750131.webp', 143, '21-08-24'),
(91, '2_1724224725_1719796831.jpg', 143, '21-08-24'),
(92, '3_1724224725_1719796831.webp', 143, '21-08-24'),
(93, '1_1724224752_1719798525.jpg', 144, '21-08-24'),
(94, '2_1724224752_1719798525.webp', 144, '21-08-24'),
(95, '1_1724224778_1719805268.webp', 145, '21-08-24'),
(96, '2_1724224778_1719831393.webp', 145, '21-08-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idNV` int(50) NOT NULL,
  `tenNV` varchar(100) NOT NULL,
  `anhNV` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `birth` varchar(30) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `chucvu` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cmnd` int(30) NOT NULL,
  `dateadd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(50) NOT NULL,
  `number` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `create_at` varchar(30) NOT NULL,
  `status` int(30) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idPro` int(11) NOT NULL,
  `idCat` int(50) NOT NULL,
  `namePro` varchar(100) NOT NULL,
  `count` int(255) NOT NULL,
  `giaban` varchar(500) NOT NULL,
  `giavon` varchar(500) NOT NULL,
  `discount` varchar(30) NOT NULL,
  `mota` varchar(5000) NOT NULL,
  `timeadd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idPro`, `idCat`, `namePro`, `count`, `giaban`, `giavon`, `discount`, `mota`, `timeadd`) VALUES
(119, 5, 'Bình Bú Sữa PETAG Chó Mèo Con (Chuẩn USA)', 123, '65000', '30000', '', '<p>Bình sữa PetAg rời cho thú cưng được sản xuất bởi hãng chuyên về sữa và chăm sóc thú cưng PetAg - nhãn hiệu chuyên sản xuất các dòng sữa KMR, Esbilac, Petlac.</p><p>+ Với những chú thú cưng non nớt còn nhớ “sữa mẹ”, một chiếc bình sữa chuyên dụng sẽ giúp bạn dễ dàng vỗ về và chăm sóc chúng thật chu đáo.</p><p>+ Bình sữa rời có vạch chia chi tiết trên thân bình giúp bạn canh chỉnh lượng sữa hợp lý kết hợp cùng đầu ti mềm mại và được thiết kế đặc biệt để tạo cảm giác thoải mái và gần gũi, mang đến cho chú thú cưng nhỏ bé của bạn sự nâng niu và chăm sóc dịu dàng đầy ngọt ngào như chính bầu sữa của mẹ</p><p>ĐẶC ĐIỂM NỔI BẬT</p><p>- Chất liệu nhựa cao cấp bảo đảm an toàn, bảo đảm độ nhẹ và độ bền cho sản phẩm.</p><p>- Đầu ti mềm mại và có thiết kế đặc biệt dành riêng cho thú cưng, tạo sự gần gũi và thoải mái khi bú.</p><p>- Có vạch chia chi tiết trên thân bình giúp bạn canh chỉnh lượng sữa hợp lý.</p><p><br>&nbsp;</p>', '21-08-24'),
(120, 5, 'Trang Chủ Nhỏ Tai Chó Mèo Virbac Epiotic 125ml Nhỏ Tai Chó Mèo Virbac Epiotic 125ml', 454, '500000', '250000', '', '<p><strong>Nhỏ Tai Chó Mèo Virbac Epiotic 125ml</strong></p><ul><li>Thương hiệu: Virbac</li><li>Phù hợp cho: Chó/ Mèo mọi độ tuổi</li><li>Chó mèo có nhiều lông bên trong tai, đó là nơi chứa bụi bẩn, mảnh vụn và tích lũy ráy tai làm chúng rất khó chịu. Vệ sinh tai cho chó mèo của bạn hàng tuần sẽ giữ cho đôi tai của chúng luôn sạch sẽ, khỏe mạnh và tránh một số bệnh tật về tai. Thuốc nhỏ tai Epi-Otic là một dung dịch vệ sinh tai cho chó mèo đến từ thương hiệu Virbac, có tính sát trùng, không kích ứng và không chứa cồn. Sản phẩm này có công thức đặc biệt loại bỏ vảy sừng, bụi bẩn, ráy tai và làm khô ống tai nhanh chóng, giúp bạn dễ dàng hơn trong việc vệ sinh tai cho thú cưng của mình.</li></ul><p><strong>Lợi ích:</strong></p><ul><li>Làm sạch tai ngoài và ống tai đều đặn, đặc biệt làm sạch chất bẩn và ráy tai, làm sạch các mô hoại tử và các mảnh vụn của tai chó, mèo trước khi khám.</li><li>Làm sạch tai trước khi tiến hành các biện pháp điều trị hoặc nhỏ thuốc trị bệnh tai khác.</li><li>Tạo môi trường sạch sẽ giúp điều trị khi bị viêm tai.</li></ul><p><strong>Thành phần</strong><br>&nbsp;</p><p>Epi-Otic là một sản phẩm có tính sát trùng nhưng không kích ứng và không chứa cồn:</p><ul><li>Acid Lactic được sử dụng rộng rãi như một chất khử trùng nhẹ.</li><li>Acid Salicylic phân giải chất bẩn, kìm khuẩn và chống ngứa.</li><li>Propylene glycol hòa tan chất tiết (ráy tai) và bụi bẩn; tạo ẩm và kháng khuẩn.</li><li>Docusate sodium tạo một màng phủ bảo vệ và giúp khô ráo hoàn toàn.</li><li>PCMX có tác dụng kháng khuẩn và diệt nấm hiệu quả.</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Lắc kỹ chai thuốc trước khi sử dụng.&nbsp;</li><li>Bóp nhẹ và nhỏ thuốc vào tai.&nbsp;</li><li>Xoa nhẹ phần gốc tai, lau phần trên của vành tai và các phần có thể tiếp xúc được bằng bông gòn thấm Epi-Otic.</li><li>Vệ sinh thông thường: 2-3 lần /tuần.</li><li>Sử dụng để vệ sinh trước khi tiến hành các biện pháp điều trị khác.</li></ul>', '21-08-24'),
(121, 3, 'Viên Nhai Dưỡng Lông Chó Mèo Zesty Paws Omega Bites Skin & Coat', 70, '110000', '110000', '5', '<p>Zesty Paws Omega Bites chứa nhiều axit béo omega, vitamin và chất dinh dưỡng.<br><br>Được làm từ dầu cá, biotin và vitamin C và E<br>Dành cho những chú chó có bộ lông xỉn màu, khô và dễ gãy rụng.<br>Hỗ trợ dinh dưỡng cho bộ lông chắc khỏe, bóng mượt và mềm mại.<br>Hỗ trợ sức khỏe xương khớp và hông.<br>Tăng cường hệ thống miễn dịch và hoạt động của tim mạch.<br><br>Thương hiệu: Zesty Paws<br>Trọng lượng: 360g</p>', '21-08-24'),
(122, 3, 'Xổ Giun Virbac Endogard Cho Chó (1 Viên 10kg)', 456, '50000', '20000', '', '<p><strong>Lưu ý:</strong>&nbsp;<i>An toàn khi sử dụng cho tất cả các giống chó và lứa tuổi: có thể dùng cho chó con, chó đang mang thai và những giống chó nhạy cảm như chó chăn cừu, chó Collie.</i></p>', '21-08-24'),
(123, 1, 'Dầu Cá Hồi Brit Care Dưỡng Lông Chó', 100, '110000', '110000', '15', '<p>DẦU CÁ HỒI CHO CHÓ MÈO BRIT CARE 1 LÍT GIÁ CỰC RẺ<br><br>Dầu cá hồi cho chó mèo Brit care là một thực phẩm bổ sung đã được kiểm chứng. Dầu cá hồi Brit care cho chó và mèo làm giảm đáng kể lượng cholesterol trong máu. Sử dụng dầu cá hồi thường xuyên sẽ giúp bộ lông của thú cưng của bạn luôn dày và bóng. Dầu cá hồi được khuyên dùng cho các vấn đề sức khỏe như: tóc giòn và xỉn màu, rụng tóc nhiều, gàu, da khô, tóc mỏng, viêm da, ngứa da, dị ứng, chàm, các vấn đề về sắc tố, rối loạn hệ thống miễn dịch, các vấn đề về khả năng sinh sản.<br><br>Chỉ định:<br>Các bệnh về xương khớp.<br>Dị ứng và bệnh ngoài da - bệnh chàm, bệnh vảy cá, rụng tóc nhiều, thời kỳ thay lông, v.v.<br>Dị ứng thực phẩm.<br>Không có cảm giác thèm ăn.<br>Thời kỳ tăng trưởng.<br><br>Các tính năng cơ bản của sản phẩm<br>Bổ sung chế độ ăn uống cho chó và mèo.<br>Giảm lượng cholesterol trong máu.<br>Tăng mức độ cholesterol tốt.<br>Tăng cường khả năng miễn dịch.<br>Tăng cường mùi vị của thức ăn - được khuyến khích cho chó mèo kén ăn.<br>Dùng cho da bị dị ứng.<br><br>Liều lượng hàng ngày:<br>Trọng lượng dưới 12 kg: 2-4 ml<br>Trọng lượng 12-24 kg - 4-8 ml<br>Trọng lượng 24-28 kg - 8-12 ml<br>Trọng lượng hơn 48 kg - 12-16 ml</p><p><br>&nbsp;</p>', '21-08-24'),
(124, 3, 'Gel Dinh Dưỡng Cho Chó Mèo Virbac NutriPlus 120g', 90, '210000', '210000', '', '<p><strong>Thông tin chung:&nbsp;</strong></p><ul><li>Thương hiệu: Virbac</li><li>Phù hợp cho: Chó/mèo mọi lứa tuổi (đặc biệt là chó mèo đang lớn, đang mang thai hay nuôi con nhỏ; Chó săn, chó nghiệp vụ; Chó mèo cần hồi phục sau khi ốm, phẫu thuật; Chó mèo sinh ra yếu, còi xương, nhẹ cân, thiếu sữa.)</li><li>Nutri-plus là một loại gel dinh dưỡng cho chó mèo, có vị thơm và rất ngon miệng. Điểm đặc biệt của sản phẩm này so với các loại thức ăn khác là sử dụng các chất dinh dưỡng từ nguồn gốc động vật, giúp chó mèo chuyển đổi các chất dinh dưỡng thành năng lượng nhanh hơn và dễ dàng hơn. Bạn có thể cho thú cưng của mình sử dụng Nutriplus Gel để giúp cải thiện khẩu vị và ngăn ngừa mất cân.&nbsp;</li></ul><p>Nutri-plus phù hợp với tất cả các giống chó mèo như: Poodle, Golden, Mèo Anh lông ngắn,... ở mọi độ tuổi. Đặc biệt, sản phẩm rất phù hợp để sử dụng cho chó mèo cần bổ sung dinh dưỡng, tăng cường sức khỏe hoặc đang bị bệnh cần hỗ trợ điều trị.</p><p><strong>Lợi ích:</strong></p><ul><li>Bổ sung đầy đủ các dưỡng chất, cung cấp năng lượng cùng tất cả các vitamin và khoáng chất cần thiết cho chó, mèo vật cưng của bạn:</li><li>Chứa nhiều chất béo và carbohydrate dạng dễ tiêu hóa giúp chó con, mèo con mau lớn.</li><li>Hỗ trợ sức khỏe chó mẹ mang thai, tăng lượng sữa, chất lượng sữa đảm bảo.</li><li>Bồi bổ cơ thể chó nghiệp vụ, chó săn.</li><li>Tăng cường sức khỏe cho chó bị thương, chó bị ốm, chó sau phẫu thuật,…</li></ul><p><strong>Thành phần dinh dưỡng</strong></p><p>Calcium pantothenate…………….………......35,25mg</p><p>Folic acid………………………………….…...…..........3,5mg</p><p>Iron………………………………………........…......….....8,8mg</p><p>Iodine……………………………………….…................8,8mg</p><p>Manganese……………………………….…...…........17,65mg</p><p>Magnesium……………………………….......…...…...7,00mg</p><p>Vitamin A……………………………………...…..........17635</p><p>IU Vitamin D…………………………….….....….…...882</p><p>IU Vitamin E………………………….........…….….....106</p><p>IU Thiamine hydrochloride (B1) …...…...35,25 mg</p><p>Riboflavin (B2) …………………………….....…...….3,5 mg</p><p>Pyridoxine hydrochloride (B6) .........….....7,6 mg</p><p>Cyanocobalamin (B12) ………….…...…….....0,03525 mg</p><p>Niacinamide (nicotinamide)………….…...….35,25 mg</p><p>Tá dược gồm triglycerides, meat peptone, glucose, maltose qs………120,5g</p><p><strong>Hướng dẫn sử dụng</strong></p><p>Nutri-plus gel có thể dùng từ 3 – 5 ngày.</p><ul><li>1-2 thìa cho 5kg thể trọng/ngày (khoảng 10cm khi bơm thuốc ra khỏi ống). Trong trường hợp thú bị quá suy nhược hoặc đang hồi sức.</li><li>Nutri-plus gel có thể dùng như là một nguồn thức ăn cho chó, thức ăn cho mèo duy nhất với liều 2-4 thìa/ 5kg thể trọng mỗi ngày.</li></ul>', '21-08-24'),
(125, 3, 'Viên Nhai Spirit Bổ Sung Dưỡng Chất Cho Chó 160g (Hộp 160 Viên)', 68, '80000', '80000', '', '<p><strong>VIÊN SPIRIT BỔ SUNG CANXI CHO CHÓ:</strong></p><p>- Nên dùng vào buổi sáng sớm, kết hợp phơi nắng trước 8h sáng giúp cún chắc khỏe xương, phòng ngừa các bệnh về da. Canxi cần kết hợp với Vitamin D từ ánh sáng mặt trời mới giúp hấp thụ tốt vào cơ thể.</p><p>- Phòng ngừa thiếu hụt canxi, hạ bàn, bại liệt, chân yếu ở chó...</p><p><strong>VIÊN SPIRIT BỔ SUNG KHOÁNG CHẤT</strong></p><p>- Bổ sung chất khoáng cần thiết cho cơ thể các bé cún. - Những bé cún thiếu khoáng thường có biểu hiện ăn cỏ, ăn đất, ăn phân, ăn vôi tường... cần bổ sung thêm viên vitamin và viên khoáng chất cho cún.</p><p><strong>VIÊN SPIRIT DƯỠNG LÔNG, LÀM ĐẸP DA VÀ LÔNG</strong></p><p>- Kích thích mọc lông, mượt lông, giảm thiểu rụng và xơ lông.</p><p>- Các bé cún lông nhiều như Pom, Poodle, Maltese, Bichon... rất cần thiết cho việc chăm sóc bộ lông dày và chắc khỏe.</p><p>- Những bé đang cạo lông cần bổ sung viên dưỡng lông để lông nhanh chóng mọc dài và dày dặn, mượt mà và không bị thưa lông xơ xác nhé.</p><p><strong>VIÊN SPIRIT BỔ SUNG VITAMIN</strong></p><p>- Các bé cún cũng như người, cần đầy đủ vitamin khoáng chất để cơ thể phát triển khỏe mạnh, tăng sức đề kháng, giảm thiểu các nguy cơ thiếu hụt vitamin là tác nhân khiến các bé ốm yếu, còi cọc.</p><p>&nbsp;</p><p><strong>SỬ DỤNG</strong></p><p>- Dưới 5kg: 2 viên/ngày.</p><p>- Từ 10-25kg: 3-4 viên/ngày.</p><p>- Từ 25-35kg: 5-6 viên/ngày.</p><p>- Trên 35kg: 8-10 viên/ngày.</p><p><br>&nbsp;</p>', '21-08-24'),
(126, 3, 'Dầu Cá Hồi Zesty Paws Hỗ Trợ Dưỡng Lông & Tăng Cường Đề Kháng Chó Mèo (Mỹ)', 67, '180000', '180000', '5', '<p>Dầu cá hồi Zesty Paw là một thực phẩm bổ sung:<br>- Hỗ trợ giảm đáng kể lượng cholesterol trong máu cho chó mèo.<br>- Axit Béo Omega-3 với EPA &amp; DHA sẽ giúp bộ lông của thú cưng của bạn luôn dày và bóng.<br>- Dầu cá hồi được khuyên dùng cho các vấn đề sức khỏe như: lông giòn và xỉn màu, rụng lông nhiều, gàu, da khô, tóc mỏng, viêm da, ngứa da, dị ứng, chàm, các vấn đề về sắc tố, rối loạn hệ thống miễn dịch, các vấn đề về khả năng sinh sản.<br>- Sản phẩm không có hương vị nhân tạo hoặc chất bảo quản, không có màu tổng hợp<br>- Không có dẫn xuất ngũ cốc, ngô hoặc đậu nành<br><br>Chỉ định:<br>- Thú cưng có vấn đề về xương khớp.<br>- Dị ứng ngoài da - chàm, nấm, vảy cá, rụng lông nhiều, thời kỳ thay lông, v.v.<br>- Thời kỳ tăng trưởng.<br>- Tốt cho tim mạch, giảm lượng cholesterol xấu trong máu &amp; tăng mức độ cholesterol tốt.<br>- Nâng cao hệ miễn dịch<br>- Tăng cường mùi vị của thức ăn - được khuyến khích cho chó mèo kén ăn.<br><br>Liều lượng khuyến cáo mỗi ngày:<br>- Trọng lượng dưới 10 kg: &lt; 2 - 4 ml<br>- Trọng lượng 11 - 20 kg: &lt; 4 - 8 ml<br>- Trọng lượng 21 - 30 kg: &lt; 8 - 12 ml<br>- Trọng lượng hơn 30 kg: &lt; 12 - 16 ml</p>', '21-08-24'),
(127, 2, 'Đồ Chơi Mèo Chuột Kéo Dây Tự Động FOFOS', 500, '49000', '49000', '', '', '21-08-24'),
(128, 2, 'Đồ Chơi Chó Mèo Xe Điện Điều Khiển Từ Xa Sạc USB PetQ', 56, '200000', '200000', '', '<p><strong>Đồ Chơi Chó Mèo Xe Điện Điều Khiển Từ Xa Sạc USB PetQ</strong></p><ul><li>Thương hiệu: <strong>PetQ</strong></li><li>Phù hợp cho: Chó/mèo mọi lứa tuổi</li><li>Xe Điện Điều Khiển Từ Xa Sạc USB PetQ là <strong>đồ chơi cho chó</strong> mèo độc đáo và thú vị giúp kích thích tinh thần cho chú chó hoặc mèo cưng. Xe điện điều khiển từ xa khuyến khích thú cưng vận động, giúp chúng vui vẻ khỏe mạnh hơn,&nbsp;giải tỏa căng thẳng, lo âu và ngăn ngừa các hành vi phá phách.</li></ul><p><strong>Lợi ích:&nbsp;</strong></p><ul><li>Chế độ kép tương tác: Thu hút người bạn mèo của bạn với đồ chơi mèo chuyển động bằng điện, có tính năng dễ dàng chuyển đổi giữa chế độ Điều khiển tự động và từ xa, đảm bảo cho mèo của bạn sự phấn khích khi đua bất tận.</li><li>Tránh chướng ngại vật thông minh: Được trang bị cảm biến hồng ngoại, đồ chơi mèo ô tô thể thao này phát hiện chướng ngại vật và đảo hướng thông minh, mang lại trải nghiệm chơi liền mạch mà không bị kẹt.</li><li>Phạm vi từ xa mở rộng: Chỉ huy hành động từ khoảng cách lên đến 15-20 mét, mang đến cho mèo một sân chơi rộng rãi để đuổi theo và vồ lấy đồ chơi ô tô mèo tương tác này.</li><li>Tiện lợi có thể sạc lại USB: Quên việc thay pin! Đồ chơi mèo ô tô tự động này đi kèm với khả năng sạc USB để kéo dài thời gian chơi và sạc lại không phức tạp, giúp thú cưng của bạn giải trí lâu hơn.</li><li>Tự động kích hoạt ở chế độ chờ: Được thiết kế với tính năng chờ thông minh, đồ chơi mèo thông minh tự động chuyển sang chế độ chờ sau năm phút không hoạt động, nhưng một cú chạm đơn giản từ con mèo của bạn ngay lập tức đánh thức niềm vui.</li></ul><p><strong>Thành phần</strong></p><ul><li>Kích thước xe: 74 * 67 * 44mm</li><li>Điều khiển từ xa: 41 * 16 * 115mm</li><li>Chất liệu: ABS</li><li>Pin: 300mAh</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Nhấn nhanh Bật / tắt: Khởi động / tắt xe thể thao.</li><li>Chế độ chuyển đổi: Giữ nút chuyển đổi trong 3 giây khi thiết bị được bật nguồn.</li><li>Chế độ bình thường: (đèn xanh trong 3 giây) Tự động tắt sau 5 phút hoạt động</li><li>Chế độ thông minh: (đèn báo màu xanh lam sáng trong 3 giây) Sau 5 phút hoạt động, hãy vào chế độ chờ và nhấp để kích hoạt.</li></ul>', '21-08-24'),
(129, 2, 'Trụ Cào Cat Tree Đế Tròn TDT 29*29*47 Cm', 67, '250000', '250000', '', '<p>Nhà cây cho mèo (cat tree) là một trong những đồ vật mà hội nuôi mèo rất nên sở hữu trong ngôi nhà của mình. Vậy cat tree là gì và tác dụng của nó ra sao?<br>Công dụng của nhà cây cho mèo:<br>️ Tránh việc đồ đạc trong nhà bị cào xước hoặc ở tình trạng lộn xộn<br>️ “Căn nhà” trong mơ cho các “boss”<br>️ Nơi “giải trí” tuyệt cú mèo<br>️ Nơi mèo “tập thể dục”</p>', '21-08-24'),
(130, 2, 'Banh Lồng Chuột Đồ Chơi Cho Mèo', 67, '50000', '50000', '', '<p><strong>Đồ Chơi Mèo</strong>&nbsp;Bóng Lồng Sắt Có Chuột Cho Mèo<br><br>– Mèo sinh ra đã có tập tính vờn bắt, nên việc mua cho bé nhà mình một món đồ chơi như Bóng Lồng Sắt Có Chuột Cho Mèo là sự lựa chọn hoàn hảo<br><br>– Bạn không cần bỏ ra quá nhiều thời gian chơi cùng với các bé, chỉ cần một quả bóng mèo nhà bạn có thể tự chơi<br><br>– Chất liệu: Kim loại tốt. Không làm ảnh hưởng răng của thú cưng khi cắn/ngoạm.<br><br>– Đường kính bóng: ~6cm<br><br>– Màu sắc đa dạng, kích thích sự tò mò cũng như làm thú cưng của bạn hứng thú hơn khi chơi.<br><br>– Bạn cũng có thể sử dụng sản phẩm để chơi đùa cùng thú cưng, huấn luyện cho thú cưng cách bắt/tha đồ.<br><br>– Sản phẩm sẽ là một dụng cụ xả stress lý tưởng cho bạn, cũng như thú cưng<br><br>– Sản phẩm được làm bằng chất liệu cao cấp nên rất an toàn cho bé yêu nhà bạn</p>', '21-08-24'),
(131, 2, 'Cần Câu Mèo Que Gỗ Đính Thú', 57, '30000', '30000', '', '<p><strong>Đặc điểm nổi bật của sản phẩm:</strong>&nbsp;<i><strong>Cây Cần Câu Mèo&nbsp;</strong></i>với thiết kế tay cầm bằng gỗ thơm vát tròn chắc chắn với phần mồi cầu ở đầu dây có&nbsp;nhiều hình thù đa dạng như: chuột, quả bóng&nbsp;tròn, chim nhỏ,..&nbsp;bằng sợi mây&nbsp;hoặc vải bông&nbsp;&nbsp;đi kèm với đó là chuông nhỏ sẽ thu hút được sự hứng thú của thú cưng.&nbsp;<i><strong>Cây Cần Câu Mèo&nbsp;</strong></i>giúp huấn luyện mèo bản năng tự nhiên, nhanh nhẹn, linh hoạt trong hành động. Tạo mối quan hệ thân thiết gắn bó giữ người nuôi và mèo trong lúc chơi đùa cùng nhau.&nbsp;</p><p><strong>Công dụng</strong>:&nbsp; <i><strong>Cây Cần Câu Mèo</strong></i>&nbsp;giúp mèo kích thích chơi đùa, vận động tự nhiên và khỏe mạnh</p><p><strong>Chất liệu&nbsp;:</strong>&nbsp;<i><strong>Cây Cần Câu Mèo&nbsp;</strong></i>được làm bằng Gỗ thơm, Dây chun và Sợi mây+Vải bông</p><p><strong>Kích cỡ khi đóng gói</strong>:&nbsp;40cm x 1cm</p><p><strong>Trọng&nbsp;lượng:&nbsp;</strong>100gram</p><p><strong>Kiểu Dáng:</strong>&nbsp;Chuột, Quả bóng tròn, Chim nhỏ, Sứa nhỏ,..</p>', '21-08-24'),
(132, 2, 'Bàn Cào Móng Giấy Cho Mèo  Tặng Cỏ Mèo', 89, '50000', '50000', '', '<p>Bàn Cào Móng Giấy Cho Mèo + Tặng Kèm Cỏ Mèo (Catnip/Catmint)<br>✔️ Bao gồm: 1 bàn cào móng và 1 gói bột catpip.<br>✔️ Bàn cào móng được làm từ nhiều lớp giấy carton<br>✔️&nbsp;Chữ nhật: Dài 45 x Rộng 20 x Dày 2cm<br>✔️ Sử dụng bàn cào móng làm đồ chơi cho mèo, giúp mèo mài móng, giảm thiểu hư hại đồ đạc trong nhà.<br><br>ĐẶC ĐIỂM NỔI BẬT<br>- Đây là dụng cụ thích hợp để hướng cho chú mèo của bạn cào móng đúng chỗ. Chọn một dụng cụ cào móng với bề mặt thô nhám để mèo của bạn có thể cào và làm đẹp bộ móng bằng tất cả sự thích thú của bé cưng.<br>- Mèo thường sử dụng móng vuốt để cào đồ nội thất hoặc ghế sofa, khi có món đồ chơi dành riêng cho mèo chúng ta không cần lo lắng điều đó nữa.<br>- Cào móng cũng là một hình thức tập thể dục, tận hưởng khoảng thời gian thoải mái và thư giãn một cách đơn giản nhất.<br>- Bàn cào dành riêng cho các bé mèo dùng để cào móng, tránh hiện tượng phá phách, làm hư các đồ trong nhà.<br>- Giúp móng mèo luôn trong tình trạng tốt<br>- Chất liệu tự nhiên giúp móng mèo luôn chắc khỏe, luôn trong tình trạng tốt nhất.<br>- Giúp các bé giải toả căng thẳng, stress.<br>- Thiết kế dạng bàn hình chữ nhật giúp các bé dễ dàng cào hơn.<br>- Kích thước gọn gàng, nhẹ, dễ dàng di chuyển, dọn dẹp<br>- Ngoài ra có thể để bàn cào trên mặt phẳng để các bé nằm.<br><br>HDSD<br>✔️ Không phải tất cả mèo đều sử dụng đồ chơi cào móng ngay từ đầu, bạn có thể rắc catnip vào bàn cào, sau đó nâng cao bàn chân trước của mèo và đặt chúng vào bàn cào để tập cho mèo quen dần.<br>✔️ Có thể rắc thêm cỏ mèo (catnip/catmint) kích thích mèo chơi đùa nhiều hơn</p>', '21-08-24'),
(133, 2, 'Cần Câu Mèo Đính Chuông Lông Vũ', 80, '30000', '30000', '', '<p>Đồ chơi cần câu Mèo bằng thép gắn lông dành cho mèo<br>- Cần với chất liệu thép dẻo bền, có thể uốn cong mà không gây gãy<br>- Thép dẻo tạo độ chuyển động tự nhiên kích thích mèo của bạn chơi đùa vận động<br>- Đồ chơi cho mèo cần câu mèo có tác dụng kích thích vận động ở mèo, giúp chúng giải tỏa căng thẳng, mệt mỏi, từ đó<br>giúp phát triển sức khỏe cũng như não bộ.<br>- Đối với những chú mèo nghịch ngợm thì swing cat còn có sức hút kéo chúng khỏi việc cào cắn đồ đạc trong nhà<br><br>Kích thước:<br>- Chiều dài dây thép: 95cm<br>- Chiều dài phần mồi câu: 12cm<br>- Chất liệu: nhựa, sợi thép và lông nhân tạo.</p>', '21-08-24'),
(134, 1, 'Pate TƯƠI The Pet Cho Chó Mèo Biếng Ăn (1kg)  Ship Now/Grab 2H', 456, '100000', '100000', '15', '<p>Pate Tươi Cho Mèo Hỗn Hợp cho Chó Mèo Biếng Ăn được làm từ hỗn hợp cá biển và gan gà tươi nguyên chất thích hợp dùng cho Chó Mèo.<br><br>CHẤP HẾT TẤT CẢ MÈO BIẾNG ĂN, KHÓ ĂN, KÉN MỌI LOẠI THỨC ĂN.<br>???? 100% nguyên liệu tự nhiên, không độn rau củ, chứa độ ẩm &amp; đạm tự nhiên cao từ 60-84%.<br>???? Năng lượng cao hơn vượt trội so với các dòng sản phẩm khác trên thị trường (trung bình ở mức 400kcal/kg).<br>???? Công thức siêu cấp nước, giúp ngăn ngừa sỏi thận.<br>???? Với giá chỉ từ 8k/bữa ăn là Boss đã có được bữa ăn thơm ngon, tốt cho sức khỏe.<br>???? Chỉ cần bảo quản sản phẩm trong ngăn mát, không cần chế biến hay hâm nóng.<br><br>Paddy có sẵn có 2 mùi vị thơm ngon #BestSeller, hấp dẫn các bé kén ăn<br>✅ Hỗn Hợp Gà - cho Chó &amp; Mèo<br>✅ Hỗn Hợp Cá - cho Mèo<br>✅ Hỗn Hợp Gà - cho Chó &amp; Mèo</p><p>Khối lượng: hộp to 1kg</p>', '21-08-24'),
(135, 1, 'Pate Mèo Mọi Lứa Tuổi LaPaw 375g', 367, '40000', '40000', '15', '<p><strong>Pate Mèo Mọi Lứa Tuổi LaPaw 375g</strong></p><ul><li>Thương hiệu:&nbsp;<strong>LaPaw</strong></li><li>Phù hợp cho: Mèo mọi lứa tuổi&nbsp;(khuyên dùng trên 3 tháng tuổi)</li><li><strong>Pate mèo</strong>&nbsp;LaPaw là sản phẩm thức ăn cho mèo được sản xuất bởi thương hiệu LaPaw.&nbsp;Pate được chế biến từ nguyên liệu sạch, an toàn, cùng các vitamin và khoáng chất cần thiết cho sức khỏe của mèo. Sản phẩm có hương vị thơm ngon, kích thích vị giác của mèo, giúp mèo ăn ngon miệng hơn. Pate Lapaw&nbsp;đảm bảo cung cấp đầy đủ dinh dưỡng cho mèo mọi lứa tuổi.<br>&nbsp;</li></ul><p><strong>Lợi ích:</strong></p><ul><li>Cung cấp đầy đủ protein, chất béo, vitamin và khoáng chất cần thiết cho mèo.</li><li>Giúp mèo phát triển khỏe mạnh, lông mượt, da khỏe.</li><li>Tăng cường sức đề kháng, ngăn ngừa bệnh tật.</li><li>Hệ tiêu hóa khỏe mạnh, hấp thụ dinh dưỡng tốt.</li></ul><p><strong>Thành phần</strong></p><ul><li>Cá ngừ và cá hồi: Cá ngừ, cá ngừ, gan gà, dầu cá, nước tinh khiết, taurine, chiết xuất rong biển, vitamin (AD,3,E,B1,B2,B6,B12) noacin, sắt hữu cơ, đồng hữu cơ, kẽm hữu cơ, manga hữu cơ, selen hữu cơ iốt.</li><li>Bò và gà: Thịt bò, thịt gà, gan gà, dầu gà, nước tinh khiết, taurine, chiết xuất rong biển, vitamin (AD,3,E,B1,B2,B6,B12)</li><li>Gà tươi: Thịt gà, gan gà, tim gà, dầu gà, nước tinh khiết, taurine, vitamin (AD,3,E,B1,B2,B6,B12) noacin, sắt hữu cơ, đồng hữu cơ, kẽm hữu cơ, manga hữu cơ, selen hữu cơ iốt.</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Sử dụng tùy vào nhu cầu hoặc cân nặng của mèo. Có thể trộn với các thức ăn khác hoặc cho ăn trực tiếp.</li><li>Bảo quản: bảo quản ở nơi cao ráo, thoáng mát, tránh ánh nắng mặt trời. Khi mèo dùng không hết, các bạn bọc kín pate và bảo quản tủ lạnh tối đa 3 ngày và nhớ để ở nhiệt độ phòng cho pate bớt lạnh trước khi cho mèo dùng tiếp.</li></ul>', '21-08-24'),
(136, 1, 'Pate Mèo Meowow Súp Cá Ngừ Trắng Nguyên Miếng (Lon 80g)', 145, '25000', '25000', '15', '<p><strong>Pate MeoWow Cá Ngừ Trắng Cho Mèo Mọi Lứa Tuổi (Lon 80g)</strong></p><p>Cá ngừ thịt trắng đóng hộp Tuna White Meat là món ăn nhẹ giàu dinh dưỡng, hỗ trợ cho sự phát triển toàn diện của mèo, đồng thời được mix vị với nhiều loại thịt khác để tăng hàm lượng dinh dưỡng cũng như hương vị thơm ngon.</p><p>- Sử dụng thịt cá ngừ trắng tươi, miếng cá mềm, kích thước nhỏ vừa ăn. Các thành phần mix cùng như tôm tươi nguyên con, cá cơm sữa Nhật Bản, thịt cua, cá hồi nguyên thớ và gà xé sasami.</p><p>- Dành cho mọi lứa tuổi, kể cả mèo con, mèo lớn tuổi và mèo có hệ tiêu hóa nhạy cảm.</p><p>- Giàu DHA, omega-3, giúp mèo sáng mắt, mượt lông.</p><p>- Bổ sung taurin, tốt cho tim mạch và trí não.</p><p>- Cấp nước cho chế độ ăn hằng ngày, đặc biệt phù hợp với những chú mèo ít uống nước.</p><p>- Hộp nhôm hút chân không hiện đại, giữ sản phẩm tươi ngon.</p><p>Trong cá ngừ, thịt trắng là phần tinh túy, giàu dinh dưỡng và có nhiều lợi ích đặc biệt đối với sức khỏe và làm đẹp. Thịt trắng có nhiều lợi ích: giàu chất béo bão hòa không no - chất béo có lợi cho sức khỏe, dễ tiêu hóa và hấp thu, giúp cơ thể đào thải lượng cholesterol xấu, tốt cho tim mạch.</p><p>Cá ngừ trắng đóng hộp Tuna White Meat bổ sung những vitamin và khoáng chất thiết yếu mà bữa ăn hằng ngày có thể bị thiếu hụt. Sản phẩm hỗ trợ chăm sóc lông bóng mượt, giúp sáng mắt, giảm đổ ghèn, tăng cường trí não.</p><p>Cá ngừ cũng giúp tăng cường chức năng gan, ngừa thiếu máu, ngăn ngừa lão hóa và hỗ trợ chuyển hóa dinh dưỡng.</p>', '21-08-24'),
(137, 1, 'Pate Sheba Cho Mèo Con & Mèo Lớn 70g (Nhập Khẩu Thái Lan)', 234, '25000', '25000', '15', '<p>SHEBA - PATE NGÂM SỐT GIÀNH CHO MÈO CON VÀ MÈO TRƯỞNG THÀNH GÓI 70G<br>&nbsp;</p><p>Sheba có nhiều vị được làm từ cá ngừ, rau củ giúp bổ sung chất sơ và các loại vitamin cần thiết cho mèo với thành phần: Cá ngừ, Thịt gà, Bí đỏ, Cà rốt,...,<br><br>Paddy hiện có đầy đủ 9 hương vị của pate sheba:<br>1. Thịt gà băm nhuyễn giành cho mèo con<br>2. Thịt gà băm nhuyễn giành cho mèo lớn<br>3. Cá ngừ, Thịt gà, Cá bào<br>4. Cá ngừ<br>5. Cá ngừ, Bí đỏ, Cà rốt<br>6. Cá ngừ, Cá hồi<br>7. Cá ngừ, Cá tráp<br>8. Cá ngừ, Thanh cua<br>9. Cá ngừ, Thịt gà<br><br>Đóng gói: 70g<br>Xuất xứ: Thái Lan<br>Sản xuất: Mars</p>', '21-08-24'),
(138, 1, 'Pate Mèo Con Royal Canin Kitten Instinctive 85g', 467, '30000', '30000', '15', '<p>&nbsp;<strong>Pate Mèo Con Royal Canin Kitten Instinctive 85g</strong></p><ul><li>Thương hiệu: Royal Canin</li><li>Phù hợp cho: Mèo (mèo mẹ đang mang thai, cho con bú và mèo con đến 12 tháng tuổi)</li><li>Pate mèo con Royal Canin Kitten Instinctive là sản phẩm được thiết kế dành riêng cho mèo dưới 12 tháng tuổi. Pate Royal Canin Kitten Instinctive chứa các thành phần trích xuất thịt, sữa và các khoáng chất thiết yếu nhằm hỗ trợ tăng cường hệ thống miễn dịch cho mèo con, thúc đẩy chúng trưởng thành khỏe mạnh. Thức ăn cho mèo ROYAL CANIN được tạo ra với sự cân bằng tối ưu giữa các protein, chất béo và carbohydrate để tăng sự ngon miệng, bổ sung dinh dưỡng hoàn hảo. Pate mèo này còn phù hợp với mèo mẹ đang mang thai và trong giai đoạn cho con bú.</li></ul><p><strong>Lợi ích:</strong></p><ul><li>Hỗ trợ tăng cường hệ thống bài tiết khỏe mạnh.</li><li>Tăng cường hệ miễn dịch của mèo con trong giai đoạn thứ 2.</li><li>Với những mẩu thức ăn nhỏ giúp mèo con nhai dễ dàng.</li><li>Công thức được xây dựng và phát triển phù hợp với nhu cầu dinh dưỡng và hấp dẫn với mèo con.</li></ul><p><strong>Thành phần dinh dưỡng</strong></p><ul><li>Thành phần:&nbsp;Thịt và dẫn xuất từ thịt, protein thực vật, dẫn xuất từ thực vật, ngũ cốc, khoáng chất, dầu và chất béo, men, các loại đường.</li><li>Phụ gia dinh dưỡng: Vitamin D3, E1 (Sắt), E2 (I ốt), E4 (Đồng), E5 (Mangan), E6 (Kẽm).</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Dựa theo độ tuổi và cân nặng của mèo, cho ăn một lượng vừa đủ vào các giờ cố định.</li><li>Có thể trộn với các thức ăn khác hoặc cho ăn trực tiếp.</li><li>Bảo quản: bảo quản ở nơi cao ráo, thoáng mát, tránh ánh nắng mặt trời. Khi mèo dùng không hết, các bạn bọc kín pate và bảo quản tủ lạnh tối đa 3 ngày và nhớ để ở nhiệt độ phòng cho pate bớt lạnh trước khi cho mèo dùng tiếp.</li></ul><p>Lưu ý:<br>&nbsp;</p><ul><li>Không cho mèo ăn quá nhiều trong một lần.</li><li>Nên cho mèo ăn thức ăn chế biến riêng, không cho ăn thức ăn thừa của người. Vì thức ăn của người có nhiều thành phần khiến mèo bị rối loạn tiêu hóa, ảnh hưởng đến sức khỏe của mèo.</li></ul>', '21-08-24'),
(139, 4, 'Pate Mèo Teb Only Bổ Sung Dinh Dưỡng Lon 170g', 345, '35000', '35000', '', '<p><strong>Pate Mèo Teb Only Bổ Sung Dinh Dưỡng Lon 170g</strong></p><ul><li>Thương hiệu:&nbsp;Teb</li><li>Phù hợp cho: Mèo mọi lứa tuổi</li><li><p><strong>Pate mèo</strong>&nbsp;Teb Only Bổ Sung Dinh Dưỡng là thức ăn ướt cho mèo được làm từ nguyên liệu cao cấp, mang lại nguồn dinh dưỡng đầy đủ và cân bằng cho mèo ở mọi lứa tuổi.&nbsp;Sản phẩm có hương vị thơm ngon, kích thích vị giác của mèo,&nbsp;cho mèo nhà bạn bữa ăn bổ dưỡng và hỗ trợ giải quyết các vấn đề do thiếu hụt dưỡng chất, giúp phát triển toàn diện.</p><p>&nbsp;</p></li></ul><p><strong>Lợi ích:</strong></p><ul><li>Cung cấp nguồn năng lượng đầy đủ để tăng trưởng, phát triển</li><li>Cung cấp vitamin cho sự phát triển, trao đổi chất cần thiết</li><li>Cung cấp lợi khuẩn cần thiết, duy trì hệ vi sinh vật có lợi trong ruột, thúc đẩy sự phát triển của lợi khuẩn</li><li>Loại bỏ những vấn đề như chán ăn, tăng trưởng kém, viêm da, giảm thị lực do thiếu vitamin</li><li>Đáp ứng sự phát triển của mèo con, mèo đang mang thai, cho con bú</li></ul><p><strong>Thành phần dinh dưỡng</strong></p><ul><li>Cá mập, thịt nai, cá ngừ, cá hồi , Chondroitin, Taurine, Omega Ω3--6, vitamin, rong biển thiên nhiên, dầu cá...</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Có thể cho ăn trực tiếp và chỉ cần bổ sung thêm nước là có thể duy trì sức khỏe bình thường của thú cưng. Điều chỉnh liều lượng tùy theo độ tuổi, cân nặng và mức độ hoạt động của mèo nhà bạn</li><li>Bảo quản nhiệt độ phòng, để ngăn mát và dùng hết trong 48 tiếng sau khi mở nắp</li></ul>', '21-08-24'),
(140, 4, 'Hạt Whiskas Adult Cho Mèo Trưởng Thành', 345, '130000', '130000', '', '<p><strong>Hạt Whiskas cho mèo trưởng thành</strong></p><p>- Omega 3, 6 &amp; kẽm giúp bộ lông mềm mại, sáng bóng &amp; chắc khỏe.</p><p>- Vitamin A &amp; taurine giúp sáng mắt.</p><p>- Công thức dinh dưỡng hoàn chỉnh từ nguồn nguyên liệu thô chất lượng cao giúp bé phát triển toàn diện.</p><p>- Sản phẩm có 3 vị: Cá ngừ, Cá thu, Cá biển</p><p><strong>Quy cách:</strong> Túi 1.2kg</p><p><strong>Thương hiệu:</strong> Whiskas</p><p><strong>Loại:</strong> Thức ăn khô</p><p><strong>Xuất xứ:</strong> Thái lan</p>', '21-08-24'),
(141, 4, 'Thức Ăn Hạt Cho Mèo Sỏi Thận Royal Canin Urinary S/O', 142, '170000', '170000', '', '<p><strong>THỰC PHẨM ĐIỀU TRỊ ROYAL CANIN URINARY S/O</strong></p><p><strong>HỖ TRỢ MÈO BỊ SỎI THẬN&nbsp;</strong></p><p><strong>ROYAL CANIN Urinary S/O</strong>&nbsp;là thực phẩm chức năng được nghiên cứu để hỗ trợ cho sức khỏe đường tiết niệu và bàng quang ở mèo trưởng thành. Thực phẩm lợi tiểu cho mèo, giúp pha loãng các khoáng chất dư thừa có khả năng hình thành sỏi trong nước tiểu. Chỉ số RSS* thấp làm giảm nồng độ các ion hình thành sỏi. Công thức đặc biệt tạo ra môi trường bất lợi cho sự hình thành sỏi Struvite và Canxi oxalate. Dinh dưỡng đặc biệt với hàm lượng Magie thấp, ngăn ngừa sự kết tinh và thúc đẩy hòa tan sỏi Struvite. Giảm nguy cơ tái phát các vấn đề về đường tiết niệu ở mèo.</p><p>Kết hợp với Thức ăn ướt cho mèo bị sỏi thận&nbsp;để bổ sung đầy đủ dưỡng chất cho chú mèo của bạn.</p><p><strong>Chỉ định</strong></p><ul><li>Sỏi Struvite: Hòa tan sỏi Struvite và giảm nguy cơ tái phát.</li><li>Sỏi Canxi Oxalate: Giảm nguy cơ tái phát.</li></ul><p><strong>Chống chỉ định</strong></p><ul><li>Bệnh thận mạn tính (Chronic Kidney Disease/CKD).</li><li>Bệnh về tim mạch.</li><li>Sử dụng đồng thời với thuốc acid hóa nước tiểu.</li><li>Mèo con, mèo đang mang thai và cho con bú.</li></ul><p><strong>THÀNH PHẦN</strong></p><p><strong>Nguyên liệu</strong></p><p>Gạo, gluten lúa mì*, protein gia cầm, bột bắp, chất béo động vật, protein động vật, gluten bắp, khoáng chất, xơ thực vật, dầu cá, dầu đận nành, fructo-oligo-sacarit, chiết xuất cúc vạn thọ (nguồn lutein).</p><p>Phụ gia dinh dưỡng: Vitamin A, Vitamin D3, E1(Sắt), E2 (I ốt), E4 (Đồng), E5 (Mangan), E6 (Kẽm), E8 (Selen), Chất axit hóa nước tiểu: Canxi Sunfat (1.25%). Chất chống oxi hóa.</p><p>*L.I.P.: Protein có độ tiêu hóa cao.</p>', '21-08-24'),
(142, 4, 'Pate Mèo Kaniva Vitamin Ball Bổ Não Dưỡng Lông 70g', 147, '20000', '20000', '', '<p><strong>Pate Mèo Kaniva Vitamin Ball Bổ Não Dưỡng Lông 70g</strong></p><ul><li>Thương hiệu:&nbsp;<strong>Kaniva</strong></li><li>Phù hợp cho: Mèo mọi lứa tuổi</li><li><strong>Pate mèo</strong>&nbsp;Kaniva Vitamin Ball là thức ăn cho mèo hoàn chỉnh và cân bằng được công thức chế biến để đáp ứng nhu cầu dinh dưỡng của tất cả các giai đoạn của mèo. Nó được làm từ các nguồn protein chất lượng cao, bao gồm thịt gà, cá và trứng, và cũng được tăng cường vitamin và khoáng chất để hỗ trợ sức khỏe của mèo. Pate Mèo Kaniva Vitamin Ball cũng được làm từ hỗn hợp thành phần độc đáo giúp hỗ trợ hệ tiêu hóa, da và lông của mèo.</li></ul><p><strong>Lợi ích:</strong></p><ul><li>Vitamin B3, B6 và B9 giúp nuôi dưỡng thần kinh và trí não.</li><li>Tinh Dầu cá hồi ức chế viêm, tăng miễn dịch ở mèo.</li><li>Đặc biệt tốt cho các bé cơ địa da kém hay bị nấm da chữa lành tổn thương do nấm, phòng ngừa rụng lông, cải thiện lông dầy mượt.</li><li>Ngừa tăng cholesterol cao.</li><li>Tăng tỷ lệ chuyển hóa mỡ chống béo phì.</li><li>Tránh các bệnh liên quan đến sụn khớp.</li><li>Duy trì, hỗ trợ hoạt động của não bộ</li><li>Tăng tỷ lệ hấp thụ Canxi tối đa.</li></ul><p><strong>Thành phần</strong></p><ul><li>Thịt gà và cá ngừ, Trứng,&nbsp;Dầu cá hồi,&nbsp;Tinh dầu hoa anh thảo,&nbsp;Taurine,&nbsp;Vitamin và khoáng chất.</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Có thể cho ăn trực tiếp và chỉ cần bổ sung thêm nước là có thể duy trì sức khỏe bình thường của thú cưng. Điều chỉnh liều lượng tùy theo độ tuổi, cân nặng và mức độ hoạt động của mèo nhà bạn</li><li>Bảo quản nhiệt độ phòng, để ngăn mát và dùng hết trong 48 tiếng sau khi mở nắp</li></ul>', '21-08-24'),
(143, 4, 'Thức Ăn Hạt Cho Mèo Trưởng Thành Nuôi Trong Nhà Royal Canin Indoor 27', 456, '132000', '132000', '', '<p><strong>Thức Ăn Cho Mèo Trưởng Thành Royal Canin Indoor 27</strong></p><ul><li>Thương hiệu: <strong>Royal Canin</strong></li><li>Phù hợp cho: Mèo nhà trưởng thành (trên 12 tháng tuổi)</li><li><strong>Thức ăn cho mèo</strong> Royal Canin Indoor sẽ là sự lựa chọn phù hợp với bé cưng của bạn. Được thiết kế với mức độ calo vừa phải, hạt Royal Canin giúp mèo hạn chế tăng trọng lượng. Các sợi psyllium và các chất đạm dễ tiêu hóa có trong thức ăn cũng giúp loại bỏ búi lông trong bụng và giảm thiểu mùi hôi khó chịu trong hộp cát. Thức ăn Royal Canin với dạng hạt khô độc đáo còn giúp mèo giảm sự tích tụ của cao răng và mảng bám.</li></ul><p><strong>Lợi ích:</strong></p><ul><li>GIẢM MÙI HÔI CHẤT THẢI: Các protein làm tăng khả năng tiêu hóa các chất dinh dưỡng, đồng thời hỗ trợ duy trì sức khỏe hệ thống tiết niệu, giảm lượng phân (và mùi hôi của khay vệ sinh) ở mèo trưởng thành.</li><li>QUẢN LÝ CÂN NẶNG: Chế độ ăn kiêng với mức calo vừa phải, thích ứng với cường độ hoạt động thấp của mèo nhà, giúp giữ cân nặng ở mức lý tưởng.</li><li>ĐIỀU CHỈNH BÚI LÔNG: Giúp kích thích chuyển động của dạ dày, loại bỏ các sợi lông mèo nuốt vào bụng nhờ sự kết hợp của các chất xơ lên men và không lên men.&nbsp;</li></ul><p><strong>Thành phần</strong></p><ul><li>Thành phần: Bột gà, ngô, gạo nấu bia, gluten ngô, lúa mì, mỡ gà, gluten lúa mì, hương vị tự nhiên, gạo lứt, chất xơ đậu, trấu, bột củ cải khô, dầu thực vật, canxi sulfat, men khô chưng cất ngũ cốc, natri silico aluminate, dầu cá, chiết xuất hương thảo, được bảo quản bằng hỗn hợp tocopherols và axit xitric...</li></ul>', '21-08-24'),
(144, 4, 'Thức Ăn Hạt Cho Mèo Con Royal Canin Kitten 36', 452, '145000', '145000', '', '<ul><li>Thương hiệu:&nbsp;<strong>Royal Canin</strong></li><li>Phù hợp cho: Mèo&nbsp;con (từ 4 đến 12 tháng tuổi).</li><li><strong>Thức ăn cho mèo</strong>&nbsp;Royal Canin Kitten&nbsp;hỗ trợ sức khỏe của mèo con bằng việc cung cấp các chất dinh dưỡng chính xác dựa trên nghiên cứu của các nhà khoa học từ ROYAL CANIN. Trong giai đoạn tăng trưởng, hệ thống tiêu hóa của mèo con chưa phát triển đầy đủ, chính vì vậy ROYAL CANIN Kitten thúc đẩy sự cân bằng hệ vi sinh đường ruột, hỗ trợ sự phát triển khỏe mạnh.</li></ul><p><strong>Lợi ích:</strong></p><ul><li>Hỗ trợ quá trình tăng trưởng và phát triển toàn diện</li><li>Thúc đẩy phát triển xương và khớp</li><li>Giúp hệ tiêu hóa khỏe mạnh</li><li>Tăng cường sức đề kháng</li><li>Hạn chế mùi hôi phân</li></ul><p><strong>Thành phần</strong></p><ul><li>Protein gia cầm, gạo, protein thực vật*, chất béo động vật, bột bắp, protein động vật, bột lúa mì, gluten bắp,...</li></ul><p><strong>Hướng dẫn sử dụng</strong></p><ul><li>Chia làm 2-3 bữa/ngày</li><li>Lượng cho ăn hàng ngày được khuyến nghị (gam mỗi ngày) theo trọng lượng cơ thể (kg) và hình dáng của mèo.</li><li>Khẩu phần ăn hàng ngày có thể thay đổi liên quan đến nhiệt độ môi trường, lối sống của mèo (trong nhà-ngoài trời), tính khí và hoạt động của mèo.</li></ul>', '21-08-24'),
(145, 4, 'Hạt Cho Mèo Mọi Lứa Tuổi Catsrang', 130, '156000', '156000', '', '<ul><li>Với đặc tính dễ tiêu, hạt Catsrang giúp mèo đi phân rắn và giảm thiểu mùi hôi khó chịu.</li><li>Ngăn ngừa lông vón cục trong ruột mèo.</li><li>Hàm lượng dinh dưỡng cân bằng, catsrang phù hợp trong việc cải thiện da lông, phòng tránh bệnh quáng gà ở mèo.</li><li>Sử dụng protein cao cấp tốt cho hệ tiêu hóa.</li><li>Đặc biệt, sản phẩm không sử dụng chất bảo quản, chất kháng sinh, phẩm màu hay hương liệu nhân tạo khác.</li></ul>', '21-08-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) NOT NULL,
  `ma` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `dk_hoadon` int(11) DEFAULT NULL,
  `dk_soluong` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `time_start` varchar(30) NOT NULL,
  `time_end` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `ma`, `count`, `dk_hoadon`, `dk_soluong`, `discount`, `status`, `description`, `time_start`, `time_end`, `created_at`) VALUES
(9, 'aaa', 1231, 0, 0, 121, 2, '', '2024-08-26', '2024-08-30', '20-08-2024'),
(10, 'ADADASDASD', 123, 0, 0, 12, 1, '', '2024-08-19', '2024-08-23', '20-08-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher_users`
--

CREATE TABLE `voucher_users` (
  `id` int(10) NOT NULL,
  `count` int(50) NOT NULL,
  `status` int(5) NOT NULL,
  `id_voucher` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCus` (`idCus`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id_dichvu`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCat` (`idCat`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPro` (`idPro`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idNV`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idPro`),
  ADD KEY `id_danhmuc` (`idCat`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `voucher_users`
--
ALTER TABLE `voucher_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_voucher` (`id_voucher`),
  ADD KEY `id_cus` (`id_cus`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id_dichvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idNV` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `voucher_users`
--
ALTER TABLE `voucher_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`idCus`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `danhmuc` (`id_danhmuc`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD CONSTRAINT `image_products_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `product` (`idPro`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `danhmuc` (`id_danhmuc`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `voucher_users`
--
ALTER TABLE `voucher_users`
  ADD CONSTRAINT `voucher_users_ibfk_1` FOREIGN KEY (`id_voucher`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_users_ibfk_2` FOREIGN KEY (`id_cus`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
