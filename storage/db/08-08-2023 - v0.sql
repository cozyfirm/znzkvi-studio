-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 10:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `znzkvi-studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `api__countries`
--

CREATE TABLE `api__countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ba` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api__countries`
--

INSERT INTO `api__countries` (`id`, `name`, `name_ba`, `code`, `flag`, `phone_code`, `created_at`, `updated_at`) VALUES
(1, 'Albania', NULL, 'AL', 'https://media-2.api-sports.io/flags/al.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(2, 'Algeria', NULL, 'DZ', 'https://media-1.api-sports.io/flags/dz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(3, 'Andorra', NULL, 'AD', 'https://media-3.api-sports.io/flags/ad.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(4, 'Angola', NULL, 'AO', 'https://media-1.api-sports.io/flags/ao.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(5, 'Argentina', NULL, 'AR', 'https://media-2.api-sports.io/flags/ar.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(6, 'Armenia', NULL, 'AM', 'https://media-3.api-sports.io/flags/am.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(7, 'Aruba', NULL, 'AW', 'https://media-3.api-sports.io/flags/aw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(8, 'Australia', NULL, 'AU', 'https://media-3.api-sports.io/flags/au.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(9, 'Austria', NULL, 'AT', 'https://media-2.api-sports.io/flags/at.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(10, 'Azerbaidjan', NULL, 'AZ', 'https://media-2.api-sports.io/flags/az.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(11, 'Bahrain', NULL, 'BH', 'https://media-3.api-sports.io/flags/bh.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(12, 'Bangladesh', NULL, 'BD', 'https://media-3.api-sports.io/flags/bd.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(13, 'Barbados', NULL, 'BB', 'https://media-3.api-sports.io/flags/bb.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(14, 'Belarus', NULL, 'BY', 'https://media-3.api-sports.io/flags/by.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(15, 'Belgium', NULL, 'BE', 'https://media-2.api-sports.io/flags/be.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(16, 'Belize', NULL, 'BZ', 'https://media-2.api-sports.io/flags/bz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(17, 'Benin', NULL, 'BJ', 'https://media-2.api-sports.io/flags/bj.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(18, 'Bermuda', NULL, 'BM', 'https://media-1.api-sports.io/flags/bm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(19, 'Bhutan', NULL, 'BT', 'https://media-2.api-sports.io/flags/bt.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(20, 'Bolivia', NULL, 'BO', 'https://media-3.api-sports.io/flags/bo.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(21, 'Bosnia', NULL, 'BA', 'https://media-1.api-sports.io/flags/ba.svg', '+387', '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(22, 'Botswana', NULL, 'BW', 'https://media-2.api-sports.io/flags/bw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(23, 'Brazil', NULL, 'BR', 'https://media-2.api-sports.io/flags/br.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(24, 'Bulgaria', NULL, 'BG', 'https://media-2.api-sports.io/flags/bg.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(25, 'Burkina-Faso', NULL, 'BF', 'https://media-3.api-sports.io/flags/bf.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(26, 'Burundi', NULL, 'BI', 'https://media-3.api-sports.io/flags/bi.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(27, 'Cambodia', NULL, 'KH', 'https://media-2.api-sports.io/flags/kh.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(28, 'Cameroon', NULL, 'CM', 'https://media-3.api-sports.io/flags/cm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(29, 'Canada', NULL, 'CA', 'https://media-2.api-sports.io/flags/ca.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(30, 'Chile', NULL, 'CL', 'https://media-3.api-sports.io/flags/cl.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(31, 'China', NULL, 'CN', 'https://media-2.api-sports.io/flags/cn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(32, 'Chinese-Taipei', NULL, 'TW', 'https://media-1.api-sports.io/flags/tw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(33, 'Colombia', NULL, 'CO', 'https://media-1.api-sports.io/flags/co.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(34, 'Congo', NULL, 'CD', 'https://media-3.api-sports.io/flags/cd.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(35, 'Congo-DR', NULL, 'CG', 'https://media-1.api-sports.io/flags/cg.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(36, 'Costa-Rica', NULL, 'CR', 'https://media-2.api-sports.io/flags/cr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(37, 'Crimea', NULL, 'UA', 'https://media-3.api-sports.io/flags/ua.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(38, 'Croatia', NULL, 'HR', 'https://media-2.api-sports.io/flags/hr.svg', '+385', '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(39, 'Cuba', NULL, 'CU', 'https://media-2.api-sports.io/flags/cu.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(40, 'Curacao', NULL, 'CW', 'https://media-3.api-sports.io/flags/cw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(41, 'Cyprus', NULL, 'CY', 'https://media-3.api-sports.io/flags/cy.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(42, 'Czech-Republic', NULL, 'CZ', 'https://media-3.api-sports.io/flags/cz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(43, 'Denmark', NULL, 'DK', 'https://media-1.api-sports.io/flags/dk.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(44, 'Dominican-Republic', NULL, 'DO', 'https://media-1.api-sports.io/flags/do.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(45, 'Ecuador', NULL, 'EC', 'https://media-3.api-sports.io/flags/ec.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(46, 'Egypt', NULL, 'EG', 'https://media-3.api-sports.io/flags/eg.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(47, 'El-Salvador', NULL, 'SV', 'https://media-1.api-sports.io/flags/sv.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(48, 'England', NULL, 'GB', 'https://media-3.api-sports.io/flags/gb.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(49, 'Estonia', NULL, 'EE', 'https://media-1.api-sports.io/flags/ee.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(50, 'Eswatini', NULL, 'SZ', 'https://media-1.api-sports.io/flags/sz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(51, 'Ethiopia', NULL, 'ET', 'https://media-3.api-sports.io/flags/et.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(52, 'Faroe-Islands', NULL, 'FO', 'https://media-3.api-sports.io/flags/fo.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(53, 'Fiji', NULL, 'FJ', 'https://media-2.api-sports.io/flags/fj.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(54, 'Finland', NULL, 'FI', 'https://media-1.api-sports.io/flags/fi.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(55, 'France', NULL, 'FR', 'https://media-3.api-sports.io/flags/fr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(56, 'Gabon', NULL, 'GA', 'https://media-3.api-sports.io/flags/ga.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(57, 'Gambia', NULL, 'GM', 'https://media-1.api-sports.io/flags/gm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(58, 'Georgia', NULL, 'GE', 'https://media-2.api-sports.io/flags/ge.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(59, 'Germany', NULL, 'DE', 'https://media-3.api-sports.io/flags/de.svg', '+49', '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(60, 'Ghana', NULL, 'GH', 'https://media-1.api-sports.io/flags/gh.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(61, 'Gibraltar', NULL, 'GI', 'https://media-1.api-sports.io/flags/gi.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(62, 'Greece', NULL, 'GR', 'https://media-1.api-sports.io/flags/gr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(63, 'Guadeloupe', NULL, 'GP', 'https://media-3.api-sports.io/flags/gp.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(64, 'Guatemala', NULL, 'GT', 'https://media-1.api-sports.io/flags/gt.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(65, 'Guinea', NULL, 'GN', 'https://media-3.api-sports.io/flags/gn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(66, 'Haiti', NULL, 'HT', 'https://media-1.api-sports.io/flags/ht.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(67, 'Honduras', NULL, 'HN', 'https://media-2.api-sports.io/flags/hn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(68, 'Hong-Kong', NULL, 'HK', 'https://media-2.api-sports.io/flags/hk.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(69, 'Hungary', NULL, 'HU', 'https://media-3.api-sports.io/flags/hu.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(70, 'Iceland', NULL, 'IS', 'https://media-1.api-sports.io/flags/is.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(71, 'India', NULL, 'IN', 'https://media-3.api-sports.io/flags/in.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(72, 'Indonesia', NULL, 'ID', 'https://media-1.api-sports.io/flags/id.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(73, 'Iran', NULL, 'IR', 'https://media-2.api-sports.io/flags/ir.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(74, 'Iraq', NULL, 'IQ', 'https://media-2.api-sports.io/flags/iq.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(75, 'Ireland', NULL, 'IE', 'https://media-3.api-sports.io/flags/ie.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(76, 'Israel', NULL, 'IL', 'https://media-2.api-sports.io/flags/il.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(77, 'Italy', NULL, 'IT', 'https://media-1.api-sports.io/flags/it.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(78, 'Ivory-Coast', NULL, 'CI', 'https://media-2.api-sports.io/flags/ci.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(79, 'Jamaica', NULL, 'JM', 'https://media-2.api-sports.io/flags/jm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(80, 'Japan', NULL, 'JP', 'https://media-1.api-sports.io/flags/jp.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(81, 'Jordan', NULL, 'JO', 'https://media-2.api-sports.io/flags/jo.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(82, 'Kazakhstan', NULL, 'KZ', 'https://media-3.api-sports.io/flags/kz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(83, 'Kenya', NULL, 'KE', 'https://media-1.api-sports.io/flags/ke.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(84, 'Kosovo', NULL, 'XK', 'https://media-3.api-sports.io/flags/xk.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(85, 'Kuwait', NULL, 'KW', 'https://media-1.api-sports.io/flags/kw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(86, 'Kyrgyzstan', NULL, 'KG', 'https://media-3.api-sports.io/flags/kg.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(87, 'Laos', NULL, 'LA', 'https://media-2.api-sports.io/flags/la.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(88, 'Latvia', NULL, 'LV', 'https://media-2.api-sports.io/flags/lv.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(89, 'Lebanon', NULL, 'LB', 'https://media-1.api-sports.io/flags/lb.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(90, 'Lesotho', NULL, 'LS', 'https://media-3.api-sports.io/flags/ls.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(91, 'Liberia', NULL, 'LR', 'https://media-3.api-sports.io/flags/lr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(92, 'Libya', NULL, 'LY', 'https://media-2.api-sports.io/flags/ly.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(93, 'Liechtenstein', NULL, 'LI', 'https://media-1.api-sports.io/flags/li.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(94, 'Lithuania', NULL, 'LT', 'https://media-3.api-sports.io/flags/lt.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(95, 'Luxembourg', NULL, 'LU', 'https://media-3.api-sports.io/flags/lu.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(96, 'Macao', NULL, 'MO', 'https://media-3.api-sports.io/flags/mo.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(97, 'Macedonia', NULL, 'MK', 'https://media-3.api-sports.io/flags/mk.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(98, 'Malawi', NULL, 'MW', 'https://media-1.api-sports.io/flags/mw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(99, 'Malaysia', NULL, 'MY', 'https://media-1.api-sports.io/flags/my.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(100, 'Maldives', NULL, 'MV', 'https://media-3.api-sports.io/flags/mv.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(101, 'Mali', NULL, 'ML', 'https://media-2.api-sports.io/flags/ml.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(102, 'Malta', NULL, 'MT', 'https://media-2.api-sports.io/flags/mt.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(103, 'Mauritania', NULL, 'MR', 'https://media-1.api-sports.io/flags/mr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(104, 'Mauritius', NULL, 'MU', 'https://media-3.api-sports.io/flags/mu.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(105, 'Mexico', NULL, 'MX', 'https://media-2.api-sports.io/flags/mx.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(106, 'Moldova', NULL, 'MD', 'https://media-3.api-sports.io/flags/md.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(107, 'Mongolia', NULL, 'MN', 'https://media-1.api-sports.io/flags/mn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(108, 'Montenegro', NULL, 'ME', 'https://media-3.api-sports.io/flags/me.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(109, 'Morocco', NULL, 'MA', 'https://media-2.api-sports.io/flags/ma.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(110, 'Myanmar', NULL, 'MM', 'https://media-2.api-sports.io/flags/mm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(111, 'Namibia', NULL, 'NA', 'https://media-2.api-sports.io/flags/na.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(112, 'Nepal', NULL, 'NP', 'https://media-2.api-sports.io/flags/np.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(113, 'Netherlands', NULL, 'NL', 'https://media-1.api-sports.io/flags/nl.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(114, 'New-Zealand', NULL, 'NZ', 'https://media-3.api-sports.io/flags/nz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(115, 'Nicaragua', NULL, 'NI', 'https://media-2.api-sports.io/flags/ni.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(116, 'Nigeria', NULL, 'NG', 'https://media-1.api-sports.io/flags/ng.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(117, 'Norway', NULL, 'NO', 'https://media-1.api-sports.io/flags/no.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(118, 'Oman', NULL, 'OM', 'https://media-1.api-sports.io/flags/om.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(119, 'Pakistan', NULL, 'PK', 'https://media-1.api-sports.io/flags/pk.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(120, 'Palestine', NULL, 'PS', 'https://media-1.api-sports.io/flags/ps.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(121, 'Panama', NULL, 'PA', 'https://media-2.api-sports.io/flags/pa.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(122, 'Paraguay', NULL, 'PY', 'https://media-2.api-sports.io/flags/py.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(123, 'Peru', NULL, 'PE', 'https://media-3.api-sports.io/flags/pe.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(124, 'Philippines', NULL, 'PH', 'https://media-2.api-sports.io/flags/ph.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(125, 'Poland', NULL, 'PL', 'https://media-2.api-sports.io/flags/pl.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(126, 'Portugal', NULL, 'PT', 'https://media-3.api-sports.io/flags/pt.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(127, 'Qatar', NULL, 'QA', 'https://media-3.api-sports.io/flags/qa.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(128, 'Romania', NULL, 'RO', 'https://media-3.api-sports.io/flags/ro.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(129, 'Russia', NULL, 'RU', 'https://media-3.api-sports.io/flags/ru.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(130, 'Rwanda', NULL, 'RW', 'https://media-2.api-sports.io/flags/rw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(131, 'San-Marino', NULL, 'SM', 'https://media-1.api-sports.io/flags/sm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(132, 'Saudi-Arabia', NULL, 'SA', 'https://media-2.api-sports.io/flags/sa.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(133, 'Senegal', NULL, 'SN', 'https://media-2.api-sports.io/flags/sn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(134, 'Serbia', NULL, 'RS', 'https://media-2.api-sports.io/flags/rs.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(135, 'Singapore', NULL, 'SG', 'https://media-2.api-sports.io/flags/sg.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(136, 'Slovakia', NULL, 'SK', 'https://media-3.api-sports.io/flags/sk.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(137, 'Slovenia', NULL, 'SI', 'https://media-2.api-sports.io/flags/si.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(138, 'Somalia', NULL, 'SO', 'https://media-1.api-sports.io/flags/so.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(139, 'South-Africa', NULL, 'ZA', 'https://media-3.api-sports.io/flags/za.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(140, 'South-Korea', NULL, 'KR', 'https://media-1.api-sports.io/flags/kr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(141, 'Spain', NULL, 'ES', 'https://media-3.api-sports.io/flags/es.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(142, 'Sudan', NULL, 'SD', 'https://media-2.api-sports.io/flags/sd.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(143, 'Surinam', NULL, 'SR', 'https://media-1.api-sports.io/flags/sr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(144, 'Sweden', NULL, 'SE', 'https://media-3.api-sports.io/flags/se.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(145, 'Switzerland', NULL, 'CH', 'https://media-1.api-sports.io/flags/ch.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(146, 'Syria', NULL, 'SY', 'https://media-3.api-sports.io/flags/sy.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(147, 'Tajikistan', NULL, 'TJ', 'https://media-2.api-sports.io/flags/tj.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(148, 'Tanzania', NULL, 'TZ', 'https://media-1.api-sports.io/flags/tz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(149, 'Thailand', NULL, 'TH', 'https://media-2.api-sports.io/flags/th.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(150, 'Trinidad-And-Tobago', NULL, 'TT', 'https://media-2.api-sports.io/flags/tt.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(151, 'Tunisia', NULL, 'TN', 'https://media-1.api-sports.io/flags/tn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(152, 'Turkey', NULL, 'TR', 'https://media-3.api-sports.io/flags/tr.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(153, 'Turkmenistan', NULL, 'TM', 'https://media-2.api-sports.io/flags/tm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(154, 'Uganda', NULL, 'UG', 'https://media-2.api-sports.io/flags/ug.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(155, 'United-Arab-Emirates', NULL, 'AE', 'https://media-3.api-sports.io/flags/ae.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(156, 'Uruguay', NULL, 'UY', 'https://media-3.api-sports.io/flags/uy.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(157, 'USA', NULL, 'US', 'https://media-3.api-sports.io/flags/us.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(158, 'Uzbekistan', NULL, 'UZ', 'https://media-2.api-sports.io/flags/uz.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(159, 'Venezuela', NULL, 'VE', 'https://media-2.api-sports.io/flags/ve.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(160, 'Vietnam', NULL, 'VN', 'https://media-1.api-sports.io/flags/vn.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(161, 'Zambia', NULL, 'ZM', 'https://media-3.api-sports.io/flags/zm.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30'),
(162, 'Zimbabwe', NULL, 'ZW', 'https://media-2.api-sports.io/flags/zw.svg', NULL, '2023-06-11 12:05:30', '2023-06-11 12:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2023_07_01_134720___keywords', 2),
(7, '2023_06_27_115407___quiz_questions', 3),
(8, '2023_06_27_115717___quiz_question_answers', 3),
(9, '2023_06_27_122918___quiz', 3),
(10, '2023_06_27_123130___quiz__sets', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `online` tinyint(1) NOT NULL DEFAULT 1,
  `correct_answers` int(11) NOT NULL DEFAULT 0,
  `joker` int(11) NOT NULL DEFAULT 0,
  `threshold` int(11) NOT NULL DEFAULT 1,
  `total_money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT 0,
  `started` int(1) NOT NULL DEFAULT 0,
  `finished` int(1) NOT NULL DEFAULT 0,
  `current_question` int(2) NOT NULL DEFAULT 1,
  `replacement` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `date`, `user_id`, `online`, `correct_answers`, `joker`, `threshold`, `total_money`, `active`, `started`, `finished`, `current_question`, `replacement`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, '2023-08-06', NULL, 0, 0, 0, 1, '0', 0, 0, 0, 1, 0, '2023-08-06 06:29:47', '2023-08-08 18:06:41', NULL),
(19, '2023-08-06', NULL, 0, 0, 0, 1, '0', 0, 0, 0, 1, 0, '2023-08-06 06:29:47', '2023-08-08 18:05:13', NULL),
(20, '2023-08-06', NULL, 0, 0, 0, 1, '0', 0, 0, 0, 1, 0, '2023-08-06 06:29:48', '2023-08-08 18:05:13', NULL),
(21, '2023-08-06', NULL, 0, 0, 0, 1, '0', 0, 0, 0, 1, 0, '2023-08-06 06:29:48', '2023-08-08 18:05:13', NULL),
(22, '2023-08-06', NULL, 0, 0, 0, 1, '0', 0, 0, 0, 1, 0, '2023-08-06 06:29:48', '2023-08-08 18:05:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz__questions`
--

CREATE TABLE `quiz__questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT 0,
  `correct_answer` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `additional_questions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_q_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT 1,
  `in_queue` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz__questions`
--

INSERT INTO `quiz__questions` (`id`, `question`, `category`, `weight`, `correct_answer`, `additional_questions`, `additional_q_answer`, `locked`, `in_queue`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 'U pjesmi, ko je jamio jamio, ko je jamio?', 1, 1, 'D', 'A šta je on Jamio?', 'Jamio je kurčinuuuu', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3928, 'Dopuni poslovicu: \"Čega se pametan stidi...\"', 1, 1, 'D', 'Dopuni poslovicu: \"Čega se pametan stidi...\"', 'Time se budala ponosi', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4146, 'Kako se zove naučnica koja je bila na čelu tima koji je kodirao softer za Apollo 11?', 6, 3, 'A', 'Kako se zove naučnica koja je bila na čelu tima koji je kodirao softer za Apollo 11?', 'Margaret Hamilton', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4137, 'Supermodel Gigi Hadid je porijeklom iz koje zemlje?', 6, 3, 'D', 'Supermodel Gigi Hadid je porijeklom iz koje zemlje?', 'Palestine', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(6, 'Kako se zove film gdje ima sin, otac, deda, pradeda?', 3, 1, 'A', 'A šta je Laki?', 'Malo nervozan', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4017, 'Treći studijski album repera Ede Maajke nosi ime?', 3, 4, 'B', 'Treći studijski album repera Ede Maajke nosi ime?', 'Stig\'o ćumur', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3799, 'Raste samo “kod nas“ i nigdje drugo na svijetu:', 2, 5, 'B', 'Raste samo “kod nas“ i nigdje drugo na svijetu:', 'Bosanski ljiljan', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3807, 'Omaleni bosanskohercegovački grad Kladanj nadaleko je poznat po kojoj vodi?', 2, 5, 'B', 'Omaleni bosanskohercegovački grad Kladanj nadaleko je poznat po kojoj vodi?', 'Muškoj vodi', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(34, 'Kolika je kazna kada se medo rokne?', 5, 5, 'D', NULL, NULL, 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3874, 'Najuspješniji bh teniser Damir Džumhur, 2017. godine zabilježio je najbolji ranking na ATP listi. Bio je koji po redu teniser svijeta?', 5, 5, 'C', 'Najuspješniji bh teniser Damir Džumhur, 2017. godine zabilježio je najbolji ranking na ATP listi. Bio je koji po redu teniser svijeta?', '23', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3996, 'Nakon što je član SDA Huso Ćesir nasrnuo na kamermana portala Žurnal, Bakir Izetbegović stranačkog kolegu je pokušao opravdati tvrdivši da je:', 4, 4, 'B', 'Nakon što je član SDA Huso Ćesir nasrnuo na kamermana portala Žurnal, Bakir Izetbegović stranačkog kolegu je pokušao opravdati tvrdivši da je:', 'Huso napao kameru, a nije napao čovjeka', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(30, 'Koliko puta ga Bake trehne kad ode u WC?', 4, 4, 'B', 'A ko je bake?', 'Precjednik', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4151, 'Koja jugoslovenska glumica je igrala u popularnoj američkoj seriji \"Lost\"?', 7, 6, 'A', 'Koja jugoslovenska glumica je igrala u popularnoj američkoj seriji \"Lost\"?', 'Mira Furlan', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3940, 'U poznatoj narodnoj mudroliji šta prati hrabre?', 1, 1, 'A', 'U poznatoj narodnoj mudroliji šta prati hrabre?', 'Sreća', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3917, 'Kad se u nešto petlja puno ljudi, obično ispadne kako ne treba. Poslovica koja to opisuje je:', 1, 1, 'C', 'Kad se u nešto petlja puno ljudi, obično ispadne kako ne treba. Poslovica koja to opisuje je:', 'Gdje je puno baba kilava su djeca', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4081, 'Davorin Popović, legendarni pjevač sarajevskih Indexa, nije imao koji od ovih nadimaka:', 3, 1, 'B', 'Davorin Popović, legendarni pjevač sarajevskih Indexa, nije imao koji od ovih nadimaka:', 'Lafac', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4041, 'Zlatan Stipišić Gibonni, tokom 1990. godine, bio je član kojeg popularnog bosanskohercegovačkog benda?', 3, 4, 'C', 'Zlatan Stipišić Gibonni, tokom 1990. godine, bio je član kojeg popularnog bosanskohercegovačkog benda?', 'Divljih Jagoda', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3958, 'Aferu \"Orao\" povezujemo s kojim bh. političarem:', 4, 3, 'C', 'Aferu \"Orao\" povezujemo s kojim bh. političarem:', 'Mirko Šarović', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3994, 'Koja država je „čuvar“ originala Dejtonskog mirovnog sporazuma?', 4, 1, 'B', 'Koja država je „čuvar“ originala Dejtonskog mirovnog sporazuma?', 'Francuska', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(4120, 'Britanski fotoreporter Tom Stoddart autor je fotografije „Žena Sarajeva“ nastale u Sarajevu pod opsadom, a na kojoj vidimo trenutak u kojem dotjerana žena ponosno hoda pored vojnika i vreća punih pijeska. O kojoj ženi je riječ?', 6, 4, 'C', 'Britanski fotoreporter Tom Stoddart autor je fotografije „Žena Sarajeva“ nastale u Sarajevu pod opsadom, a na kojoj vidimo trenutak u kojem dotjerana žena ponosno hoda pored vojnika i vreća punih pijeska. O kojoj ženi je riječ?', 'Meliha Varešanović', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(52, 'Šta je Severina bila prije nego je postala poznata?', 6, 6, 'B', 'A kad je snimila pornić?', 'Prije 15tak godina jebo te', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3863, 'Koji je jedini fudbalski klub sa prostora bivše Jugoslavije osvojio Ligu Šampiona?', 5, 5, 'A', 'Koji je jedini fudbalski klub sa prostora bivše Jugoslavije osvojio Ligu Šampiona?', 'Crvena Zvezda', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(3861, 'Prvi zvanični gradski derbi između Željezničara i Sarajeva odigran je još davne 1954. godine, a rezultat je bio:', 5, 5, 'B', 'Prvi zvanični gradski derbi između Željezničara i Sarajeva odigran je još davne 1954. godine, a rezultat je bio:', '6:1 za Sarajevo', 1, 1, 5, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(24, 'Ko je poč\'o rat?', 2, 4, 'C', NULL, NULL, 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3785, 'U blizini kojeg grada se nalazi Prokoško jezero?', 2, 5, 'A', 'U blizini kojeg grada se nalazi Prokoško jezero?', 'Fojnice', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4078, 'Mirza Idrizović je režirao slavni film u kojem je jednako slavnu ulogu ostvario Mustafa Nadarević. Koji je to film:', 7, 6, 'D', 'Mirza Idrizović je režirao slavni film u kojem je jednako slavnu ulogu ostvario Mustafa Nadarević. Koji je to film:', 'Miris Dunja', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(1, 'Šta je brže il\' zec?', 1, 1, 'A', NULL, NULL, 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3901, 'Šta je Bosancu uzaludno da traži?', 1, 1, 'D', 'Šta je Bosancu uzaludno da traži?', 'Iglu u plastu sijena', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3791, 'Rijeka Bosna pripada kojem morskom slivu?', 2, 1, 'D', 'Rijeka Bosna pripada kojem morskom slivu?', 'Crnomorskom', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(48, 'Bosna se sastoji od Bosne i?', 2, 2, 'A', 'A kad je Hercegovina postala dio Bosne?', 'Long time ago :)', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3851, 'Bosna i Hercegovina je prvi put samostalno učestvovala na olimpijskim igrama održanim u kojem gradu?', 5, 1, 'A', 'Bosna i Hercegovina je prvi put samostalno učestvovala na olimpijskim igrama održanim u kojem gradu?', 'Barseloni', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3870, 'Najskuplji transfer u fudbalu iz bh. Premijer lige iznosio je 1,3 miliona eura. O kojem se fudbaleru radi?', 5, 3, 'B', 'Najskuplji transfer u fudbalu iz bh. Premijer lige iznosio je 1,3 miliona eura. O kojem se fudbaleru radi?', 'Gojko Cimirot', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4062, 'U koja dva sarajevska benda su frontmeni braća Dino i Adnan Šaran?', 3, 5, 'B', 'U koja dva sarajevska benda su frontmeni braća Dino i Adnan Šaran?', 'Skroz i Letu Štuke', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4051, '“Svakoga dana u svakom pogledu sve više napredujem” je replika iz kojeg kultnog jugoslovenskog filma?', 3, 5, 'C', '“Svakoga dana u svakom pogledu sve više napredujem” je replika iz kojeg kultnog jugoslovenskog filma?', 'Sjećaš li se Doli Bel?', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4009, 'Krajem 2020. godine bh. političku scenu uzdrmala je afera „Ikona“ u centru koje je bio Milorad Dodik zbog pravoslavne ikone iz koje evropske zemlje?', 4, 4, 'A', 'Krajem 2020. godine bh. političku scenu uzdrmala je afera „Ikona“ u centru koje je bio Milorad Dodik zbog pravoslavne ikone iz koje evropske zemlje?', 'Ukrajine', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3984, 'Najveći kanton po površini u Federaciji BiH je:', 4, 5, 'B', 'Najveći kanton po površini u Federaciji BiH je:', 'Kanton 10', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4112, 'Koja je žena 5 godina zaredom bila na prvom mjestu Forbesove liste najutjecajnijih žena svijeta?', 6, 4, 'A', 'Koja je žena 5 godina zaredom bila na prvom mjestu Forbesove liste najutjecajnijih žena svijeta?', 'Angela Merkel', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4135, 'Kako se zvala Ruska carica koja je preotela vlast od svog muža?', 6, 4, 'B', 'Kako se zvala Ruska carica koja je preotela vlast od svog muža?', 'Katarina Velika', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4154, 'Prvi osvajači Premijer lige BiH nakon njenog ujedinjenja 2002 godine bili su:', 7, 6, 'B', 'Prvi osvajači Premijer lige BiH nakon njenog ujedinjenja 2002 godine bili su:', 'Leotar Trebinje', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3923, 'Šta rade miševi kada mačke nema?', 1, 1, 'D', 'Šta rade miševi kada mačke nema?', 'Vode kolo', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3906, 'Dovrši narodnu mudrost: „Nije svačije da kroz selo...“', 1, 1, 'A', 'Dovrši narodnu mudrost: „Nije svačije da kroz selo...“', 'Pjeva', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3797, 'Između koja dva od ovih gradova je najmanja udaljenost (u kilometrima vožnje):', 2, 1, 'B', 'Između koja dva od ovih gradova je najmanja udaljenost (u kilometrima vožnje):', 'Sarajevo-Zenica', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3843, 'Na području Bunskih kanala obitava koliko endemskih ugroženih vrsta?', 2, 1, 'B', 'Na području Bunskih kanala obitava koliko endemskih ugroženih vrsta?', 'Preko 20', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3971, 'Poslije Paddya Ashdowna a prije Miroslava Lajčaka Visoki Predstavnik u Bosni i Hercegovini je bio:', 4, 2, 'D', 'Poslije Paddya Ashdowna a prije Miroslava Lajčaka Visoki Predstavnik u Bosni i Hercegovini je bio:', 'Christian Schwarz-Schilling', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3977, 'Socijaldemokratska partija Bosne i Hercegovine jednu je predizbornu kampanju vodila pod sloganom:', 4, 1, 'A', 'Socijaldemokratska partija Bosne i Hercegovine jednu je predizbornu kampanju vodila pod sloganom:', 'Dosljedno s karakterom', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4142, 'Bosanskohercegovački brend Kaftan studio, čije kreacije su nosile mnoge svjetski poznate ličnosti, čine sestre...', 6, 4, 'D', 'Bosanskohercegovački brend Kaftan studio, čije kreacije su nosile mnoge svjetski poznate ličnosti, čine sestre...', 'Nermina Hodžić i Emina Hodžić Adilović', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4106, 'Na kojem albumu Amire Medunjanin, objavljenom 2015. godine se nalazi interpretacija poznate naše sevdalinke „Kad ja pođoh na Bentbašu?“', 6, 5, 'D', 'Na kojem albumu Amire Medunjanin, objavljenom 2015. godine se nalazi interpretacija poznate naše sevdalinke „Kad ja pođoh na Bentbašu?“', 'Damar', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4029, 'Gdje je otišao Mujo u pjesmi Zlatana Fazlića Fazle?', 3, 5, 'B', 'Gdje je otišao Mujo u pjesmi Zlatana Fazlića Fazle?', 'U mornare', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4073, 'Nastavi stih pjesme KP DOM „Dubioza Kolektiva“: Vrijeme sporo prolazi, minuta k\'o godina...', 3, 4, 'C', 'Nastavi stih pjesme KP DOM „Dubioza Kolektiva“: Vrijeme sporo prolazi, minuta k\'o godina...', 'Izdali te prijatelji, izdala te rodbina', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3862, 'Koji od ovih golmana je u karijeri branio i za Sarajevo i za Željezničar?', 5, 4, 'D', 'Koji od ovih golmana je u karijeri branio i za Sarajevo i za Željezničar?', 'Slobodan Janjuš', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3873, 'Prvi certificirani trener snookera najzaslužniji za popularnost ovog sporta u Bosni i Hercegovini zvao se:', 5, 5, 'C', 'Prvi certificirani trener snookera najzaslužniji za popularnost ovog sporta u Bosni i Hercegovini zvao se:', 'Zijad Redžić', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4068, 'Koje je puno ime i prezime režisera dokumentarnog filma „Scream for me Sarajevo“, koji govori o koncertu Bruca Dickinsona u opkoljenom Sarajevu 1994. godine?', 7, 6, 'B', 'Koje je puno ime i prezime režisera dokumentarnog filma „Scream for me Sarajevo“, koji govori o koncertu Bruca Dickinsona u opkoljenom Sarajevu 1994. godine?', 'Tarik Hodžić', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3892, 'Bosanac, kada se osjeća neugodno na nekom mjestu, reći će da se osjeća kao koja životinja u kojem gradu?', 1, 1, 'C', 'Bosanac, kada se osjeća neugodno na nekom mjestu, reći će da se osjeća kao koja životinja u kojem gradu?', 'Kao krme u Teheranu', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3921, 'Nastavi poslovicu: \"Nije majka Muju klela što se kockao, nego što se...\"', 1, 1, 'A', 'Nastavi poslovicu: \"Nije majka Muju klela što se kockao, nego što se...\"', 'Vadio', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4038, 'Dovrši stihove refrena poznate pjesme grupe Skroz koji počinje riječima „Sve sam jači...“:', 3, 1, 'C', 'Dovrši stihove refrena poznate pjesme grupe Skroz koji počinje riječima „Sve sam jači...“:', 'Ljubav ništa mi ne znači', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4071, 'U pjesmi „Sarajevo grade moj“ Halida Bešlića spominje se Azra, a ko se spominje u pjesmi „Ne zovi me na grijeh“ Dine Merlina?', 3, 4, 'B', 'U pjesmi „Sarajevo grade moj“ Halida Bešlića spominje se Azra, a ko se spominje u pjesmi „Ne zovi me na grijeh“ Dine Merlina?', 'Zulejha', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3970, 'Prije Dejtona bio je Vens-Ovenov, a prije Vens-Ovenovog postojao je plan kojeg imena:', 4, 1, 'C', 'Prije Dejtona bio je Vens-Ovenov, a prije Vens-Ovenovog postojao je plan kojeg imena:', 'Carrington-Cutilerov', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4010, 'Na lokalnim izborima u BiH održanim 2020. godine bilo je koliko kandidata?', 4, 3, 'B', 'Na lokalnim izborima u BiH održanim 2020. godine bilo je koliko kandidata?', 'preko 30 hiljada', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3821, 'Koji od navedenih gradova se ne nalazi u Skandinaviji?', 2, 5, 'B', 'Koji od navedenih gradova se ne nalazi u Skandinaviji?', 'Bern', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3802, 'Pećina Vjetrenica, najveća pećina u Bosni i Hercegovini, nalazi se na području?', 2, 5, 'D', 'Pećina Vjetrenica, najveća pećina u Bosni i Hercegovini, nalazi se na području?', 'Popovog polja', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3879, 'Reprezentativci Bosne i Hercegovine u sjedećoj odbojci, 2021. godine u Turskoj postali su europski šampioni po deseti put. Koga su savladali u finalu?', 5, 4, 'C', 'Reprezentativci Bosne i Hercegovine u sjedećoj odbojci, 2021. godine u Turskoj postali su europski šampioni po deseti put. Koga su savladali u finalu?', 'Rusiju', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3886, 'Apsolutni rekorder po broju nastupa za rukometnu bh. reprezentaciju je?', 5, 5, 'A', 'Apsolutni rekorder po broju nastupa za rukometnu bh. reprezentaciju je?', 'Mirsad Terzić', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4104, 'Legendarna trenerica SFK Sarajevo i selektorica ženske fudbalske bh. reprezentacije zove se?', 6, 4, 'D', 'Legendarna trenerica SFK Sarajevo i selektorica ženske fudbalske bh. reprezentacije zove se?', 'Samira Hurem', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4116, '8. marta se obilježava Dan žena, a istog dana 1857. godine žene u Nju jorku su protestvovale tražeći:', 6, 4, 'C', '8. marta se obilježava Dan žena, a istog dana 1857. godine žene u Nju jorku su protestvovale tražeći:', 'Da se ženama stvore bolji uslovi za rad i povećaju plate', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(21, 'Srbija i Crna gora su zadnju međusobnu utakmicu igrali protiv koga?', 7, 7, 'D', 'Srbija i Crna gora su zadnju međusobnu utakmicu igrali protiv koga?', 'Međusobno', 1, 1, 5, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz__question_answers`
--

CREATE TABLE `quiz__question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz__question_answers`
--

INSERT INTO `quiz__question_answers` (`id`, `question_id`, `order`, `answer`, `correct`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'A', 'Zeko', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(2, 1, 'B', 'Kondor', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(3, 1, 'C', 'Vuk', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(4, 1, 'D', 'Lisica', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(21, 6, 'A', 'Maratonci trče počasni krug', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(22, 6, 'B', 'Mrtav Ladan', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(23, 6, 'C', 'Družba pere kvržice al\' iz čitanke', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(24, 6, 'D', 'Družba pere kvržice', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(81, 21, 'A', 'Vatikana', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(82, 21, 'B', 'Farskih otoka', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(83, 21, 'C', 'Grčke', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(84, 21, 'D', 'Međusobno', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(93, 24, 'A', 'Srbi', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(94, 24, 'B', 'Mi', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(95, 24, 'C', 'Vi', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(96, 24, 'D', 'Oni', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(117, 30, 'A', 'Ni jednom', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(118, 30, 'B', '6 puta', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(119, 30, 'C', 'Koga Bakir treba da trehne?', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(120, 30, 'D', 'MIsliš kanarinca?', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(133, 34, 'A', '60 000', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(134, 34, 'B', '45 000', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(135, 34, 'C', '40 000', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(136, 34, 'D', '50 000', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(153, 39, 'A', 'Jamkec', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(154, 39, 'B', 'Jamić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(155, 39, 'C', 'Jamko', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(156, 39, 'D', 'Jamar', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(189, 48, 'A', 'Hercegovine', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(190, 48, 'B', 'PC-A', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(191, 48, 'C', 'Dubrovačke republike', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(192, 48, 'D', 'Kantona', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(205, 52, 'A', 'Kuharica', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(206, 52, 'B', 'Pjevačica', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(207, 52, 'C', 'Kurvarica', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(208, 52, 'D', 'Tenisačica', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15133, 3785, 'A', 'Fojnice', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15134, 3785, 'B', 'Maglaja', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15135, 3785, 'C', 'Foče', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15136, 3785, 'D', 'Prnjavora', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15157, 3791, 'A', 'Jadranskom', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15158, 3791, 'B', 'Egejskom', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15159, 3791, 'C', 'Sredozemnom', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15160, 3791, 'D', 'Crnomorskom', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15181, 3797, 'A', 'Mostar-Banja Luka', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15182, 3797, 'B', 'Sarajevo-Zenica', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15183, 3797, 'C', 'Mostar-Banja Luka', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15184, 3797, 'D', 'Tuzla-Mostar', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15189, 3799, 'A', 'Šljiva', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15190, 3799, 'B', 'Bosanski ljiljan', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15191, 3799, 'C', 'Tužna vrba', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15192, 3799, 'D', 'Pančićeva omorika', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15201, 3802, 'A', 'Livanjskog polja', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15202, 3802, 'B', 'Glamočkog polja', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15203, 3802, 'C', 'Livanjskog polja', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15204, 3802, 'D', 'Popovog polja', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15221, 3807, 'A', 'Očnoj vodi', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15222, 3807, 'B', 'Muškoj vodi', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15223, 3807, 'C', 'Mineralnoj vodi', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15224, 3807, 'D', 'Očnoj vodi', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15277, 3821, 'A', 'Oslo', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15278, 3821, 'B', 'Bern', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15279, 3821, 'C', 'Štokholm', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15280, 3821, 'D', 'Malmo', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15365, 3843, 'A', 'Niti jedna', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15366, 3843, 'B', 'Preko 20', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15367, 3843, 'C', '10', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15368, 3843, 'D', 'Niti jedna', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15397, 3851, 'A', 'Barseloni', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15398, 3851, 'B', 'Atini', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15399, 3851, 'C', 'Pnom Penu', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15400, 3851, 'D', 'Atlanti', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15437, 3861, 'A', '0.042361111111111', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15438, 3861, 'B', '6:1 za Sarajevo', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15439, 3861, 'C', '0', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15440, 3861, 'D', '6:1 za Želju', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15441, 3862, 'A', 'Muhamed Alim', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15442, 3862, 'B', 'Muhamed Alim', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15443, 3862, 'C', 'Amer Čanković', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15444, 3862, 'D', 'Slobodan Janjuš', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15445, 3863, 'A', 'Crvena Zvezda', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15446, 3863, 'B', 'Dinamo', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15447, 3863, 'C', 'Zrinjski', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15448, 3863, 'D', 'Dinamo', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15473, 3870, 'A', 'Luka Menalo', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15474, 3870, 'B', 'Gojko Cimirot', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15475, 3870, 'C', 'Luka Menalo', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15476, 3870, 'D', 'Semir Štilić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15485, 3873, 'A', 'Mirza Vuković', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15486, 3873, 'B', 'Mario Milošević', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15487, 3873, 'C', 'Zijad Redžić', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15488, 3873, 'D', 'Eldar Karamehmedović', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15489, 3874, 'A', '16', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15490, 3874, 'B', '25', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15491, 3874, 'C', '23', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15492, 3874, 'D', '17', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15509, 3879, 'A', 'Španiju', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15510, 3879, 'B', 'Francusku', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15511, 3879, 'C', 'Rusiju', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15512, 3879, 'D', 'Gruziju', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15537, 3886, 'A', 'Mirsad Terzić', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15538, 3886, 'B', 'Nikola Prce', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15539, 3886, 'C', 'Bilal Šuman', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15540, 3886, 'D', 'Edhem Sirćo', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15561, 3892, 'A', 'Kao horoz u Nju Delhiju', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15562, 3892, 'B', 'Kao međed u Varaždinu', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15563, 3892, 'C', 'Kao krme u Teheranu', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15564, 3892, 'D', 'Kao srna u Varešu', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15597, 3901, 'A', 'Crno ispod nokata', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15598, 3901, 'B', 'Trn u oku', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15599, 3901, 'C', 'Zrno u ljusci nara', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15600, 3901, 'D', 'Iglu u plastu sijena', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15617, 3906, 'A', 'Pjeva', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15618, 3906, 'B', 'Skače', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15619, 3906, 'C', 'Prolazi', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15620, 3906, 'D', 'Pleše', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15661, 3917, 'A', 'Gdje mačke nema miševi kolo vode', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15662, 3917, 'B', 'Gdje je puno selektora tu se ne igra fudbal', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15663, 3917, 'C', 'Gdje je puno baba kilava su djeca', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15664, 3917, 'D', 'Gdje je puno očeva kilavi su sinovi', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15677, 3921, 'A', 'Vadio', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15678, 3921, 'B', 'Drogirao', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15679, 3921, 'C', 'Pijan kući vratio', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15680, 3921, 'D', 'Kurvao', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15685, 3923, 'A', 'Igraju se', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15686, 3923, 'B', 'Skrivaju se', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15687, 3923, 'C', 'Jedu njihovu hranu', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15688, 3923, 'D', 'Vode kolo', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15705, 3928, 'A', 'Time se glup hvali', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15706, 3928, 'B', 'Time smo završili pos\'o', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15707, 3928, 'C', 'Time se glup hvali', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15708, 3928, 'D', 'Time se budala ponosi', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15753, 3940, 'A', 'Sreća', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15754, 3940, 'B', 'Nesanica', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15755, 3940, 'C', 'Glupani', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15756, 3940, 'D', 'Kukavice', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15825, 3958, 'A', 'Mladen Ivanić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15826, 3958, 'B', 'Milorad Dodik', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15827, 3958, 'C', 'Mirko Šarović', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15828, 3958, 'D', 'Dragan Čović', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15873, 3970, 'A', 'Montgomerijev', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15874, 3970, 'B', 'Montgomerijev', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15875, 3970, 'C', 'Carrington-Cutilerov', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15876, 3970, 'D', 'Bernard Henry-Levyev', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15877, 3971, 'A', 'Carlos Westendorp', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15878, 3971, 'B', 'Wolfgang Petritsch', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15879, 3971, 'C', 'Carl Bildt', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15880, 3971, 'D', 'Christian Schwarz-Schilling', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15901, 3977, 'A', 'Dosljedno s karakterom', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15902, 3977, 'B', 'S obrazom!', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15903, 3977, 'C', 'Nikad guzicom vrata zatvorili', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15904, 3977, 'D', 'Nikad guzicom vrata zatvorili', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15929, 3984, 'A', 'Sarajevski kanton', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15930, 3984, 'B', 'Kanton 10', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15931, 3984, 'C', 'Sarajevski kanton', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15932, 3984, 'D', 'Tuzlanski kanton', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(15969, 3994, 'A', 'Švicarska', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15970, 3994, 'B', 'Francuska', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15971, 3994, 'C', 'Bosna i Hercegovina', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15972, 3994, 'D', 'Amerika', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15977, 3996, 'A', 'Huso rekao kameri da mu ne prilazi, ali ga ona nije poslušala', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15978, 3996, 'B', 'Huso napao kameru, a nije napao čovjeka', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15979, 3996, 'C', 'Huso se branio od očitog napada kamere', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(15980, 3996, 'D', 'Huso se branio od očitog napada kamere', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16029, 4009, 'A', 'Ukrajine', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16030, 4009, 'B', 'Grčke', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16031, 4009, 'C', 'Bugarske', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16032, 4009, 'D', 'Grčke', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16033, 4010, 'A', 'preko hiljadu', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16034, 4010, 'B', 'preko 30 hiljada', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16035, 4010, 'C', 'preko 10 hiljada', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16036, 4010, 'D', 'preko hiljadu', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16061, 4017, 'A', 'No Sikiriki', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16062, 4017, 'B', 'Stig\'o ćumur', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16063, 4017, 'C', 'Balkansko a naše', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16064, 4017, 'D', 'Štrajk mozga', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16109, 4029, 'A', 'U vegane', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16110, 4029, 'B', 'U mornare', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16111, 4029, 'C', 'U dandare', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16112, 4029, 'D', 'U kockare', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16145, 4038, 'A', 'Droga ništa mi ne znači', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16146, 4038, 'B', 'Droga ništa mi ne znači', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16147, 4038, 'C', 'Ljubav ništa mi ne znači', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16148, 4038, 'D', 'Ona ništa mi ne znači', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16157, 4041, 'A', 'Zabranjenog Pušenja', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16158, 4041, 'B', 'Bijelog Dugmeta', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16159, 4041, 'C', 'Divljih Jagoda', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16160, 4041, 'D', 'Crvene Jabuke', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16197, 4051, 'A', 'Ovo malo duše', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16198, 4051, 'B', 'Walter brani Sarajevo', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16199, 4051, 'C', 'Sjećaš li se Doli Bel?', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16200, 4051, 'D', 'Ko to tamo peva?', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16241, 4062, 'A', 'Velahavle i Konvoj', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16242, 4062, 'B', 'Skroz i Letu Štuke', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16243, 4062, 'C', 'Sikter i Skroz', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16244, 4062, 'D', 'Crvena Jabuka i Billy Andol', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16265, 4068, 'A', 'Srđan Vuletić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16266, 4068, 'B', 'Tarik Hodžić', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16267, 4068, 'C', 'Pjer Žalica', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16268, 4068, 'D', 'Srđan Vuletić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16277, 4071, 'A', 'Emina', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16278, 4071, 'B', 'Zulejha', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16279, 4071, 'C', 'Hajrija', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16280, 4071, 'D', 'Merima', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16285, 4073, 'A', 'Majka te se odrekla i to preko novina', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16286, 4073, 'B', 'Svijet nije kao onaj što vidiš u snovima', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16287, 4073, 'C', 'Izdali te prijatelji, izdala te rodbina', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16288, 4073, 'D', 'Više nego stanovnika što ih ima Dobrinja', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16305, 4078, 'A', 'Boje nara', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16306, 4078, 'B', 'Boje nara', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16307, 4078, 'C', 'Boja breskve', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16308, 4078, 'D', 'Miris Dunja', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16317, 4081, 'A', 'Pimpek', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16318, 4081, 'B', 'Lafac', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16319, 4081, 'C', 'Dačo', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16320, 4081, 'D', 'Pjevač', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16409, 4104, 'A', 'Azra Numanović', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16410, 4104, 'B', 'Mervana Jugić Salkić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16411, 4104, 'C', 'Larisa Cerić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16412, 4104, 'D', 'Samira Hurem', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16417, 4106, 'A', 'Ascending', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16418, 4106, 'B', 'For Him and Her', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16419, 4106, 'C', 'Ascending', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16420, 4106, 'D', 'Damar', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16441, 4112, 'A', 'Angela Merkel', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16442, 4112, 'B', 'Hilari Klinton', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16443, 4112, 'C', 'Melinda Gejts', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16444, 4112, 'D', 'Opra Vinfri', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16457, 4116, 'A', 'Da se uvedu zatvorske kazne za nasilje nad ženama', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16458, 4116, 'B', 'Da se uvedu zatvorske kazne za nasilje nad ženama', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16459, 4116, 'C', 'Da se ženama stvore bolji uslovi za rad i povećaju plate', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16460, 4116, 'D', 'Da se 8. mart proglasi Danom žena', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16473, 4120, 'A', 'Bojana Dejanović', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16474, 4120, 'B', 'Alma Konjhodžić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16475, 4120, 'C', 'Meliha Varešanović', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16476, 4120, 'D', 'Merima Ustamujić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16533, 4135, 'A', 'Elizabeta Petrovna', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16534, 4135, 'B', 'Katarina Velika', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16535, 4135, 'C', 'Elizabeta Petrovna', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16536, 4135, 'D', 'Ana Ivanovna', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16541, 4137, 'A', 'Irana', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16542, 4137, 'B', 'Izraela', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16543, 4137, 'C', 'Izraela', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16544, 4137, 'D', 'Palestine', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16561, 4142, 'A', 'Alma Musić Hadžić i Nejra Musić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16562, 4142, 'B', 'Alma Musić Hadžić i Nejra Musić', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16563, 4142, 'C', 'Samra Hasanović i Belma Hasanović', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16564, 4142, 'D', 'Nermina Hodžić i Emina Hodžić Adilović', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16577, 4146, 'A', 'Margaret Hamilton', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16578, 4146, 'B', 'Thelma Estrin', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16579, 4146, 'C', 'Grace Hopper', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16580, 4146, 'D', 'Thelma Estrin', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16597, 4151, 'A', 'Mira Furlan', 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16598, 4151, 'B', 'Milena Dravić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16599, 4151, 'C', 'Milena Dravić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16600, 4151, 'D', 'Azra Čengić', 0, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(16609, 4154, 'A', 'Široki Brijeg', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16610, 4154, 'B', 'Leotar Trebinje', 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16611, 4154, 'C', 'Zrinjski Mostar', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(16612, 4154, 'D', 'Široki Brijeg', 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz__sets`
--

CREATE TABLE `quiz__sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `question_no` int(11) NOT NULL DEFAULT 1,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `answered` tinyint(1) NOT NULL DEFAULT 0,
  `correct` tinyint(1) NOT NULL DEFAULT 0,
  `level_question` tinyint(1) NOT NULL DEFAULT 0,
  `level_opened` tinyint(1) NOT NULL DEFAULT 0,
  `level_answered` tinyint(1) NOT NULL DEFAULT 0,
  `level_correct` tinyint(1) NOT NULL DEFAULT 0,
  `joker` tinyint(1) NOT NULL DEFAULT 0,
  `replacement` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz__sets`
--

INSERT INTO `quiz__sets` (`id`, `quiz_id`, `question_id`, `question_no`, `opened`, `answered`, `correct`, `level_question`, `level_opened`, `level_answered`, `level_correct`, `joker`, `replacement`, `created_at`, `updated_at`, `deleted_at`) VALUES
(222, 18, 39, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:05:22', NULL),
(223, 18, 3928, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-08 17:56:34', NULL),
(224, 18, 4146, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:05:30', NULL),
(225, 18, 4137, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-08 17:47:44', NULL),
(226, 18, 6, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:05:45', NULL),
(227, 18, 4017, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-07 17:56:34', NULL),
(228, 18, 3799, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:05:51', NULL),
(229, 18, 3807, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(230, 18, 34, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:06:00', NULL),
(231, 18, 3874, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(232, 18, 3996, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:06:18', NULL),
(233, 18, 30, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(234, 18, 4151, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:06:34', NULL),
(235, 19, 3940, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 17:58:09', NULL),
(236, 19, 3917, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(237, 19, 4081, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 17:58:17', NULL),
(238, 19, 4041, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(239, 19, 3958, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 17:58:28', NULL),
(240, 19, 3994, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-08 18:00:09', NULL),
(241, 19, 4120, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:00:19', NULL),
(242, 19, 52, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(243, 19, 3863, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:47', '2023-08-08 18:00:28', NULL),
(244, 19, 3861, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:47', '2023-08-06 06:29:47', NULL),
(245, 19, 24, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-08 18:01:33', NULL),
(246, 19, 3785, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(247, 19, 4078, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-08 18:01:43', NULL),
(248, 20, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(249, 20, 3901, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(250, 20, 3791, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(251, 20, 48, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(252, 20, 3851, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(253, 20, 3870, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(254, 20, 4062, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(255, 20, 4051, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(256, 20, 4009, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(257, 20, 3984, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(258, 20, 4112, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(259, 20, 4135, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(260, 20, 4154, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(261, 21, 3923, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(262, 21, 3906, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(263, 21, 3797, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(264, 21, 3843, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(265, 21, 3971, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(266, 21, 3977, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(267, 21, 4142, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(268, 21, 4106, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(269, 21, 4029, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(270, 21, 4073, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(271, 21, 3862, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(272, 21, 3873, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(273, 21, 4068, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(274, 22, 3892, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(275, 22, 3921, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(276, 22, 4038, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(277, 22, 4071, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(278, 22, 3970, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(279, 22, 4010, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(280, 22, 3821, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(281, 22, 3802, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(282, 22, 3879, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(283, 22, 3886, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(284, 22, 4104, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(285, 22, 4116, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL),
(286, 22, 21, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-08-06 06:29:48', '2023-08-06 06:29:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `banned` int(11) NOT NULL DEFAULT 0,
  `prefix` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `api_token`, `role`, `banned`, `prefix`, `phone`, `address`, `zip`, `city`, `country`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aladin Kapić', 'aladeenkapic', 'aladin.kapic@alkaris.com', '2023-07-04 17:56:10', '$2y$10$Fh/xNDrX2XzhgcbH8Q0HaeUK7zxlx1.cwuvLG5kr2KKWmiDrrVZlu', 'b898d1eb7f9acf2f9ef5e8bb89727e64ce01a925c4794277fab762cc17a72c62', 4, 0, '21', '61683449', 'Muhameda ef. Pandže 55', NULL, 'Sarajevo', 21, NULL, '2023-07-04 17:56:10', '2023-07-04 17:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `__keywords`
--

CREATE TABLE `__keywords` (
  `id` int(11) NOT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `__keywords`
--

INSERT INTO `__keywords` (`id`, `display`, `type`, `name`, `description`, `value`, `created_at`, `updated_at`) VALUES
(3, 'Pitanja - Kategorija', 'question_category', 'Mentalno razgibavanje', 'Prva u nizu kategorija - Mentalno razgibavanje. Vrijednost šifarnika 1 !', '1', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(4, 'Pitanja - Kategorija', 'question_category', 'Zemljo tisućljetna', 'Prva u nizu kategorija - Kategorija 2. Vrijednost šifarnika 2 !', '2', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(5, 'Pitanja - Kategorija', 'question_category', 'Umjetnost i kulturica', 'Prva u nizu kategorija - Kategorija 3. Vrijednost šifarnika 3 !', '3', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(6, 'Pitanja - Kategorija', 'question_category', 'Nova politička historija', 'Prva u nizu kategorija - Kategorija 4. Vrijednost šifarnika 4 !', '4', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(7, 'Pitanja - Kategorija', 'question_category', 'Lagano sportski', 'Prva u nizu kategorija - Kategorija 5. Vrijednost šifarnika 5 !', '5', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(8, 'Pitanja - Kategorija', 'question_category', 'Uspješne žene', 'Prva u nizu kategorija - Kategorija 6. Vrijednost šifarnika 6 !', '6', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(9, 'Pitanja - Kategorija', 'question_category', 'Pitanje za Nobela', 'Prva u nizu kategorija - Pitanje za nobela. Vrijednost šifarnika 7 !', '7', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(12, 'Pitanja - Težina', 'question_weight', '1', NULL, '1', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(13, 'Pitanja - Težina', 'question_weight', '2', NULL, '2', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(14, 'Pitanja - Težina', 'question_weight', '3', NULL, '3', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(15, 'Pitanja - Težina', 'question_weight', '4', NULL, '4', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(16, 'Pitanja - Težina', 'question_weight', '5', NULL, '5', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(17, 'Pitanja - Težina', 'question_weight', '6', NULL, '6', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(18, 'Pitanja - Težina', 'question_weight', '7', NULL, '7', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(19, 'Pitanja - Slova', 'question_letters', 'A', 'Pitanje koje se nalazi na prvom mjestu', 'A', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(20, 'Pitanja - Slova', 'question_letters', 'B', 'Pitanje koje se nalazi na drugom mjestu', 'B', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(21, 'Pitanja - Slova', 'question_letters', 'C', 'Pitanje koje se nalazi na trećem mjestu', 'C', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(22, 'Pitanja - Slova', 'question_letters', 'D', 'Pitanje koje se nalazi na četvrtom mjestu', 'D', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(23, 'Online / Offline', 'online', 'Offline', 'Kviz je rađen na TV-u', '0', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(24, 'Online / Offline', 'online', 'Online', 'Kviz je rađen od strane korisnika online', '1', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(25, 'Da / Ne', 'da_ne', 'Ne', 'Negativno', '0', '2023-07-31 16:32:11', '2023-07-31 16:32:11'),
(26, 'Da / Ne', 'da_ne', 'Da', 'Pozitivno', '1', '2023-07-31 16:32:11', '2023-07-31 16:32:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api__countries`
--
ALTER TABLE `api__countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `quiz__question_answers`
--
ALTER TABLE `quiz__question_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api__countries`
--
ALTER TABLE `api__countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
