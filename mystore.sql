-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 28, 2024 lúc 03:54 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `forgot_token` varchar(200) DEFAULT NULL,
  `active_token` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `email`, `phone_number`, `image`, `forgot_token`, `active_token`, `status`, `create_at`, `update_at`) VALUES
(1, 'huynhminhtam', '$2y$10$tqvXX4gzPZUfww/BHuYjQ.UfUi1DumrSqPlX8F.4sUX8Y9j5nfBh2', 'Huỳnh Minh Tâm', 'huynhminhtamm2002@gmail.com', '0878100084', '1.png', 'c098b41caad6a4696c71b2f9d407a1a465cec196', NULL, 1, NULL, '2024-05-13 13:45:08'),
(38, 'tuongvy', '$2y$10$GKhCaj/w35160nB3iXite.PlW6Dt.xexQSg4Moi4qSOPPaSuwS77C', 'Nguyễn Thị Tường Vy', 'vyvy@gmail.com', '0989293940', NULL, NULL, NULL, 1, '2024-05-22 11:13:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adminToken`
--

CREATE TABLE `adminToken` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `adminToken`
--

INSERT INTO `adminToken` (`id`, `admin_id`, `token`, `create_at`) VALUES
(44, 1, '0c703eea710da0468a1c759e5b16e3bc28b5d943', '2024-05-18 14:39:25'),
(46, 1, 'a6fac9825453463a66c0b8bcc04d37df60f6502f', '2024-05-19 05:27:20'),
(48, 1, 'b0ae758616b0575337a34cb574e1216f2409030b', '2024-05-20 16:54:32'),
(65, 1, '6255c39088ba5440e1a9f97b36f483a0096d344c', '2024-05-28 17:32:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `status`, `create_at`, `update_at`) VALUES
(3, 'Nam Cao', 1, '2024-05-13 16:54:16', '2024-05-14 17:01:26'),
(4, 'Thạch Lam', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(5, 'Nguyễn Tuân', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(6, 'Ngô Tất Tố', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(7, 'Vũ Trọng Phụng', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(8, 'Thanh Tịnh', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(9, 'Nguyên Hồng', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(10, 'Đoàn giỏi', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(11, 'Nguyễn Công Hoan', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(12, 'Tô Hoài', 1, '2024-05-13 16:54:16', '2024-05-13 16:54:16'),
(23, 'Khoa CNTT', 1, '2024-05-18 10:23:04', NULL),
(24, 'Paulo Coelho', 1, '2024-05-18 13:36:23', NULL),
(25, 'Antoine de Saint-Exupéry', 1, '2024-05-18 15:01:29', NULL),
(26, 'Dân gian', 1, '2024-05-18 15:02:48', NULL),
(27, 'Nguyễn Công Kiệt', 1, '2024-05-18 15:05:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `create_at`, `update_at`) VALUES
(1, 'Thiên Long', 1, '2024-05-24 20:55:17', NULL),
(2, 'Casio', 1, '2024-05-24 20:55:17', '2024-05-25 10:16:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `custommer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custommers`
--

CREATE TABLE `custommers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `forgot_token` varchar(200) DEFAULT NULL,
  `active_token` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `genre_name`, `status`, `create_at`, `update_at`) VALUES
(3, 'Sách thiếu nhi', 1, '2024-05-13 16:58:09', '2024-05-13 15:33:44'),
(4, 'Sách tâm lý', 1, '2024-05-13 16:58:16', '2024-05-13 16:58:09'),
(5, 'Sách tôn giáo', 1, '2024-05-13 16:58:21', '2024-05-13 16:58:09'),
(6, 'Sách văn hoá, xã hội', 1, '2024-05-13 16:58:26', '2024-05-13 16:58:09'),
(7, 'Sách tiểu sử', 1, '2024-05-13 16:58:28', '2024-05-13 16:58:09'),
(8, 'Sách kinh dị', 1, '2024-05-13 16:58:29', '2024-05-13 16:58:09'),
(9, 'Sách tiểu thuyết', 1, '2024-05-13 16:58:31', '2024-05-14 13:12:21'),
(11, 'Truyện linh ta linh tinh', 1, '2024-05-14 06:12:44', '2024-05-14 12:11:20'),
(13, 'Giáo trình công nghệ thông tin', 1, '2024-05-18 10:22:48', NULL),
(14, 'Sách văn học', 1, '2024-05-18 11:28:01', '2024-05-18 15:06:33'),
(15, 'Kinh tế', 1, '2024-05-18 11:28:10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `imageURL`, `image`, `type`, `status`) VALUES
(2, NULL, '2.jpg', 'slider', 1),
(3, NULL, '3.jpg', 'slider', 1),
(4, NULL, '1716651593.png', 'slider', 0),
(5, NULL, '1716047376.jpg', 'slider', 1),
(13, NULL, '1716889707.jpeg', 'banner', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory_log`
--

CREATE TABLE `inventory_log` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `change_quantity` int(11) DEFAULT NULL,
  `purchase_price` double DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `slug` mediumtext DEFAULT NULL,
  `title` mediumtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `slug`, `title`, `description`, `type`, `image`, `status`, `create_at`, `update_at`) VALUES
(14, 'chinh-sach-mua-hang', 'Chính sách mua hàng', '<p>Chính sách mua hàng</p>', 'policy', NULL, 1, '2024-05-28 08:11:57', '2024-05-28 08:34:14'),
(15, 'chinh-sach-doi-tra-hoan-tien', 'Chính sách đổi trả - hoàn tiền', '<p>Chúng tôi luôn trân trọng sự tin tưởng và ủng hộ của quý khách hàng khi trải nghiệm mua hàng tại <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a>. Do đó chúng tôi luôn cố gắng hoàn thiện dịch vụ tốt nhất để phục vụ mọi nhu cầu mua sắm của quý khách.</p><p><a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a> chúng tôi luôn luôn cam kết tất cả các sản phẩm bán tại <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a> 100% là những sản phẩm chất lượng và xuất xứ nguồn gốc rõ ràng, hợp pháp cũng như an toàn cho người tiêu dùng. Để việc mua sắm của quý khách tại <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a> là trải nghiệm dịch vụ thân thiện, chúng tôi hy vọng quý khách sẽ kiểm tra kỹ các nội dung sau trước khi nhận hàng:&nbsp;</p><p>Thông tin sản phẩm: tên sản phẩm và chất lượng sản phẩm.</p><p>Số lượng sản phẩm.</p><ul><li>&nbsp;</li></ul><p>Trong trường hợp hiếm hoi sản phẩm quý khách nhận được có khiếm khuyết, hư hỏng hoặc không như mô tả, Fahasa.com cam kết bảo vệ khách hàng bằng chính sách đổi trả/ hoàn tiền trên tinh thần bảo vệ quyền lợi người tiêu dùng nhằm cam kết với quý khách về chất lượng sản phẩm và dịch vụ của chúng tôi.</p><p>Khi quý khách hàng có hàng hóa mua tại <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a>cần đổi/ trả/bảo hành/hoàn tiền, xin quý khách hàng liên hệ với chúng tôi qua hotline <strong>1900636467</strong> hoặc truy cập <a href=\"http://www.fahasa.com/chinh-sach-doi-tra-hang\"><strong>fahasa.com/chinh-sach-doi-tra-hang</strong></a> để tìm hiểu thêm về chính sách đổi/trả:</p><p><strong>1. Thời gian áp dụng đổi/trả</strong><br>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td><strong>KỂ TỪ KHI FAHASA.COM GIAO HÀNG THÀNH CÔNG</strong></td><td><strong>SẢN PHẨM LỖI</strong><br><strong>(do nhà cung cấp)</strong></td><td><strong>SẢN PHẨM KHÔNG LỖI&nbsp;(*)</strong></td><td><strong>SẢN PHẨM LỖI DO NGƯỜI SỬ DỤNG</strong></td></tr><tr><td rowspan=\"4\">Sản phẩm Điện tử, Đồ chơi điện - điện tử, điện gia dụng,... (có tem phiếu bảo hành từ nhà cung cấp)</td><td rowspan=\"2\">7 ngày đầu tiên</td><td>Đổi mới</td><td rowspan=\"3\">Trả hàng không thu phí</td><td rowspan=\"4\">Bảo hành hoặc sửa chữa có thu phí theo quy định của nhà cung cấp.</td></tr><tr><td>Trả không thu phí</td></tr><tr><td>8 - 30 ngày</td><td>Bảo hành</td></tr><tr><td>30 ngày trở đi</td><td>Bảo hành</td><td>Không hỗ trợ đổi/ trả</td></tr><tr><td rowspan=\"3\">Voucher/ E-voucher</td><td rowspan=\"2\">30 ngày đầu tiên</td><td>Đổi mới</td><td rowspan=\"2\">Không hỗ trợ đổi/ trả</td><td rowspan=\"2\">Không hỗ trợ đổi/ trả</td></tr><tr><td>Trả hàng không thu phí</td></tr><tr><td>30 ngày trở đi</td><td colspan=\"3\">Không hỗ trợ đổi trả</td></tr><tr><td rowspan=\"3\">Đối với các ngành hàng còn lại</td><td rowspan=\"2\">30 ngày đầu tiên</td><td>Đổi mới</td><td rowspan=\"2\">Trả hàng không thu phí</td><td rowspan=\"3\">Không hỗ trợ đổi/ trả</td></tr><tr><td>Trả không thu phí</td></tr><tr><td>30 ngày trở đi</td><td colspan=\"2\">Không hỗ trợ đổi/ trả</td></tr></tbody></table></figure><p>&nbsp;</p><p>Quý khách vui lòng thông báo về cho Fahasa.com ngay khi:</p><p>+ Kiện hàng giao tới ngoại quan bên ngoài có dấu hiệu hư hại , sản phẩm bên trong trầy xước ,gãy bìa, rách, móp méo, ướt , bể vỡ...trong vòng 2 ngày kể từ khi nhận hàng thành công.</p><p>+ Sản phẩm giao tới bị sai hàng , giao thiếu hàng trong vòng 2 ngày kể từ khi nhận hàng thành công.</p><p>Sau khi Fahasa.com xác nhận mail tiếp nhận yêu cầu kiểm tra xử lý, Fahasa.com sẽ liên hệ đến quý khách để xác nhận thông tin hoặc nhờ bổ sung thông tin (nếu có). Trường hợp không liên hệ được Fahasa.com rất tiếc xin được phép từ chối xử lý yêu cầu. Thời gian Fahasa.com liên hệ trong giờ hành chính tối đa 3 lần trong vòng 7 ngày sau khi nhận thông tin yêu cầu.</p><p>Chúng tôi sẽ kiểm tra các trường hợp trên và giải quyết cho quý khách tối đa trong 30 ngày làm việc kể từ khi quý khách nhận được hàng, quá thời hạn trên rất tiếc chúng tôi không giải quyết khiếu nại.</p><p><strong>2. Các trường hợp yêu cầu đổi trả</strong></p><p>Lỗi kỹ thuật của sản phẩm - do nhà cung cấp (sách thiếu trang, sút gáy, trùng nội dung, sản phẩm điện tử, đồ chơi điện – điện tử không hoạt động..)</p><p>Giao nhầm/ giao thiếu (thiếu sản phẩm đã đặt, thiếu phụ kiện, thiếu quà tặng kèm theo)</p><p>Chất lượng hàng hóa kém, hư hại do vận chuyển.</p><p>Hình thức sản phẩm không giống mô tả ban đầu.</p><p>Quý khách đặt nhầm/ không còn nhu cầu (*)</p><p>(*) Đối với các Sản phẩm không bị lỗi, chỉ áp dụng khi sản phẩm đáp ứng đủ điều kiện sau:</p><p>Quý khách&nbsp;có thể trả lại sản phẩm đã mua tại&nbsp;<strong>Fahasa.com</strong> trong vòng 30 ngày kể từ khi nhận hàng với đa số sản phẩm khi thỏa mãn các điều kiện sau:</p><p>Sản phẩm không có dấu hiệu đã qua sử dụng, còn nguyên tem, mác hay niêm phong của nhà sản xuất.</p><p>Sản phẩm còn đầy đủ phụ kiện hoặc phiếu bảo hành cùng quà tặng kèm theo (nếu có).</p><p>Nếu là sản phẩm điện – điện tử thì chưa bị kích hoạt, chưa có sao ghi dữ liệu vào thiết bị.</p><p><strong>3. Điều kiện đổi trả</strong><br>&nbsp;</p><p><strong>Fahasa.com</strong> hỗ trợ đổi/ trả sản phẩm cho quý khách nếu:</p><p>Sản phẩm còn nguyên bao bì như hiện trạng ban đầu.</p><p>Sản phầm còn đầy đủ phụ kiện, quà tặng khuyến mãi kèm theo.</p><p>Hóa đơn GTGT (nếu có).</p><p>Cung cấp đầy đủ thông tin đối chứng theo yêu cầu (điều 4).</p><p><strong>4. Quy trình đổi trả</strong></p><p>Quý khách vui lòng thông tin đơn hàng cần hỗ trợ đổi trả theo Hotline 1900636467 hoặc email về địa chỉ: <strong>cskh@fahasa.com.vn</strong> với tiêu đề <strong>“Đổi Trả Đơn Hàng \" Mã đơn hàng\".</strong></p><p>Quý khách cần cung cấp đính kèm thêm các bằng chứng để đối chiếu/ khiếu nại sau:</p><p>+ Video clip quay rõ các mặt của kiện hàng trước khi khui để thể hiện tình trạng của kiện hàng.</p><p>+ Video clip mở kiện hàng từ lúc bắt đầu khui ngoại quan đến kiểm tra sản phẩm bên trong thùng hàng.</p><p>+ Video quay rõ nét , không mờ , nhoè, thể hiện đầy đủ thông tin mã đơn hàng và quay cận cảnh lỗi của sản phẩm.</p><p>+ Hình chụp tem kiện hàng có thể hiện mã đơn hàng.</p><p>+ Hình chụp tình trạng ngoại quan (băng keo, seal, hình dạng thùng hàng, bao bì), đặc biệt các vị trí nghi ngờ có tác động đến sản phẩm (móp méo, ướt, rách...)</p><p>+ Hình chụp tình trạng sản phẩm bên trong, nêu rõ lỗi kỹ thuật nếu có.</p><ul><li>Để đảm bảo quyền lợi khách hàng và để <strong>Fahasa.com</strong> có cơ sở làm việc với các bộ phận liên quan, tất cả yêu cầu đổi/ trả/ bảo hành quý khách cần cung cấp hình ảnh/ clip sản phẩm lỗi. Quá thời gian đổi/ trả sản phẩm nếu chưa nhận được đủ hình ảnh/ clip từ quý khách, <strong>Fahasa.com</strong> xin phép từ chối hỗ trợ.</li></ul><figure class=\"table\"><table><tbody><tr><td><strong>STT</strong></td><td><strong>Nội dung</strong></td><td><strong>Cách thức giải quyết</strong></td></tr><tr><td>1</td><td>Lỗi kỹ thuật của sản phẩm - do nhà cung cấp (sách thiếu trang, sút gáy, trùng nội dung, sản phẩm điện tử không hoạt động..)</td><td><p>Fahasa.com có sản phẩm→ đổi mới cùng sản phẩm</p><p>Fahasa.com hết hàng→ Hoàn tiền hoặc quý khách có thể chọn mặt hàng khác tại website <a href=\"http://www.fahasa.com/\">www.fahasa.com</a>.</p><p>Đổi/trả không thu phí</p></td></tr><tr><td>2</td><td>Sản phẩm hỏng do quý khách</td><td>Không hỗ trợ đổi/ trả</td></tr><tr><td>3</td><td>Lý do đổi/trả sản phẩm như: khách đặt nhầm hoặc không còn nhu cầu.</td><td><p>&nbsp;</p><p>Hỗ trợ thu hồi và hoàn tiền 100% giá trị sản phẩm cho quý khách hàng.</p><p>**Lưu ý: Fahasa.com rất tiếc sẽ không hỗ trợ hoàn lại chi phí vận chuyển trong đơn hàng cho trường hợp này.</p><p>Đổi /trả không thu phí</p></td></tr><tr><td>4</td><td>Giao nhầm/ giao thiếu (thiếu sản phẩm đã đặt, thiếu phụ kiện, thiếu quà tặng kèm theo)</td><td><p>Giao nhầm → Đổi lại đúng sản phẩm đã đặt.</p><p>Giao thiếu → Giao bù thêm số lượng còn thiếu theo đơn hàng.</p><p>Đổi /trả không thu phí</p></td></tr><tr><td>5</td><td>Chất lượng hàng hóa kém do vận chuyển</td><td><p>Khi quý khách hàng nhận gói hàng bị móp méo, ướt, chúng tôi khuyến cáo khách hàng nên kiểm tra thực tế hàng hóa bên trong ngay thời điểm nhận hàng, vui lòng phản ảnh hiện trang hàng hóa lên bill nhận hàng từ phía nhân viên giao nhận và liên lạc với chúng tôi về hotline 1900-636467 trong vòng 48 giờ để được hỗ trợ giải quyết cụ thể.</p><p>Đổi /trả không thu phí</p></td></tr><tr><td>6</td><td>Hình thức sản phẩm không giống mô tả ban đầu</td><td><p>Hãy liên hệ với chúng tôi qua số hotline 1900636467, chúng tôi sẵn sàng lắng nghe và giải quyết cho bạn (cụ thể theo từng trường hợp).</p><p>Đổi /trả không thu phí</p></td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>5. Cách thức chuyển sản phẩm đổi trả về </strong><a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a></p><p>Khi yêu cầu đổi trả được giải quyết, quý khách vui lòng đóng gói sản phẩm như hiện trạng khi nhận hàng ban đầu (bao gồm sản phẩm, quà tặng, phụ kiện kèm theo sản phẩm,…nếu có).</p><p>Hóa đơn giá trị gia tăng của <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a> (nếu có).</p><p>Phụ kiện đi kèm sản phẩm và quà tặng khuyến mãi kèm theo (nếu có).</p><p>Quý khách cần quay video clip đóng gói sản phẩm để làm bằng chứng đối chiếu/ khiếu nại liên quan đến đổi trả về sau (nếu cần).</p><p>Quý khách vui lòng chịu trách nhiệm về trạng thái nguyên vẹn của sản phẩm khi gửi về <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a><strong>.&nbsp;</strong></p><p>Sau khi nhận được sản phẩm quý khách gởi về, <a href=\"http://www.fahasa.com/\"><strong>Fahasa.com</strong></a> sẽ phản hồi và cập nhật thông tin trên từng giai đoạn xử lý đến quý khách qua điện thoại/email .</p><p><strong>Lưu ý khác:</strong></p><p>(*) Các sản phẩm thuộc \"Phiên chợ sách cũ\", \"Sách cũ đồng giá\" sẽ không được áp dụng chính sách đổi trả của <strong>Fahasa.com</strong>.</p><p>(*) Nếu quý khách hủy đơn hàng cũ, đã thanh toán thành công, mà không có nhu cầu đặt lại đơn hàng khác, hoặc quý khách yêu cầu trả hàng hoàn tiền → chúng tôi sẽ hoàn tiền lại cho quý khách qua hình thức thanh toán ban đầu, đối với các đơn hàng quý khách thanh toán bằng tiền mặt sẽ được hoàn qua tài khoản Ngân hàng do quý khách chỉ định</p><p>Thời gian hoàn tiền được quy định tại Điều 6.</p><p>(*) Không áp dụng đổi / trả / hoàn tiền đối với mặt hàng Chăm Sóc Cá Nhân và các Đơn Hàng Bán Sỉ.</p><p><strong>6. Thời gian hoàn tiền</strong></p><p>Đối với những đơn hàng thanh toán trả trước: sau khi cập nhật hủy, thời gian hoàn tiền sẽ tùy thuộc vào phương thức thanh toán. Quý khách vui lòng tham khảo thời gian hoàn tiền như sau:<br>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>Phương thức thanh toán</strong></td><td><strong>Thời gian hoàn tiền</strong></td></tr><tr><td>ATM nội địa/ Cổng Zalo Pay/ Cổng VNPay</td><td>5 - 7 ngày làm việc</td></tr><tr><td>Chuyển khoản</td><td>5 - 7 ngày làm việc</td></tr><tr><td>Visa/ Master/ JCB</td><td>5 - 7 ngày làm việc (*)</td></tr><tr><td>Ví Momo/ Moca/Zalopay/ShopeePay</td><td>1 - 3 ngày làm việc</td></tr><tr><td>Fpoint</td><td>24 giờ</td></tr></tbody></table></figure><p><br>(*) Lưu ý:<br>- Đối với thẻ Visa/ Master/ JCB,&nbsp; số tiền hoàn sẽ được ngân hàng chuyển vào tài khoản quý khách dao động 1-3 tuần làm việc (tùy theo chính sách của từng ngân hàng).&nbsp;<br>- Ngày làm việc không bao gồm thứ 7, chủ nhật và ngày lễ.</p><p>Đối với những đơn hàng trả hàng hoàn tiền:</p><p>Thời gian hoàn tiền được bắt đầu tính kể từ thời điểm Fahasa.com nhận được hàng hoàn trả và xác nhận với quý khách về việc hàng hoàn trả đáp ứng các điều kiện trả hàng được quy định tại chính sách này. Thời gian hoàn tiền tuân thủ theo quy định tại Mục 6 này.</p><p>Đối với các đơn hàng hoàn tiền, hình thức thanh toán của quý khách là tiền mặt (COD): Fahasa.com sẽ hoàn tiền qua tài khoản Ngân hàng do quý khách chỉ định.</p><p>Trong trường hợp đã quá thời gian trên quý khách chưa nhận được tiền hoàn, vui lòng liên hệ ngân hàng phát hành thẻ hoặc liên hệ bộ phận Chăm sóc khách hàng của Fahasa.com .&nbsp;</p><p><strong>Nếu cần hỗ trợ thêm bất kì thông tin nào, Fahasa nhờ quý khách liên hệ trực tiếp quahotline 1900636467để được hỗ trợ nhanh chóng.</strong></p><p>&nbsp;</p><p><i>Chính sách sẽ được áp dụng và có hiệu lực từ ngày01/08/2022</i></p>', 'policy', NULL, 1, '2024-05-28 08:33:52', '2024-05-28 08:44:07'),
(16, 'chinh-sach-bao-hanh-boi-hoan', 'Chính sách bảo hành - bồi hoàn', '<ul><li>Chính sách bảo hành - bồi hoàn</li></ul>', 'policy', NULL, 1, '2024-05-28 08:34:11', '2024-05-28 08:34:16'),
(17, 'chinh-sach-van-chuyen', 'Chính sách vận chuyển', '<ul><li>Chính sách vận chuyển</li></ul>', 'policy', NULL, 1, '2024-05-28 08:34:47', NULL),
(18, 'chinh-sach-khach-si', 'Chính sách khách sỉ', '<ul><li>Chính sách khách sỉ</li></ul>', 'policy', NULL, 1, '2024-05-28 08:35:01', '2024-05-28 08:35:04'),
(19, 'phuong-thuc-thanh-toan-va-xuat-hd', 'Phương thức thanh toán và xuất HĐ', '<ul><li>Phương thức thanh toán và xuất HĐ</li></ul>', 'policy', NULL, 1, '2024-05-28 08:43:38', '2024-05-28 16:33:23'),
(20, 'dieu-khoan-su-dung', 'Điều khoản sử dụng', '<p><strong>ĐIỀU KHOẢN SỬ DỤNG</strong></p><p>Chào mừng quý khách đến mua sắm tại <strong>FAHASA</strong>. Sau khi truy cập vào website <strong>FAHASA</strong> để tham khảo hoặc mua sắm, quý khách đã đồng ý tuân thủ và ràng buộc với những quy định của <strong>FAHASA</strong>. Vui lòng xem kỹ các quy định và hợp tác với chúng tôi để xây dựng 1 website <strong>FAHASA</strong> ngày càng thân thiện và phục vụ tốt những yêu cầu của chính quý khách. Ngoài ra, nếu có bất cứ câu hỏi nào về những thỏa thuận trên đây, vui lòng email cho chúng tôi qua địa chỉ&nbsp;<a href=\"mailto:support@fahasa.com\"><strong>support@fahasa.com</strong></a>.</p><p><strong>Tài khoản của khách hàng</strong></p><p>Khi sử dụng dịch vụ <strong>FAHASA</strong>, quý khách sẽ cung cấp cho chúng tôi thông tin về địa chỉ email, mật khẩu và họ tên để có được 1 tài khoản tại đây. Việc sử dụng và bảo mật thông tin tài khoản là trách nhiệm và quyền lợi của quý&nbsp;khách khi sử dụng <strong>FAHASA</strong>. Ngoài ra, những thông tin khác trong tài khoản như tên tuổi, địa chỉ.... là những thông tin sẽ giúp <strong>FAHASA</strong> phục vụ quý khách tốt nhất. Trong trường hợp thông tin do quý&nbsp;khách cung cấp không đầy đủ hoặc sai dẫn đến việc không thể giao hàng cho quý&nbsp;khách, chúng tôi có quyền đình chỉ hoặc từ chối phục vụ, giao hàng mà không phải chịu bất cứ trách nhiệm nào đối với quý&nbsp;khách. Khi có những thay đổi thông tin của quý&nbsp;khách, vui lòng cập nhật lại thông tin trong tài khoản tại <strong>FAHASA</strong>. Quý&nbsp;khách phải giữ kín mật khẩu và tài khoản, hoàn toàn chịu trách nhiệm đối với tất cả các hoạt động diễn ra thông qua việc sử dụng mật khẩu hoặc tài khoản của mình. Quý khách nên đảm bảo thoát khỏi tài khoản tại <strong>FAHASA</strong> sau mỗi lần sử dụng để bảo mật thông tin của mình</p><p><strong>Quyền lợi bảo mật thông tin của khách hàng</strong></p><p>Khi sử dụng dịch vụ tại website <strong>FAHASA</strong>, quý&nbsp;khách được đảm bảo rằng những thông tin cung cấp cho chúng tôi sẽ chỉ được dùng để nâng cao chất lượng dịch vụ dành cho khách hàng của <strong>FAHASA</strong> và sẽ không được chuyển giao cho 1 bên thứ ba nào khác vì mục đích thương mại. Thông tin của quý&nbsp;khách tại <strong>FAHASA</strong> sẽ được chúng tôi bảo mật và chỉ trong trường hợp pháp luật yêu cầu, chúng tôi sẽ buộc phải cung cấp những thông tin này cho các cơ quan pháp luật.</p><p><strong>Trách nhiệm của khách hàng khi sử dụng dịch vụ của FAHASA</strong></p><p>Quý&nbsp;khách tuyệt đối không được sử dụng bất kỳ công cụ, phương pháp nào để can thiệp, xâm nhập bất hợp pháp vào hệ thống hay làm thay đổi cấu trúc dữ liệu tại website <strong>FAHASA</strong>. Quý&nbsp;khách không được có những hành động ( thực hiện, cổ vũ) việc can thiệp, xâm nhập dữ liệu của <strong>FAHASA</strong> cũng như hệ thống máy chủ của chúng tôi. Ngoài ra, xin vui lòng thông báo cho quản trị web của <strong>FAHASA</strong> ngay khi quý&nbsp;khách phát hiện ra lỗi hệ thống theo số điện thoại <strong>(84.08) 38388832</strong> - <strong>(84-08) 36026700</strong> hoặc email&nbsp;<a href=\"mailto:support@fahasa.com\"><strong>support@fahasa.com</strong></a></p><p>Quý&nbsp;khách không được đưa ra những nhận xét, đánh giá có ý xúc phạm, quấy rối, làm phiền hoặc có bất cứ hành vi nào thiếu văn hóa đối với người khác. Không nêu ra những nhận xét có tính chính trị (tuyên truyền, chống phá, xuyên tạc chính quyền), kỳ thị tôn giáo, giới tính, sắc tộc....Tuyệt đối cấm mọi hành vi mạo nhận, cố ý tạo sự nhầm lẫn mình là một khách hàng khác hoặc là thành viên Ban Quản Trị <strong>FAHASA</strong>.</p><p><strong>Trách nhiệm và quyền lợi của FAHASA</strong></p><p>Trong trường hợp có những phát sinh ngoài ý muốn hoặc trách nhiệm của mình, <strong>FAHASA</strong> sẽ không chịu trách nhiệm về mọi tổn thất phát sinh. Ngoài ra, chúng tôi không cho phép các tổ chức, cá nhân khác quảng bá sản phẩm tại website <strong>FAHASA</strong> mà chưa có sự đồng ý bằng văn bản từ <strong>FAHASA</strong> <strong>Corporation</strong>. Các thỏa thuận và quy định trong Điều khoản sử dụng có thể thay đổi vào bất cứ lúc nào nhưng sẽ được <strong>FAHASA Corporation</strong> thông báo cụ thể trên website <strong>FAHASA</strong>.</p><p><br>&nbsp;</p>', 'service', NULL, 1, '2024-05-28 16:42:34', '2024-05-28 16:43:47'),
(21, 'chinh-sach-bao-mat-thong-tin-ca-nhan', 'Chính sách bảo mật thông tin cá nhân', '<p><strong>CHÍNH SÁCH BẢO MẬT THÔNG TIN CÁ NHÂN CỦA KHÁCH HÀNG</strong></p><p>FAHASA mong muốn đem lại một tiện ích mua hàng trực tuyến tin cậy, tiết kiệm và thấu hiểu người dùng. Chúng tôi nhận thấy khách hàng sử dụng website Fahasa.com để mua sắm nhưng không phải ai cũng mong muốn chia sẻ thông tin cá nhân của mình. Chúng tôi, Công ty FAHASA, tôn trọng quyền riêng tư của khách hàng và cam kết bảo mật thông tin cá nhân của khách hàng khi khách hàng tin vào chúng tôi cung cấp thông tin cá nhân của khách hàng cho chúng tôi khi mua sắm tại website Fahasa.com. Đây là nguyên tắc khi tiếp cận quyền riêng tư, thông tin cá nhân tại website Fahasa.com.</p><p>Chính Sách Bảo Mật Thông Tin Cá Nhân này bao gồm các nội dung:</p><p>1. Sự Chấp Thuận</p><p>2. Mục Đích Thu Thập</p><p>3. Phạm Vi Thu Thập</p><p>4. Thời Gian Lưu Trữ</p><p>5. Không Chia Sẻ Thông Tin Cá Nhân Khách Hàng</p><p>6. An Toàn Dữ Liệu</p><p>7. Quyền Của Khách Hàng Đối Với Thông Tin Cá Nhân</p><p>8. Thông Tin Liên Hệ</p><p>9. Đơn Vị Thu Thập và Quản Lý Thông Tin</p><p>10. Hiệu lực</p><p>&nbsp;</p><p><strong>1. Sự Chấp Thuận</strong></p><p>Bằng việc trao cho chúng tôi thông tin cá nhân của bạn, FAHASA đồng ý rằng thông tin cá nhân của bạn sẽ được thu thập, sử dụng như được nêu trong Chính Sách này. Nếu bạn không đồng ý với Chính Sách này, bạn dừng cung cấp cho chúng tôi bất cứ thông tin cá nhân nào và/hoặc sử dụng các quyền như được nêu tại Mục 7 dưới đây. Chúng tôi bảo lưu quyền sửa đổi, bổ sung nhằm hoàn thiện đối với Chính Sách này vào bất kỳ thời điểm nào. Chúng tôi khuyến khích bạn thường xuyên xem lại Chính Sách Bảo Mật Thông Tin Cá Nhân này để có được những cập nhật mới nhất đảm bảo bạn biết và thực hiện quyền quản lý thông tin cá nhân của bạn.</p><p><strong>2. Mục Đích Thu Thập</strong></p><p>Chúng tôi thu thập thông tin cá nhân chỉ cần thiết nhằm phục vụ cho các mục đích:</p><p>Đơn Hàng: để xử lý các vấn đề liên quan đến đơn đặt hàng của bạn;</p><p>Duy Trì Tài Khoản: để tạo và duy trình tài khoản của bạn với chúng tôi, bao gồm cả các chương trình khách hàng thân thiết hoặc các chương trình thưởng đi kèm với tài khoản của bạn;</p><p>Dịch Vụ Người Tiêu Dùng, Dịch Vụ Chăm Sóc Khách Hàng: bao gồm các phản hồi cho các yêu cầu, khiếu nại và phản hồi của bạn;</p><p>Cá Nhân Hóa: Chúng tôi có thể tổ hợp dữ liệu được thu thập để có một cái nhìn hoàn chỉnh hơn về một người tiêu dùng và từ đó cho phép chúng tôi phục vụ tốt hơn với sự cá nhân hóa mạnh hơn ở các khía cạnh, bao gồm nhưng không giới hạn: (i) để cải thiện và cá nhân hóa trải nghiệm của bạn trên Fahasa.com (ii) để cải thiện các tiện ích, dịch vụ, điều chỉnh chúng phù hợp với các nhu cầu được cá thể hóa và đi đến những ý tưởng dịch vụ mới (iii) để phục vụ bạn với những giới thiệu, quảng cáo được điều chỉnh phù hợp với sự quan tâm của bạn.</p><p>An Ninh: cho các mục đích ngăn ngừa các hoạt động phá hủy tài khoản người dùng của khách hàng hoặc các hoạt động giả mạo khách hàng.</p><p>Theo yêu cầu của pháp luật: tùy quy định của pháp luật vào từng thời điểm, chúng tôi có thể thu thập, lưu trữ và cung cấp theo yêu cầu của cơ quan nhà nước có thẩm quyền.</p><p><strong>3. Phạm Vi Thu Thập</strong></p><p>Chúng tôi thu thập thông tin cá nhân của bạn khi:</p><p>Bạn trực tiếp cung cấp cho chúng tôi.</p><p>Đó là các thông tin cá nhân bạn cung cấp cho chúng tôi được thực hiện chủ yếu trên website Fahasa.com bao gồm: họ tên, địa chỉ thư điện tử (email), số điện thoại, địa chỉ, thông tin đăng nhập tài khoản bao gồm thông tin bất kỳ cần thiết để thiết lập tài khoản ví dụ như tên đăng nhập, mật khẩu đăng nhập, ID/địa chỉ đăng nhập và câu hỏi/trả lời an ninh.</p><p>Bạn tương tác với chúng tôi.</p><p>Chúng tôi sử dụng cookies và công nghệ theo dấu khác để thu thập một số thông tin khi bạn tương tác trên website Fahasa.com.</p><p>Từ những nguồn hợp pháp khác.</p><p>Chúng tôi có thể sẽ thu thập thông tin cá nhân từ các nguồn hợp pháp khác.</p><p><strong>4. Thời Gian Lưu Trữ</strong></p><p>Thông tin cá nhân của khách hàng sẽ được lưu trữ cho đến khi khách hàng có yêu cầu hủy bỏ hoặc khách hàng tự đăng nhập và thực hiện hủy bỏ. Trong mọi trường hợp thông tin cá nhân của khách hàng sẽ được</p><p>bảo mật trên máy chủ của FAHASA.</p><p><strong>5. Không Chia Sẻ Thông Tin Cá Nhân Khách Hàng</strong></p><p>Chúng tôi sẽ không cung cấp thông tin cá nhân của bạn cho bất kỳ bên thứ ba nào, trừ một số hoạt động cần thiết dưới đây:</p><p>Các đối tác là bên cung cấp dịch vụ cho chúng tôi liên quan đến thực hiện đơn hàng và chỉ giới hạn trong phạm vi thông tin cần thiết cũng như áp dụng các quy định đảm bảo an ninh, bảo mật các thông tin cá nhân.</p><p>Chúng tôi có thể sử dụng dịch vụ từ một nhà cung cấp dịch vụ là bên thứ ba để thực hiện một số hoạt động liên quan đến website Fahasa.com và khi đó bên thứ ba này có thể truy cập hoặc xử lý các thông tin cá nhân trong quá trình cung cấp các dịch vụ đó. Chúng tôi yêu cầu các bên thứ ba này tuân thủ mọi luật lệ về bảo vệ thông tin cá nhân liên quan và các yêu cầu về an ninh liên quan đến thông tin cá nhân.</p><p>Các chương trình có tính liên kết, đồng thực hiện, thuê ngoài cho các mục địch được nêu tại Mục 2 và luôn áp dụng các yêu cầu bảo mật thông tin cá nhân.</p><p>Yêu cầu pháp lý: Chúng tôi có thể tiết lộ các thông tin cá nhân nếu điều đó do luật pháp yêu cầu và việc tiết lộ như vậy là cần thiết một cách hợp lý để tuân thủ các quy trình pháp lý.</p><p>Chuyển giao kinh doanh (nếu có): trong trường hợp sáp nhập, hợp nhất toàn bộ hoặc một phần với công ty khác, người mua sẽ có quyền truy cập thông tin được chúng tôi lưu trữ, duy trì trong đó bao gồm cả thông tin cá nhân.</p><p><strong>6. An Toàn Dữ Liệu</strong></p><p>Chúng tôi luôn nỗ lực để giữ an toàn thông tin cá nhân của khách hàng, chúng tôi đã và đang thực hiện nhiều biện pháp an toàn, bao gồm:</p><p>Bảo đảm an toàn trong môi trường vận hành: chúng tôi lưu trữ không tin cá nhân khách hàng trong môi trường vận hành an toàn và chỉ có nhân viên, đại diện và nhà cung cấp dịch vụ có thể truy cập trên cơ sở cần phải biết. Chúng tôi tuân theo các tiêu chuẩn ngành, pháp luật trong việc bảo mật thông tin cá nhân khách hàng.</p><p>Trong trường hợp máy chủ lưu trữ thông tin bị hacker tấn công dẫn đến mất mát dữ liệu cá nhân khách hàng, chúng tôi sẽ có trách nhiệm thông báo vụ việc cho cơ quan chức năng để điều tra xử lý kịp thời và thông báo cho khách hàng được biết.</p><p>Các thông tin thanh toán: được bảo mật theo tiêu chuẩn ngành.</p><p><strong>7. Quyền Của Khách Hàng Đối Với Thông Tin Cá Nhân</strong></p><p>Khách hàng có quyền cung cấp thông tin cá nhân cho chúng tôi và có thể thay đổi quyết định đó vào bất cứ lúc nào. Khách hàng có quyền tự kiểm tra, cập nhật, điều chỉnh thông tin cá nhân của mình bằng cách đăng nhập vào tài khoản và chỉnh sửa thông tin cá nhân hoặc yêu cầu chúng tôi thực hiện việc này.</p><p><strong>8. Thông Tin Liên Hệ</strong></p><p>Nếu bạn có câu hỏi hoặc bất kỳ thắc mắc nào về Chính Sách này hoặc thực tế việc thu thập, quản lý thông tin cá nhân của chúng tôi, xin vui</p><p>lòng liên hệ với chúng tôi bằng cách:</p><p>Gọi điện thoại đến hotline: 1900636467</p><p>Gửi thư điện tử đến địa chỉ email: cskh@fahasa.com.vn</p><p><strong>9. Đơn Vị Thu Thập và Quản Lý Thông Tin</strong></p><p>Công ty Cổ phần Phát Hành Sách TP HCM - Fahasa</p><p>Thành lập và hoạt động theo Giấy chứng nhận đăng ký doanh nghiệp số: 0304132047 do Sở Kế hoạch và Đầu tư thành phố Hồ Chí Minh cấp, đăng ký lần đầu ngày 20 tháng 12 năm 2005.</p><p>Trụ sở chính: 60 – 62 Lê Lợi, Phường Bến Nghé, Quận 1, Thành phố Hồ Chí Minh.</p><p>Địa chỉ liên hệ: 387 – 389 Hai bà Trưng, Phường Võ Thị Sáu, Quận 3, Thành phố Hồ Chí Minh.</p><p><strong>10. Hiệu lực Chính Sách Bảo Mật Thông Tin Cá Nhân này có hiệu lực từ ngày 01/07/2022.</strong></p><p><strong>ĐẠI DIỆN CÔNG TY CỔ PHẦN PHÁT HÀNH SÁCH TP HCM – FAHASA.</strong></p><p>[Đã ký và đóng dấu]</p><p>&nbsp;</p><p><strong>PHẠM NAM THẮNG</strong></p><p>Tổng Giám Đốc</p><p><br>&nbsp;</p>', 'service', NULL, 1, '2024-05-28 16:43:20', '2024-05-28 16:43:48'),
(22, 'chinh-sach-bao-mat-thanh-toan', 'Chính sách bảo mật thanh toán', '<p><strong>CHÍNH SÁCH BẢO MẬT THANH TOÁN</strong></p><p><strong>1. Cam kết bảo mật</strong></p><p>- Hệ thống thanh toán thẻ được cung cấp bởi các đối tác thanh toán (<strong>“Đối tác cổng thanh toán”</strong>) đã được cấp phép hoạt động hợp pháp tại Việt Nam. Theo đó, các tiêu chuẩn bảo mật thanh toán thẻ tại FAHASA đảm bảo tuân thủ theo các tiêu chuẩn bảo mật ngành</p><p><strong>2. Quy định bảo mật:</strong></p><p>- Chính sách giao dịch thanh toán bằng thẻ quốc tế và thẻ nội địa (internet banking) đảm bảo tuân thủ các tiêu chuẩn của các Đối tác cổng thanh toán gồm:</p><ul><li>Thông tin tài chính của Khách hàng sẽ được bảo vệ trong suốt quá trình giao dịch bằng giao thức SSL (Secure Sockets Layer) bằng cách mã hóa tất cả các thông tin Khách hàng nhập vào.</li><li>Chứng nhận tiêu chuẩn bảo mật dữ liệu thông tin thanh toán (PCI DSS) do Trustwave cung cấp.</li><li>Mật khẩu sử dụng một lần (OTP) được gửi qua SMS để đảm bảo việc truy cập tài khoản được xác thực.</li><li>Tiêu chuản mã hóa MD5 12 bit.</li><li>Các nguyên tắc và quy định bảo mật thông tin trong ngành tài chính ngân hàng theo quy định của Ngân hàng Nhà nước Việt Nam.</li></ul><p>- Chính sách bảo mật giao dịch trong thanh toán của FAHASA áp dụng với Khách hàng:</p><ul><li>FAHASA cung cấp tiện ích lưu giữ Token – chỉ lưu giữ chuối đã được mã hóa bởi Đối Tác Cổng Thanh Toán cung cấp cho FAHASA. FAHASA không trực tiếp lưu giữ thông tin thẻ Khách hàng. Việc bảo mật thông tin thẻ thanh toán Khách hàng được thực hiện bởi Đối Tác Cổng Thanh Toán đã được cấp phép.</li><li>Đối với thẻ quốc tế: thông tin thẻ thanh toán của Khách hàng mà có khả năng sử dụng để xác lập giao dịch không được lưu trên hệ thống của FAHASA. Đối Tác Cổng Thanh Toán sẽ lưu trữ và bảo mật.</li><li>Đối với thẻ nội địa (internet banking), FAHASA chỉ lưu trữ mã đơn hàng, mã giao dịch và tên Ngân hàng.</li><li>Trong trường hợp nếu Khách hàng thông báo/khiếu nại tình trạng thông tin thanh toán của Khách hàng khi mua hàng qua website/ứng dụng của FAHASA bị thay đổi, xóa, hủy, sao chép, tiết lộ, di chuyển trái phép hoặc bị chiếm đoạt gây thiệt hại cho Khách hàng thì FAHASA sẽ nỗ lực phối hợp với Đối Tác Cổng Thanh Toán để tìm hiểu vấn đề và hỗ trợ xử lý cho đến hoàn tất vấn đề Khách hàng đang đang gặp phải.</li></ul><p><br>FAHASA cam kết đảm bảo thực hiện nghiêm túc các biện pháp bảo mật cần thiết cho mọi hoạt động thanh toán thực hiện qua website/ứng dụng của FAHASA.</p>', 'service', NULL, 1, '2024-05-28 16:43:44', '2024-05-28 16:43:48'),
(23, 'gioi-thieu-fahasa', 'Giới thiệu Fahasa', '<h2>GIỚI THIỆU FAHASA</h2><p>THÔNG TIN GIỚI THIỆU CÔNG TY FAHASA</p><p><strong><img src=\"https://cdn0.fahasa.com/media/wysiwyg/fahasa.jpg\" alt=\"Fahasa\" width=\"271\" height=\"461\"></strong></p><p><strong>Nguồn nhân lực</strong></p><p>Để xây dựng Thương hiệu mạnh, một trong những định hướng quan trọng hàng đầu của FAHASA là chiến lược phát triển nguồn nhân lực - mấu chốt của mọi sự thành công.</p><p>FAHASA có hơn 2.200 CB-CNV, trình độ chuyên môn giỏi, nhiệt tình, năng động, chuyên nghiệp. Lực lượng quản lý FAHASA có thâm niên công tác, giỏi nghiệp vụ nhiều kinh nghiệm, có khả năng quản lý tốt và điều hành đơn vị hoạt động hiệu quả.</p><p>Kết hợp tuyển dụng nguồn nhân lực đầu vào có chất lượng và kế hoạch bồi dưỡng kiến thức, rèn luyện bổ sung các kỹ năng và chuẩn bị đội ngũ kế thừa theo hướng chính qui thông qua các lớp học ngắn hạn, dài hạn; các lớp bồi dưỡng CB-CNV được tổ chức trong nước cũng như ở nước ngoài đều được lãnh đạo FAHASA đặc biệt quan tâm và tạo điều kiện triển khai thực hiện. Chính vì thế, trình độ chuyên môn của đội ngũ CB-CNV ngày càng được nâng cao, đáp ứng nhu cầu ngày càng tăng của công việc cũng như sự phát triển của xã hội đang trên đường hội nhập.</p><p><strong>Về hàng hóa</strong></p><p>Công ty FAHASA chuyên kinh doanh: sách quốc văn, ngoại văn, văn hóa phẩm, văn phòng phẩm, dụng cụ học tập, quà lưu niệm, đồ chơi dành cho trẻ em… Một số Nhà sách trực thuộc Công ty FAHASA còn kinh doanh các mặt hàng siêu thị như: hàng tiêu dùng, hàng gia dụng, hóa&nbsp; mỹ phẩm…</p><p>Sách quốc văn với nhiều thể loại đa dạng như sách giáo khoa – tham khảo, giáo trình, sách học ngữ, từ điển, sách tham khảo thuộc nhiều chuyên ngành phong phú: văn học, tâm lý – giáo dục, khoa học kỹ thuật, khoa học kinh tế - xã hội, khoa học thường thức, sách phong thủy, nghệ thuật sống, danh ngôn, sách thiếu nhi, truyện tranh, truyện đọc, từ điển, công nghệ thông tin, khoa học – kỹ thuật, nấu ăn, làm đẹp...&nbsp; của nhiều Nhà xuất bản, nhà cung cấp sách có uy tín như: NXB Trẻ, Giáo Dục, Kim Đồng, Văn hóa -Văn Nghệ, Tổng hợp TP.HCM, Chính Trị Quốc Gia; Công ty Đông A, Nhã Nam, Bách Việt, Alphabook, Thái Hà, Minh Lâm, Đinh Tị, Minh Long, TGM, Sáng Tạo Trí Việt, Khang Việt, Toàn Phúc…</p><p>Sách ngoại văn bao gồm: từ điển, giáo trình, tham khảo, truyện tranh thiếu nhi , sách học ngữ, từ vựng, ngữ pháp, luyện thi TOEFL, TOEIC, IELS…được nhập từ các NXB nước ngoài như<i>: </i>Cambridge, Mc Graw-Hill, Pearson Education, Oxford, Macmillan, Cengage Learning…</p><p>Văn phòng phẩm, dụng cụ học tập, đồ chơi dành cho trẻ em, hàng lưu niệm… đa dạng, phong phú, mẫu mã đẹp, chất lượng tốt, được cung ứng bởi các công ty, nhà cung cấp uy tín như: Thiên Long, XNK Bình Tây, Hạnh Thuận, Ngô Quang, Việt Văn, Trương Vui, Hương Mi, Phương Nga, Việt Tinh Anh, Chăm sóc trẻ em Việt, Mẹ và em bé…</p><p>Cùng với việc phát hành độc quyền nhiều ấn bản các loại của các Nhà xuất bản là năng lực in ấn, sản xuất cung ứng nguồn hàng của Xí nghiệp in FAHASA, đã giúp Công ty luôn chủ động được nguồn hàng, nhất là các mặt hàng độc quyền như: lịch bloc, tập học sinh, sổ tay cao cấp, agenda, văn phòng phẩm, dụng cụ học tập…</p><p><strong>Hệ thống Nhà sách chuyên nghiệp</strong></p><p>Mạng lưới phát hành của Công ty FAHASA rộng khắp trên toàn quốc, gồm 5 Trung tâm sách, 1 Xí nghiệp in và với gần 60 Nhà sách trải dọc khắp các tỉnh thành từ TP.HCM đến Thủ Đô Hà Nội, miền Trung, Tây Nguyên, miền Đông và Tây Nam Bộ như: Hà Nội, Vĩnh Phúc, Hải Phòng, Thanh Hóa, Hà Tĩnh, Huế, Đà Nẵng, Quảng Nam, Quảng Ngãi, Quy Nhơn, Nha Trang, Gia Lai, Đăklăk, Bảo Lộc - Lâm Đồng, Ninh Thuận, Bình Thuận, Bình Phước, Bình Dương, Đồng Nai, Vũng Tàu, Long An, Tiền Giang, Bến Tre, Vĩnh Long, Cần Thơ, Hậu Giang, An Giang, Kiên Giang, Sóc Trăng, Cà Mau.</p><p>Năm 2004 Công ty đã được Cục Sở hữu Trí tuệ Việt Nam công nhận sở hữu độc quyền tên thương hiệu FAHASA.</p><p>Năm 2005, Công ty FAHASA được Trung tâm sách kỷ lục Việt Nam công nhận là đơn vị có hệ thống Nhà sách nhiều nhất Việt Nam; được Tạp chí The Guide công nhận Nhà sách Xuân Thu - đơn vị trực thuộc Công ty FAHASA là Nhà sách Ngoại văn đẹp nhất, lớn nhất, quy mô nhất, nhiều sách nhất ở Thành phố Hồ Chí Minh và cả nước.</p><p>Năm 2012 FAHASA là Doanh nghiệp nằm trong Top 10 nhà bán lẻ hàng đầu Việt Nam. Đặc biệt năm 2006, 2009, 2012 FAHASA đạt danh hiệu Top 500 Nhà bán lẻ hàng đầu Châu Á Thái Bình Dương, giải thưởng được tạp chí Retail Asia (Singapore) bình chọn.</p><p><strong>Kinh nghiệm hoạt động</strong></p><p>Là đơn vị có gần 40 năm kinh doanh và phục vụ xã hội, nên FAHASA đã tích lũy được nhiều kinh nghiệm trong việc nghiên cứu thị trường, phân tích tài chính, định hướng phát triển, hoạch định chiến lược kinh doanh và khả năng tiếp thị giỏi… Đồng thời FAHASA còn có nhiều kinh nghiệm trong việc tổ chức các cuộc Hội thảo, Triển lãm và giới thiệu sách quốc văn, ngoại văn với qui mô lớn, ấn tượng.</p><p>FAHASA luôn là đơn vị đi tiên phong trong nhiều hoạt động xã hội, điển hình là việc tham gia tổ chức các Hội sách ở TP.HCM như: Hội sách Thành Phố Hồ Chí Minh, Hội sách Thiếu nhi ngoại thành, Hội sách Mùa khai trường, Hội sách Học đường, Hội sách Trường Quốc tế… Nổi bật nhất là Hội sách Thành Phố Hồ Chí Minh, được định kỳ tổ chức 2 năm một lần. Đây là Hội sách có qui mô lớn, tầm ảnh hưởng rộng, đã để lại ý nghĩa kinh tế, văn hóa và xã hội sâu sắc. Hội sách không chỉ là nơi hội tụ văn hóa lý tưởng đối với người dân TP.HCM mà còn là một thông điệp văn hóa tôn vinh cho các hoạt động Xuất bản – Phát hành sách cả nước, nâng tầm cho việc giao lưu, trao đổi văn hóa với bạn bè thế giới, đồng thời góp phần đem sách - tri thức đến gần hơn với mọi tầng lớp nhân dân, phục vụ tốt hơn nhu cầu văn hóa tinh thần của xã hội</p><p><strong>Xí nghiệp in FAHASA</strong></p><p>Gồm Phân xưởng in và Phân xưởng thành phẩm: với nhiều máy in hiện đại của Đức và Nhật: Heidelberg, Komori, Akiyama, Lithrone, Mitsubishi… cùng nhiều máy móc, thiết bị khác như: máy cắt, máy vô bìa sách, máy bế hộp… &nbsp;Đội ngũ công nhân tay nghề cao, đã cho ra những sản phẩm có chất lượng tốt, nhờ đó, FAHASA luôn chủ động được nguồn hàng, sản xuất theo đúng nhu cầu - thị hiếu của khách hàng và hình thành được quy trình in &amp; phát hành; phương thức này không chỉ cho ra những sản phẩm đảm bảo chất lượng mà còn giúp cho việc giảm giá thành, tăng hiệu quả cạnh tranh và kinh doanh cao hơn.</p><p>Những sản phẩm chủ yếu do Xí nghiệp In FAHASA sản xuất như: tập học sinh, sổ tay cao cấp, lịch, bao bì, sổ notebook, agenda, catalogue, brochure quảng cáo, văn phòng phẩm…</p><p>FAHASA NHÀ PHÂN PHỐI SÁCH NGOẠI VĂN CHUYÊN NGHIỆP</p><p>Dù là những bạn đọc nhỏ tuổi hay những bậc cao niên, dù là bạn đọc ở TP.HCM hay ở các tỉnh thành khác trên cả nước thì tên FAHASA đã trở nên thân quen và tin cậy với họ trong những năm qua. Có thể nói, hệ thống gần 60 Nhà sách của FAHASA là những điểm sinh hoạt văn hóa thân quen dành cho mọi đối tượng bạn đọc. Trong số đó, nhà sách Xuân Thu ở địa chỉ cũ số 185, Đồng Khởi, Quận 1, TP.HCM, nay chuyển về 391-391A Trần Hưng Đạo, Quận 1, TP.HCM tọa lạc tại một địa điểm khá lý tưởng nằm ở trung tâm Thành phố, từ lâu đã là địa chỉ quen thuộc của đông đảo bạn đọc trong và ngoài nước và nơi đây được xem là địa điểm phát hành sách ngoại văn được xếp vào loại bậc nhất ở TP.HCM và của cả nước.</p><p>Cùng với xu thế hội nhập quốc tế đang ngày càng mở rộng, nhu cầu tìm hiểu và giao lưu văn hoá giữa các nước đang ngày càng phát triển, Công ty FAHASA ngày càng xứng đáng với tầm vóc là nhà phát hành đáng tin cậy của hơn 200 NXB trên Thế giới như Oxford, Cambridge, Pearson, McGraw-Hill, MacMillan, Cengage Learning, Reed Elsevier, Taylor &amp; Francis, Heinemann, Hachette édition, Larousse, Clé International, Bắc Kinh, Thượng Hải, Hồng Kông… Thế mạnh của Công ty FAHASA trong lĩnh vực phân phối sách ngoại văn bao gồm cả hai mảng chính: sách học ngữ English language teaching (ELT) và mảng sách chuyên ngành (Academic).</p><p>Về lĩnh vực sách ELT, hiện nay FAHASA đã và đang là nhà phân phối tất cả các loại sách học ngữ, từ điển, các giáo trình tiếng Anh với đủ mọi cấp độ cho các Trung tâm Anh ngữ, các trường Đại học ở TP.HCM nói riêng và cả nước nói chung thông qua các loại sách từ những NXB danh tiếng trên thế giới như Oxford, Cambridge, Pearson Education, Cengage Learning, McGraw-Hill… Đặc biệt, ở lĩnh vực này FAHASA là nhà phát hành độc quyền các ấn phẩm của NXB Oxford tại thị trường Việt Nam bộ sách Let’s Go; hợp tác với NXB Cambridge in ấn và phát hành tại Việt Nam một số bộ giáo trình Anh ngữ New Interchange, Connect, American Primary Colors; Vocabulary in use; Grammar in use… nhằm giảm bớt giá thành so với giá sách nhập khẩu, phục vụ nhu cầu tìm hiểu nâng cao vốn tiếng Anh của đông đảo độc giả.</p><p>Về lĩnh vực sách chuyên ngành (Academic), FAHASA vẫn được xem là nhà phân phối lớn nhất các loại sách chuyên ngành phục vụ nhu cầu học tập, nghiên cứu cho các bạn sinh viên, các giáo viên, giáo sư, những người làm công tác nghiên cứu và hầu hết mọi đối tượng bạn đọc. FAHASA luôn năng động và nhạy bén trong việc nắm bắt nhu cầu của khách hàng, khai thác tối đa và phục vụ kịp thời nhu cầu của bạn đọc gần xa. Hiện nay, FAHASA đang là nhà phát hành cho các tập đoàn xuất bản lớn của Anh, Mỹ như NXB McGraw-Hill, Pearson Education, Cengage Learning, John Wiley…. Đến với cửa hàng sách ngoại văn của FAHASA bạn đọc sẽ tìm thấy hàng loạt các loại sách chuyên ngành bao gồm các thể loại đa dạng thuộc các lĩnh vực Kinh tế, Tin học, Y học, Kiến trúc, Hội họa, Khoa học kỹ thuật và các loại sách tham khảo khác.</p><p>Với phương châm phục vụ quý khách ngày càng tốt hơn, Công ty FAHASA sẽ nỗ lực và phấn đấu hơn nữa để mang đến cho bạn đọc nhiều sách hay, sách tốt nên không chỉ ở Nhà sách Xuân Thu, Tân Định, Sài Gòn là nơi phát hành sách đầy đủ sách ngoại văn mà trong một tương lai không xa, bạn đọc có thể tìm mua bất kỳ các tựa sách nước ngoài nào ở hầu hết các cửa hàng trực thuộc FAHASA.</p><p>TẦM NHÌN VÀ PHƯƠNG HƯỚNG PHÁT TRIỂN CỦA THƯƠNG HIỆU FAHASA TRONG TƯƠNG LAI</p><p>Từ 2005 đến nay, FAHASA đã nhất quán và thực hiện thành công chiến lược xuyên suốt là xây dựng, phát triển Hệ thống Nhà sách chuyên nghiệp trên toàn quốc.Tính đến nay, sau hơn 6 năm thực hiện chiến lược, bên cạnh hệ thống gần 20 Nhà sách được hình thành từ năm 1976 và được phân bổ rộng khắp trên phạm vi TP.HCM, FAHASA đã cơ bản hoàn thiện giai đoạn 1 trong kế hoạch phát triển mạng lưới ở khắp các tỉnh thành trên toàn quốc với thành tựu: gần 80% các tỉnh thành miền Nam và miền Trung đều có mặt ít nhất một Nhà sách FAHASA. Một số tỉnh thành lớn đã có mặt Nhà sách thứ 2, thứ 3 của FAHASA như: Bình Dương, Đồng Nai, Cần Thơ, Đà Nẵng, Hà Nội…</p><p>Tiếp tục định hướng hoạt động chuyên ngành và thực hiện chiến lược phát triển mạng lưới, từ năm 2013 – 2020 FAHASA sẽ phát triển mạnh hệ thống Nhà sách tại các tỉnh thành phía Bắc. Hiện nay, Nhà sách FAHASA đã có mặt tại Hà Nội, Hà Tĩnh, Vĩnh Phúc, Hải Phòng, Thanh Hóa.</p><p>Dự kiến 2020, Hệ thống Nhà sách FAHASA sẽ có khoảng 100 Nhà sách trên toàn quốc. Tiếp tục giữ vững vị thế là hệ thống Nhà sách hàng đầu Việt Nam và nằm trong Top 10 nhà bán lẻ hàng đầu Việt Nam (tính cho tất cả các ngành hàng).</p><p>Dự án xây dựng Trung tâm sách tại TP.HCM với diện tích 5.000m² đến 10.000m², gồm đầy đủ các loại hình hoạt động về sách, phấn đấu xây dựng phong cách kinh doanh hiện đại, ngang tầm với các nước trong khu vực. FAHASA sẽ là kênh tiêu thụ chính của các Nhà xuất bản, các Công ty Truyền thông Văn hóa và là đối tác tin cậy của các Nhà cung cấp trong và ngoài nước. Đồng thời FAHASA giữ vũng vị trí Nhà nhập khẩu và kinh doanh sách ngoại văn hàng đầu Việt Nam.</p><p>SỨ MỆNH CỦA FAHASA: “MANG TRI THỨC, VĂN HÓA ĐỌC ĐẾN VỚI MỌI NHÀ”!</p><p>FAHASA là thương hiệu hàng đầu trong ngành Phát hành sách Việt Nam, ngay từ thời bao cấp cho đến thời kỳ kinh tế thị trường, đổi mới, hội nhập quốc tế, Công ty FAHASA luôn khẳng định vị thế đầu ngành và được đánh giá cao trong quá trình xây dựng đời sống văn hóa, trước hết là văn hóa đọc của nước nhà. Là doanh nghiệp kinh doanh trên lĩnh vực văn hóa, Công ty FAHASA có vai trò và vị thế trong việc giữ vững định hướng tư tưởng văn hóa của Nhà nước, góp phần tích cực vào việc đáp ứng nhu cầu đọc sách của Nhân dân Thành phố Hồ Chí Minh và cả nước; thể hiện toàn diện các chức năng kinh tế - văn hóa - xã hội. Thông qua các chủ trương và hoạt động như: duy trì một số Nhà sách ở các tỉnh có nền kinh tế chưa phát triển, công trình Xe sách Lưu động FAHASA phục vụ bạn đọc ngoại thành tại các huyện vùng sâu, vùng xa, định kỳ tổ chức các Hội sách với nhiều quy mô lớn nhỏ khác nhau… chứng minh rằng FAHASA không chỉ quan tâm đến việc kinh doanh mà còn mang đến mọi người nguồn tri thức quý báu, góp phần không ngừng nâng cao dân trí cho người dân ở mọi miền đất nước, thể hiện sự hài hòa giữa các mục tiêu kinh doanh và hoạt động phục vụ xã hội của FAHASA.</p><p>Hiện nay, Công ty FAHASA đã và đang ngày càng nỗ lực hơn trong hoạt động sản xuất kinh doanh, tiếp tục góp phần vào sự nghiệp phát triển “văn hóa đọc”, làm cho những giá trị vĩnh hằng của sách ngày càng thấm sâu vào đời sống văn hóa tinh thần của xã hội, nhằm góp phần tích cực, đáp ứng yêu cầu nâng cao dân trí, bồi dưỡng nhân tài và nguồn nhân lực cho sự nghiệp công nghiệp hóa, hiện đại hóa đất nước, trong bối cảnh Thành phố Hồ Chí Minh và xã hội Việt Nam đang ngày càng hội nhập sâu rộng vào nền văn hóa, kinh tế tri thức của thế giới.</p><p>BẢNG VÀNG THÀNH TÍCH FAHASA ĐÃ ĐẠT ĐƯỢC TỪ NĂM 2008 - 2012 TRONG HOẠT ĐỘNG SẢN XUẤT KINH DOANH VÀ CÔNG TÁC XÃ HỘI</p><ul><li>&nbsp;Cờ Thi đua của Chính phủ – Thủ tướng Chính phủ – ngày 28/4/2008.</li><li>Cờ thi đua Đơn vị xuất sắc năm 2008 của UBND TP.HCM.</li><li>Đạt giải thưởng «&nbsp;Sao vàng Phương Nam&nbsp;» và giải thưởng “Top 100 Sao vàng Đất Việt” của Ủy ban Trung ương Hội các nhà&nbsp; doanh nghiệp Trẻ Việt Nam năm 2008.</li><li>Bằng khen của Bộ trưởng Bộ Thông tin &amp; truyền thông hoàn thành tốt nhiệm vụ phát hành xuất bản phẩm năm 2008.</li><li>Top 500 nhà bán lẻ hàng đầu Châu Á – Thái Bình Dương do Tạp chí Bán lẻ Châu Á (Singapore) bình chọn năm 2009.</li><li>Top 10 Doanh nghiệp bán lẻ hàng đầu Việt Nam do tạp chí Retail Asia 2008 bình chọn.</li><li>Top Trade Services 2008 do Bộ Công Thương trao tặng.</li><li>Là doanh nghiệp phát hành sách duy nhất trong 10 doanh nghiệp bán lẻ hàng đầu Việt Nam được bình chọn nằm trong Top 500 nhà bán lẻ hàng đầu khu vực Châu Á - Thái Bình Dương do tạp chí Retail Asia năm 2009.</li><li>Top 500 doanh nghiệp lớn nhất Việt Nam VNR500 do Vietnamnet xếp hạng.</li><li>Giải thưởng Sao vàng đất Việt 2009&nbsp; - Top 200 thương hiệu Việt Nam do TW Đoàn TNCS TP.HCM &amp; Hội các Nhà Doanh Nghiệp Trẻ trao tặng.</li><li>Tổng Giám Đốc Phạm Minh Thuận được tặng Danh hiệu Doanh nhân Sài Gòn tiêu biểu năm 2009.</li><li>Cờ thi đua Đơn vị xuất sắc năm 2009 của UBND TP.HCM.</li><li>Cờ thi đua Đơn vị xuất sắc dẫn đầu phong trào thi đua năm 2009 của Bộ Thông tin – Truyền thông.</li><li>Thương hiệu Việt yêu thích nhất 2010 (do bạn đọc báo Sài Gòn Giải Phóng bình chọn).</li><li>Giải thưởng Sao vàng đất Việt 2010 – Top 200 thương hiệu Việt Nam do TW Đoàn TNCS TP.HCM &amp; Hội các Nhà Doanh Nghiệp Trẻ trao tặng.</li><li>Cờ thi đua Đơn vị Xuất Sắc Năm 2010 của Bộ Thông Tin Truyền Thông trao tặng.</li><li>Cờ thi đua Đơn vị Xuất Sắc Năm 2010 của Uy Ban Nhân Dân TP.HCM trao tặng.</li><li>Top 100 Doanh Nghiệp Thương mại – Dịch Vụ Tiêu Biểu 2010 – VietNam Top Trade Service Award 2010.</li><li>Giải thưởng sao vàng đất Việt 4 năm liền từ 2008 đến 2011.</li><li>Giải thưởng Thương hiệu Việt được yêu thích nhất 2010, 2011.</li><li>Xe sách lưu động: Bằng khen của Ban Tuyên Giáo Trung ương năm 2011.</li><li>Top 50 Nhãn hiệu nổi tiếng, Top 500 doanh nghiệp lớn nhất Việt nam 2011.</li><li>Doanh nhân Sài Gòn tiêu biểu 2011.</li><li>Danh hiệu Hàng Việt Nam chất lượng cao 12 liền từ 2000 đến 2012.</li><li>Năm 2012, FAHASA được Thủ tướng chính phủ tặng bằng khen vì đã có thành tích trong công tác tổ chức Hội sách TP.Hồ Chí Minh liên tục nhiều năm qua.</li><li>Top 500 nhà bán lẻ hàng đầu Châu Á – Thái Bình Dương, Top 10 Nhà bán lẻ hàng đầu Việt Nam do Tạp chí Bán lẻ Châu Á (Singapore) bình chọn.</li></ul><p>Bộ máy tổ chức</p><p><img src=\"https://cdn0.fahasa.com/media/wysiwyg/so-do-to-chuc/mo-hinh-to-chuc-2013.jpg\" alt=\"\" width=\"471\" height=\"352\"></p>', 'service', NULL, 1, '2024-05-28 16:44:10', '2024-05-28 16:44:51'),
(24, 'he-thong-trung-tam-nha-sach', 'Hệ thống trung tâm - nhà sách', '<ul><li>Hệ thống trung tâm - nhà sách</li></ul>', 'service', NULL, 1, '2024-05-28 16:44:49', '2024-05-28 16:44:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `total_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_step`
--

CREATE TABLE `order_step` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `origins`
--

CREATE TABLE `origins` (
  `id` int(11) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `origins`
--

INSERT INTO `origins` (`id`, `country_name`) VALUES
(1, 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `ISBN` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `slug`, `title`, `product_type_id`, `genre_id`, `author_id`, `publisher_id`, `ISBN`, `product_name`, `origin_id`, `brand_id`, `description`, `image`, `price`, `discount`, `stock_quantity`, `status`, `create_at`, `update_at`) VALUES
(3, 'tat-den', 'Tắt đèn', 1, 9, 6, NULL, NULL, NULL, NULL, NULL, '<p>Tắt đèn</p>', '1716724088.jpeg', 90000, 90000, NULL, 1, NULL, '2024-05-27 14:05:53'),
(4, 'leu-chong', 'Lều Chõng', 1, 9, 6, NULL, NULL, NULL, NULL, NULL, '<p>Lều Chõng</p>', '1716046451.jpeg', 90000, 90000, NULL, 1, NULL, '2024-05-24 13:49:55'),
(5, 'song-mon', 'Sống Mòn', 1, 9, 3, NULL, NULL, NULL, NULL, NULL, '&#60;p&#62;Sống Mòn&#60;/p&#62;', '', 90000, 90000, NULL, 1, NULL, '2024-05-18 04:20:08'),
(6, 'dat-rung-phuong-nam', 'Đất rừng phương nam', 1, 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(7, 'so-do', 'Số đỏ', 1, 14, 7, NULL, NULL, NULL, NULL, NULL, '<p>Số đỏ</p>', '1716025212.jpg', 10000, 10000, NULL, 1, NULL, '2024-05-18 06:01:57'),
(8, 'vo-de', 'Vỡ Đê', 1, 9, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(9, 'de-men-phieu-luu-ky', 'Dế mèn phiêu lưu ký', 1, 9, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(65, 'chi-pheo', 'Chí phèo', 1, 14, 3, NULL, NULL, NULL, NULL, NULL, '<p><strong>THÔNG TIN CHI TIẾT</strong></p><p>Nhà xuất bản: NXB Thanh Niên</p><p>Ngày xuất bản: 16/04/2024</p><p>Nhà phát hành: AZ Việt Nam</p><p>Kích thước: 12.0 x 19.0 x 1.0 cm</p><p>Số trang: 120 trang</p><p>Trọng lượng: 300 gram</p>', '1716025075.jpg', 900000, 900000, NULL, 1, '2024-05-18 04:37:55', '2024-05-18 05:45:08'),
(66, 'nha-gia-kim', 'Nhà giả kim', 1, 14, 24, NULL, NULL, NULL, NULL, NULL, '<p>Nhà giả kim</p>', '1716032236.jpg', 90000, 80000, NULL, 1, '2024-05-18 06:37:16', '2024-05-18 09:07:03'),
(67, 'hoang-tu-be', 'Hoàng tử bé', 1, 3, 25, NULL, NULL, NULL, NULL, NULL, '<p>Hoàng tử bé</p>', '1716037282.jpg', 900000, 900000, NULL, 1, '2024-05-18 08:01:22', '2024-05-18 08:01:41'),
(68, 'so-dua', 'Sọ dừa', 1, 3, 26, NULL, NULL, NULL, NULL, NULL, '<p>Sọ dừa</p>', '1716037465.jpeg', 80000, 80000, NULL, 1, '2024-05-18 08:04:25', '2024-05-18 09:06:33'),
(69, 'nhung-giac-mo-xanh', 'Những giấc mơ xanh', 1, 3, 27, NULL, NULL, NULL, NULL, NULL, '<p>Những giấc mơ xanh</p>', '1716037564.jpg', 900000, 900000, NULL, 1, '2024-05-18 08:06:04', '2024-05-18 08:07:16'),
(81, 'but-bi-do', NULL, 2, NULL, NULL, NULL, NULL, 'Bút bi đỏ', 1, 1, '<p>đỏ lè đỏ lét</p>', '1716627873.jpg', 50000, 50000, NULL, 1, '2024-05-24 14:34:05', '2024-05-25 09:04:33'),
(88, 'tat-den', 'Tắt đèn(1)(1)', 1, 9, 6, NULL, NULL, NULL, NULL, NULL, '<p>Tắt đèn</p>', '1716724088.jpeg', 90000, 90000, NULL, 1, '2024-05-26 14:22:50', '2024-05-26 11:48:08'),
(89, 'la-lung', 'Lạ lùng', 1, 3, 3, NULL, NULL, NULL, NULL, NULL, '<p>Lạ lùng</p>', 'noimage.jpg', 90000, 90000, NULL, 1, '2024-05-26 14:23:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_types`
--

CREATE TABLE `product_types` (
  `id` int(11) NOT NULL,
  `product_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_types`
--

INSERT INTO `product_types` (`id`, `product_type`) VALUES
(1, 'Sách'),
(2, 'Văn phòng phẩm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`) VALUES
(1, 'Vũ sáng tác'),
(2, 'Hoàng Dũng sáng tác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `zip_code` int(11) NOT NULL
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
-- Chỉ mục cho bảng `adminToken`
--
ALTER TABLE `adminToken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custommer_id` (`custommer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `custommers`
--
ALTER TABLE `custommers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order_step`
--
ALTER TABLE `order_step`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `product_type_id` (`product_type_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `origin_id` (`origin_id`);

--
-- Chỉ mục cho bảng `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `adminToken`
--
ALTER TABLE `adminToken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `custommers`
--
ALTER TABLE `custommers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `inventory_log`
--
ALTER TABLE `inventory_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_step`
--
ALTER TABLE `order_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `origins`
--
ALTER TABLE `origins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `adminToken`
--
ALTER TABLE `adminToken`
  ADD CONSTRAINT `admintoken_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`custommer_id`) REFERENCES `custommers` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `inventory_log`
--
ALTER TABLE `inventory_log`
  ADD CONSTRAINT `inventory_log_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `custommers` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `order_step`
--
ALTER TABLE `order_step`
  ADD CONSTRAINT `order_step_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `order_step_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
