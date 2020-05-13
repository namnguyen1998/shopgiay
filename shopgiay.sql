-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 04:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopgiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `tongtien` double NOT NULL,
  `tennguoinhan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `id_pttt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_sanpham`, `soluong`, `tongtien`, `tennguoinhan`, `sdt`, `diachi`, `ngaydat`, `id_pttt`) VALUES
(2, 19, 2, 100000000, 'Nguyễn Văn A', '123456', 'Quận 8, TPHCM', '2020-05-10', 3),
(3, 11, 3, 100000000, 'Trần Văn B', '123456', 'Quận 12, TPHCM', '2020-05-11', 5),
(4, 14, 2, 20000000, 'Bành Thị C', '123456', 'Quận 11, TPHCM', '2020-05-12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(11) NOT NULL,
  `tenchucvu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenchucvu`) VALUES
(1, 'admin'),
(2, 'nhanvien');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `id_chitietdh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `id_sp` int(11) NOT NULL,
  `ghichu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_trangthai` int(11) NOT NULL,
  `tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `id_chitietdh`, `ngaydat`, `id_sp`, `ghichu`, `id_trangthai`, `tongtien`) VALUES
(1, 2, '2020-05-10', 19, 'ABCDE', 1, 100000000),
(2, 3, '2020-05-11', 11, 'Giao trong ngày', 2, 100000000),
(3, 4, '2020-05-12', 14, 'Giao trễ 1 ngày ', 4, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `gioitinh`
--

CREATE TABLE `gioitinh` (
  `id` int(11) NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gioitinh`
--

INSERT INTO `gioitinh` (`id`, `gioitinh`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Cả 2');

-- --------------------------------------------------------

--
-- Table structure for table `hanggiay`
--

CREATE TABLE `hanggiay` (
  `id` int(11) NOT NULL,
  `tenhang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanggiay`
--

INSERT INTO `hanggiay` (`id`, `tenhang`, `hinh`, `trangthai`) VALUES
(9, 'Adidas', 'banner1.jpg', 0),
(10, 'Nike', 'banner4.jpg', 1),
(13, 'Gucci', 'guci.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `tenkhachhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` int(200) NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) NOT NULL,
  `tenloai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `tenloai`) VALUES
(5, 'Bóng Đá'),
(6, 'Bóng Rổ'),
(7, 'Bóng Chuyền'),
(8, 'Quần Vợt'),
(9, 'Chạy bộ'),
(10, 'Đi Chơi');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_chucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten`, `email`, `diachi`, `sdt`, `username`, `password`, `id_chucvu`) VALUES
(2, 'Tèo', 'teo@gmail.com', 'TPHCM', '123456', 'admin', 'admin', 1),
(3, 'Tí', 'ti@gmail.com', 'Hà Nội', '987654321', 'nhanvien', 'nhanvien', 2);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `id` int(11) NOT NULL,
  `tenpttt` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`id`, `tenpttt`) VALUES
(1, 'Tích hợp với cổng thanh toán PayPal'),
(2, 'Thanh toán bằng thẻ Visa/Master card'),
(3, 'Thanh toán bằng thẻ ngân hàng nội địa'),
(4, 'Thanh toán bằng internet Banking'),
(5, 'Chuyển khoản tại ATM'),
(6, 'Chuyển khoản tại quầy giao dịch ngân hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` longtext COLLATE utf8_unicode_ci NOT NULL,
  `giatien` int(11) NOT NULL,
  `giakm` double NOT NULL,
  `id_loaisp` int(11) NOT NULL,
  `id_hanggiay` int(11) NOT NULL,
  `id_gioitinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `hinh`, `mota`, `giatien`, `giakm`, `id_loaisp`, `id_hanggiay`, `id_gioitinh`) VALUES
(2, 'GIÀY BÓNG ĐÁ PREDATOR 20.3 FIRM GROUND', 'giaybongda.jpg', 'GIÀY BÓNG ĐÁ CỔ LỬNG GIÚP LÀM CHỦ CUỘC CHƠI TRÊN SÂN CỎ TỰ NHIÊN.\r\nBạn không hề chơi ăn gian. Bạn chỉ đang lách luật. Tìm kiếm lợi thế và thay đổi cục diện trận đấu với đôi giày adidas Predator hoàn toàn mới. Thân giày bằng vải dệt mềm mại với thiết kế cổ lửng giúp nâng đỡ vùng cổ chân. Vân nổi trên mũi giày tăng độ xoáy cho từng cú sút. Làm chủ thế trận với đôi giày bóng đá Predator 20.3 Firm Ground.', 2000000, 0, 5, 10, 1),
(3, 'GIÀY BÓNG ĐÁ X 19.3 TURF', 'bongda.jpg', 'GIÀY BÓNG ĐÁ NHẸ CHO TỐC ĐỘ TRÊN SÂN CỎ NHÂN TẠO.\r\nNhanh không còn tính bằng giây. Bứt tốc để ghi bàn. Tốc độ đã ăn sâu vào máu. Đôi giày bóng đá này chắp cánh cho bạn. Thân giày bằng vải lưới linh hoạt cho cảm giác chạm bóng tự nhiên. Thiết kế ôm sát và kiểu dáng cổ thấp giúp cố định bàn chân. Tăng tốc thần sầu với đôi giày bóng đá adidas X 19.3 Turf.', 1800000, 0, 5, 10, 1),
(4, 'GIÀY BÓNG ĐÁ COPA 20.3 FIRM GROUND', 'bongda1.jpg', 'GIÀY BÓNG ĐÁ BẰNG DA TĂNG CƯỜNG KHẢ NĂNG CHẠM BÓNG TRÊN SÂN CỎ TỰ NHIÊN.\r\nĐá hăng hơn, thắng lớn hơn. Yêu cầu nhiều hơn. Đường bóng xử lý. Đồng đội cùng chiến tuyến. Với đôi giày bóng đá này, cả hai đều được nâng tầm. Đường khâu ở mũi giày bằng da mềm giúp giữ bóng trong tầm kiểm soát. Má giày bằng vải lưới co giãn và lưỡi giày đơn tích hợp giúp cố định bàn chân khi bạn phô diễn kỹ thuật. Nâng tầm cuộc chơi với đôi giày bóng đá adidas Copa 20.3 Firm Ground.', 1, 0, 5, 10, 1),
(5, 'GIÀY BÓNG ĐÁ X 19.3 FIRM GROUND', 'bongda2.jpg', 'GIÀY BÓNG ĐÁ X 19.3 FIRM GROUND\r\nX không chỉ là một đôi giày. Nó còn là lời khẳng định tốc độ sẽ chọc thủng hàng phòng ngự đối phương, thay vì đi vào ngõ cụt. Hãy dừng lại nếu bạn không thể nỗ lực bứt tốc. Nhưng hãy đọc tiếp nếu bạn đã sẵn sàng bứt phá mọi giới hạn. Mẫu giày bóng đá này có thân trên bằng vải lưới siêu nhẹ mang đến sự thoải mái, cảm giác chạm bóng chân thực và tốc độ phi thường trong suốt trận đấu. Cổ giày thấp kết hợp hoàn hảo với kiểu dáng ôm chân vừa vặn để giữ thăng bằng cho bạn trong các pha bóng bùng nổ.', 1, 0, 5, 10, 1),
(6, 'PREDATOR 20.1 TR', 'bongda3.jpg', 'Predator 20 Mutator là phiên bản tiêu chuẩn dành cho thi đấu trên cỏ tự nhiên nên mọi cải tiến cũng được adidas tính toán kỹ để mang lại 100% lợi thế tối ưu cho người sử dụng. Đôi giày có cấu hình đế hai tấm giúp giảm trọng lượng và tạo thiết kế 360 độ để lớp da phần thân trên bao bọc toàn bộ phần dưới đế. Ngoài ra, thiết kế cổ giày cao co giãn ôm sát mắt cá giúp ổn định phần cổ chân. Bên trong giày là một lớp đệm Polyamide với khả năng hỗ trợ tốt nhất cho bàn chân khi chuyển động. ', 3, 0, 5, 10, 1),
(7, 'Nike - Giày đá banh nam nữ Legend 8 Academy Tf FW-AT06', 'bongda5.png', 'NĂNG LƯỢNG CHO SỰ BỨT PHÁ\r\nNhững mẫu giày dành cho sân cỏ được thiết kế cho các cú đánh mạnh mẽ, chính xác để giành chiến thắng trong các trận bóng. Các thiết kế lưỡi dao trên mu bàn chân tạo ra sự xoay tròn để điều khiển sự bay của quả bóng, trong khi cáp Flywire và bộ đệm linh hoạt cung cấp sự ổn định và lực kéo cần thiết để giải phóng bất cứ lúc nào.', 2, 0, 5, 9, 3),
(8, 'Nike Mercurial Vapor 13 Academy MDS TF CJ1306-703 Lemon Venom/Aurora/Black', 'bongda6.webp', 'Giày bóng đá chính hãng Nike Mercurial Vapor 13 Academy là dòng sản phẩm Mercurial Vapor thế hệ mới nhất đến từ Nike ra mắt vào đầu năm 2020.\r\n\r\nVới upper được làm từ chất liệu da tổng hợp giày bóng đá chính hãng Nike Mercurial Vapor 13 Academy TF sẽ đem lại trải nghiệm hoàn toàn mới trong mỗi trận đấu của bạn.\r\n\r\nForm giày khá ôm chân, phù hợp với các bạn có bàn chân thon, dài, chân bè sẽ hơi khó mang.\r\n\r\nLà dòng sản phẩm thiên hướng dành cho tốc độ và dứt điểm đó là lý do Mercurial Vapor thích hợp với các vị trí tấn công như tiền đạo, tiền vệ cánh.\r\n\r\nPhần đế Sockliner mềm và êm của giày bao bọc bàn chân vừa vặn, gọn gàng, trong khi đế ngoài bằng cao su với hình dạng chữ nhật cho khả năng bám sân cực “Khủng”', 2, 0, 5, 9, 1),
(9, 'GIÀY NIKE MERCURIAL 2019 ', 'bongro1.jpg', 'Đây là mẫu giày được thiết kế giành cho các cầu thủ có lối đá thiên về tốc độ và rê bóng lắt léo. Tốc độ và kỹ thuật là điểm mạnh của các cầu thủ khi thi đấu trên sân. \r\n\r\nDòng Mercurial thường có trọng lượng rất nhẹ. Với lớp da giày (upper) được xử lý làm mỏng nhất có thể. Mang đến cảm giác bóng chân thật nhất cho cầu thủ khi phải thường xuyên xử lý bóng ở cường độ cao, bứt tốc và di chuyển liên tục trên khắp các mặt sân. \r\n\r\nForm giày thon gọn và ôm chân để luôn đảm bảo được cảm giác với trái bóng cần thiết để cầu thủ có thể dễ dàng xử lý và điều khiển trái bóng đi theo ý muốn. \r\n\r\nPhần đế giày cũng được thiết kế để tối ưu từng bước di chuyển, chạy đà, tăng tốc và chuyển hướng đột ngột và biến những pha bóng tốc độ trở nên lắt léo hơn. ', 3, 0, 5, 9, 1),
(10, 'Giày bóng rổ nam chính hãng Adidas Pro Bounce 2018 AH2656', 'bongro.jpg', 'Giày bóng rổ Adidas Pro Bounce 2018 được trang bị một bộ đệm full-length Bounce, bộ upper phủ TPU và công nghệ ForgeFiber hỗ trợ người mang và tăng cường cố định (lockdown). Cùng wavebone dạng sóng, herringbone hình zigzag thì đường tròn là một trong những dạng vân đế bám tốt nhất. Pro Bounce sử dụng rất nhiều đường tròn giao nhau mang đến độ bám tốt cùng độ bền ổn định. Pro Bounce là một đôi giày gần như không tệ ở bất cứ một điểm nào cùng với một bộ khung chắc chắn cho tất cả các vị trí. Pro Bounce đang là một trong những lựa chọn đáng tiền nhất của năm', 2, 0, 6, 10, 2),
(11, 'Giày bóng rổ Adidas Dame 6 scarlet gold metallic EH1994', 'bongro1.jpg', 'Giày bóng rổ Adidas Dame 6 scarlet gold metallic EH1994 sở hữu kiểu dáng trẻ trung, năng động, cùng chất liệu cao cấp, bền bỉ hỗ trợ vận động tốt và định hình bàn chân. Với chất liệu chuyên dùng trong thiết kế thể thao, sản phẩm đem đến cho bạn cảm giác êm ái, dễ chịu khi di chuyển trong thời gian dài. Đồng hành cùng thiết kế thời trang, giày bóng rổ Adidas được sử dụng công nghệ thoáng khí, giúp cân bằng nhiệt và độ ẩm trong những điều kiện môi trường khác nhau, đế có tính năng chống trơn trượt. Sản phẩm mang phong cách hiện đại, khỏe khoắn và đường may tỉ mỉ, tinh tế. Người dùng có thể yên tâm về chất lượng sản phẩm. Màu sắc bắt mắt, cá tính phù hợp với nhiều lứa tuổi, dáng người và hoàn cảnh sử dụng: tập luyện thể thao, đi học, đi làm hay đi chơi....', 3, 0, 6, 10, 2),
(12, 'Giày bóng rổ chính hãng Adidas Pro Bounce Madness 2019 BB9239', 'bongro2.jpg', 'Giày bóng rổ chính hãng Adidas Pro Bounce Madness 2019 BB9239 - được trang bị một bộ đệm full-length Bounce, bộ upper phủ TPU và công nghệ ForgeFiber hỗ trợ người mang và tăng cường cố định (lockdown). Cùng wavebone dạng sóng, herringbone hình zigzag thì đường tròn là một trong những dạng vân đế bám tốt nhất. Pro Bounce sử dụng rất nhiều đường tròn giao nhau mang đến độ bám tốt cùng độ bền ổn định.Phần gót thì sử dụng một lượng Bounce dày gần gấp đôi mũi với khả năng chống shock trên cả tuyệt vời. Thiết kế gót dày, mũi mỏng mà vẫn êm này khiến Pro Bounce hợp cho hầu hết các vị trí. Sử dụng thiết kế outsole này Pro Bounce mang lại cảm giác rất mượt mà khi chạy trên hầu hết các góc độ. Support của giày Adidas Pro Bounce Madness 2019 đến từ lớp upper chắc chắn và cực kỳ ôm chân. Phần gót của Pro Bounce ôm trọn phần gót ngay từ lần đầu tiên xỏ giày vào. ', 2, 0, 6, 10, 2),
(13, 'Giày bóng rổ chính hãng Adidas L3xt L3v3l F36292', 'bongro3.jpg', 'Giày bóng rổ chính hãng Adidas L3xt L3v3l F36292 là mẫu giày bóng rổ không dây đầu tiên của nhà das, với các công nghệ khủng như bộ đệm Lightstrike, upper Primeknit. Được trang bị bọt Lightstrike mới của Adidas, bộ đệm N3xt L3v3l được thiết kế để cung cấp đệm đàn hồi sẽ kéo dài xuyên suốt cả trận đấu. Đệm giữa Lightstirke hoàn toàn mới mang đến sự thoải mái không ngừng nghỉ mà không làm tăng thêm trọng lượng cho đôi giày. Adidas N3xt L3v3l có đế ngoài họa tiết xương cá đầy hung hăng cung cấp độ bám trên sân ở một đẳng cấp cao. Đế ngoài xương cá cung cấp thêm độ bám khi thực hiện các pha dừng đột ngột và xoay trụ, bộ đế của N3xt l3v3l cũng rất bền khi chơi ngoài trời.\r\n\r\nGiày bóng rổ Adidas N3xt L3v3l tự hào với phần thân trên Primeknit không dây và công nghệ đệm giữa mới. Chất liệu mềm mại và trọng lượng nhẹ của nó khiến người chơi luôn cảm giác đôi chân bồng bềnh và thoải mái khó tả. Mặc dù không dây nhưng cấu trúc giày khiến nó vẫn giữ chân rất tốt, Bàn chân hầu như không bị xê dịch trong quá trình chơi bóng.  Nhẹ- êm- nảy- ôm chân- bền là những nhận xét có thể nói về L3xt L3v3l. “Chúng tôi làm mới hoàn toàn cách thức thiết kế của mình để những khách hàng, dù là vận động viên ở trường cấp hai hay tuyển thủ NBA đều cảm thấy thoải mái, đẹp mắt và tự tin với sản phẩm của adidas. Bộ sưu tập là kết quả của nhiều bộ óc thiên tài của công ty và các bên hợp tác” Giám đốc Cấp cao Ngành hàng giày dép của adidas Basketball chia sẻ. ', 5, 0, 6, 10, 2),
(14, 'Giày Nike Air Jordan Xanh Trắng', 'bongro4.jpg', 'Giày NIKE AIR JORDAN Xanh trắng\r\nBạn đã từng nghe qua cái tên Nike Air Jordan 1 Off White hay chưa? Trong thời gian này đây chính là mẫu giày cực hot và tạo nên luồng gió mới đến với tất cả mọi người. Là đứa con tinh thần của thương hiệu giày Nike, bất cứ ai trong mỗi chúng ta là người đam mê giày Sneaker hay là người bình thường đều biết đây chính là thương hiệu vô cùng phổ biến.\r\nNếu bạn đang băn khoăn và mất rất nhiều công sức, thời gian để tìm kiếm cho mình mẫu giày đẹp nhất nhưng vẫn chưa ưng ý. Câu trả lời hoàn hảo nhất dành cho tất cả mọi người đó chính là Nike Air Jordan 1 Off White.\r\nCó thể đây chính là gợi ý vô cùng thú vị giúp bạn có thể thay đổi phong cách, sự xuất hiện thật nổi bật đấy nhé! Nike Air Jordan 1 Off White với tông màu xanh da trời giúp chúng ta cảm nhận sức sống, trẻ trung và vô cùng năng động.', 3, 0, 6, 9, 2),
(15, 'Giày Nike Air Jordan 4 Black Yellow', 'bongro5.jpg', 'Giày Nike Air Jordan 4 Black Yellow\r\nThiết kế của giày Nike Air Jordan 4:\r\nChất liệu bề mặt vải dệt nhẹ nhàng, mềm mại và thoáng khí.\r\nMũi giày đầy đặn, form dáng chuẩn giúp bảo vệ đầu ngón chân khi hoạt động.\r\nHệ thống đệm bọt mang lại cảm giác thoải mái, nhẹ nhàng khi di chuyển.\r\nCổ giày thiết kế đơn giản, vừa vặn di chuyển dễ dàng, thoải mái.\r\nĐế bằng chất liệu cao su êm ái, độ bám tốt, chống trơn trượt.\r\nƯu điểm vượt trội của Nike Air Jordan 4 :\r\nChất liệu cao cấp rất mềm mại và êm ái, tạo cảm giác thoải mái cho từng bước đi. Phần đế làm bằng cao su tổng hợp với phần rãnh chống trơn trượt, đảm bảo sự an toàn cho người mang.\r\nKiểu dáng tinh tế, hợp xu hướng được thiết kế trẻ trung, là một thiết kế dành bạn, giày chú trọng phom dáng với từng đừơng, làm toát lên vẻ trẻ trung, thanh lịch. Đương may tỉ mỉ và đường keo dán chắc chắn và bền bỉ trong thời gian dài.\r\nSự kết hợp hoàn hảo với những bộ trang phục đủ mọi phong cách, Từ đồ dạo phố như jeans, quần lửng tới những bộ trang phục lịch sự như quần kaki và sơ mi thì đôi giày thể thao này đều “chiều chuộng” được hết.', 4, 0, 6, 9, 2),
(16, 'Nike LeBron Soldier 13 SFG Light Photo Blue Crimson AR4225-401', 'bongro6.jpg', 'Giày bóng rổ chính hãng Nike LeBron Soldier 13 SFG Blue Crimson AR4225-401 là một trong những phối màu tươi tắn và đẹp nhất của Soldier 13.\r\nLeBron Soldier 13  Blue Crimson có phần logo lebron được thêu nổi với viền vàng nổi bật trên màu xanh chủ đạo của đôi giày. Phần miếng dáng được thiết kế chắc chắn hơn các phiên bản tiền nhiệm với phần lockdown được bổ sung thêm.', 4, 0, 6, 9, 2),
(17, 'Giày nam adidas Gamecourt Wide Tennis Shoe', 'tennis.jpg', 'Adidas ltd AG là một thương hiệu thể thao nổi tiếng trên toàn thế giới mà ai ai cũng đã từng biết đến và nghe qua, là nhà sản xuất dụng cụ thể thao của Đức, một thành viên của Adidas Group, bao gồm cả công ty dụng cụ thể thao Reebok, công ty sản xuất bóng golf Maxfli và Adidas golf. Adidas là nhà sản xuất dụng cụ thể thao lớn thứ hai trên thế giới.\r\n\r\nCông ty được đặt theo tên của người sáng lập, , Adolf Dassler, năm 1948. Dassler đã sản xuất giày từ năm 1920 tại Herzogenaurach, gần Numberg, với sự giúp đỡ của người anh trai Rudolf Dassler, người mà sau đó đã thành lập công ty giày Puma.', 2, 0, 8, 10, 1),
(18, 'GIÀY QUẦN VỢT THẬP NIÊN 80', 'tennis1.jpg', 'GIÀY QUẦN VỢT THẬP NIÊN 80\r\nMẪU GIÀY MANG ĐẬM PHONG CÁCH LẤY CẢM HỨNG TỪ MÔN QUẦN VỢT.\r\nTôn vinh các huyền thoại trong quá khứ, mẫu giày này mang phong cách quần vợt cổ điển đến với ngày nay. Thân giày làm bằng chất liệu giả da mượt mà. Miếng lót giày siêu mềm bổ sung lớp đệm nhẹ nhàng.', 1, 0, 8, 10, 1),
(19, 'Adidas Barricade', 'tennis2.jpg', 'Trên phiên bản 2018, dòng giày tennis Barricade huyền thoại của Adidas đi kèm với một loạt các điều chỉnh giúp định vị chúng hơn bao giờ hết trên địa hình cao cấp dành cho người chơi chuyên nghiệp. Với độ bền cao và thiết kế sáng tạo, những đôi giày này sẽ là sự lựa chọn của bạn để thống trị đường đua và đánh bại các đối thủ của bạn.\r\n\r\nThiết kế nổi bật của Barricade tập trung vào sự ổn định và hỗ trợ tuyệt vời ở khu vực giữa chân nhờ phần trên Forgedmesh liền mạch. Với một cốt thép tổng hợp kéo dài từ vòm chân đến gót chân, cũng như một ngón chân đúc được đúc ở bàn chân trước, Barricade đã tăng khả năng chống mòn để chịu được cả phục vụ và bóng chuyền. Ngoài ra, thiết kế Geofit giữ cho bàn chân của bạn được điều chỉnh an toàn và trơn tru mọi lúc nhờ vào lỗ gắn mu bàn chân được gia cố và đóng ren giải phẫu.\r\n\r\nĐế giữa của Barricade được sản xuất với công nghệ Adiprene +, cung cấp khả năng đệm và hấp thụ tuyệt vời ở vùng gót chân để mang lại sự ổn định hơn và giảm căng thẳng cho gân Achilles trong những động tác mạnh mẽ nhất. Một đế ngoài 6 lớp được thiết kế riêng giúp giảm độ mòn, tăng độ bền cho giày.\r\n\r\nĐược chế tạo để mang đến mức độ hiệu suất theo yêu cầu của những người chơi chuyên nghiệp, những đôi giày tennis Jun Jun này có phần lưới thoáng khí và đế ngoài bền.', 1, 0, 8, 10, 1),
(20, 'GIÀY TENNIS ADIDAS SOLE MATCH BOUNCE G26602', 'tennis3.jpg', 'Giày tennis adidas Sole Match Bounce G26602 - Sản phẩm tầm trung thay thế adidas Barricade \r\nLà mẫu giày tầm trung với mức giá thân thiện hơn so với adidas Barricade, Giày tennis adidas Sole Match Bounce hứa hẹn sẽ là một lựa chọn đáng tiền bởi các công nghệ và giá thành cực hợp lý.', 3, 0, 8, 10, 1),
(21, 'GIÀY TENNIS NIKE COURT AIR ZOOM VAPOR CAGE 4 - CD0424-003', 'tennis4.jpg', 'Giày tennis Nike Air Zoom Vapor Cage 4 - CD0424-003 - \"Quái Vật\" cuối sân phiên bản 4.0\r\n\r\nNếu bạn đang tìm kiếm đôi giày đáp ứng nhu cầu của 1 bộ chân linh hoạt của bạn và giúp bạn dẫn đầu trong việc cứu bóng, thì Giày tennis Nike Air Zoom Vapor Cage 4 là dành cho bạn. ', 3, 0, 8, 9, 1),
(22, 'GIÀY TENNIS NIKE AIR ZOOM VAPOR X KNIT AR0496-002', 'tennis5.jpg', 'Giày Tennis Nike Air Zoom Vapor X Knit  AR0496-002 - mẫu giày tốc độ nhất của Nike nay sẽ còn nhẹ và nhanh hơn \r\n\r\nLà sản phẩm cao cấp nhất của Nike tennis với tông màu đen vàng sang trọng và lịch lãm, đây hứa hẹn sẽ là bản nâng cấp hiệu quả cao của giày tennis Nike Air Zoom Vapor X .', 3, 0, 8, 9, 3),
(23, 'GIÀY TENNIS NIKE AIR ZOOM ZERO AA8018-105', 'tennis6.jpg', 'Nike zoom zero\r\n\r\nCuộc cách mạng trong công nghiệp giày tennis\r\n\r\nLần đầu tiên trong lịch sử giày có một mẫu giày tennis mà gần như không có sự khách biệt quá nhiều so với giày chạy bộ. Với form đế thiết kế kiểu bập bênh, vuốt cao mũi và cả gót giày, hứa hẹn sẽ mang đến khả năng di chuyển tiến / lùi một cách trơn tru mượt mà. Điều này có ý nghĩa gì ?\r\n\r\nCó nghĩa là đôi giày tennis sẽ trở nên rất nhanh nhẹn, cho sức bật vọt cao, nhưng liệu sự chắc chắn và bền bỉ liệu có đạt yêu cầu ?\r\n\r\nCâu trả lời là CÓ. Với mặt đế tiếp đất toàn bộ được bê toàn bộ từ Nike Vapor X sang, Zoom Zero vẫn sẽ bám sàn và linh hoạt khi thay đổi hướng đột ngột. bên trong đế là bộ đệm khí AIR Zoom dài từ mũi chân xuống gót chân, đêm lại độ đàn hồi cực cao, được bọc bên trong lớp đệm Phylon với kết cấu ôm lõm tràn từ dưới lên đến gần mắt cá chân, tạo ra điểm tựa vô cùng vững chắc.\r\n\r\nThân giày 2 lớp với kết cấu của lớp bên trong sử dụng kết cấu trong giày bóng đá, cho độ ôm khít đảm bảo an toàn tối đa mà vẫn thoải mái vận động và cảm nhận. Lớp bên ngoài được bao phủ bằng cao su tại các vị trí thường xuyên phải chịu mài mòn trong tennis, đảm bảo được sự chắc chắn tối đa cho người chơi.', 2, 0, 8, 9, 3),
(24, 'GIÀY TENNIS NIKE AIR ZOOM VAPOR X CRIMSON/WHITE AA8030-600', 'tennis7.jpg', 'Nike Vapor Tour X - 7 năm cho một sự chuyển mình!\r\n\r\nThiết kế hoàn toàn mới dựa theo những bước di chuyển của huyền thoại Roger Federer, phiên bản X (10) của dòng Vapor được tút lại GỌN hơn, NHẸ hơn nhằm tối đa sự LINH HOẠT của đôi chân mà không hề làm mất đi sự MẠNH MẼ vốn có cửa thế hệ trước.\r\n\r\nNike chính thức chia tay 2 phiên bản 9 (đã ra đời từ cuối 2011) và phiên bản 9.5 (cuối 2013) để sản xuất Vapor Tour X với :\r\n\r\n- Mặt đế hoàn toàn mới bám và linh hoạt hơn.\r\n- Thân giày tối ưu với bộ khung ôm về phá sau, hạn chế chấn thương tốt hơn.\r\n- Mũi giày gọn và nhẹ nhàng hơn cho nhưng pha split step và bứt tốc nhanh nhẹn.', 2, 0, 8, 9, 3),
(25, 'GIÀY ALPHABOOST', 'run.jpg', 'GIÀY ALPHABOOST\r\nMẪU GIÀY CHẠY ĐƯỢC THIẾT KẾ ĐỂ TĂNG TỐC ĐỘ, SỨC MẠNH VÀ SỰ LINH HOẠT.\r\nVới thiết kế chuyên dùng cho các vận động viên muốn nâng cao kỹ năng, đôi giày chạy bộ dành cho nam này là lựa chọn lý tượng cho các bài tập nặng và rèn luyện tốc độ. Lớp đệm mật độ kép và các tấm ổn định tăng cường khả năng nâng đỡ cho đế giữa để tăng khả năng kiểm soát trong các động tác đa hướng. Thân giày trên nhẹ và thoáng khí giúp nâng đỡ bàn chân những khi bạn cần nhất.', 3, 0, 9, 10, 3),
(26, 'GIÀY ULTRABOOST SUMMER.RDY', 'run1.jpg', 'GIÀY ULTRABOOST SUMMER.RDY\r\nGIÀY CHẠY BỘ HIỆU NĂNG CAO DÀNH CHO NGÀY NÓNG.\r\nKhông thể chờ đến lúc trời mát hơn mới bắt đầu chạy bộ. Đừng đợi đến tận khi mây mù kéo đến, trời chuyển cơn mưa hay bắt đầu nổi gió. Khi trời nắng nóng không hồi kết, đôi giày chạy bộ này là lựa chọn hàng đầu dành cho bạn. Thân giày bằng vải dệt kim làm từ sợi monofilament nhẹ và thoáng khí có các mảng trong suốt như cửa sổ mở đón gió mát. Bên dưới lớp đệm đàn hồi là đế ngoài trong suốt càng tăng thêm cảm giác mát lạnh.', 5, 0, 9, 10, 3),
(27, 'ULTRABOOST', 'run2.jpg', 'GIÀY CHẠY BỘ HIỆU NĂNG CAO DÀNH CHO NGÀY NÓNG.\r\nKhông thể chờ đến lúc trời mát hơn mới bắt đầu chạy bộ. Đừng đợi đến tận khi mây mù kéo đến, trời chuyển cơn mưa hay bắt đầu nổi gió. Khi trời nắng nóng không hồi kết, đôi giày chạy bộ này là lựa chọn hàng đầu dành cho bạn. Thân giày bằng vải dệt kim làm từ sợi monofilament nhẹ và thoáng khí có các mảng trong suốt như cửa sổ mở đón gió mát. Bên dưới lớp đệm đàn hồi là đế ngoài trong suốt càng tăng thêm cảm giác mát lạnh.', 4, 0, 9, 10, 3),
(28, 'GIÀY SENSEBOUNCE + ACE\r\n', 'run3.jpg', 'GIÀY SENSEBOUNCE + ACE\r\nGIÀY CHẠY BỘ CHẮC CHẮN, ÔM KHÍT CHÂN NHƯ TẤT.\r\nDâng tràn cảm hứng mỗi ngày khi chạy bộ trong thành phố. Đôi giày adidas này có thân giày bằng vải dệt thoáng khí và lớp đệm linh hoạt cho độ ôm chắc chắn và cảm giác gần sát mặt đất. Mũi giày bản rộng tạo độ nâng đỡ khi đổi hướng gấp.', 2, 0, 9, 10, 3),
(29, 'NIKE ODYSSEY REACT FLYKNIT 2 – INDIGO FORCE/ WHITE/ BLUE- AH1016-400\r\n', 'run4.jpg', 'Giày chạy bộ Nike Odyssey react Flyknit 2, mã sản phẩm AH1016-400, hàng chính hãng. Thỏa đam mê, tràn cảm hứng với giày thể thao, chạy bộ cao cấp Nike Odyssey React Flyknit 2. Mẫu giày thể thao cao cấp, công nghệ đế React cực êm của Nike. Nike odyssey react flyknit 2 là sự kết hợp hoàn hảo giữa kết và trọng lượng cực nhẹ của sợi Flyknit và vật liệu da tổng hợp.\r\nĐế React đã chiếm trọn tình cảm của hàng triệu runner khắp thế giới ngay từ ngày đầu ra mắt. có khả năng đáp ứng yêu chạy chạy bộ cự ly lên tới 42km !\r\n\r\nĐặc điểm nổi bật:\r\n\r\nSử dụng đa mục đích: thời trang, chạy bộ, casual đều rất OK\r\nThiết kế sành điệu, khỏe khoắn, dễ phối đồ\r\nNhiều màu sắc để lựa chọn\r\nĐế React cực êm, có thể đi cả ngày không bị vấn đề gì\r\nVật liệu flyknit cực kỳ nhẹ và chắc chắn\r\nDễ dàng break-in', 1, 0, 9, 9, 3),
(30, 'NIKE EXP-X14 – BLACK/ VOLT/ TOTAL CRIMSON – AO1554-001\r\n', 'run5.jpg', 'Giày thể thao Nike EXP-X14 là phiên bản mới nhất trong danh sách những đôi giày LifeStyle sneaker của Nike.\r\n\r\nĐược thiết kế mang những công nghệ của giày chạy (running shoes) áp dụng cho một đôi giày sportwear, Nike EXP-X14 sở hữu đế mid-sole react, kiểu dáng thiết kế bắt mắt, đẹp, hiện đại và trẻ trung.\r\n\r\nGiày Nike EXP-X14 là phiên bản remake của mẫu giày huyền thoại Nike Zoom Drive từ cuối những năm 90 và đầu những năm 2000, Nike vẫn đem lại thiết kế khá tương đồng của mẫu Zoom Drive, đặc biệt là phần upper nhìn không thể lẫn đi đâu được.', 3, 0, 9, 9, 3),
(31, 'NIKE FREE RN- WHITE/ BLACK 942836-100\r\n', 'run6.jpg', 'Giày chạy bộ Nike Free Run 2018 là phiên bản mới nhất của dòng giày chạy huyền thoại Nike Free, Giày Nike Free RN thay thế cho các dòng Nike Free 3.0, 4.0 và 5.0 huyền thoại. Kiểu đế mới cải tiến vẫn đảm bảo sự linh hoạt đặc trưng của dòng giày Nike Free và đem lại những trải nghiệm tuyệt vời hơn nữa.\r\n\r\nGiày chạy bộ Nike Free Run chính hãng, giày thể thao chính hãng, giày chạy bộ Nike Free Run, thế hệ tiếp theo của dòng giày chạy bộ Nike Free 3.0, 4.0, 5.0 đã quá quen thuộc và được ưa chuộng. Giày Nike Free RN phối màu đen, trắng classic kinh điển, mã sản phẩm: 942836-100, hàng chính hãng.\r\nNike Free RN được phát triển dựa trên nền tảng của dòng giày đi bộ, giày thể thao Nike Free trứ danh, với đặc điểm là đôi giày trọng lượng nhẹ, linh hoạt và phổ thông nhất. Giày chạy bộ Nike Free RN được thiết kế thừa hưởng những đặc trưng của thế hệ trước, và được cải tiến nhiều chi tiết, dựa trên các nghiên cứu về độ dãn nở của bàn chân cũng như những ảnh hưởng về lực tác động lên bàn chân khi chạy.\r\n\r\nĐiểm đáng chú ý nhất của Nike Free RN chính là ở bộ phận đế trong (midsole), đây là chi tiết được cải tiến nhiều nhất trên cơ sở những nghiên cứu và khắc phục những nhược điểm của dòng giày Nike Free thế hệ trước. Nike đã thiết kế kiểu đế mới có khả năng co dãn và dày hơn ở những điểm chịu nhiều lực khi chạy.\r\n\r\nPhần đế hình sao cũng là một cải tiến đáng kể so với thế hệ trước, đế hình sao giúp tăng tính ổn định và giữ form giày tốt hơn so với hệ thống đế hình lục giác ghép miếng đời trước, đồng thời vẫn đảm bảo sự linh hoạt và thoải mái nhất đặc trưng của dòng giày Nike Free.\r\n\r\nUpper của giày Nike Free RN vẫn được sử dụng chất liệu mesh cao cấp đảm bảo thông thoáng tuyệt đối, kết hợp với sự hỗ trợ của flywire dọc thân giày giúp tăng độ vừa vặn và ổn định khi đeo.', 2, 0, 9, 9, 3),
(32, 'NIKE AIR ZOOM PEGASUS 35 SHIELD- OLIVE FLAK/ METALLIC SILVER/ BLACK STRING AA1643-300\r\n', 'run7.jpg', 'Thế hệ mới nhất của dòng giày chạy bộ huyền thoại Nike Pegasus. Giày thể thao Nike Pegasus 35 Shield, mã sản phẩm:AA1643-300, mang thiết kế hoàn toàn mới mẻ, đầy hiện đại và thời trang hơn rất nhiều so với các thế hệ trước. Giày thể thao, chạy bộ Nike Pegasus 35 xứng đáng là sự lựa chọn của các runner hay các tín đồ thời trang thể thao bởi sự mạnh mẽ, hiện đại trong thiết kế và ưu điểm vượt trội của công nghệ Nike zoom Air độc quyền.\r\n\r\nGiày chạy bộ Nike pegasus 35, giày thể thao Nike pegasus 35, mã sản phẩm AA1643-300, Hàng chính hãng. Giày Nike chính hãng. \r\n\r\nPhiển bản đặc biệt Nike Air Zoom Pegasus 35 Shield, được thiết kế với khả năng chống nước, mặt đế siêu bám. Giúp các Runner tự tin chạy trong mọi điều kiện thời tiết.\r\n\r\nNike pegasus 35 là thế hệ mới nhất trong dòng giày chạy bộ chủ lực pegasus của Nike. Ở phiên bản này, Nike đã mang đến một thiết kế, diện mạo hoàn toàn mới mẻ, khác biệt so với các thế hệ giày thể thao Nike pegasus đàn anh trước đó.\r\nDù là một runner chuyên nghiệp hay một tín đồ thời trang thể thao, ưa thích những đôi giày thể thao chính hãng Nike thì đôi giày Nike pegasus 35 đều không làm bạn thất vọng. Với thiết kế mới mẻ, kiểu dáng hiện đại, giày chạy bộ Nike Pegasus 35 đều cực kỳ phù hợp cho nhiều mục đích khác nhau.\r\n\r\nĐặc điểm nổi bật:\r\n\r\nĐệm Nike Zoom Air nguyên khối full từ gót đến mũi, cực êm, hỗ trợ chạy đường dài và trợ lực cực tốt\r\nUpper Engineered mesh thông thoáng và mềm mại, hỗ trợ chống thấm nước. \r\nSợi Flyknit ngầm bên trong thân giày đảm bảo độ ổn định, hỗ trợ fit chân đồng thời làm giảm bớt trọng lượng giày\r\nThiết kế gót kiểu mới, giúp tránh bị cọ sát với gót chân\r\nForm giày trung bình, dễ đi\r\nĐế cao su giúp bám đường kể cả mặt đường cứng hay trơn \r\nKiểu dáng thiết kế hiện đại, thời trang, phù hợp đi chơi hay chạy đều được\r\nTrọng lượng cực nhẹ', 4, 0, 9, 9, 3),
(33, 'GIÀY OZWEEGO\r\n', 'choi.jpg', 'GIÀY OZWEEGO\r\nĐÔI GIÀY HIỆN ĐẠI LẤY CẢM HỨNG TỪ MỘT DÒNG GIÀY CHẠY BỘ ADIDAS THẬP NIÊN 1990.\r\nPhong cách thập niên 90 mới chỉ là điểm khởi đầu. Đôi giày OZWEEGO này sáng tạo mới mẻ dựa trên thiết kế adidas hoài cổ. Thân giày ôm chân như một đôi tất cho cảm giác ôm sát thoải mái. Các chi tiết dạng ống trên gót giày mang đến phong cách hoài cổ lai công nghệ đúng chất.', 3, 0, 10, 10, 3),
(34, 'GIÀY ZX TORSION\r\n', 'choi1.jpg', 'GIÀY ZX TORSION\r\nĐÔI GIÀY KẾT HỢP GIỮA PHONG CÁCH GIÀY ZX HOÀI CỔ VÀ CÔNG NGHỆ TIÊN TIẾN.\r\nHơi hướng thập niên 80 của giày ZX kết hợp với phong cách thập niên 90 của giày Torsion X. Đôi giày vượt thời gian này xuất sắc hơn cả hai mẫu giày tiền nhiệm cộng lại. Đôi giày này tiếp nối di sản giày chạy bộ của adidas khi kết hợp lớp đệm hoàn trả năng lượng với thanh hình chữ X giúp tăng cường độ ổn định. Thân giày bằng vải lưới có các chi tiết bằng da lộn mềm mại cùng mác Torsion lớn nổi bật trên lưỡi gà chần bông. Móc khóa đi kèm có thêm miếng trang trí dây giày cho bạn thay đổi tùy ý.', 3, 0, 10, 10, 3),
(35, 'GIÀY NITE JOGGER\r\n', 'choi2.jpg', 'GIÀY NITE JOGGER\r\nĐÔI GIÀY HOÀI CỔ MANG CẢM HỨNG GIÀY CHẠY BỘ VỚI CÁC CHI TIẾT PHẢN QUANG.\r\nSớm tinh mơ hay đêm tối muộn nơi thành phố không bao giờ ngủ. Mỗi chúng ta đều có nhịp điệu của riêng mình. Thập niên 80 chứng kiến sự ra đời của đôi giày adidas Nite Jogger đột phá giúp mọi người tìm ra nhịp sống cho bản thân bất kể thời khắc trong ngày. Đôi giày phản quang đầu tiên giúp người chạy luôn tỏa sáng khi khám phá đường phố. Nay đã trở lại với cùng tư tưởng trên. Nhưng không còn đơn thuần là giày chạy bộ nữa. Chỉ cần niềm đam mê khám phá đầy sáng tạo.', 3, 0, 10, 10, 3),
(36, 'LXCON', 'choi3.jpg', 'GIÀY LXCON\r\nPHIÊN BẢN TỪ TƯƠNG LAI CỦA ĐÔI GIÀY CHẠY THẬP NIÊN 90.\r\nLấy cảm hứng từ đôi giày chạy bộ kinh điển của năm 1994, mẫui giày này là phiên bản mới mẻ của một phong cách đỉnh cao trong quá khứ. Đế giữa cao và nổi bật đậm chất thập niên 90. Thân giày bằng vải dệt kim thoáng khí, ôm nhẹ lấy chân tạo cảm giác nhẹ nhàng và mềm mại. Lớp đệm Adiprene cho cảm giác chạy êm ái.', 3, 0, 10, 10, 3),
(37, 'Nike Air Max 90 Leather', 'choi4.jpg', 'Giày Nike Air Max 90 Leather dành cho trẻ em có lớp da phía trên và một đơn vị Max Air có thể nhìn thấy ở gót chân cho độ bền và lớp đệm nổi bật.', 2, 0, 10, 9, 3),
(38, 'Jordan Delta', 'choi5.jpg', 'Đồng bằng Jordan làm chủ nghệ thuật tiếp cận với một thiết kế biểu cảm và thoải mái từ trong ra ngoài. Được làm từ hỗn hợp các vật liệu công nghệ cao và tự nhiên, đôi giày này có lớp lót dưới chân sang trọng, nhẹ. Nó được chế tạo tỉ mỉ cho một cái nhìn và cảm nhận chỉ Jordan Brand có thể cung cấp.', 3, 0, 10, 9, 3),
(39, 'Nike Air Force', 'choi6.jpg', 'Huyền thoại sống trong Nike Air Force 1 \'07 hiện đại mang trên mình chiếc AF1 mang tính biểu tượng pha trộn phong cách cổ điển với các chi tiết ngọt ngào. Một biểu tượng thẻ khâu chạy dọc lưỡi trong khi thương hiệu quá mức trong suốt củng cố di sản Nike.', 3, 0, 10, 9, 3),
(40, 'Nike Air VaporMax 360', 'choi7.jpg', 'Lấy cảm hứng từ những đôi giày chạy bộ di sản như Air Max 360 năm 2006, Nike Air VaporMax 360 tái hiện lại Air có chiều dài đầy đủ với thiết kế nhẹ hơn, linh hoạt hơn. Midsole bọt dài đầy đủ làm tăng sự thoải mái trong khi màu sắc đậm tạo ra một cái nhìn tươi mới, hiện đại.', 6, 0, 10, 9, 3),
(41, 'GUCCI\r\nAce bee-embroidered low-top leather trainers', 'guci.jpg', 'Gucci mang đến cho phong cách low-top trắng cổ điển một bản cập nhật tối đa với những huấn luyện viên da Ace này. Được nâng cao ở hai bên với các tấm Web dệt màu xanh lá cây và đỏ, cặp đôi này có thêu hình con ong bằng vàng kim loại - một biểu tượng đặc trưng cho ngôi nhà Ý. Đội chúng với các bản in tách để tạo ảnh hưởng', 9, 0, 10, 13, 3),
(42, 'GUCCI\r\nFlashtrek leather trainers', 'guci1.jpg', 'Gucci lấy cảm hứng từ những đôi giày đi bộ đường dài cho các huấn luyện viên Flashtrek toàn màu trắng của mình, được hoàn thiện với móc ren kim loại tông màu bạc và một tab gót grosgrain màu hồng và xám. Họ làm thủ công ở Ý từ sự kết hợp của da, vải kỹ thuật và da lộn, và được đặt trên đế cao su chunky. Đội chúng với một chiếc áo trùm đầu và váy xếp li cho một chỉnh sửa cao-thấp chưa được chỉnh sửa.', 16, 0, 10, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_giay` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `url`) VALUES
(1, 'slide1.jpg'),
(2, 'slide2.jpg'),
(3, 'slide3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tonkho`
--

CREATE TABLE `tonkho` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tongsp` int(11) NOT NULL,
  `sl_nhap` int(11) NOT NULL,
  `sl_xuat` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `ngay_xuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tonkho`
--

INSERT INTO `tonkho` (`id`, `id_sp`, `tongsp`, `sl_nhap`, `sl_xuat`, `ngay_nhap`, `ngay_xuat`) VALUES
(2, 19, 100, 50, 10, '2020-05-10', '2020-05-11'),
(3, 14, 90, 10, 20, '2020-05-10', '2020-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `id` int(11) NOT NULL,
  `tentrangthai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trangthaidonhang`
--

INSERT INTO `trangthaidonhang` (`id`, `tentrangthai`) VALUES
(1, 'đang xử lý'),
(2, 'đang vận chuyển'),
(3, 'đã giao'),
(4, 'hủy đơn hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_chitietdonhang_phuongthucthanhtoan` (`id_pttt`),
  ADD KEY `FK_chitietdonhang_sanpham` (`id_sanpham`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_donhang_chitietdonhang` (`id_chitietdh`),
  ADD KEY `FK_donhang_trangthaidonhang` (`id_trangthai`),
  ADD KEY `FK_donhang_sanpham` (`id_sp`);

--
-- Indexes for table `gioitinh`
--
ALTER TABLE `gioitinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hanggiay`
--
ALTER TABLE `hanggiay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_nhanvien_chucvu` (`id_chucvu`);

--
-- Indexes for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sanpham` (`id_loaisp`),
  ADD KEY `FK_sanpham_hanggiay` (`id_hanggiay`),
  ADD KEY `FK_sanpham_gioitinh` (`id_gioitinh`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD KEY `FK_size_sanpham` (`id_giay`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tonkho`
--
ALTER TABLE `tonkho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tonkho_sanpham` (`id_sp`);

--
-- Indexes for table `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gioitinh`
--
ALTER TABLE `gioitinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hanggiay`
--
ALTER TABLE `hanggiay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tonkho`
--
ALTER TABLE `tonkho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_chitietdonhang_phuongthucthanhtoan` FOREIGN KEY (`id_pttt`) REFERENCES `phuongthucthanhtoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietdonhang_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_donhang_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `FK_donhang_trangthaidonhang` FOREIGN KEY (`id_trangthai`) REFERENCES `trangthaidonhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_donhang_chitietdonhang` FOREIGN KEY (`id_chitietdh`) REFERENCES `chitietdonhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_nhanvien_chucvu` FOREIGN KEY (`id_chucvu`) REFERENCES `chucvu` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham` FOREIGN KEY (`id_loaisp`) REFERENCES `loaisanpham` (`id`),
  ADD CONSTRAINT `FK_sanpham_gioitinh` FOREIGN KEY (`id_gioitinh`) REFERENCES `gioitinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sanpham_hanggiay` FOREIGN KEY (`id_hanggiay`) REFERENCES `hanggiay` (`id`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_size_sanpham` FOREIGN KEY (`id_giay`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `tonkho`
--
ALTER TABLE `tonkho`
  ADD CONSTRAINT `FK_tonkho_sanpham` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
