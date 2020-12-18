-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2020 lúc 09:16 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_11_065701_create_tbl_admin_table', 1),
(5, '2020_12_13_124939_create_tbl_category_product', 2),
(6, '2020_12_13_131822_create_tbl_brand_product', 2),
(7, '2020_12_18_141742_create_tbl_product', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Razer', 'Razer Inc. là một công ty của Mỹ được thành lập bởi Min-Liang Tan, và Robert Krakoff có trụ sở ở Irvine, California, chuyên kinh doanh các sản phẩm dành cho game thủ. Razer chuyên tâm vào chế tạo và phát triển các sản phẩm hướng tới game thủ PC như laptop chơi game, máy tính bảng chơi game, thiết bị ngoại vi máy tính chơi game khác nhau, thiết bị đeo và phụ kiện. Thương hiệu Razer hiện tại thuộc sở hữu của Razer USA Ltd', 0, NULL, NULL),
(2, 'Acer', 'Acer là một tập đoàn đa quốc gia hoạt động trong lĩnh vực sản xuất laptop, PC, thiết bị ngoại vi, sản phẩm công nghệ…trụ sở chính đặt tại Đài Loan, còn có tên gọi khác là tập đoàn Hoành Kì.', 0, NULL, NULL),
(3, 'Asus', 'ASUS là một trong ba nhà cung cấp máy tính xách tay hàng đầu đồng thời ASUS cũng là nhà sản xuất bo mạch chủ bán chạy nhất và giành được nhiều giải thưởng nhất trên thế giới.', 0, NULL, NULL),
(4, 'Dell', 'Dell Inc. là một công ty đa quốc gia của Hoa Kỳ về phát triển và thương mại hóa công nghệ máy tính có trụ sở tại Round Rock, Texas, Hoa Kỳ. Dell được thành lập năm 1984 do chủ quản gia Michael Dell đồng sáng lập. Đây là công ty có thu nhập lớn thứ 28 tại Hoa Kỳ.', 0, NULL, NULL),
(5, 'HP', 'Hewlett-Packard (viết tắt HP) là tập đoàn công nghệ thông tin lớn trên thế giới. HP thành lập năm 1939 tại Palo Alto, California, Hoa Kỳ. HP hiện có trụ sở tại Cupertino, California, Hoa Kỳ. Năm 2006, tổng doanh thu của HP đạt 9,4 tỷ đô la, vượt đối thủ IBM với 9,1 tỉ, chính thức vươn lên vị trí số một (đến nay là Google đứng số một) trong các công ty công nghệ thông tin.', 0, NULL, NULL),
(6, 'Microsoft', 'Microsoft là một tập đoàn đa quốc gia của Hoa Kỳ có trụ sở chính tại Redmond, Washington; chuyên phát triển, sản xuất, kinh doanh bản quyền phần mềm và hỗ trợ trên diện rộng các sản phẩm và dịch vụ liên quan đến máy tính. Công ty được sáng lập bởi Bill Gates và Paul Allen vào ngày 4 tháng 4 năm 1975. Nếu tính theo doanh thu thì Microsoft là hãng sản xuất phần mềm lớn nhất thế giới.[3] Nó cũng được gọi là \"một trong những công ty có giá trị nhất trên thế giới\".[4]', 0, NULL, NULL),
(7, 'No Brand', 'Không có thương hiệu', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Phụ Kiện', 'Phụ kiện có nhiều loại nhằm mục đích phụ trợ cho các thiết bị điện tử như Laptop, Điện thoại, Tablet.', 0, NULL, NULL),
(2, 'Đồng Hồ', 'Đồng hồ là một dụng cụ thường dùng để đo khoảng thời gian dưới một ngày; khác với lịch, là một dụng cụ đo thời gian một ngày trở lên. Có những loại đồng hồ tân tiến và cấu trúc phức tạp đạt kỹ thuật đo thời gian rất chính xác. Ngoài những loại đồng hồ lớn đặt ở vị trí cố định, người ta cũng đã tạo ra loại đồng hồ nhỏ dễ dàng mang theo bên mình, ngoài chức năng ghi giờ giấc còn là món hàng mỹ thuật có tính thời trang.', 0, NULL, NULL),
(3, 'Âm Thanh', 'Loa là thiết bị phát ra âm thanh, loa được ứng dụng khá nhiều trong cuộc sống, loa góp phần trong dàn âm thanh chuyên nghiệp, loa dùng cho dàn âm thanh gia đình…Ngoài ra, loa còn dùng cho các hoạt động khác cả cá nhân và tổ chức.\r\nTai nghe là thiết bị gồm một cặp loa phát âm thanh được thiết kế nhỏ gọn, mang tính di động và vị trí của chúng là thường được đặt áp sát hoặc bên trong tai. Có nhiều cách để phân loại tai nghe, như loại có dây hoặc không dây, hay tai nghe chỉ gồm bộ phận loa hoặc tai nghe gồm cả loa và micrô.', 0, NULL, NULL),
(4, 'Tablet', 'Máy tính bảng, thông thường với hệ điều hành di động và mạch xử lý màn hình cảm ứng và pin có thể sạc lại trong một gói phẳng, đơn lẻ. Máy tính bảng là một máy tính làm những gì máy tính cá nhân khác làm, nhưng thiếu một số khả năng đầu vào/đầu ra (I/O) mà các máy tính khác có. Máy tính bảng hiện đại phần lớn giống với điện thoại thông minh hiện đại, điểm khác biệt duy nhất là máy tính bảng tương đối lớn hơn điện thoại thông minh, với màn hình 7 inch (18cm) hoặc lớn hơn, được đo theo đường chéo, và có thể không hỗ trợ truy cập đến một mạng di động.', 0, NULL, NULL),
(5, 'Điện Thoại', 'Điện thoại là thiết bị viễn thông dùng để trao đổi thông tin, thông dụng nhất là truyền giọng nói - tức là \"thoại\", từ xa giữa hai hay nhiều người. Điện thoại biến tiếng nói thành tín hiệu điện và truyền trong mạng điện thoại phức tạp thông qua kết nối để đến người sử dụng khác. Hệ thống thực hiện công năng như vậy có hai hợp phần cơ bản: # Thiết bị đầu cuối, thường gọi bằng chính tên \"điện thoại\", thực hiện biến tiếng nói thành tín hiệu điện để truyền đi, và biến tín hiệu điện nhận được thành âm thanh. # Mạng điện thoại điều khiển kết nối và truyền dẫn, thực hiện nối những người dùng liên quan với nhau và truyền dẫn tín hiệu.', 0, NULL, NULL),
(6, 'Laptop', 'Máy tính xách tay hay máy vi tính xách tay (Tiếng Anh: laptop computer hay laptop PC) là một chiếc máy tính cá nhân nhỏ gọn có thể mang xách được. Nó thường có trọng lượng nhẹ, tùy thuộc vào hãng sản xuất và kiểu máy dành cho mỗi đối tượng có mục đích sử dụng khác nhau.\r\n\r\nLaptop thường có một màn hình LCD hoặc LED mỏng gắn bên trong nắp trên vỏ máy và bàn phím chữ kết hợp số ở bên trong nắp dưới vỏ máy. Để sử dụng máy tính người sử dụng sẽ mở tách hai phần trên dưới của máy. Laptop khi không dùng đến sẽ được gấp lại, và do đó nó thích hợp cho việc sử dụng khi di chuyển. Mặc dù ban đầu có một sự khác biệt giữa laptop, netbook và ultrabook, với chiếc laptop lớn hơn và nặng hơn netbook, nhưng đến năm 2014, không còn bất kỳ sự khác biệt nào nữa.[1] Laptop thường được sử dụng trong nhiều hoàn cảnh, chẳng hạn như tại nhà(gia đình), trong văn phòng, lướt Internet, chơi trò chơi, giải trí cá nhân và V.v...', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'ACER PREDATOR HELIOS 300', 6, 2, 'Intel Core i7 8750H 2.2Ghz, 8GB DDR4 2666Mhz, 1TB HDD, GTX1050Ti, 15.6\" 1920x1080', 'Intel Core i7 8750H 2.2Ghz, 8GB DDR4 2666Mhz, 1TB HDD, GTX1050Ti, 15.6\" 1920x1080', '27,650,000', 'acer0224.jpg', 0, NULL, NULL),
(6, 'ACER NITRO 5 AN515-53', 6, 2, 'Intel Core i7 8750H 2.2Ghz, 16GB DDR4 2666Mhz, 1TB HDD, GTX1060, 17.3\" 1920x1080', 'Intel Core i7 8750H 2.2Ghz, 16GB DDR4 2666Mhz, 1TB HDD, GTX1060, 17.3\" 1920x1080', '17,900,000', 'acer0317.jpg', 0, NULL, NULL),
(7, 'ACER VX5-591G', 6, 2, 'Intel Core i7 7700HQ 2.8 Ghz, 8GB DDR4 2400MHz, 1TB HDD, GTX 1050, 15.6\" 1920x1080', 'Intel Core i7 7700HQ 2.8 Ghz, 8GB DDR4 2400MHz, 1TB HDD, GTX 1050, 15.6\" 1920x1080', '20,500,000', 'acer0142.jpg', 0, NULL, NULL),
(8, 'ASUS X407UA', 6, 3, 'Intel Core i3 8130U 2.2Ghz, 4GB DDR4 2400Mhz 1TB HDD, Intel UHD 620, 14\" 1366x768', 'Intel Core i3 8130U 2.2Ghz, 4GB DDR4 2400Mhz 1TB HDD, Intel UHD 620, 14\" 1366x768', '10,190,000', 'asus0135.jpg', 0, NULL, NULL),
(9, 'ASUS TUF GAMING FX505GE', 6, 3, 'Intel Core i7 8750H 2.2Ghz, 8GB DDR4 2666Mhz, 1TB HDD, GTX1050Ti, 15.6\" 1920x1080', 'Intel Core i7 8750H 2.2Ghz, 8GB DDR4 2666Mhz, 1TB HDD, GTX1050Ti, 15.6\" 1920x1080', '24,590,000', 'asus0269.jpg', 0, NULL, NULL),
(10, 'ASUS TUF GAMING FX705GM', 6, 3, 'Intel Core i7 8750H 2.2Ghz, 16GB DDR4 2666Mhz, 1TB HDD, GTX1060, 17.3\" 1920x1080', 'Intel Core i7 8750H 2.2Ghz, 16GB DDR4 2666Mhz, 1TB HDD, GTX1060, 17.3\" 1920x1080', '32,990,000', 'asus0337.jpg', 0, NULL, NULL),
(11, 'ASUS F570ZD', 6, 3, 'AMD Ryzen 5 2500U 2.0Ghz, 4GB DDR4 2400Mhz, 1TB HDD, GTX 1050, 15.6\" 1920x1080', 'AMD Ryzen 5 2500U 2.0Ghz, 4GB DDR4 2400Mhz, 1TB HDD, GTX 1050, 15.6\" 1920x1080', '15,990,000', 'asus0458.jpg', 0, NULL, NULL),
(12, 'ALIENWARE 15 R3 - 7716G256', 6, 4, 'Intel Core i7-7700HQ, GTX 1070 8GB GDDR5, 16GB DDR4 - 2400 Mhz, 256GB SSD + 1Tb, 15.6\" (1920 x 1080)', 'Intel Core i7-7700HQ, GTX 1070 8GB GDDR5, 16GB DDR4 - 2400 Mhz, 256GB SSD + 1Tb, 15.6\" (1920 x 1080)', '37,200,000', 'dell0128.jpg', 0, NULL, NULL),
(13, 'ALIENWARE 17 R2 478G256GG', 6, 4, 'Intel Core i7-4720HQ, GTX 1060 8GB GDDR5, 8GB DDR4 - 2400 Mhz, 256GB SSD, 17.3\" (1920 x 1080)', 'Intel Core i7-4720HQ, GTX 1060 8GB GDDR5, 8GB DDR4 - 2400 Mhz, 256GB SSD, 17.3\" (1920 x 1080)', '21,000,000', 'dell0281.jpg', 0, NULL, NULL),
(14, 'ALIENWARE M17 878G128G', 6, 4, 'Intel Core i7-7700HQ, GTX 1070 8GB GDDR5, 16GB DDR4 - 2400 Mhz, 256GB SSD + 1Tb, 15.6\" (1920 x 1080)', 'Intel Core i7-7700HQ, GTX 1070 8GB GDDR5, 16GB DDR4 - 2400 Mhz, 256GB SSD + 1Tb, 15.6\" (1920 x 1080)', '50,500,000', 'dell0313.jpg', 0, NULL, NULL),
(15, 'ALIENWARE M15 RED 8716G51', 6, 4, 'Intel Core i7-8750HQ, GTX 2060 8GB GDDR5, 24GB DDR4 - 2400 Mhz, 512GB, 15.6\" (1920 x 1080)', 'Intel Core i7-8750HQ, GTX 2060 8GB GDDR5, 24GB DDR4 - 2400 Mhz, 512GB, 15.6\" (1920 x 1080)', '56,000,000', 'dell0451.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
