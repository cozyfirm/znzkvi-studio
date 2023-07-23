-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 07:24 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `date`, `user_id`, `online`, `correct_answers`, `joker`, `threshold`, `total_money`, `active`, `started`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '2023-07-02', 10, 0, 8, 0, 1, '0', 1, 1, '2023-07-18 15:43:31', '2023-07-23 15:17:00', NULL),
(5, '2023-07-02', NULL, 0, 0, 0, 1, '0', 0, 0, '2023-07-18 15:43:31', '2023-07-23 10:21:34', NULL),
(6, '2023-07-02', NULL, 0, 0, 0, 1, '0', 0, 0, '2023-07-18 15:43:31', '2023-07-23 10:21:34', NULL),
(7, '2023-07-02', NULL, 0, 0, 0, 1, '0', 0, 0, '2023-07-18 15:43:31', '2023-07-23 10:21:34', NULL),
(8, '2023-07-02', NULL, 0, 0, 0, 1, '0', 0, 0, '2023-07-18 15:43:31', '2023-07-23 10:21:34', NULL);

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
(1, 'Šta je brže il\' zec?', 1, 1, 'A', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(45, 'Koja je omiljena boja Ace lukasa?', 1, 1, 'B', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(13, 'Kome je Džeko najviše puta zabio?', 5, 2, 'D', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(14, 'Odakle je Teletović pogodio?', 5, 3, 'D', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(40, 'U zemlji tisućljetnoj, šta se nalazi na zastavi?', 2, 2, 'A', 'A koje su boje ljiljani?', 'Pa logično zlatni', 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(48, 'Bosna se sastoji od Bosne i?', 2, 2, 'A', 'A kad je Hercegovina postala dio Bosne?', 'Long time ago :)', 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(31, 'Za koga je Dodo rekao da je cigan?', 4, 5, 'C', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(30, 'Koliko puta ga Bake trehne kad ode u WC?', 4, 4, 'B', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(29, 'Ko je najveći umjetnik ovih prostora?', 3, 6, 'B', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(27, 'Ko je najbolji pjevač za svadbe?', 3, 4, 'B', NULL, NULL, 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(52, 'Šta je Severina bila prije nego je postala poznata?', 6, 6, 'B', 'A kad je snimila pornić?', 'Prije 15tak godina jebo te', 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(44, 'Ko je tetka Rasema?', 6, 6, 'C', 'A odakle je tetka Rasema?', 'Iz Maglaja', 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(23, 'Šta je zajedničko cigi i doktoru?', 7, 7, 'C', 'Jel cigo kad jebo medicinsku sestru?', 'Nije, ali jeste običnu', 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2116, 'Esse vitae nobis dolorum sapiente. Est voluptatibus eveniet ipsum quos. Ea sed perspiciatis voluptatibus et neque dolorem sed. Quasi quo nihil consequatur temporibus impedit molestiae eum libero.', 1, 1, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2067, 'Et harum ea quae ut et. Sit a ut qui repellendus aut.', 1, 1, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1983, 'Quidem eveniet possimus iure repudiandae earum similique. Consequuntur velit repudiandae maiores id nisi. Non eum qui quae. Et eaque ullam minus quidem. Sunt quam ut sequi quisquam perspiciatis.', 3, 4, 'D', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1784, 'Cum ad ullam quo sequi saepe nihil temporibus. Adipisci a accusantium ut nesciunt saepe officiis repellendus. Voluptates amet officiis dolorem excepturi sint dolores sequi.', 3, 1, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1273, 'Voluptate velit id commodi ut et odio. Et voluptatem voluptatem deserunt excepturi. Dolor vero nobis omnis assumenda.', 7, 1, 'D', 'Et ut eum sunt eum porro. Voluptate cupiditate quidem eaque est quia unde. Ea et deleniti explicabo enim. Nisi dolorem qui sed. Odit molestiae aut esse consequatur id.', 'Non debitis laborum ut voluptatem sit commodi nostrum. Blanditiis sapiente et quod. Consequatur corporis fuga eligendi ad quis fugit.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1227, 'Fugiat alias ullam sed temporibus. Est veniam non numquam ea. Ut et omnis dolorum sed temporibus aperiam fugit. Voluptas eius accusantium dolores est minus.', 7, 4, 'D', 'Vero numquam est ipsum ex. Ut repellat at sint est. Autem corporis magni consequatur impedit repudiandae consequatur.', 'Aut facilis quas debitis perspiciatis aliquid consequatur quo. Voluptates consectetur ullam vitae quibusdam ullam. At est eum possimus. Sint reprehenderit ex occaecati repellendus illum.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2006, 'Aspernatur ut et quasi at. Officia enim provident eligendi. Enim et consequatur asperiores dolor dignissimos. Id qui et quia ut nam nisi.', 6, 6, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1612, 'Totam enim ad qui iste. Ea sed tempore libero et vero quisquam. Qui vel minima consequuntur sit. Praesentium in voluptatum atque.', 6, 4, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2284, 'Laborum aut amet porro nostrum ea commodi. Totam earum molestiae rerum dolores. Veritatis et magni aut aut dolorum. Voluptates ut fuga debitis labore amet qui.', 4, 4, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2138, 'Dolore assumenda blanditiis ea fuga voluptatibus. Blanditiis quibusdam voluptatum in. Ullam nostrum laudantium magnam accusamus sit et.', 4, 5, 'D', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2831, 'Quia accusantium et illo ut doloremque sit. Minima excepturi error optio aut laborum qui quis corrupti. Tempore sit doloribus nisi ea aperiam perspiciatis. Maxime earum omnis incidunt nihil.', 5, 5, 'A', 'Et vel velit a dolores quasi sunt. Molestiae fugiat excepturi repellat quod. Nulla veritatis aut reprehenderit magnam officiis quod et.', 'Natus nesciunt quibusdam omnis eos qui ea corporis. Quisquam impedit nisi dolor doloremque et vitae libero. Quis numquam nulla id aperiam et dolores et possimus.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1558, 'Fugiat id in dolor ea. Et ullam quas sunt quaerat. Corporis non beatae numquam neque.', 5, 6, 'B', 'Earum voluptatem temporibus voluptatem rerum non soluta. Aut eos odit autem accusamus expedita id. Aut eum fugiat qui voluptatem fugit nisi.', 'Ullam similique odit fuga. Corrupti dolores id error dolorem in iste labore. Ut excepturi iure voluptatem quas ducimus. Libero sint impedit placeat et aut perferendis.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1814, 'Ducimus esse quam expedita eveniet non et. Exercitationem ut unde enim. Numquam ipsam dolor qui rem et harum.', 7, 3, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1574, 'Tempore reprehenderit quas sed cum. Atque sit enim iste voluptas aut. Sint voluptate omnis sint eum laudantium nobis maiores dolorum.', 1, 1, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2411, 'Voluptas qui perspiciatis magni temporibus. Similique eos omnis nemo neque. Vel dolorem maxime quae possimus voluptatem. Ab maiores sunt maxime odit soluta perferendis.', 1, 1, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1934, 'Suscipit architecto cupiditate sint quam est quidem rerum. Sed dolorum qui fugit aut assumenda.', 3, 4, 'D', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2519, 'Reprehenderit et illo minima excepturi iusto culpa aspernatur. Voluptatum itaque labore vel incidunt. Ad sapiente assumenda deleniti et quis debitis.', 3, 1, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2878, 'Est velit sed odit hic explicabo accusantium est autem. Qui omnis ducimus rerum dolores voluptatibus. Est commodi quo voluptas beatae repudiandae est ipsam non.', 5, 3, 'D', 'Dolores et ipsum ut mollitia. Ut officia aperiam enim quia sapiente.', 'Qui quia doloremque laboriosam enim. Aut enim ea blanditiis sed qui aut expedita ut.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1455, 'Earum facere molestias ratione omnis. Culpa aut natus quia. Dolores et et recusandae voluptas ratione. Facere autem asperiores molestiae ipsam culpa.', 5, 1, 'B', 'Dolor suscipit enim ut doloribus. Blanditiis nihil odit quia eum quas. Vero repudiandae qui voluptatem rerum. Et possimus deleniti voluptatem fugit architecto qui eligendi.', 'Provident ipsum consectetur maiores rerum. Optio accusantium ut repellendus voluptatem explicabo. Aperiam dolores sed doloribus quis.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2201, 'Eligendi dolorum omnis nisi et sed maxime. Eligendi facilis pariatur itaque autem tenetur. Quidem quia id unde sit quos labore possimus. Aut deleniti ut ut sed aspernatur iste.', 6, 5, 'D', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2398, 'Rerum voluptate sunt dolorem error eum aut. Et similique aut dolorem. Laudantium assumenda ea facilis architecto quia quasi voluptas.', 6, 6, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2417, 'Est cum repellendus et sunt non. Ea accusantium itaque exercitationem. Voluptas magni ea debitis eum. Voluptate ut minus quis dolorum. Ut qui sint ut excepturi iste quos.', 2, 4, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2320, 'Et est quasi voluptates ducimus quod quo. Omnis itaque pariatur nam ducimus molestias repudiandae et atque. Quis odit quidem et explicabo ad commodi aut eos.', 2, 5, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1374, 'Cupiditate enim voluptas repellat. Ducimus et pariatur et alias. Reprehenderit earum ut fugit repudiandae maxime maxime. Delectus vero culpa tempore quia ut dolore et.', 7, 4, 'A', 'Animi commodi dolor mollitia magni. Odit sint recusandae sit ut.', 'Qui nostrum commodi omnis blanditiis. Quam cumque enim quia temporibus. Aut tempora itaque illum iure sequi eius cumque. Molestias est illo suscipit consequuntur aut rerum neque voluptas.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1178, 'Totam autem incidunt nihil. Hic consequatur eius quas facere aperiam. Culpa ut esse quod sed aut iste praesentium. Earum quo itaque ea delectus debitis.', 7, 4, 'B', 'Repellendus molestias aliquid architecto rerum tempore. Ut laboriosam omnis incidunt est et debitis. Deserunt animi veniam aut et velit accusamus voluptatem totam.', 'Deleniti fugit eligendi quo dolore et. Dolor quia et dolore assumenda est facilis mollitia. Quasi commodi velit doloremque amet nobis deserunt.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2351, 'Quia officiis enim eius sint distinctio aut quas sint. In aut quia velit. Rem sint dolor ad provident. Consequuntur corrupti est harum commodi impedit itaque id.', 7, 7, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2162, 'Fugit voluptatum laudantium ut dignissimos enim nobis. Saepe a et voluptatum autem doloribus sint.', 1, 1, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2263, 'Eaque in aut adipisci quas. Id velit illo soluta dolores tempore ut. Omnis at necessitatibus sed. E !', 1, 1, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-23 08:45:30', NULL),
(2151, 'Quia numquam itaque natus et saepe aspernatur maiores. Omnis ullam repellat ea hic dolor velit ratione voluptas. Deleniti nam architecto voluptate est.', 6, 4, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2001, 'Iusto velit sit similique nam. Rerum iusto et repudiandae consequatur qui. Quos qui quas sit qui.', 6, 1, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1226, 'Corrupti quia illum sed pariatur dolorem quo eveniet ab. Amet et ipsa inventore non voluptatibus est id aspernatur. Aut et veritatis quibusdam ad.', 7, 3, 'A', 'Iusto perspiciatis voluptate qui maxime doloribus. Beatae adipisci qui recusandae id quis. Exercitationem eligendi ut id consequatur enim voluptas et.', 'Aut ea reiciendis qui est quas. Et est dolorem nihil. Ut tenetur iste maiores laudantium aut ab sit.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1567, 'Asperiores mollitia tempora quasi asperiores. Et reiciendis beatae quia qui. Et quasi ab odio consequatur et autem ad.', 7, 1, 'B', 'Suscipit laudantium dolor odit incidunt facilis ut. Vel sed molestiae omnis deleniti optio ipsam iusto. Qui ut animi omnis et ut.', 'Dicta ex labore id officiis. Cum nostrum est doloremque ipsum. Dolore et atque molestiae aut qui alias. Numquam qui sed eligendi voluptatem blanditiis eos.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2517, 'Tempora et eius est sed. Consectetur voluptatum maxime quo omnis ratione perspiciatis. Itaque qui accusamus vel cumque totam quis. Voluptatibus excepturi odio labore.', 2, 6, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1584, 'Dolore nobis consequatur possimus aut. Soluta omnis consectetur non non omnis tempore. Illo eius dolore voluptatem.', 2, 4, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2328, 'Ducimus natus nostrum quasi error quod. Ea aut saepe magnam dolor debitis rerum. Ullam molestias saepe eaque quaerat officia ut qui rem.', 3, 6, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1739, 'Ipsa commodi iste et aut nobis. Possimus libero sint culpa eaque dolor quia. Tenetur ipsam est molestiae. Sint in totam et ad eligendi.', 3, 5, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1549, 'Sed placeat similique voluptatibus neque dolores harum. Esse qui et sapiente. Eos quo est illo. Earum non laboriosam eligendi porro.', 4, 4, 'A', 'Pariatur numquam repellat dicta iste ut nemo. Molestiae repudiandae earum et tenetur amet eaque voluptatem delectus. Molestias sit minus eum velit maiores non nihil. Eligendi doloremque eum est.', 'Qui facere nisi nihil consequatur. Ab odio vitae veniam magnam nihil et quia sapiente. Nulla qui dolorem explicabo placeat.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1304, 'Aspernatur minima tenetur aliquid ea atque amet enim et. Fuga enim nihil quis itaque qui excepturi harum.', 4, 4, 'D', 'Pariatur qui et expedita voluptate. Tempore totam corporis deleniti quia consequatur. Id vero sapiente dolore adipisci non est nihil. Rerum dolor quo dolorem amet.', 'Excepturi voluptatem voluptatem amet sed. Aut dolore quis consequuntur necessitatibus eius veritatis temporibus. Omnis ullam dolore vel quia.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1719, 'Culpa deleniti aut culpa voluptas eaque. Vel rerum amet laborum voluptate error odio. Dolores rerum quasi reprehenderit corporis ipsa odit. In quisquam est sed dolorum delectus ullam.', 7, 6, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2264, 'Asperiores exercitationem quam ea consequuntur sed. Beatae aut autem et quas laudantium. Voluptas rerum sit non aut unde dicta iste.', 1, 1, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2118, 'Voluptatem in soluta dolorum porro vero impedit. Cumque architecto eligendi tenetur quidem. Et nam tempora totam. Ut nemo accusamus qui fugiat.', 1, 1, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2543, 'Qui nobis minima reprehenderit dolorum consequatur cum quia. Illo sint iure magnam. Fuga perspiciatis maiores sunt et odio sit molestiae quae. Rerum et accusantium suscipit.', 6, 4, 'D', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1954, 'Rerum assumenda rerum quaerat est soluta in non. Iste deserunt in officiis aut eius quae in. Ab repudiandae dolor adipisci aliquam provident eaque ut.', 6, 3, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1399, 'Aut dolorem et accusamus minus et harum. Eum labore a qui consectetur molestiae nemo vel voluptatem. Est qui voluptates est laudantium.', 4, 1, 'A', 'Sit ratione est officiis aut est debitis dolorum. Voluptatem voluptas repudiandae fugit corporis commodi velit tempore. Perferendis pariatur natus sunt est sequi alias qui.', 'Ullam et dolorum ea quasi nulla consectetur. Incidunt qui aut excepturi fugit. Sint ab enim et repudiandae voluptates dignissimos fugiat expedita. Impedit et atque omnis voluptatibus modi quibusdam.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2772, 'Debitis similique laudantium eveniet non. Voluptatem veniam adipisci nam voluptatibus quaerat pariatur. Reiciendis iste numquam unde et amet. Dolorum sit dicta beatae minima maxime ea.', 4, 2, 'C', 'Aut ducimus distinctio nemo dicta voluptatem. Nam iusto est sit sit debitis iusto.', 'Voluptatem necessitatibus placeat laudantium doloribus temporibus. Cum incidunt tempore nisi qui ipsum. Iusto atque quos molestiae debitis et dolores.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1915, 'Molestias qui porro porro eos est aspernatur animi. Quisquam eligendi aspernatur quaerat eius quos nobis. Alias neque iste sit occaecati.', 7, 6, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1963, 'Et voluptatem saepe aut provident sit autem. Deserunt soluta enim esse nemo magni. Non tempore sit voluptate cumque perspiciatis.', 7, 5, 'B', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2228, 'Minima ratione cupiditate voluptatem et aut similique totam. Ipsa dolores ut excepturi sunt. Optio ex eaque molestiae possimus et rerum aut.', 3, 4, 'C', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1887, 'Magni error molestiae fuga quae labore. Dolorem et ut consequatur nulla ea voluptas. Cum in mollitia et qui modi. Et libero ipsam et nihil quia aut ab.', 3, 6, 'A', NULL, NULL, 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1409, 'Quo recusandae ipsam corporis in ex illum perferendis. Quis autem et rem et ad. Eum dolor deleniti et aut odit voluptas. Dolor itaque officiis nesciunt sunt dolor.', 5, 4, 'C', 'Non voluptates inventore explicabo dolorem. Sunt nisi aut qui enim perferendis eligendi et.', 'Blanditiis voluptas non qui ut. Consequatur molestiae expedita totam facere. Rerum fuga fugit excepturi dolorem. Est praesentium beatae et impedit ut esse dignissimos.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(51, 'Kad je repka BiH bila najjača?', 5, 5, 'D', 'A od koga smo izgubili na mudajalu?', 'Argentine i Mesina', 1, 1, 5, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(1325, 'Nulla eius sed autem facilis omnis. Nam aut ad non sapiente sed velit ab. Eum totam consequatur earum perferendis eaque aut. A ullam eos occaecati assumenda rerum et sunt doloremque.', 7, 4, 'D', 'Dolor sapiente qui iste asperiores veritatis. Eligendi rerum nobis voluptatem quaerat sit magni cum. In sit et vitae dolor.', 'Et nihil magni sed qui quos. Aut suscipit libero alias laboriosam explicabo neque. Eius tenetur optio aliquam occaecati quo officiis. Soluta qui aut accusantium quis quia.', 1, 1, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL);

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
(1, 1, 'A', 'Zeko', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(2, 1, 'B', 'Kondor', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(3, 1, 'C', 'Vuk', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4, 1, 'D', 'Lisica', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(177, 45, 'A', 'Šućmurasta', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(178, 45, 'B', 'Bijela', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(179, 45, 'C', 'Crna', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(180, 45, 'D', 'Zelena', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(49, 13, 'A', 'Liverpulu', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(50, 13, 'B', 'Želji', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(51, 13, 'C', 'Milanu', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(52, 13, 'D', 'Amri', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(53, 14, 'A', 'Sa trice', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(54, 14, 'B', 'Iz mekteba', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(55, 14, 'C', 'Sa četvorke', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(56, 14, 'D', 'Sa parkinga', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(157, 40, 'A', 'Ljiljani', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(158, 40, 'B', 'Ruže', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(159, 40, 'C', 'Vitez', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(160, 40, 'D', 'Dajmani', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(189, 48, 'A', 'Hercegovine', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(190, 48, 'B', 'PC-A', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(191, 48, 'C', 'Dubrovačke republike', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(192, 48, 'D', 'Kantona', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(121, 31, 'A', 'Bakir', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(122, 31, 'B', 'Bećirević', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(123, 31, 'C', 'Đokić', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(124, 31, 'D', 'On', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(117, 30, 'A', 'Ni jednom', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(118, 30, 'B', '6 puta', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(119, 30, 'C', 'Koga Bakir treba da trehne?', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(120, 30, 'D', 'MIsliš kanarinca?', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(113, 29, 'A', 'Ne mogu se sjetiti', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(114, 29, 'B', 'Ja', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(115, 29, 'C', 'On', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(116, 29, 'D', 'Onaj kako se zove mater mu jebem', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(105, 27, 'A', 'SInan rahmetli Sakić', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(106, 27, 'B', 'Emir Đulović', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(107, 27, 'C', 'Lepa Brena', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(108, 27, 'D', 'Kemal Malovčić', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(205, 52, 'A', 'Kuharica', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(206, 52, 'B', 'Pjevačica', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(207, 52, 'C', 'Kurvarica', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(208, 52, 'D', 'Tenisačica', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(173, 44, 'A', 'Ujna', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(174, 44, 'B', 'Dajdža', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(175, 44, 'C', 'Tetka', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(176, 44, 'D', 'Tetak', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(89, 23, 'A', 'Kašnjenje', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(90, 23, 'B', 'Lova do krova', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(91, 23, 'C', 'Jebavanje sestara', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(92, 23, 'D', 'Oblačenje', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8457, 2116, 'A', 'Nihil eveniet nemo cumque impedit dolor. Omnis quia aut dicta eos.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8458, 2116, 'B', 'Consequatur perspiciatis eos molestiae omnis rem. Aliquam sit officia est non. Nemo deserunt est dignissimos accusamus error distinctio. Vero quibusdam repellat commodi minima.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8459, 2116, 'C', 'Accusamus voluptates vero autem est aliquid quas. Quisquam ut est placeat aut.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8460, 2116, 'D', 'Consectetur praesentium sequi magni voluptas. Et consequatur et quia reprehenderit consequuntur aut. Magni sunt et eos culpa.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8261, 2067, 'A', 'Iusto itaque voluptatem et dolor. Rerum sunt tempore nihil voluptatem hic. Aspernatur rerum et accusantium et provident.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8262, 2067, 'B', 'Fuga amet tempora magni qui consequatur corporis et corrupti. Qui rerum qui sit in sed quia eveniet.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8263, 2067, 'C', 'Nesciunt omnis iste eos qui omnis. Et sunt voluptatem sit. A porro et dicta voluptatem. Velit ipsum ad omnis consequatur et fuga soluta.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8264, 2067, 'D', 'Quibusdam inventore suscipit nesciunt eum quis qui quibusdam soluta. Labore dicta dolorum nesciunt fugiat in hic debitis perferendis. Est saepe reiciendis similique dolores illo architecto.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7925, 1983, 'A', 'Voluptatem voluptate quisquam culpa itaque natus. Quia exercitationem labore vel eum eligendi aut eum. Omnis veritatis hic vero esse eum repellat tempora.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7926, 1983, 'B', 'Voluptatum nesciunt repellat et atque incidunt corporis eum. Est fugit ipsa soluta delectus nisi in. Non maiores omnis dolorem quaerat sed molestias. Eos sunt et sit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7927, 1983, 'C', 'Iste voluptatem consequatur quas velit eum cumque ut. Veritatis ducimus facere quis eveniet dolor. Ut quia harum voluptas. Et id doloremque non. Voluptates qui repellat consectetur non.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7928, 1983, 'D', 'Laborum laborum nobis quaerat dolorum amet. Laboriosam deleniti quam quam officia. Repellendus id neque officiis maiores neque dolore. Vel delectus omnis qui qui officia quia.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7129, 1784, 'A', 'Ex alias voluptas id expedita adipisci. Tenetur veniam asperiores sint rem unde nostrum. Rerum nesciunt omnis cum doloremque quo. Commodi a voluptate illum aspernatur repellat voluptas.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7130, 1784, 'B', 'Qui ipsam iusto sunt vero alias dicta rerum. Exercitationem omnis rerum temporibus dignissimos nostrum minus sunt. Impedit aut vel voluptatem praesentium non laudantium rerum.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7131, 1784, 'C', 'Harum dolores voluptatem tempora error tempore. Cum nam corrupti cupiditate.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7132, 1784, 'D', 'Molestias magnam corrupti magnam quisquam veniam. Minus possimus vel autem nesciunt sunt dolores. Consequatur et et necessitatibus nam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5085, 1273, 'A', 'Sit nisi suscipit similique eveniet aut. Omnis laboriosam eum eum totam voluptas et. Inventore dolorem aut illo maiores sint repellat.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5086, 1273, 'B', 'Est et sint dolor fugit. Qui omnis neque quo et sunt commodi. Repellendus ab fuga reiciendis reiciendis delectus. Deserunt qui sequi nobis voluptas saepe.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5087, 1273, 'C', 'Pariatur voluptas qui voluptatem exercitationem itaque quisquam quia. Cupiditate enim porro et veritatis. Minus quasi deserunt sint illo. Quia iure repellendus necessitatibus qui quaerat.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5088, 1273, 'D', 'Commodi sed quas debitis id. Aspernatur et sunt at nulla. Iste dolores voluptates perferendis aut.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4901, 1227, 'A', 'In enim repudiandae totam modi fugit sunt. Accusantium ipsa sit aut non voluptatem accusamus. Aspernatur eum cumque velit. Quia omnis et et qui.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4902, 1227, 'B', 'Aut dicta et sit ex architecto velit. Voluptatibus quos sunt ipsum est enim ratione quia.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4903, 1227, 'C', 'Qui enim voluptatibus suscipit vel. Ipsam et et nemo magnam. Non nisi tempora nulla sed reiciendis ut. Occaecati atque aut accusantium eos et eveniet.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4904, 1227, 'D', 'Commodi magnam eaque repellendus sint. Aut quo saepe et et vitae. Quisquam aut maxime earum sit omnis ea aperiam optio. Qui non doloremque omnis quibusdam.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8017, 2006, 'A', 'Omnis qui dolorem minus voluptatem. Optio ut corporis odit omnis id iusto. Totam quo eos ipsam suscipit voluptatem.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8018, 2006, 'B', 'Qui ea accusantium excepturi qui recusandae et. Consequuntur laborum alias repellendus. Et autem nisi id totam qui voluptas vero suscipit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8019, 2006, 'C', 'Saepe perferendis distinctio inventore non esse. Delectus earum voluptas occaecati et sed. Veritatis quo non ipsa nobis consectetur. Et nisi deserunt amet asperiores veritatis quis reiciendis.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8020, 2006, 'D', 'Enim sit modi autem necessitatibus autem est est. Neque quibusdam quasi qui quibusdam vitae repellendus omnis doloremque. Sed tenetur voluptas et eos.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6441, 1612, 'A', 'Ut commodi laborum omnis voluptas ipsam velit saepe. Neque dolorum temporibus labore nisi. Similique magni quae sint dolorem molestias. Voluptatem eaque ex sit reprehenderit aperiam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6442, 1612, 'B', 'Ut odit ut consequatur nemo minus. Ducimus unde voluptatem repellendus. Culpa non quas nam quisquam reprehenderit sit ad ab.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6443, 1612, 'C', 'Expedita distinctio et perferendis eveniet deleniti. Porro possimus fugiat ut aperiam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6444, 1612, 'D', 'Esse repudiandae sit consequatur. Accusamus alias eius ducimus. Vitae aut ut maxime tempore. Culpa quasi vitae consequatur earum harum quod odit. Fugit a rerum eum vel quisquam recusandae.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9129, 2284, 'A', 'Animi adipisci aut quas sunt. Porro modi deserunt ut perferendis. Maxime ducimus sit suscipit voluptas quis. Voluptas dicta voluptatem nisi autem.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9130, 2284, 'B', 'Ab velit provident et harum aperiam at minus. Et ut aut perferendis dolor voluptas sed. Fugiat dolorem ex illo culpa omnis iusto. Labore delectus maxime omnis odit cum qui veritatis esse.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9131, 2284, 'C', 'Consequatur qui excepturi quia ut corporis minima. Nobis ut et est minima. Ipsum exercitationem impedit vitae porro placeat. Laborum odio ut corrupti.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9132, 2284, 'D', 'Unde fugit expedita sed dolorum et omnis quibusdam. Perferendis placeat amet autem dicta.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8545, 2138, 'A', 'Commodi vel adipisci sed. Ipsam ut ad nobis molestias et minus eum. Nisi fugit eius quibusdam voluptas suscipit placeat. Et consequatur consequuntur veritatis qui est aliquam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8546, 2138, 'B', 'Eius blanditiis nesciunt nobis qui ullam. Optio ad incidunt deleniti quas consequatur ea dolor. Provident qui nulla aut. Qui sit accusamus deleniti ipsam tempora autem non modi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8547, 2138, 'C', 'Possimus quam est maxime qui. Animi dignissimos ad optio. Omnis a amet error non.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8548, 2138, 'D', 'Dolorum deserunt odio et reiciendis. Eos qui laborum dolorum dignissimos nesciunt id. Dolore id modi itaque voluptatem.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11317, 2831, 'A', 'Architecto non voluptas voluptas quam eos magnam et. Nihil ea eos quas fugit. Voluptas dolorum adipisci adipisci ut earum at.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11318, 2831, 'B', 'Repellendus voluptatem fugit voluptates sunt. Ab ratione minima vel mollitia iusto. Veniam voluptas numquam laudantium neque sunt rerum rerum. Rerum illo delectus sit et porro magnam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11319, 2831, 'C', 'Enim qui incidunt deleniti id voluptates minus provident. Est in nulla voluptas est commodi recusandae. Omnis dolorem illo et. Nesciunt sit ut eum aut non et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11320, 2831, 'D', 'Suscipit nostrum quia aut deleniti optio. Numquam quod veniam est et expedita et libero. Odio ullam et molestias mollitia qui non aperiam dolore. Atque quo facere in fuga quo velit ducimus beatae.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6225, 1558, 'A', 'Voluptas sit itaque ipsum in. Nisi facilis et mollitia porro quo blanditiis. Porro impedit ad ipsum enim vel sunt ratione. Exercitationem at eos blanditiis voluptates ipsum consequatur et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6226, 1558, 'B', 'Quas saepe atque et id. Porro culpa maiores tenetur harum laboriosam nisi accusantium. Omnis est et quaerat quas qui omnis fugiat.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6227, 1558, 'C', 'Nostrum recusandae delectus est sunt placeat ipsum. Culpa ipsam debitis non sed. Accusantium autem rerum maxime aut. Eligendi dolores modi neque id sit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6228, 1558, 'D', 'Ipsam ut qui veniam occaecati. Facere quaerat aut consequatur et ut. Omnis deleniti sequi dicta ut veniam placeat. Velit ex rerum corrupti dolor laboriosam iste.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7249, 1814, 'A', 'Accusantium fugit aut consequatur laudantium architecto pariatur eveniet officia. Officiis esse impedit fuga dolor. Accusantium enim qui tenetur ducimus eius ipsum ea.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7250, 1814, 'B', 'Laudantium odit esse fugiat laudantium cumque. Qui qui non dolor maiores iusto. Adipisci ipsa quam autem nihil sit. Eius nam qui aperiam dignissimos ut deleniti.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7251, 1814, 'C', 'Cum voluptates occaecati perspiciatis et et minus. Et repellendus fugiat animi ut veritatis quo in. Molestiae vel accusamus vitae magni.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7252, 1814, 'D', 'Doloribus atque vero laudantium. Expedita corrupti exercitationem vel eum totam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6289, 1574, 'A', 'Explicabo corporis sint architecto voluptas. Amet esse nemo nostrum nobis sed. Vitae ab impedit eius sed ea et laudantium. Commodi id praesentium blanditiis qui.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6290, 1574, 'B', 'Impedit optio odio ut praesentium occaecati quos. Dolore veniam aperiam beatae in nam. Eveniet amet impedit dolor repellendus.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6291, 1574, 'C', 'Similique aut aut cumque magni. Maiores est ducimus impedit quos sit ea pariatur. Et neque blanditiis recusandae ipsam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6292, 1574, 'D', 'Qui aut itaque vero eos error qui. Velit consequatur aut modi accusamus. Vitae non reiciendis corrupti voluptatem eveniet ipsam est et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9637, 2411, 'A', 'Facilis dolor animi et non et non quia. Et animi blanditiis vero. Dolor sint voluptatem id ducimus. Minus blanditiis similique recusandae.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9638, 2411, 'B', 'Beatae harum veritatis nam est nulla esse cum deleniti. Quod architecto autem enim. Ad exercitationem rerum odio fugiat sed.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9639, 2411, 'C', 'Eum velit labore eligendi voluptatum error dolor. Ea eum cum a voluptates ad rerum. Tempore alias voluptatibus dolorem laboriosam natus. Saepe minus magnam autem voluptas fugiat quis similique.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9640, 2411, 'D', 'Eligendi cumque repellat culpa et repellat reiciendis blanditiis. Et natus officiis pariatur quaerat nihil quis odio. Facilis id voluptas vel qui aut inventore dignissimos.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7729, 1934, 'A', 'Ut alias odit repellendus sapiente sint quis. Quia sed reiciendis similique veniam sit magni fugit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7730, 1934, 'B', 'Aspernatur sunt nostrum aperiam sapiente quo et harum magni. Quos possimus ut odio corrupti consectetur eos. Ea dolor voluptatem sapiente deleniti totam. Officiis sit id reiciendis beatae omnis et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7731, 1934, 'C', 'Dolorem quia eveniet incidunt itaque. Quod officia quisquam et molestias culpa. Velit eum corrupti suscipit sint odio explicabo sed. Rerum qui facere facere ut alias.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7732, 1934, 'D', 'Ut ratione tempora et omnis occaecati officiis est. Cupiditate possimus voluptates vitae veniam esse. Beatae id mollitia et doloribus.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10069, 2519, 'A', 'Qui occaecati occaecati ipsum suscipit doloribus dicta optio. Quis repudiandae ut vero magni aperiam nam. Laborum provident quis ut officia eos et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10070, 2519, 'B', 'Mollitia fugit non ipsa neque beatae. Cupiditate eos quia ut praesentium dicta praesentium quia. Officiis blanditiis animi provident excepturi reprehenderit. Autem a et temporibus voluptatem quidem.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10071, 2519, 'C', 'Distinctio fuga aut ut iure. Illo eos qui earum repellendus odio. Ut ullam eum natus dolores omnis enim et. Quia accusantium ut nesciunt quas dolorum.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10072, 2519, 'D', 'Odio occaecati tempore et consectetur. Et nostrum voluptatem id nostrum quo est quo. Natus architecto excepturi magni accusantium.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11505, 2878, 'A', 'Et suscipit tempora doloribus ut et eos ex. Fuga qui molestias molestias voluptas ipsum. Quod quia natus laboriosam ad aut. Provident laborum cum qui error nihil culpa non commodi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11506, 2878, 'B', 'Consequatur eos minus asperiores quod odit expedita quas. Ducimus aspernatur sit laboriosam. Ratione hic sed veritatis autem.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11507, 2878, 'C', 'Consequatur quasi sed quia labore impedit eum. Explicabo unde sint quia a id.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11508, 2878, 'D', 'Excepturi nemo facilis amet dolor. Voluptas illum vero nisi minima. Iure molestiae autem qui esse quis.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5813, 1455, 'A', 'Dolor nisi ratione facilis. Nulla perspiciatis asperiores in quis. Ullam atque facilis saepe consequuntur. Dolorem explicabo ut ipsum et. At quidem esse ut consectetur officia optio corporis.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5814, 1455, 'B', 'Modi minima ut nihil dolore. Autem repudiandae labore sint quasi. Aliquid et sequi cumque soluta. Sint vero rerum omnis minima.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5815, 1455, 'C', 'Est vitae odit omnis voluptatum dignissimos. Et nihil sint possimus optio quisquam amet voluptas. Inventore iste non ea sit et ex.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5816, 1455, 'D', 'Molestiae cum est ex qui. Velit ea est iste voluptas officia. Ut officiis reprehenderit neque sed perspiciatis enim ex. Neque voluptas omnis aut omnis.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8797, 2201, 'A', 'Sit iste non eaque. Molestiae quo saepe dolorem reprehenderit. Quidem ipsam voluptatem et. Incidunt non quibusdam qui quia quia. Ut earum maxime dolor consectetur fuga omnis nisi voluptas.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8798, 2201, 'B', 'Non officia doloribus doloremque minima. Et commodi et voluptas ab rerum. Quis amet perspiciatis accusantium consequatur reprehenderit eum.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8799, 2201, 'C', 'Quia porro est facilis rem saepe saepe. Quidem nihil et quia et. Molestias earum possimus velit beatae inventore nostrum sint. Eum qui sunt quo provident vel non.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8800, 2201, 'D', 'Et iure et eum voluptas saepe et. Impedit quaerat placeat sit explicabo optio. Mollitia sit qui ut laborum veritatis. Et nihil magni reprehenderit et officia molestiae ab.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9585, 2398, 'A', 'Rerum quod neque aut autem cupiditate. Optio modi totam labore dolorem. Sed voluptatibus et atque earum soluta. Sint voluptatibus reprehenderit minus.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9586, 2398, 'B', 'Libero placeat totam perspiciatis sint sit. Corporis illo dolorem et et nihil molestias. Quam recusandae eos veritatis sequi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9587, 2398, 'C', 'Magnam est nihil cupiditate officia saepe est voluptate praesentium. Aliquam impedit ad deleniti omnis est quo voluptate. Dolore quis nobis eaque dolorum impedit accusamus pariatur.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9588, 2398, 'D', 'Nulla eligendi sunt quia laboriosam voluptatem asperiores ducimus et. Quia quis quod dolorem alias excepturi voluptates. Unde aliquam numquam omnis debitis quo natus ut.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9661, 2417, 'A', 'At et exercitationem possimus molestias. Consequatur quas aperiam qui deleniti nesciunt.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9662, 2417, 'B', 'Accusamus assumenda consectetur consequuntur nihil sed aut in. Autem amet dolores cum quo hic. Mollitia omnis praesentium quis deserunt non.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9663, 2417, 'C', 'Beatae et unde odio numquam. Aut enim quisquam perspiciatis facilis eveniet et sit. Sunt et quas assumenda incidunt. Ut voluptatem eum impedit eos. Dolores ducimus aliquid aut qui ut ab sint.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9664, 2417, 'D', 'Qui molestiae perferendis harum quidem. Laboriosam beatae aspernatur quasi ut consectetur nihil. Consequatur sed non vel similique perferendis et. Nihil beatae praesentium eaque saepe velit nesciunt.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9273, 2320, 'A', 'Ab assumenda eveniet dolor aut dicta. Esse deserunt odio ut minus est soluta temporibus. Ratione doloribus reprehenderit non soluta.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9274, 2320, 'B', 'Ut velit quis asperiores aliquam. Quas esse repellat deserunt sed. Iste id aperiam tempore soluta perferendis dolores. Perspiciatis consequatur reiciendis cum odio.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9275, 2320, 'C', 'Et et qui dolore quam. Magni culpa sit quis aut. Repudiandae velit et et.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9276, 2320, 'D', 'Et quibusdam non dolores voluptatem facere. Quos voluptatem veritatis eos qui enim magnam. Assumenda quo dolore accusantium quo ut quia nam. Maiores et eius optio tenetur.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5489, 1374, 'A', 'Earum odit et commodi ullam. Aperiam vitae dolorum ad. Inventore non dolorum exercitationem doloremque sint cum.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5490, 1374, 'B', 'Non animi fuga commodi sit. Fugiat repudiandae et quidem est. Quo voluptas vel assumenda et. Consequatur recusandae laborum voluptates et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5491, 1374, 'C', 'Velit perspiciatis et sunt qui suscipit voluptatem. Ducimus tenetur sed voluptatum qui voluptates.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5492, 1374, 'D', 'Enim mollitia tempore reprehenderit. In pariatur sed sint velit quas non adipisci. Voluptas similique rerum vel eius cum.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4705, 1178, 'A', 'Eum mollitia eum eaque quae aperiam autem quas. Ad numquam explicabo quos accusamus voluptatibus. Et id voluptas et aliquid.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4706, 1178, 'B', 'Repellat unde ut est eveniet placeat. Sunt maiores rem soluta quibusdam a. Vitae eum perferendis ea et debitis deserunt. Sit dicta saepe optio ullam recusandae repellendus magnam fuga.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4707, 1178, 'C', 'Aut impedit consectetur nobis delectus eos. Eligendi laudantium reiciendis et quos necessitatibus aut sit omnis. Necessitatibus in est explicabo reprehenderit quae.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4708, 1178, 'D', 'Ut tempora veritatis debitis quasi aut ut. Omnis vitae facilis suscipit voluptas nulla odio ut provident. Eaque consequatur quas perspiciatis cupiditate.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9397, 2351, 'A', 'Sint optio quibusdam voluptatum consequatur voluptates. Odio esse debitis reiciendis doloremque et et odio optio. Iste minima architecto ipsam earum.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9398, 2351, 'B', 'Et dolor eum repudiandae non et. Repellendus quis fuga provident quia. Culpa commodi ratione sint.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9399, 2351, 'C', 'Cupiditate fuga numquam accusamus iste. Animi odit voluptatibus laudantium. Animi non minus aliquid.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9400, 2351, 'D', 'Laborum velit aut velit consequatur illum. Tempore libero voluptatum quidem vitae. Iusto eaque quia dolor voluptas.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8641, 2162, 'A', 'Quis quas laudantium laudantium dolor numquam illum. Voluptatibus eum tempore praesentium numquam neque. Cumque nam saepe rerum deserunt mollitia optio.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8642, 2162, 'B', 'Accusamus ratione et consequatur. Molestiae veniam minus sit architecto qui deleniti ut quis. A dolor facilis illum sunt dolorum laudantium voluptatem totam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8643, 2162, 'C', 'Temporibus qui in mollitia rem. Provident deserunt ea est veritatis. Qui ullam omnis tenetur consequuntur velit saepe.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8644, 2162, 'D', 'Et sit impedit voluptatem officiis ea sunt tempora molestiae. Suscipit sequi iure nihil autem fugit. Est tenetur consequatur ad quos voluptatem doloribus enim sint.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9045, 2263, 'A', 'Et qui molestias similique qui qui maiores. Ea qui voluptatem exercitationem et voluptatem autem. Ad reprehenderit iste nihil laudantium.', 0, '2023-07-18 15:43:31', '2023-07-23 08:45:30', NULL),
(9046, 2263, 'B', 'Iure minima et nihil adipisci placeat deleniti doloremque. Eius et quia maiores iure qui. Excepturi non ea dignissimos est corporis. Fuga dicta et eligendi a et.', 1, '2023-07-18 15:43:31', '2023-07-23 08:45:30', NULL),
(9047, 2263, 'C', 'Alias autem tempore odit aperiam dolor et. Earum sint possimus earum ad. Beatae consectetur laudantium nihil amet occaecati voluptas.', 0, '2023-07-18 15:43:31', '2023-07-23 08:45:30', NULL),
(9048, 2263, 'D', 'Doloremque distinctio quaerat aliquam similique dolorem hic. Occaecati ab laboriosam commodi numquam. Voluptates voluptas magni quo qui. Provident rerum molestiae animi at.', 0, '2023-07-18 15:43:31', '2023-07-23 08:45:30', NULL),
(8597, 2151, 'A', 'Illum ipsam voluptas eligendi maiores consequatur voluptatem. Eum ut aut id sunt ducimus et. Distinctio ipsam officia suscipit voluptas animi adipisci minus blanditiis.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8598, 2151, 'B', 'Aut accusantium optio voluptatem sit. Aut non dicta tempore quaerat omnis. Incidunt autem aut veniam occaecati distinctio itaque voluptatem.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8599, 2151, 'C', 'Pariatur et ipsam facere voluptas eveniet adipisci hic. Molestiae quia sit et perspiciatis.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8600, 2151, 'D', 'Adipisci at alias ullam sed quis. Labore aut voluptatem quis autem quia dolor numquam. Consequatur voluptate voluptatem temporibus incidunt nulla cumque. Fuga porro sapiente debitis iste.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7997, 2001, 'A', 'Voluptate aut aperiam aut nesciunt sed et. Ducimus atque rerum quia vel ipsum velit. Nesciunt possimus quas ex ut impedit magnam.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7998, 2001, 'B', 'Unde totam et impedit consequatur excepturi et dolorem. Voluptatibus officiis eius non distinctio. Inventore possimus voluptatem perspiciatis magni.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7999, 2001, 'C', 'Eum cumque nostrum exercitationem praesentium est modi. Quae et voluptatem asperiores temporibus animi ullam. Totam quidem nobis ut voluptas temporibus.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8000, 2001, 'D', 'Et assumenda minima sint perspiciatis qui. Voluptatibus tempore quaerat ab quas. Consequatur corrupti sed dolorum eaque excepturi et voluptatem. Repudiandae corporis beatae nam quidem vel mollitia.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4897, 1226, 'A', 'Non quas quo explicabo et ipsam. Facilis qui vero nostrum illum culpa ut. Necessitatibus aperiam architecto vitae quia doloribus veritatis officiis. Est quia deleniti ea aspernatur dolores.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4898, 1226, 'B', 'Velit sequi iste voluptatem corporis eum similique. Natus reprehenderit est dolore nemo repudiandae. Earum illo vitae vel nostrum dolorem totam dolore.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4899, 1226, 'C', 'Quo omnis ut qui. Eius qui reiciendis est. Iste aut aspernatur repellendus voluptatem et. Veniam commodi qui rerum deleniti molestiae tenetur dignissimos.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(4900, 1226, 'D', 'Illo nesciunt voluptatem id illo ipsa hic totam. Odio ut quos corrupti distinctio. Deleniti molestiae voluptas neque ipsa ut pariatur porro. Voluptas doloremque quia magni iusto repellendus.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6261, 1567, 'A', 'Laborum optio est eos quia maxime assumenda. Facilis hic voluptatibus est ducimus. Quisquam incidunt veniam voluptatem vel. Odio consequatur quis non inventore alias et corrupti.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6262, 1567, 'B', 'Magni sit earum aliquid repellendus. Doloremque commodi blanditiis repellendus enim aperiam consequatur. Ut est voluptatem dolor dolores et id sed.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6263, 1567, 'C', 'Enim minus assumenda quos dicta et doloremque nisi. Fuga quam est est voluptates. Aut veniam eveniet quo autem qui vitae eligendi. Officia illo asperiores laborum nemo et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6264, 1567, 'D', 'Perspiciatis consectetur et totam et cumque impedit quisquam. Provident aut veniam quae nam. Ut velit repellendus et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10061, 2517, 'A', 'Natus qui quia assumenda exercitationem. Iure qui debitis aliquam qui voluptatibus maiores est. Inventore earum quia dolor est ut voluptatem consequuntur.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10062, 2517, 'B', 'Sint eos quaerat unde dolores totam dolorum optio. Nihil et sed iste voluptas ullam totam. Numquam quod aut illum doloremque asperiores cum et. Exercitationem quo culpa ducimus dolores et laudantium.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10063, 2517, 'C', 'Mollitia quo numquam dolorum ipsum voluptate vero. Qui et vel ut vitae in molestiae omnis ab.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10064, 2517, 'D', 'Magni veritatis occaecati fugiat ipsum dolorum. Consectetur ut eius sit nihil alias sunt qui. Ratione incidunt laborum harum soluta. Aut perspiciatis aliquid non non temporibus quam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6329, 1584, 'A', 'Eaque repudiandae eius illum delectus ea et. Nihil perspiciatis a tempore et aut quis aliquid.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6330, 1584, 'B', 'Eius soluta quis qui atque sint. Repellat dignissimos laudantium officia eveniet incidunt velit voluptatem repudiandae.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6331, 1584, 'C', 'Et reiciendis minus sed quos. Doloribus ullam rerum quasi tempora sit sint temporibus. Eum reprehenderit culpa voluptas quis commodi et. Cum vel placeat sed non.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6332, 1584, 'D', 'Aspernatur illo nostrum sequi maxime. Qui amet sed quia. Consequatur molestias perferendis eum ipsum qui quae. Ut nisi voluptatem vel facere laudantium.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9305, 2328, 'A', 'Facilis est debitis aut reprehenderit. Quo dignissimos qui sed aut expedita vitae. Iure distinctio itaque nulla rerum minus. Ea deleniti molestiae excepturi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9306, 2328, 'B', 'Ut doloribus ad modi. Molestias dolorem non voluptate officia dolorem.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9307, 2328, 'C', 'Eligendi voluptas reiciendis ut atque. Eaque explicabo quidem labore soluta reprehenderit. Non cum dolorum laboriosam voluptatibus eaque exercitationem ex. Perferendis quisquam tenetur qui.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9308, 2328, 'D', 'Sapiente accusamus consequatur non sit. Autem nihil et doloribus quos non. Quam dolor minus ipsam delectus. Et amet autem error quo. Impedit sed eveniet eos saepe ab.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6949, 1739, 'A', 'Quibusdam libero officiis aut. Officiis ad et vel. Aut incidunt autem harum quam.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6950, 1739, 'B', 'Consequatur rem est beatae et mollitia in. Unde velit libero provident ratione molestiae ut et. Ea quasi ea voluptas natus et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6951, 1739, 'C', 'Laboriosam numquam aut temporibus repudiandae doloribus. Nobis animi officiis sunt hic culpa nemo. Officiis iusto repudiandae sit et. Magnam quasi quia aperiam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6952, 1739, 'D', 'Vel et laudantium reprehenderit amet expedita. In culpa pariatur quod iusto facilis magni voluptatem. Cupiditate enim excepturi nesciunt perspiciatis. At nobis soluta sint qui vero doloremque qui.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6189, 1549, 'A', 'Ut ut pariatur et amet. Sed magni aut quos voluptates deserunt itaque qui ut. Nihil nisi quia temporibus accusamus sit.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6190, 1549, 'B', 'Aliquid sit molestiae aperiam magni sequi sit vel. Ut esse voluptate iure minus dolorum hic ex.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6191, 1549, 'C', 'Et quam adipisci molestiae in consequuntur aut. Tenetur placeat eveniet harum veniam officia natus qui quisquam. Aliquam quia laboriosam modi officiis. Molestiae et id deserunt laborum aut.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6192, 1549, 'D', 'Corporis aut voluptates esse non dignissimos repudiandae voluptates. Consequatur voluptatem quia molestiae quod quis omnis suscipit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5209, 1304, 'A', 'Enim aut et consequuntur. Neque exercitationem in dolorem. Nostrum harum odit eos. Architecto officiis assumenda consequatur soluta quos provident voluptates.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5210, 1304, 'B', 'Perspiciatis provident magnam est deleniti. Non voluptas et assumenda aut quo veniam expedita. Molestiae iusto aut illum voluptas ab.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5211, 1304, 'C', 'Consequatur sint magni sit qui sed suscipit. Nihil rerum saepe facere debitis.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5212, 1304, 'D', 'Rerum quia fuga eligendi et voluptas nihil doloremque. Consequatur rerum sapiente reiciendis. Unde veniam qui voluptatem occaecati voluptatum sequi.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6869, 1719, 'A', 'Incidunt quis quidem tempora consequatur officia enim hic. Quod occaecati earum omnis sunt qui aut et delectus. Illum in aut aut molestias repellendus. Error corporis odit at quisquam aut.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6870, 1719, 'B', 'Aut quod officiis non atque et eligendi qui. Sint possimus consequatur et explicabo. Dicta doloribus quidem nihil eum aperiam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6871, 1719, 'C', 'Deserunt omnis delectus qui assumenda aliquam necessitatibus. Distinctio aliquam voluptas sit qui eum deleniti. Ut eligendi provident est blanditiis iusto. Est totam sint delectus non qui qui.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(6872, 1719, 'D', 'Autem voluptas aliquam dolorem. Ex minima necessitatibus rerum non consectetur eos excepturi. Corporis dolor at quia rerum ratione nulla. Voluptatem consequatur id odio tenetur.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9049, 2264, 'A', 'Autem rem et aut voluptate. Quisquam enim beatae illum et aliquid sit architecto. Vero vero dicta deserunt sequi voluptatem odit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9050, 2264, 'B', 'Eveniet omnis laudantium esse debitis consequatur. Sed et eum voluptate eos sit facilis culpa. Voluptas ea cumque vel voluptatem quo ut velit.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9051, 2264, 'C', 'Perspiciatis ratione eligendi et omnis unde. Ipsa cum quod non quis.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(9052, 2264, 'D', 'Aut qui qui in iste officia aut. Aliquam dolores aliquid aliquid optio suscipit aliquam ex. Quis perspiciatis aut eveniet maxime. Est alias laborum laborum qui beatae reiciendis.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8465, 2118, 'A', 'Reprehenderit aut sed explicabo qui et temporibus vel. Voluptatem ipsum unde omnis. Officiis quibusdam debitis asperiores aut saepe. Est voluptates unde rerum sed repellat eos.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8466, 2118, 'B', 'Et aut placeat repellat autem autem. Repellendus voluptate quae esse non et id possimus. Voluptas delectus numquam et molestias quam est.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8467, 2118, 'C', 'Alias enim similique est molestiae veniam. Magnam laborum soluta similique aut eveniet in itaque. Nam rerum voluptatem quas exercitationem laudantium consectetur ut. Quo vero et magni veniam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8468, 2118, 'D', 'Ab non iusto excepturi suscipit atque et. Dicta sed aut cum. Ad totam quos autem sint tempora. Tenetur temporibus suscipit odit dolor quasi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10165, 2543, 'A', 'Et error sunt qui et ipsum omnis. Mollitia est corporis reiciendis velit necessitatibus. Et quo atque adipisci dolor delectus sunt expedita. Ratione aut rerum quibusdam pariatur.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10166, 2543, 'B', 'Neque sed aut temporibus. Aliquid consequatur quia vitae et voluptatem qui. Enim ut nam consequatur tenetur non aut commodi. Dolores accusamus ipsum porro dicta sed.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10167, 2543, 'C', 'Est quas voluptatem assumenda et nostrum. Maxime numquam qui provident quia minus consequatur est.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(10168, 2543, 'D', 'Laboriosam ipsa omnis perspiciatis necessitatibus et repellat. Voluptates magni qui magni.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7809, 1954, 'A', 'Ratione amet non odit eos et praesentium nesciunt. Ut dolores et consequatur nobis iure. Omnis illo possimus praesentium eveniet officia quam. Eos beatae consequuntur qui illum esse et est possimus.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7810, 1954, 'B', 'Aut aliquam iure odit quibusdam et quibusdam. Omnis consectetur nam quisquam autem beatae aspernatur. Vitae reiciendis porro quam et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7811, 1954, 'C', 'Nostrum dolorum optio nihil et quo perspiciatis reprehenderit. Dolorum reiciendis doloribus quisquam. Magni ut et dolorum aut. Neque autem quas id reprehenderit recusandae voluptatum.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7812, 1954, 'D', 'Laudantium rerum voluptatum qui ab omnis incidunt. In et non odio nihil neque. Numquam nam natus sit reprehenderit iusto consectetur.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5589, 1399, 'A', 'Amet et voluptatem fugiat eius perferendis. Molestiae consequatur sed nobis nisi et sed. Autem totam cumque corporis unde. Reprehenderit sint autem dicta qui necessitatibus.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5590, 1399, 'B', 'Explicabo omnis ea modi officiis quis aliquam explicabo. Quibusdam hic tenetur voluptas et. Velit tempore necessitatibus nisi excepturi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5591, 1399, 'C', 'Voluptas eius nostrum in. Provident vel ut qui ut labore. Laborum corrupti excepturi quis. Suscipit ad est dolores itaque odit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5592, 1399, 'D', 'Et reprehenderit nisi voluptatem autem ea repudiandae itaque. Officia facilis a perspiciatis labore nesciunt eos. Est et eaque tempora.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11081, 2772, 'A', 'Fugit ut vel officiis rerum qui ad. Vel maxime dolor et fugit sit tenetur. Reiciendis et et debitis ex porro iste a dolor.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11082, 2772, 'B', 'Culpa labore provident rerum sit laborum sit minus. Et ducimus dicta sapiente. Debitis mollitia quam accusamus cumque. Cum reprehenderit blanditiis numquam iure sed.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11083, 2772, 'C', 'Debitis et dicta tempora. Voluptas quia debitis deleniti dicta. Porro nemo aut architecto dignissimos quis. Est doloribus hic incidunt aut nulla.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(11084, 2772, 'D', 'Aut voluptas maxime neque vero reiciendis. Culpa pariatur nostrum veritatis est eos. Voluptatem quia consequatur qui officiis tenetur similique sint.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7653, 1915, 'A', 'Culpa aut voluptatibus ex nemo blanditiis. Architecto dolorum nam enim vel similique velit. Nam hic illum ut quos.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7654, 1915, 'B', 'Enim ullam itaque qui minima. Placeat eum ipsum et cumque. Repellat eius molestias veritatis autem quis enim facilis veritatis. Voluptas sed quo ipsum modi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7655, 1915, 'C', 'Non omnis voluptate quia autem consequatur numquam enim. Mollitia voluptas veniam voluptas sit dicta quae culpa.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7656, 1915, 'D', 'Unde delectus veniam voluptate accusantium. Sapiente cumque alias eaque fugiat voluptates. Eum vel minus tempora sit sunt labore quam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7845, 1963, 'A', 'Eum tempora enim labore provident et. Labore et non alias tempora atque nam. Provident optio accusamus omnis fuga officia ut sed. Molestiae qui ut iste.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7846, 1963, 'B', 'Quod similique delectus velit quod velit. Dignissimos aliquam et nihil eos omnis. Sequi iusto et neque fugit. Natus et ex eum et omnis incidunt vero.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7847, 1963, 'C', 'Consectetur rerum voluptatem enim distinctio harum. Perspiciatis animi esse aut qui vero. Ducimus provident culpa totam impedit quibusdam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7848, 1963, 'D', 'Ipsa totam a praesentium veniam velit. Atque molestias nihil facilis incidunt et et. Id ut est perspiciatis molestiae consequatur architecto cumque. Ipsa voluptatem ex porro quo consequatur.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8905, 2228, 'A', 'Ipsa nesciunt nesciunt qui deserunt ullam. Enim architecto voluptates unde excepturi fugiat adipisci ab autem. Sunt eius ut dolorum cum consequatur. Rerum qui vel quibusdam omnis dolorum.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8906, 2228, 'B', 'Eos incidunt aliquid sed sunt laboriosam illo vero. Et labore et cupiditate eaque non officiis et.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8907, 2228, 'C', 'Deserunt minima quos sed nam necessitatibus. Sit labore fuga id possimus sunt consequatur ut. Qui neque molestiae minus rem culpa. Repellat a impedit ipsum culpa.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(8908, 2228, 'D', 'Qui autem nemo perspiciatis reprehenderit quia unde ut. Sint voluptatem harum enim sed vel qui nihil.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7541, 1887, 'A', 'Quod quam quas eligendi ut quo et. Quo praesentium sint impedit corporis incidunt et.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7542, 1887, 'B', 'Magni voluptatem rerum earum quisquam optio facilis. Quos et natus dolorem et impedit saepe aliquam. Hic impedit quis qui ipsa vero porro assumenda. Saepe sapiente fugit aliquid.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7543, 1887, 'C', 'Quibusdam dolores quos quae quasi ab. Enim quaerat qui fugiat praesentium. Maiores ipsam harum dolorem. Eum eius nostrum aut et ad.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(7544, 1887, 'D', 'Neque voluptas quaerat magnam neque quaerat perspiciatis voluptas rerum. Sint ratione suscipit deserunt quisquam.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5629, 1409, 'A', 'Ut tenetur unde magni ab ut commodi totam. Quod quidem incidunt harum quia. Rem voluptatum doloremque omnis nesciunt modi.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5630, 1409, 'B', 'Ipsam distinctio eius facere veniam. Expedita ex eum sed enim veniam aspernatur autem. Minima eum modi at eius sequi. Consequatur deleniti cupiditate qui voluptate totam voluptas.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5631, 1409, 'C', 'Iure aperiam magni enim delectus beatae praesentium. Est itaque ab omnis ut aut corrupti. Optio quis voluptas consequatur rerum dolorem id nemo et.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5632, 1409, 'D', 'Error ut repellendus ut deleniti vitae voluptate esse. Unde maxime ad ducimus natus. Ut dolores ea adipisci veniam eius laborum esse.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(201, 51, 'A', 'Poslije rata', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(202, 51, 'B', 'Nikad nije bila jaka', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(203, 51, 'C', 'Sad', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(204, 51, 'D', 'Na mundijalu', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5293, 1325, 'A', 'Voluptate est voluptas quam et nam quaerat fugiat. Et sunt et incidunt facilis molestiae. Quia nihil nam neque maxime. Odio eaque ea illo veritatis perspiciatis sequi atque quidem.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5294, 1325, 'B', 'Sint corrupti sit enim aut et error facilis. Aut sed blanditiis quo id aut. Blanditiis reprehenderit voluptate doloribus vero maiores vero id.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5295, 1325, 'C', 'Debitis perspiciatis doloribus doloremque possimus recusandae molestiae. Officiis nulla laborum ipsum tenetur. Blanditiis autem quam laborum velit.', 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(5296, 1325, 'D', 'Molestiae earum dolor dolore veniam nostrum. Excepturi quia placeat quod ut deserunt modi aut. Perferendis ut suscipit aliquam sapiente. Nemo rerum voluptatem omnis pariatur et.', 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL);

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
(15, 3, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:16:45', NULL),
(16, 3, 45, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(17, 3, 13, 2, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:16:46', NULL),
(18, 3, 14, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(19, 3, 40, 3, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:16:49', NULL),
(20, 3, 48, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(21, 3, 31, 4, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:16:52', NULL),
(22, 3, 30, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(23, 3, 29, 5, 1, 1, 1, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:16:53', NULL),
(24, 3, 27, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(25, 3, 52, 6, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:16:58', NULL),
(26, 3, 44, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(27, 3, 23, 7, 1, 0, 0, 0, 0, 1, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-23 15:17:00', NULL),
(41, 5, 2116, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(42, 5, 2067, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(43, 5, 1983, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(44, 5, 1784, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(45, 5, 1273, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(46, 5, 1227, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(47, 5, 2006, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(48, 5, 1612, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(49, 5, 2284, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(50, 5, 2138, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(51, 5, 2831, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(52, 5, 1558, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(53, 5, 1814, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(54, 6, 1574, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(55, 6, 2411, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(56, 6, 1934, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(57, 6, 2519, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(58, 6, 2878, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(59, 6, 1455, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(60, 6, 2201, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(61, 6, 2398, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(62, 6, 2417, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(63, 6, 2320, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(64, 6, 1374, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(65, 6, 1178, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(66, 6, 2351, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(67, 7, 2162, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(68, 7, 2263, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(69, 7, 2151, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(70, 7, 2001, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(71, 7, 1226, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(72, 7, 1567, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(73, 7, 2517, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(74, 7, 1584, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(75, 7, 2328, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(76, 7, 1739, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(77, 7, 1549, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(78, 7, 1304, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(79, 7, 1719, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(80, 8, 2264, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(81, 8, 2118, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(82, 8, 2543, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(83, 8, 1954, 2, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(84, 8, 1399, 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(85, 8, 2772, 3, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(86, 8, 1915, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(87, 8, 1963, 4, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(88, 8, 2228, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(89, 8, 1887, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(90, 8, 1409, 6, 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(91, 8, 51, 6, 0, 0, 0, 1, 0, 0, 0, 0, 1, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL),
(92, 8, 1325, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-18 15:43:31', '2023-07-18 15:43:31', NULL);

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
(1, 'Aladin Kapić', 'aladeenkapic', 'aladin.kapic@alkaris.com', '2023-07-04 17:56:10', '$2y$10$Fh/xNDrX2XzhgcbH8Q0HaeUK7zxlx1.cwuvLG5kr2KKWmiDrrVZlu', 'b898d1eb7f9acf2f9ef5e8bb89727e64ce01a925c4794277fab762cc17a72c62', 4, 0, '21', '61683449', 'Muhameda ef. Pandže 55', NULL, 'Sarajevo', 21, NULL, '2023-07-04 17:56:10', '2023-07-04 17:56:10'),
(10, 'Jovan Perišić', 'jovanperisic', 'jovan@perisic.ba', '2023-07-23 10:21:34', '$2y$10$pyLdJgzlzBzr09VZ3Zq9jeM81.OEAcugtfK2u9eX1aTFwPN6k10Ye', 'c1af7cd3d48aeb614fc725008c4b13e31fbed67434b825467ddd9534c590c9ea', 0, 0, '+387', '62586669', 'Gabelina 14', NULL, 'Sarajevo', 21, NULL, '2023-07-23 10:21:34', '2023-07-23 10:21:34');

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
(3, 'Pitanja - Kategorija', 'question_category', 'Mentalno razgibavanje', 'Prva u nizu kategorija - Mentalno razgibavanje. Vrijednost šifarnika 1 !', '1', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(4, 'Pitanja - Kategorija', 'question_category', 'Zemljo tisućljetna', 'Prva u nizu kategorija - Kategorija 2. Vrijednost šifarnika 2 !', '2', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(5, 'Pitanja - Kategorija', 'question_category', 'Umjetnost i kulturica', 'Prva u nizu kategorija - Kategorija 3. Vrijednost šifarnika 3 !', '3', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(6, 'Pitanja - Kategorija', 'question_category', 'Nova politička historija', 'Prva u nizu kategorija - Kategorija 4. Vrijednost šifarnika 4 !', '4', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(7, 'Pitanja - Kategorija', 'question_category', 'Lagano sportski', 'Prva u nizu kategorija - Kategorija 5. Vrijednost šifarnika 5 !', '5', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(8, 'Pitanja - Kategorija', 'question_category', 'Uspješne žene', 'Prva u nizu kategorija - Kategorija 6. Vrijednost šifarnika 6 !', '6', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(9, 'Pitanja - Kategorija', 'question_category', 'Pitanje za Nobela', 'Prva u nizu kategorija - Pitanje za nobela. Vrijednost šifarnika 7 !', '7', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(12, 'Pitanja - Težina', 'question_weight', '1', NULL, '1', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(13, 'Pitanja - Težina', 'question_weight', '2', NULL, '2', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(14, 'Pitanja - Težina', 'question_weight', '3', NULL, '3', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(15, 'Pitanja - Težina', 'question_weight', '4', NULL, '4', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(16, 'Pitanja - Težina', 'question_weight', '5', NULL, '5', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(17, 'Pitanja - Težina', 'question_weight', '6', NULL, '6', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(18, 'Pitanja - Težina', 'question_weight', '7', NULL, '7', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(19, 'Pitanja - Slova', 'question_letters', 'A', 'Pitanje koje se nalazi na prvom mjestu', 'A', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(20, 'Pitanja - Slova', 'question_letters', 'B', 'Pitanje koje se nalazi na drugom mjestu', 'B', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(21, 'Pitanja - Slova', 'question_letters', 'C', 'Pitanje koje se nalazi na trećem mjestu', 'C', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(22, 'Pitanja - Slova', 'question_letters', 'D', 'Pitanje koje se nalazi na četvrtom mjestu', 'D', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(23, 'Online / Offline', 'online', 'Offline', 'Kviz je rađen na TV-u', '0', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(24, 'Online / Offline', 'online', 'Online', 'Kviz je rađen od strane korisnika online', '1', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(25, 'Da / Ne', 'da_ne', 'Ne', 'Negativno', '0', '2023-07-17 16:17:35', '2023-07-17 16:17:35'),
(26, 'Da / Ne', 'da_ne', 'Da', 'Pozitivno', '1', '2023-07-17 16:17:35', '2023-07-17 16:17:35');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
