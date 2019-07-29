-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 29, 2019 lúc 11:18 AM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cosodulieu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dcm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `document`
--

INSERT INTO `document` (`id`, `user_id`, `dcm`, `desc`, `created_at`, `updated_at`) VALUES
(5, 1, 'Bài thực hành PHP.docx', 'koekdaasdas', 1564115595, 1564376224),
(7, 3, 'Lab_1.docx', 'oke', 1564125010, 1564125010),
(8, 4, 'Tran_Quoc_Dat.docx', 'oke', 1564125126, 1564125126),
(12, 1, '1564372356-Hydrangeas.jpg', 'abc', 1564372356, 1564372356),
(15, 6, '1564385314-NHẬT KÝ THỰC TẬP TẠI DOANH NGHIỆP.docx', 's', 1564385314, 1564385314),
(16, 6, '1564386085-Nguyen_Duy_Hung.docx', 'ass', 1564385332, 1564386085),
(17, 6, '1564385474-Koala.jpg', 'sdfsgfefw', 1564385474, 1564385474),
(18, 1, '1564387622-Doan Van Thanh.docx', 'sdasd', 1564387225, 1564390001),
(19, 1, '1564389992-Tulips.jpg', 'ok', 1564387576, 1564389992),
(20, 1, '1564390125-Phiếu đánh giá thực tập.docx', 'khong co', 1564390062, 1564390125),
(21, 7, '1564390784-NKTT_Tran Quoc Dat.docx', 'oke day', 1564390784, 1564390784);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exp` text COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `started_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `exp`, `company`, `started_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 1, 'coder', 'LinxHQ', '1900-10-29', '1900-11-02', 1564111163, 1564111199),
(7, 1, 'Lập trình Web', 'FPT', '2019-07-30', '2019-07-31', 1564111151, 1564123224),
(8, 1, 'Bán hàng', 'Shopee', '2019-07-01', '2019-07-30', 1564110890, 1564123280),
(9, 3, 'developer', 'abc', '2019-07-22', '2019-07-31', 1564111677, 1564111677),
(11, 4, 'youtuber', 'youtube', '2019-07-01', '2019-07-31', 1564116336, 1564116336),
(12, 6, 'ceo', 'ceo', '2019-07-01', '2019-08-08', 1564388519, 1564388519),
(13, 7, 'dọn dẹp', 'CLEAN', '2010-10-27', '2019-08-21', 1564390756, 1564390756);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1564023632),
('m130524_201442_init', 1564023643),
('m190124_110200_add_verification_token_column_to_user_table', 1564023644),
('m190726_012205_experiences', 1564104679),
('m190726_014129_experiences', 1564105472),
('m190726_035220_document', 1564113396);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `phone`, `img`, `date_of_birth`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'dat', 'tran', 123, '1564126673-Lighthouse.jpg', '1900-11-06', 'p3MKyoJZZRZ_YHSzstZI5_gdbsXKP6FC', '$2y$13$MLYY.zByhkWSrTwdJ4NU4eJZ7csLfmxZPNRjclzSQv3NkvTBpJkjO', '', 'admin@gmail.com', 10, 1564024186, 1564126673, 'N6_zmsyh0PKNo5Hzxn2AjOPxFSLHZEKD_1564024186'),
(3, 'dat', 'dat', 'tran', 12321, 'Jellyfish.jpg', '1900-11-01', 'rYRF9sZCVz1C1DfZA1VAWPf7zbmEMTBu', '$2y$13$5emqXOFAV7IkexyD6HinGeiVkI8iz7r/UpdMe0YqNyDPVLULe/HwC', NULL, 'dat@gmail.com', 10, 1564025047, 1564112564, 'E3iU0fDC_U3OFHMk2c2N48xlq4iiFTF0_1564025047'),
(4, 'hoi', 'Hội', 'Trần', 123456789, 'BEBrpNPxm52hjfxGnDfehRciN.png', '2011-12-11', 'UlwFiyJuzABb7sJ4dfZG7PXZDaOyYrJ-', '$2y$13$/AO5HLTn/91qcglf7tzcdOZjXdxBJfCbOuUV3LL6SyHqGSyFwvLs.', NULL, 'hoi@gmail.com', 10, 1564025490, 1564116170, 'uY3Pws8jrX-nEc479C54Sj7oVuTTIG7H_1564025490'),
(6, 'tranquocdataa', 'Đạt', 'Trần', 961669699, '1564386273-Penguins.jpg', '1900-11-30', '-0dvgh7-I4jXHHgvk4LCcft7VbBYHQm6', '$2y$13$LKJ9HyoPbAxos0W2gbqWPuVEzYhDywBg7S2KlFZGLSoLA3Q0lkfoS', NULL, 'tranquocdataa@gmail.com', 10, 1564376624, 1564386273, 'KE-_IpjuSzBrlLPS52V09T7yIxzPrz8K_1564376624'),
(7, 'tokuda', 'Ông', 'Mr.', 1234567, '1564390639-Andy Ruiz Jr Champion of The World T-Shirt Black-Navy for Men-Women-Youth.png', '1900-11-29', '_4az1CVoL3UkOBhY0tAynQCunwxHkEXf', '$2y$13$VcRWf/fvrCm4RD4QMQQHI.qHrdQuigeHhsoNnhZebaD2DwQtyHpMa', NULL, 'tokuda@gmail.com', 10, 1564390531, 1564390639, '1DOzxCG1prod9Mbk3TluQI-GRn3ft3Q6_1564390531');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-document-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-experiences-user_id` (`user_id`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `fk-document-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `fk-experiences-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
