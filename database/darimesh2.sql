-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2022 at 02:34 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darimesh2`
--

-- --------------------------------------------------------

--
-- Table structure for table `allproduct`
--

DROP TABLE IF EXISTS `allproduct`;
CREATE TABLE IF NOT EXISTS `allproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `content` text COLLATE utf8_persian_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `isExist` int(1) NOT NULL DEFAULT '0',
  `category` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `allproduct`
--

INSERT INTO `allproduct` (`id`, `title`, `content`, `slug`, `image`, `tag`, `price`, `isExist`, `category`) VALUES
(1, 'لپ تاپ 15.6 اینچی ایسوس مدل M509BA	', '<p>ایسوس&nbsp;</p>', 'laptop-asus-15in-m509ba	', 'https://s6.uupload.ir/files/asus-m509ba-15.6in_cwof.jpg', 'کالای دیجیتال ، لپ تاپ ، ایسوس', 12450000, 1, 'laptop'),
(2, 'لپ تاپ 14 اینچی ایسوس مدل Vivobook R465FAB	', '<p>ایسوس&nbsp;</p>', 'laptop-asus-14in-vivr465fab', 'https://s6.uupload.ir/files/asus-vivobook-r465fab-14in_qx6y.jpg', 'کالای دیجیتال ، لپ تاپ ، ایسوس', 22500000, 1, 'laptop'),
(3, 'لپ تاپ 15 اینچی ایسر مدل Aspire A31558-320p - A	', '<p>ایسر&nbsp;</p>', 'laptop-aser-a31558320pa', 'https://s6.uupload.ir/files/aser-aspire-a31558-320p-a-15in_aidx.jpg', 'کالای دیجیتال ، لپ تاپ ، ایسر', 28530000, 1, 'laptop'),
(4, 'لپ تاپ 15 اینچی ایسر مدل Aspire A315 58g- 74JC - A	', '<p>ایسر&nbsp;</p>', 'laptop-aser-15in-a31558g74jca', 'https://s6.uupload.ir/files/aser-aspire-a315-58g-74jc-a-15in_f7zx.jpg', 'کالای دیجیتال ، لپ تاپ ، ایسر', 23000000, 1, 'laptop'),
(5, 'لپ تاپ 15.6 اینچی ایسر مدل Nitro5 AN515-55-58HK	', '<p>ایسر&nbsp;</p>', 'laptop-aser-15.6inan5155558hk	', 'https://s6.uupload.ir/files/aser-nitro5-an515-45-r5t9-15in_xw1o.jpg', 'کالای دیجیتال ، لپ تاپ ، ایسر', 24690000, 1, 'laptop'),
(6, 'لپ تاپ 17.3 اینچی ایسوس مدل ROG Strix SCAR 17 G733ZM-A	', '<p>ایسوس</p>', 'laptop-asus-17.3in-rog-strix-scar17gv33zma	', 'https://s6.uupload.ir/files/special-asus-rog-strix-g15-g513ie-aa_m98p.jpg', 'کالای دیجیتال ، لپ تاپ ، ایسوس', 28720000, 1, 'laptop'),
(7, 'تبلت لنوو مدل TAB M7-7305X ظرفیت 16 گیگابایت	', '<p>لنوو&nbsp;</p>', 'tablet-16gb-lenovo-m77305x	', 'https://s6.uupload.ir/files/tablet-lenovo-tab-mt-7305i-16gb_8mm5.jpg', 'کالای دیجیتال ، تبلت ، لنوو', 1260000, 1, 'laptop'),
(28, 'تبلت سامسونگ مدل Galaxy TAB S6 Lite SM-P615 LTE ظرفیت 128 گیگابایت	', '<p>سامسونگ&nbsp;</p>', 'tablet-128gb-s6litesmp615lte	', 'https://s6.uupload.ir/files/tablet-samsung-tab-s6-lite-sm-p615lte-128gb_qbms.jpg', 'کالای دیجیتال ، تبلت ، سامسونگ	', 0, 0, 'laptop'),
(9, 'هارد ssd سامسونگ مدل evo 870 با ظرفیت 500 گیگابایت	', '<p>سامسونگ&nbsp;</p>', 'samsung-ssd-evo870500gb	', 'https://s6.uupload.ir/files/ssd-internal-samsung-evo870-500gb_9pgc.jpg', 'کالای دیجیتال ، هارد ، سامسونگ	', 1865000, 1, 'accessories'),
(10, 'گوشی سامسونگ A22 sm 2 سیمکارت با ظرفیت 128 گیگابایت	', '<p>سامسونگ&nbsp;</p>', 'mobile-samsung-a22	', 'https://s6.uupload.ir/files/a22sm-128g_1xxc.jpg', 'کالای دیجیتال ، موبایل ، سامسونگ	', 4500000, 1, 'mobile'),
(11, 'گوشی موبایل سامسونگ A12 Nacho با ظرفیت 64 گیگابایت	', '<p>گوشی موبایل سامسونگ&nbsp;</p>', 'mobile-samsung-a12	', 'https://s6.uupload.ir/files/a12nachosm-64g-spec_igh8.jpg', 'کالای دیجیتال ، موبایل ، سامسونگ	', 4200000, 1, 'mobile'),
(12, 'گوشی موبایل سامسونگ a52 5g با ظرفیت 256 گیگابایت	', '<p>گوشی موبایل سامسونگ</p>', 'mobile-samsung-a52	', 'https://s6.uupload.ir/files/a52s-5g-sm-2sim-256gb_yr72.jpg', 'کالای دیجیتال ، موبایل ، سامسونگ	', 8870000, 1, 'mobile'),
(13, 'گوش موبایل شیائومی مدل Poco F3 5g با ظرفیت 256 گیگابایت	', '<p>گوش موبایل شیائومی</p>', 'mobile-xiaomi-pocof3	', 'https://s6.uupload.ir/files/pocof3-5g-256g_v2fq.jpg', 'کالای دیجیتال ، موبایل ، شیائومی	', 12500000, 1, 'mobile'),
(14, 'گوشی موبایل اپل مدل iPhone 13 pro max 2 سیمکارت با ظرفیت 256 گیگابایت	', '<p>گوشی موبایل اپل&nbsp;</p>', 'mobile-apple-iphone13promax	', 'https://s6.uupload.ir/files/iphone13promax-2sim-1t_isyf.jpg', 'کالای دیجیتال ، موبایل ، اپل	', 0, 0, 'mobile'),
(15, 'گوشی موبایل شیائومی مدل 11T pro 5g با ظرفیت 256 گیگابایت	', '<p>گوشی موبایل شیائومی</p>', 'mobile-xiaomi-11tpro5g	', 'https://s6.uupload.ir/files/xiaomi-11tpro-5g-256g_pi8g.jpg', 'کالای دیجیتال ، موبایل ، شیائومی	', 13700000, 1, 'mobile'),
(16, 'گوشی موبایل نوکیا مدل g20 ta 1365 2 سیمکارت با ظرفیت 128 گیگابایت	', '<p>گوشی موبایل نوکیا&nbsp;</p>', 'mobile-nokia-g30ta1365	', 'https://s6.uupload.ir/files/nokia-g20ta-1365-128g_0d1y.jpg', 'کالای دیجیتال ، موبایل ، نوکیا	', 0, 0, 'mobile'),
(17, 'هدست اونیکوما مدل X20 7.1	', '<p>هدست اونیکوما&nbsp;</p>', 'headset-unikomax207.1	', 'https://s6.uupload.ir/files/headset-unikoma-x20-7.1_fdsk.jpg', 'کالای دیجیتال ، هدست ، اونیکوما	', 890000, 1, 'audible'),
(18, 'هندزفری بلوتوث ایرداتز پرو 3	', '<p>هندزفری&nbsp;</p>', 'handsferi-airdotspro-3	', 'https://s6.uupload.ir/files/airdotspro_abkr.jpg', 'کالای دیجیتال ، هندزفری ، شیائومی	', 0, 0, 'audible'),
(19, 'هدست کوشن ایچ مدل g9000	', '<p>هدست کوشن ایچ م</p>', 'headset-kotioneach-g9000	', 'https://s6.uupload.ir/files/headset-kotion-each-g9000_tqdd.jpg', 'کالای دیجیتال ، هدست ، کوشن ایچ	', 412000, 1, 'audible'),
(21, 'هدست تسکو مدل th5127	', '<p>تسکو&nbsp;</p>', 'headset-tsco-th5127	', 'https://s6.uupload.ir/files/headset-tscoth-5127_wewa.jpg', 'کالای دیجیتال ، هدست ، تسکو	', 277000, 1, 'audible'),
(22, 'موس پد گیمینگ مدل mous543	', '<p>گیمینگ&nbsp;</p>', 'mousepad-mouse543	', 'https://s6.uupload.ir/files/mousepad-gaming-mou543_wvfb.jpg', 'لوازم جانبی ، موس ، موس پد	', 31000, 1, 'accessories'),
(23, 'رم گیمینگ Vengence rgb ddr4 pro با فرکانس 3200MHZ و ظرفیت 16 گیگابایت	', '<p>رم گیمینگ Vengence&nbsp;</p>', 'vengence-ram-rgb-2chann-16gb	', 'https://s6.uupload.ir/files/ram-pc-2channel-ddr4-3200mhz-vengence-rgb-pro_vror.jpg', 'کالای دیجیتال ، رم ، ونجنس	', 2378000, 1, 'accessories'),
(24, 'مانیتور دل مدل S2721HN 27اینچ	', '<p>مانیتور دل</p>', 'monitor-dell-s2721hn	', 'https://s6.uupload.ir/files/dell-s2721hn-27inch_dadk.jpg', 'کالای دیجیتال ، مانیتور ، دل	', 7287000, 1, 'accessories'),
(25, 'موس تسکو مدل tm 764 ga	', '<p>تسکو&nbsp;</p>', 'tsco-mouse-gaming-tm764ga	', 'https://s6.uupload.ir/files/mouse-tsco-tm-764-ga_88ti.jpg', 'کالای دیجیتال ، موس ، تسکو	', 0, 0, 'accessories'),
(26, 'هارد اینترنال وسترن دیجیتال مدل Purple با ظرفیت 1 ترابایت	', '<p>وسترن&nbsp;</p>', 'hdd-wd-purple-1tb	', 'https://s6.uupload.ir/files/hdd-internal-wd-purple-1tb_nka.jpg', 'کالای دیجیتال ، هارد ، وسترن دیجیتال	', 2350000, 1, 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(14) NOT NULL AUTO_INCREMENT,
  `user_id` int(14) NOT NULL,
  `product_id` int(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`) VALUES
(1, 8, 2),
(9, 8, 3),
(10, 8, 4),
(6, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sub` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sort` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `sub`, `sort`) VALUES
(1, 'لوازم خانگی', '1', '1'),
(2, 'لوازم آشپزخانه', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `activeCode` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `role` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `username`, `password`, `address`, `activeCode`, `status`, `role`) VALUES
(8, 'JavadYousefi', '09224187498', 'yousefi@yopmail.com', 'Javad', 'c881d486ce14a03ba487e7a5e3842150', 'varamin', '68588', 1, 1),
(9, 'زهرا عاشوری نسب', '09266666666', 'zahra@yopmail.com', 'zahran', 'c881d486ce14a03ba487e7a5e3842150', 'kerman', '52575', 1, 0),
(11, 'reza ataei', '09124123122', 'reza@yopmail.com', 'Admin', 'c881d486ce14a03ba487e7a5e3842150', 'esfahan', '88775', 1, 1),
(12, 'عاطفه موصتوفی راد', '09388888888', 'atefe@yopmail.com', 'ad_atefe', 'c881d486ce14a03ba487e7a5e3842150', 'tehran', '66908', 1, 1),
(13, 'Mohsen alian nejad', '09265266666', 'mohsen@yopmail.com', 'mohsen', 'c881d486ce14a03ba487e7a5e3842150', 'semnan', '70519', 1, 0),
(14, 'مرتضی بختیاری', '09355555555', 'morteza@yopmail.com', 'morteza', 'c881d486ce14a03ba487e7a5e3842150', 'mashhad', '60602', 1, 0),
(15, 'Amir Boghrati', '09256663636', 'amir@yopmail.com', 'amir', 'c881d486ce14a03ba487e7a5e3842150', 'ahvaz', '20657', 1, 0),
(16, 'mohammad reza jalali', '09333333333', 'mohammad@yopmail.com', 'mo_reza', 'c881d486ce14a03ba487e7a5e3842150', 'golestan', '10447', 1, 0),
(17, 'shohreh lorestani', '09185666666', 'shohreh@yopmail.com', 'shohreh', 'c881d486ce14a03ba487e7a5e3842150', 'rasht', '60210', 1, 0),
(18, 'فاطمه اهورایی', '09124123122', 'fatemeh@yopmail.com', 'fatemeh', 'c881d486ce14a03ba487e7a5e3842150', 'qom\r\n', '79989', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
