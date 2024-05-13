-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 02:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
`id` int(6) UNSIGNED NOT NULL,
`name` varchar(64) NOT NULL,
`email` varchar(64) NOT NULL,
`password` varchar(64) NOT NULL,
`phone` int(13) NOT NULL,
`image` varchar(64) NOT NULL,
`date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `email`, `password`, `phone`, `image`, `date`) VALUES
(2, 'Quan tri', 'admin@gmail.com', '123', 123456788, '1701388009.jpg', '2023-10-03 10:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
`id` int(5) UNSIGNED NOT NULL,
`name` varchar(255) NOT NULL,
`image` varchar(255) NOT NULL,
`price` int(5) NOT NULL DEFAULT 0,
`discount` tinyint(1) NOT NULL DEFAULT 0,
`description` tinytext DEFAULT NULL,
`content` text NOT NULL,
`date` datetime NOT NULL DEFAULT current_timestamp(),
`status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `discount`, `description`, `content`, `date`, `status`) VALUES
(1, 'Iphone 15 max pro', '1701390336.jfif', 2000000, 20, 'Iphone mới nhất giá rẽ', '', '2023-12-01 07:25:36', 1),
(2, 'Iphone 15 max pro', '1701390336.jfif', 2000000, 20, 'Iphone mới nhất giá rẽ', '', '2023-12-01 07:25:36', 0),
(3, 'Iphone 15 max pro', '1701394005.jfif', 20000000, 20, 'Sự khác biệt lớn của iPhone 15 nằm ở việc sản phẩm sử dụng
cổng tương tác USB-C chưa từng có trên mọi thế hệ iPhone trước. Đây là cơ chế kết nối đa năng với tốc độ truyền tải năng
lượng ', '', '2023-12-01 08:26:45', 1),
(4, 'Iphone 15 max pro', '1701394196.jfif', 25000000, 20, 'Sự khác biệt lớn của iPhone 15 nằm ở việc sản phẩm sử dụng
cổng tương tác USB-C chưa từng có trên mọi thế hệ iPhone trước. Đây là cơ chế kết nối đa năng với tốc độ truyền tải năng
lượng ', '<p><img
        src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015773467176_4_VN_iPhone_15_Pink_PDP_Image_Position-6_Dynamic_Island.jpg\"
        alt=\"Trải nghiệm Dynamic Island độc đáo cùng iPhone 15\" width=\"1600\" height=\"1066\"></p>
<p><i>&nbsp;Nguồn ảnh: Apple</i></p>
<h3><strong>Thiết kế thanh lịch với độ bền bỉ khó tin</strong></h3>
<p>iPhone 15 dễ dàng tạo thiện cảm ngay từ ấn tượng đầu tiên bởi phong cách thiết kế thân thiện. Sản phẩm có 5 màu sắc
    để lựa chọn gồm: Hồng, Xanh lá, Vàng, Xanh lam và Đen. Tất cả đều thật nhẹ nhàng, tinh tế, thể hiện rõ ràng tinh
    thần thanh lịch mà chiếc điện thoại hướng tới.</p>
<p>Sản phẩm được hoàn thiện chỉn chu đến từng chi tiết và cực kỳ chú trọng vào chất liệu nhằm mang tới độ bền bỉ tối ưu.
    iPhone 15 có khung viền nhôm chuẩn hàng không vũ trụ, mặt sau của thiết bị làm từ kính pha màu chế tạo từ quy trình
    trao đổi ion kép cực bền, mặt trước với kính Ceramic Shield vượt trội về khả năng chịu lực so với mọi smartphone
    khác hiện nay.</p>
<p><img src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/images/2015/Tin-Tuc/11/10/iPhone-15-5.jpg\"
        alt=\"iPhone 15 Thiết kế thanh lịch với độ bền bỉ khó tin\" width=\"960\" height=\"640\"></p>
<p><i>&nbsp;Nguồn ảnh: Apple</i></p>
<h3><strong>Camera 48MP cho những khuôn hình tuyệt đẹp</strong></h3>
<p>So với thế hệ tiền nhiệm, iPhone 15 đem lại trải nghiệm quay chụp ở đẳng cấp hoàn toàn khác biệt khi nâng cấp độ phân
    giải camera chính lên gấp 4 lần. Camera 48MP này có khả năng chụp được những khuôn hình cực độ sắc nét, thể hiện sự
    xuất sắc dù bạn thực hiện thao tác chụp nhanh cho đến tác vụ chụp phong cảnh.</p>
<p>Ngoài ra, hệ thống camera của iPhone 15 còn có thêm một ống kính tele với ba mức thu phóng linh hoạt là 2x, 1x và
    0.5x để bạn thực hiện thao tác zoom ở nhiều điều kiện khác nhau. Tùy theo nhu cầu, người dùng iPhone 15 còn có thêm
    nhiều sự lựa chọn về chức năng như<strong> Chế độ Ban Đêm</strong> hoặc <strong>HDR thông minh</strong>.</p>
<p><img src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015768277946_2_VN_iPhone_15_Plus_Black_PDP_Image_Position-3_Design_Detail.jpg\"
        alt=\"iPhone 15 cho những khuôn hình tuyệt đẹp\" width=\"1600\" height=\"1066\"></p>
<p><i>&nbsp;Nguồn ảnh: Apple</i></p>
<h3><strong>Trải nghiệm chụp chân dung thực sự ấn tượng</strong></h3>
<p>Với tính năng Photonic Engine, <strong>iPhone 15</strong> thể hiện năng lực chụp chân dung cao cấp. Cơ chế hoạt động
    của Photonic Engine nằm ở việc tận dụng những điểm ảnh độ phân giải siêu cao để kết hợp với một khuôn hình khác nhằm
    tối ưu hiệu quả bắt sáng. Nhờ đó, người dùng sẽ có được bức ảnh siêu sắc nét với kích thước lưu trữ rất nhỏ.</p>
<p>Cơ chế nhận diện tự động cho phép iPhone 15 xác định chủ thể khuôn hình như người hoặc thú cưng, sau đó tự kích hoạt
    cơ chế làm mờ nhằm gia tăng chiều sâu bối cảnh hình ảnh.</p>
<h3><strong>Tận hưởng thời lượng pin hết sức dài lâu</strong></h3>
<p>iPhone 15 tạo điều kiện để người dùng thoải mái trải nghiệm mọi tính năng và sử dụng các tác vụ hỗn hợp xuyên suốt
    ngày dài. Sản phẩm có thể phát video không ngừng nghỉ trong 20 tiếng đồng hồ liên tục và đạt thời lượng xem video
    nhiều hơn iPhone 12 tới ba giờ.</p>
<p>Với thời lượng sử dụng ấn tượng này, bạn không cần phải bận tâm nhiều đến việc mang theo bộ sạc như trước nữa. Những
    lợi thế về chip xử lý và khả năng vận hành tiết kiệm pin giúp iPhone 15 có được lợi thế thực sự mạnh mẽ về pin.</p>
<p><img src=\"https://images.fpt.shop/unsafe/filters:quality(90)/fptshop.com.vn/Uploads/Originals/2023/9/13/638302015849272512_iPhone_15_Pink_Pure_Back_iPhone_15_Pink_Pure_Front_2up_Screen__USEN.jpg\"
        alt=\"Tận hưởng thời lượng pin hết sức dài lâu của iPhone 15\" width=\"1599\" height=\"1066\"></p>
<p><i>&nbsp;Nguồn ảnh: Apple</i></p>', '2023-12-01 08:28:14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
