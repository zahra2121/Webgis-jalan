-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 01:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigbantul`
--

-- --------------------------------------------------------

--
-- Table structure for table `blackspot`
--

CREATE TABLE `blackspot` (
  `idblack` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `daerah_jalan` text NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `pusat_lat` varchar(100) NOT NULL,
  `pusat_long` varchar(100) NOT NULL,
  `aek` int(11) NOT NULL,
  `bca` double NOT NULL,
  `ucl` double NOT NULL,
  `status` enum('2','1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blackspot`
--

INSERT INTO `blackspot` (`idblack`, `tahun`, `daerah_jalan`, `kecamatan`, `kabupaten`, `pusat_lat`, `pusat_long`, `aek`, `bca`, `ucl`, `status`) VALUES
(1, 2018, 'Jl. Samas, Tangkilan, Sumbermulyo, Kec. Bambanglipuro, Bantul, Daerah Istimewa Yogyakarta 55764, Ind', 'Bambanglipuro', 'Bantul', '-7.9436389363528415', '110.29968917984101', 24, 30.518, 20.148, '0'),
(2, 2018, 'JALAN SAMAS DSN GROGOL CARIKAN DS SUMBERMULYO KEC BAMBANGLIPURO KAB BANTUL', 'Bambanglipuro', 'Bantul', '-7.941408026043498', '110.30115939237106', 6, 30.518, 22.45, '1'),
(3, 2018, 'JALAN SAMAS KANUTAN, SUMBERMULYO BAMBANG LIPURO BANTUL, DAERAH ISTIMEWA YOGYAKARTA 55764, INDONESIA', 'Bambanglipuro', 'Bantul', '-7.924190975339046', '110.3117520397624', 39, 30.518, 19.652, '0'),
(4, 2018, 'JALAN SAMAS SITEN, SUMBERMULYO, BAMBANG LIPURO BANTUL, DAERAH ISTIMEWA YOGYAKARTA 55764, INDONESIA', 'Bambanglipuro', 'Bantul', '-7.926930177410132', '110.31026538054239', 9, 30.518, 21.605, '1'),
(5, 2018, 'JALAN RINGROAD SELATAN DONGKELAN, PANGGUNGHARJO SEWON BANTUL, DAERAH ISTIMEWA YOGYAKARTA 55188, INDO', 'Sewon', 'Bantul', '-7.835089139064961', '110.36375027783718', 24, 30.518, 20.148, '0'),
(6, 2018, 'JALAN BANTUL', 'Sewon', 'Bantul', '-7.846155508135042', '110.34469587173129', 9, 30.518, 21.605, '1'),
(7, 2018, 'JALAN PROFESSOR DOKTOR WIRJONO PROJODIKORO', 'Sewon', 'Bantul', '-7.8354421716747265', '110.36537113561883', 15, 30.518, 20.758, '1'),
(8, 2018, 'JALAN BANTUL DONGKELAN, PANGGUNGHARJO SEWON KOTA YOGYAKARTA, DAERAH ISTIMEWA YOGYAKARTA 55141, INDON', 'Sewon', 'Bantul', '-7.829353850461221', '110.35391238556207', 27, 30.518, 20.016, '0'),
(9, 2019, 'JL..Samas Tangkilan, Sumbermulyo, Bambang Lipuro, Bantul, Daerah Istimewa Yogyakarta 55764, Indonesi', 'Bambanglipuro', 'Bantul', '-7.9543958506129515', '110.29320745112842', 30, 30.518, 19.905, '0'),
(10, 2019, 'JALAN SAMAS KANUTAN, SUMBERMULYO BAMBANG LIPURO BANTUL, DAERAH ISTIMEWA YOGYAKARTA 55764, INDONESIA', 'Bambanglipuro', 'Bantul', '-7.924198686080415', '110.31134294347403', 60, 30.518, 19.302, '0'),
(11, 2019, 'Jl. Samas, Sumbermulyo, Bambang Lipuro, Bantul, Daerah Istimewa Yogyakarta 55764, Indonesia', 'Bambanglipuro', 'Bantul', '-7.950721482472452', '110.29489687836103', 9, 30.518, 21.605, '1'),
(12, 2019, 'Jl. Ganjuran, Kaligondang, Sumbermulyo, Kec. Bambanglipuro, Bantul, Daerah Istimewa Yogyakarta 55764', 'Bambanglipuro', 'Bantul', '-7.9258574263469885', '110.31434034818227', 3, 30.518, 24.358, '1'),
(13, 2019, 'Jl. Samas, Siten, Sumbermulyo, Kec. Bambanglipuro, Bantul, Daerah Istimewa Yogyakarta 55764, Indones', 'Bambanglipuro', 'Bantul', '-7.927503998278626', '110.30983622712031', 12, 30.518, 21.102, '1'),
(14, 2019, 'Jl. Ringroad Selatan No.144, Dongkelan, Panggungharjo, Kec. Kasihan, Bantul, Daerah Istimewa Yogyaka', 'Kasihan', 'Bantul', '-7.827919663523259', '110.35400003742359', 9, 30.518, 21.605, '1'),
(15, 2019, 'JALAN RINGROAD SELATAN DONGKELAN, PANGGUNGHARJO SEWON BANTUL, DAERAH ISTIMEWA YOGYAKARTA 55188, INDO', 'Sewon', 'Bantul', '-7.8347939182347925', '110.36345915380159', 33, 30.518, 19.809, '0'),
(16, 2019, 'Jl. Bantul, Dongkelan, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55186', 'Sewon', 'Bantul', '-7.826117624669144', '110.35768005492187', 3, 30.518, 24.358, '1'),
(17, 2019, 'Jl. Brawijaya No.154a, RW.15, Dongkelan, Panggungharjo, Sewon, Bantul, Daerah Istimewa Yogyakarta 55', 'Sewon', 'Bantul', '-7.827615374220329', '110.35386710085729', 3, 30.518, 24.358, '1'),
(18, 2019, 'Jl. Bantul No.370, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, I', 'Sewon', 'Bantul', '-7.831346158783723', '110.35370040328228', 6, 30.518, 22.45, '1'),
(19, 2020, 'Jl. Samas No.3, Kanutan, Sumbermulyo, Kec. Bambanglipuro, Bantul, Daerah Istimewa Yogyakarta 55764, ', 'Bambanglipuro', 'Bantul', '-7.922193692089919', '110.31278470408924', 6, 30.518, 22.45, '1'),
(20, 2020, 'Jl. Samas, Siten, Sumbermulyo, Kec. Bambanglipuro, Bantul, Daerah Istimewa Yogyakarta 55764, Indones', 'Bambanglipuro', 'Bantul', '-7.92679200356132', '110.31034045966165', 15, 30.518, 20.758, '1'),
(21, 2020, 'Jl. Parangtritis No.184, Bakulan Wetan, Patalan, Kec. Jetis, Bantul, Daerah Istimewa Yogyakarta 5578', 'Jetis', 'Bantul', '-7.909306919744719', '110.35212565269177', 33, 30.518, 19.809, '0'),
(22, 2020, 'Jl. Parangtritis No.184, Bakulan Jetis, Patalan, Kec. Jetis, Bantul, Daerah Istimewa Yogyakarta 5578', 'Jetis', 'Bantul', '-7.906476674753456', '110.35236923933053', 6, 30.518, 22.45, '1'),
(23, 2020, 'Jl. Ringroad Selatan No.144, Dongkelan, Panggungharjo, Kec. Kasihan, Bantul, Daerah Istimewa Yogyaka', 'Kasihan', 'Bantul', '-7.827596701458238', '110.35292950442317', 3, 30.518, 24.358, '1'),
(24, 2020, 'Jl. Srandakan ,salam, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761', 'Pandak', 'Bantul', '-7.929797534272173', '110.27393588065836', 6, 30.518, 22.45, '1'),
(25, 2020, 'Jl. Srandakan No.94, Ngabean, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indon', 'Pandak', 'Bantul', '-7.9219681760363345', '110.28025733996138', 27, 30.518, 20.016, '0'),
(26, 2020, 'Jl. Srandakan No.94, Juwono, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indone', 'Pandak', 'Bantul', '-7.91898613506816', '110.2793126082038', 12, 30.518, 21.102, '1'),
(27, 2020, 'Jl. Tangkilan, Ngabean, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indonesia', 'Pandak', 'Bantul', '-7.926913063474315', '110.29684838459096', 15, 30.518, 20.758, '1'),
(28, 2020, 'Jl. Srandakan, Cengkiran, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indonesia', 'Pandak', 'Bantul', '-7.914424552495442', '110.2864191179099', 18, 30.518, 20.504, '1'),
(29, 2020, 'Jl. Srandakan Nglarang, Siyangan, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, I', 'Pandak', 'Bantul', '-7.917449312404176', '110.28591292127597', 12, 30.518, 21.102, '1'),
(30, 2020, 'Jl. Srandakan, Nglarang, Siyangan, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, ', 'Pandak', 'Bantul', '-7.917162395080186', '110.28468983406681', 33, 30.518, 19.809, '0'),
(31, 2020, 'Jl. Wonosari No.11, Bantaran Wetan, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta 5579', 'Piyungan', 'Bantul', '-7.830580764937573', ' 110.45753062127443', 6, 30.518, 22.45, '1'),
(32, 2020, 'Jl. Nasional III No.12, Bantaran Wetan, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta ', 'Piyungan', 'Bantul', '-7.830981160477897', '110.45832426175797', 6, 30.518, 22.45, '1'),
(33, 2020, 'Jl. Nasional III, Kalakan, Argorejo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752, Indonesi', 'Sedayu', 'Bantul', '-7.8152509401720724', '110.25220009306815', 3, 30.518, 24.358, '1'),
(34, 2020, 'Jl. Raya Wates - Jogjakarta No.300, Kalakan, Argorejo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakar', 'Sedayu', 'Bantul', '-7.816264287904581', '110.24980640459374', 18, 30.518, 20.504, '1'),
(35, 2020, 'Jl. Nasional III, Bandut Lor, Argorejo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752, Indon', 'Sedayu', 'Bantul', '-7.812623525142185', '110.26864554346334', 15, 30.518, 20.758, '1'),
(36, 2020, 'Jl. Nasional III, Karanglo, Argomulyo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752, Indone', 'Sedayu', 'Bantul', '-7.812299488638276', '110.26957767782947', 3, 30.518, 24.358, '1'),
(37, 2020, 'Jl. Raya Wates-Jogjakarta, Pedes, Argomulyo, Sedayu, Karanglo, Argomulyo, Kec. Sedayu, Bantul, Daera', 'Sedayu', 'Bantul', '-7.8122518827558585', '110.27113787810652', 6, 30.518, 22.45, '1'),
(38, 2020, 'Jl. Bantul, Pucung, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55186, Indonesia', 'Sewon', 'Bantul', '-7.8532572485834375', '110.34019209464284', 12, 30.518, 21.102, '1'),
(39, 2020, 'Jl. Bantul No.7, RT.5, Diro, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55186, Ind', 'Sewon', 'Bantul', '-7.85866898638744', '110.33791936525235', 21, 30.518, 20.307, '0'),
(40, 2020, 'Jl. Bantul No.7, Krantil Sawahan, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55186', 'Sewon', 'Bantul', '-7.8725301616119445', '110.33648856094837', 6, 30.518, 22.45, '1'),
(41, 2020, 'Jalan Bantul Km.4,5, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188,', 'Sewon', 'Bantul', '-7.833118935817604', '110.35340089649729', 15, 30.518, 20.758, '1'),
(42, 2020, 'Jl. Dongkelan No.370, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188', 'Sewon', 'Bantul', '-7.827787745838876', '110.35439126951577', 12, 30.518, 21.102, '1'),
(43, 2020, 'Jl. Ringroad Selatan No.340A, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakar', 'Sewon', 'Bantul', '-7.82782338288553', '110.35545849599083', 15, 30.518, 20.758, '1'),
(44, 2020, 'Jl. Ringroad Selatan No.92 Saman, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188', 'Sewon', 'Bantul', '-7.835760722105971', '110.36965546209632', 3, 30.518, 24.358, '1'),
(45, 2020, 'Jl. Nasional III No.118, Druwo, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, I', 'Sewon', 'Bantul', '-7.836325979747561', '110.37494353882467', 18, 30.518, 20.504, '1'),
(46, 2020, 'Jl. Ringroad Selatan No.115, Druwo, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 5518', 'Sewon', 'Bantul', '-7.83598247482231', '110.36726324912486', 12, 30.518, 21.102, '1'),
(47, 2020, 'Jl. Parangtritis No.4, Druwo, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, Ind', 'Sewon', 'Bantul', '-7.8348228790287555', '110.36626137156016', 15, 30.518, 20.758, '1'),
(48, 2020, 'Jl. Ringroad Selatan,  Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, Indonesi', 'Sewon', 'Bantul', '-7.8359067330136885', '110.36757334400674', 3, 30.518, 24.358, '1'),
(49, 2020, 'Jl. Parangtritis KM.4,2 No.35, Saman, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55', 'Sewon', 'Bantul', '-7.831031579999961', '110.36714733846125', 12, 30.518, 21.102, '1'),
(50, 2021, 'Jl. Samas No.12, Kanutan, Sumbermulyo, Kec. Bambanglipuro, Kabupaten Bantul, Daerah Istimewa Yogyaka', 'Bambanglipuro', 'Bantul', '-7.922115874788152', '110.31278802681467', 30, 30.518, 19.905, '0'),
(51, 2021, 'Jl. Samas No.05, Siten, Sumbermulyo, Kec. Bambanglipuro, Bantul, Daerah Istimewa Yogyakarta 55764, I', 'Bambanglipuro', 'Bantul', '-7.905638092105996', '110.32074955011097', 6, 30.518, 22.45, '1'),
(52, 2021, 'Jl. Parangtritis No.184, Bakulan, Patalan, Kec. Jetis, Bantul, Daerah Istimewa Yogyakarta 55781, Ind', 'Jetis', 'Bantul', '-7.9092502724148925', '110.35211174726936', 57, 30.518, 19.339, '0'),
(53, 2021, 'Jl. Raya Barongan, Bakulan, Patalan, Kec. Jetis, Bantul, Daerah Istimewa Yogyakarta 55781, Indonesia', 'Jetis', 'Bantul', '-7.910349745385201', '110.35507218700519', 3, 30.518, 24.358, '1'),
(54, 2021, 'Jl. Srandakan No.94, Salam, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indones', 'Pandak', 'Bantul', '-7.920335701420604', '110.282300589728', 24, 30.518, 20.148, '0'),
(55, 2021, 'Jl. Srandakan No.94, Ngabean, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indon', 'Pandak', 'Bantul', '-7.917673552809181', '110.28411497833366', 15, 30.518, 20.758, '1'),
(56, 2021, 'Jl. Srandakan No.94, Juwono, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indone', 'Pandak', 'Bantul', '-7.920240063016329', '110.27977394813337', 6, 30.518, 22.45, '1'),
(57, 2021, 'Jl. Srandakan No.94, Srandakan, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Ind', 'Pandak', 'Bantul', '-7.9222069404323605', '110.281038648396', 3, 30.518, 24.358, '1'),
(58, 2021, 'Jl. Srandakan, Nglarang, Siyangan, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, ', 'Pandak', 'Bantul', '-7.917470565531336', '110.28614895564967', 12, 30.518, 21.102, '1'),
(59, 2021, 'Jl. Nglarang - Gesikan, Nglarang, Wijirejo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, I', 'Pandak', 'Bantul', '-7.918746396165725', '110.28907607299062', 18, 30.518, 20.504, '1'),
(60, 2021, 'Jl. Srandakan, Cengkiran, Triharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, Indonesia', 'Pandak', 'Bantul', '-7.914616378226473', '110.28633656175673', 3, 30.518, 24.358, '1'),
(61, 2021, 'Jl. Srandakan No.15, Siyangan, Gilangharjo, Kec. Pandak, Bantul, Daerah Istimewa Yogyakarta 55761, I', 'Pandak', 'Bantul', '-7.916655504363312', '110.28207469440795', 39, 30.518, 19.652, '0'),
(62, 2021, 'Jl. Nasional III No.12, Payak Kulon, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta 557', 'Piyungan', 'Bantul', '-7.833568829048544', '110.45779207817965', 6, 30.518, 22.45, '1'),
(63, 2021, 'Jl. Wonosari No.5, Ngangkruk, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta 55792, Ind', 'Piyungan', 'Bantul', '-7.837604964164135', ' 110.47483110778002', 3, 30.518, 24.358, '1'),
(64, 2021, 'Jl. Wonosari No.12, Peyek Cilik, Srimulyo, Kec. Piyungan, Kabupaten Bantul, Daerah Istimewa Yogyakar', 'Piyungan', 'Bantul', '-7.831623874439697', '110.46012905564814', 15, 30.518, 20.758, '1'),
(65, 2021, 'Jl. Wonosari No.12, Bintaran Wetan, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta 5579', 'Piyungan', 'Bantul', '-7.832416074231584', '110.45799502846407', 18, 30.518, 20.504, '1'),
(66, 2021, 'Jl. Nasional III No.12, Payak Kulon, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta 557', 'Piyungan', 'Bantul', '-7.8333987695572755', '110.45755604380595', 3, 30.518, 24.358, '1'),
(67, 2021, 'Jl. Wonosari No.12, Payak Cilik, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta 55792, ', 'Piyungan', 'Bantul', '-7.831477885611136', '110.45982288718642', 9, 30.518, 21.605, '1'),
(68, 2021, 'Jl. Nasional III No.12, Bintaran Wetan, Srimulyo, Kec. Piyungan, Bantul, Daerah Istimewa Yogyakarta ', 'Piyungan', 'Bantul', '-7.833379266863383', '110.45382588705407', 3, 30.518, 24.358, '1'),
(69, 2021, 'Jl. Raya Wates - Jogjakarta, Gayam, Argosari, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752,', 'Sedayu', 'Bantul', '-7.811508464524737', '110.25499052969461', 51, 30.518, 19.425, '0'),
(70, 2021, 'Jl. Wates No.KM 11, Bandut Lor, Argorejo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752, Ind', 'Sedayu', 'Bantul', '-7.813960212411647', '110.25891504826308', 15, 30.518, 20.758, '1'),
(71, 2021, 'Jl. Nasional III, Bandut Lor, Argorejo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752, Indon', 'Sedayu', 'Bantul', '-7.812623525142185', '110.26864554346334', 12, 30.518, 21.102, '1'),
(72, 2021, 'Jl. Wates, Bandut Lor, Argorejo, Kec. Sedayu, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55752, In', 'Sedayu', 'Bantul', '-7.812765763219529', ' 110.26666654848492', 24, 30.518, 20.148, '0'),
(73, 2021, 'Jl. Bantul No.7,5, Monggang, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55186, Ind', 'Sewon', 'Bantul', '-7.857991535969418', '110.34107433511508', 15, 30.518, 20.758, '1'),
(74, 2021, 'Jl. Bantul No.35a, Pucung, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55186, Indon', 'Sewon', 'Bantul', '-7.854124948204638', ' 110.34187116715492', 3, 30.518, 24.358, '1'),
(75, 2021, 'Jl. Bantul rt 61 KM.8 No.40, Krantil Indah, Pendowoharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyak', 'Sewon', 'Bantul', '-7.855829136695777', '110.34147558264952', 6, 30.518, 22.45, '1'),
(76, 2021, 'Jl. Bantul No.7, RT.5, Sawahan, Pendowoharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakar', 'Sewon', 'Bantul', '-7.8557067203049895', '110.34152739835265', 12, 30.518, 21.102, '1'),
(77, 2021, 'Jl. Bantul No.204, Diro, Pendowoharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta 5518', 'Sewon', 'Bantul', '-7.8682389086559095', '110.33786409093325', 3, 30.518, 24.358, '1'),
(78, 2021, 'Jl. Ringroad Selatan No.144, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakart', 'Sewon', 'Bantul', '-7.827586072589704', ' 110.35295096209602', 12, 30.518, 21.102, '1'),
(79, 2021, 'Jl. Bantul, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, Indonesi', 'Sewon', 'Bantul', '-7.826006652715192', '110.35637175948162', 42, 30.518, 19.586, '0'),
(80, 2021, 'Jl. Ringroad Selatan No.334, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakart', 'Sewon', 'Bantul', '-7.827596880879549', '110.35393418671633', 27, 30.518, 20.016, '0'),
(81, 2021, 'Jl. Brawijaya No.154a, RW.15, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakar', 'Sewon', 'Bantul', '-7.827634775109157', '110.35407298817235', 6, 30.518, 22.45, '1'),
(82, 2021, 'Jl. Bantul No.93, RW.15, Dongkelan, Panggungharjo, Kec. Sewon, Kota Yogyakarta, Daerah Istimewa Yogy', 'Sewon', 'Bantul', '-7.828538332592477', '110.35376743511463', 6, 30.518, 22.45, '1'),
(83, 2021, 'Jl. Ringroad Selatan No.335, Dongkelan, Panggungharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakart', 'Sewon', 'Bantul', '-7.827683421048211', '110.35480399835215', 3, 30.518, 24.358, '1'),
(84, 2021, 'Jl. Parangtritis No.60, Druwo, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, In', 'Sewon', 'Bantul', '-7.836797149440832', '110.3650820486055', 36, 30.518, 19.725, '0'),
(85, 2021, 'Jl. Ringroad Selatan No.112-114, Druwo, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta ', 'Sewon', 'Bantul', '-7.83589807814489', '110.36715559464244', 24, 30.518, 20.148, '0'),
(86, 2021, 'Jl. Nasional III No.118, Druwo, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 55188, I', 'Sewon', 'Bantul', '-7.836389751616601', '110.37530831926279', 24, 30.518, 20.148, '0'),
(87, 2021, 'Jl. Ringroad Selatan No.rt 5, Saman, Bangunharjo, Kec. Sewon, Bantul, Daerah Istimewa Yogyakarta 551', 'Sewon', 'Bantul', '-7.838168089860775', '110.36441554186173', 3, 30.518, 24.358, '1'),
(88, 2021, 'Jl. Parangtritis No.21, Saman, Bangunharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakarta', 'Sewon', 'Bantul', '-7.834547978249436', ' 110.36613295195582', 3, 30.518, 24.358, '1'),
(89, 2022, 'Jl. Wonosari KM.8,1 No.8, Potorono, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 5', 'Banguntapan', 'Bantul', '-7.823508000861498', '110.42643607149111', 78, 30.518, 19.123, '0'),
(90, 2022, 'Jl. Samas No.17, Tangkilan, Sumbermulyo, Kec. Bambanglipuro, Kabupaten Bantul, Daerah Istimewa Yogya', 'Bambanglipuro', 'Bantul', '-7.933391935170531', '110.30718062553976', 60, 30.518, 19.302, '0'),
(91, 2022, 'Jl. Parangtritis No.184, Bakulan Wetan, Patalan, Kec. Jetis, Kabupaten Bantul, Daerah Istimewa Yogya', 'Jetis', 'Bantul', '-7.912085621585602', '110.3518405510821', 75, 30.518, 19.148, '0'),
(92, 2022, 'Jl. Raya Wates - Jogjakarta No.16, Jambon, Argosari, Kec. Sedayu, Kabupaten Bantul, Daerah Istimewa ', 'Sedayu', 'Bantul', '-7.817327593454903', '110.2472330993879', 18, 30.518, 20.504, '1'),
(93, 2022, 'Jl. Raya Wates - Jogjakarta No.300 KM 13, Tonalan, Argorejo, Kec. Sedayu, Kabupaten Bantul, Daerah I', 'Sedayu', 'Bantul', '-7.8167443796285365', '110.24859129428519', 27, 30.518, 20.016, '0'),
(94, 2022, 'Jl. Raya Wates - Jogjakarta No.Km 13, Tonalan, Argosari, Kec. Sedayu, Kabupaten Bantul, Daerah Istim', 'Sedayu', 'Bantul', '-7.817292322428135', '110.24730148613106', 30, 30.518, 19.905, '0'),
(95, 2022, 'Jl. Prof. Dr. Wirjono Projodikoro No.115, Druwo, Bangunharjo, Kec. Sewon, Kabupaten Bantul, Daerah I', 'Sewon', 'Bantul', '-7.835989349482721', '110.36742792312063', 123, 30.518, 18.862, '0'),
(96, 2022, 'Jl. Parangtritis No.Km 4.5, Druwo, Bangunharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyak', 'Sewon', 'Bantul', '-7.838531257649421', ' 110.36425868632756', 9, 30.518, 21.605, '1'),
(97, 2022, 'Jl. Parangtritis No.351, Saman, Bangunharjo, Kec. Sewon, Kabupaten Bantul, Daerah Istimewa Yogyakart', 'Sewon', 'Bantul', '-7.834766392174871', '110.36608422127449', 3, 30.518, 24.358, '1');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `idkasus` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `luka_ringan` int(11) NOT NULL,
  `luka_berat` int(11) NOT NULL,
  `meninggal` int(11) NOT NULL,
  `rugi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`idkasus`, `id`, `tanggal`, `jam`, `luka_ringan`, `luka_berat`, `meninggal`, `rugi`) VALUES
(1, 1, '2018-04-30', '07:00:00', 2, 0, 0, 0),
(2, 1, '2018-08-14', '18:00:00', 1, 0, 0, 0),
(3, 1, '2018-09-15', '17:00:00', 0, 0, 1, 0),
(4, 1, '2018-04-21', '22:00:00', 1, 0, 0, 0),
(5, 2, '2018-06-14', '05:30:00', 2, 0, 0, 0),
(6, 3, '2018-06-16', '12:30:00', 2, 0, 0, 0),
(7, 3, '2018-08-12', '12:10:00', 1, 0, 1, 0),
(8, 4, '2018-08-22', '19:45:00', 1, 0, 0, 0),
(9, 4, '2018-09-05', '14:45:00', 1, 0, 0, 0),
(10, 3, '2018-10-18', '08:30:00', 2, 0, 0, 0),
(11, 3, '2018-10-17', '07:45:00', 2, 0, 0, 0),
(12, 3, '2018-11-25', '19:30:00', 2, 0, 0, 0),
(13, 4, '2018-12-30', '20:45:00', 1, 0, 0, 0),
(14, 5, '2018-03-05', '18:40:00', 0, 0, 1, 0),
(15, 6, '2018-03-20', '05:30:00', 2, 0, 0, 0),
(16, 7, '2018-04-02', '09:00:00', 1, 0, 1, 0),
(17, 6, '2018-04-22', '21:00:00', 1, 0, 0, 0),
(18, 8, '2018-07-08', '01:00:00', 3, 0, 0, 0),
(19, 8, '2018-08-09', '21:30:00', 2, 0, 0, 0),
(20, 8, '2018-08-25', '12:00:00', 2, 0, 0, 0),
(21, 5, '2018-09-10', '23:00:00', 2, 0, 0, 0),
(22, 8, '2018-09-24', '07:30:00', 1, 0, 0, 0),
(23, 8, '2018-11-11', '14:00:00', 1, 0, 0, 0),
(24, 5, '2018-12-19', '14:00:00', 2, 0, 0, 0),
(25, 9, '2019-05-11', '18:30:00', 0, 0, 1, 0),
(26, 9, '2019-04-28', '16:00:00', 0, 0, 1, 0),
(27, 9, '2019-08-01', '16:30:00', 1, 0, 0, 0),
(28, 9, '2019-03-03', '07:30:00', 1, 0, 0, 0),
(29, 11, '2019-05-22', '18:30:00', 1, 0, 0, 0),
(30, 10, '2019-09-12', '18:00:00', 1, 0, 0, 0),
(31, 12, '2019-11-03', '14:45:00', 1, 0, 0, 0),
(32, 11, '2019-04-20', '06:15:00', 1, 0, 0, 0),
(33, 13, '2019-12-10', '07:15:00', 0, 0, 1, 0),
(34, 10, '2019-10-11', '19:20:00', 0, 0, 1, 0),
(35, 10, '2019-05-02', '13:15:00', 1, 0, 0, 0),
(36, 11, '2019-04-02', '13:00:00', 1, 0, 0, 0),
(37, 10, '2019-01-07', '20:05:00', 3, 0, 0, 0),
(38, 10, '2019-01-10', '18:30:00', 2, 0, 0, 0),
(39, 10, '2019-01-14', '15:45:00', 2, 0, 0, 0),
(40, 10, '2019-01-20', '00:30:00', 2, 0, 1, 0),
(41, 10, '2019-02-16', '15:00:00', 1, 0, 0, 0),
(42, 14, '2019-12-27', '13:00:00', 1, 0, 0, 0),
(43, 14, '2019-12-08', '01:00:00', 1, 0, 0, 0),
(44, 14, '2019-08-15', '16:45:00', 1, 0, 0, 0),
(45, 15, '2019-06-29', '08:00:00', 1, 0, 0, 0),
(46, 15, '2019-11-03', '08:00:00', 1, 0, 0, 0),
(47, 16, '2019-11-05', '19:00:00', 1, 0, 0, 0),
(48, 17, '2019-07-08', '19:00:00', 1, 0, 0, 0),
(49, 18, '2019-10-26', '13:00:00', 1, 0, 0, 0),
(50, 18, '2019-10-16', '06:00:00', 1, 0, 0, 0),
(51, 15, '2019-07-08', '10:00:00', 1, 0, 0, 0),
(52, 15, '2019-12-14', '15:30:00', 1, 0, 0, 0),
(53, 15, '2019-06-27', '10:50:00', 1, 0, 0, 0),
(54, 15, '2019-02-12', '18:00:00', 1, 0, 0, 0),
(55, 15, '2019-02-21', '10:00:00', 2, 0, 0, 0),
(56, 15, '2019-03-08', '11:00:00', 2, 0, 0, 0),
(57, 15, '2019-03-13', '17:30:00', 1, 0, 0, 0),
(58, 19, '2020-11-23', '16:15:00', 1, 0, 0, 0),
(59, 20, '2020-04-11', '18:15:00', 1, 0, 0, 0),
(60, 19, '2020-05-22', '19:30:00', 1, 0, 0, 0),
(61, 20, '2020-09-09', '11:30:00', 0, 0, 1, 0),
(62, 21, '2020-02-20', '08:00:00', 1, 0, 0, 0),
(63, 21, '2020-12-05', '23:00:00', 2, 0, 0, 0),
(64, 22, '2020-04-02', '04:45:00', 1, 0, 0, 0),
(65, 21, '2020-01-16', '02:30:00', 2, 0, 1, 0),
(66, 22, '2020-12-04', '02:30:00', 1, 0, 0, 0),
(67, 21, '2020-08-11', '22:30:00', 1, 0, 0, 0),
(68, 21, '2020-09-16', '02:30:00', 1, 0, 0, 0),
(69, 23, '2020-10-14', '09:30:00', 1, 0, 0, 0),
(70, 24, '2020-01-27', '06:30:00', 2, 0, 0, 0),
(71, 25, '2020-03-20', '19:00:00', 1, 0, 0, 0),
(72, 25, '2020-05-13', '17:15:00', 1, 0, 0, 0),
(73, 26, '2020-06-07', '14:00:00', 1, 0, 0, 0),
(74, 25, '2020-06-26', '10:45:00', 1, 0, 0, 0),
(75, 26, '2020-06-14', '10:50:00', 1, 0, 0, 0),
(76, 27, '2020-07-24', '09:30:00', 2, 0, 0, 0),
(77, 26, '2020-11-27', '11:50:00', 2, 0, 0, 0),
(78, 25, '2020-04-09', '11:15:00', 2, 0, 0, 0),
(79, 25, '2020-12-21', '07:15:00', 0, 0, 1, 0),
(80, 28, '2020-01-09', '16:15:00', 1, 0, 0, 0),
(81, 28, '2020-01-21', '16:00:00', 1, 0, 0, 0),
(82, 29, '2020-02-19', '08:30:00', 1, 0, 0, 0),
(83, 30, '2020-11-11', '19:30:00', 1, 0, 1, 0),
(84, 30, '2020-02-28', '14:30:00', 1, 0, 0, 0),
(85, 29, '2020-03-03', '08:00:00', 1, 0, 0, 0),
(86, 28, '2020-06-10', '19:20:00', 4, 0, 0, 0),
(87, 30, '2020-02-07', '10:00:00', 1, 0, 0, 0),
(88, 30, '2020-07-03', '21:30:00', 2, 0, 0, 0),
(89, 27, '2020-07-09', '01:25:00', 1, 0, 0, 0),
(90, 27, '2020-11-27', '18:00:00', 1, 0, 0, 0),
(91, 27, '2020-10-16', '11:45:00', 1, 0, 0, 0),
(92, 29, '2020-11-16', '11:00:00', 1, 0, 0, 0),
(93, 30, '2020-08-13', '08:55:00', 2, 0, 0, 0),
(94, 29, '2020-09-21', '09:00:00', 1, 0, 0, 0),
(95, 31, '2020-07-18', '14:00:00', 1, 0, 0, 0),
(96, 32, '2020-11-10', '16:00:00', 2, 0, 0, 0),
(97, 31, '2020-03-22', '10:00:00', 1, 0, 0, 0),
(98, 33, '2020-02-18', '09:25:00', 1, 0, 0, 0),
(99, 34, '2020-02-21', '23:10:00', 1, 0, 0, 0),
(100, 34, '2020-04-12', '00:40:00', 1, 0, 0, 0),
(101, 34, '2020-06-10', '09:23:00', 2, 0, 0, 0),
(102, 34, '2020-09-25', '10:30:00', 2, 0, 0, 0),
(103, 35, '2020-03-03', '16:05:00', 0, 0, 1, 0),
(104, 37, '2020-04-05', '10:30:00', 2, 0, 0, 0),
(105, 36, '2020-07-22', '15:20:00', 1, 0, 0, 0),
(106, 35, '2020-08-16', '19:55:00', 1, 0, 0, 0),
(107, 38, '2020-01-02', '21:30:00', 3, 0, 0, 0),
(108, 39, '2020-03-04', '08:00:00', 1, 0, 0, 0),
(109, 39, '2020-02-01', '16:00:00', 1, 0, 0, 0),
(110, 39, '2020-06-17', '21:00:00', 1, 0, 0, 0),
(111, 39, '2020-08-20', '21:15:00', 0, 0, 1, 0),
(112, 38, '2020-04-23', '12:15:00', 1, 0, 0, 0),
(113, 40, '2020-08-02', '20:00:00', 1, 0, 0, 0),
(114, 40, '2020-10-17', '20:00:00', 1, 0, 0, 0),
(115, 41, '2020-01-23', '12:00:00', 1, 0, 0, 0),
(116, 41, '2020-11-09', '15:00:00', 1, 0, 0, 0),
(117, 42, '2020-03-10', '19:15:00', 0, 0, 1, 0),
(118, 41, '2020-03-13', '15:15:00', 1, 0, 0, 0),
(119, 43, '2020-02-20', '09:00:00', 1, 0, 0, 0),
(120, 43, '2020-04-04', '21:30:00', 1, 0, 0, 0),
(121, 43, '2020-07-09', '10:00:00', 1, 0, 0, 0),
(122, 41, '2020-08-15', '23:30:00', 1, 0, 0, 0),
(123, 43, '2020-12-20', '17:00:00', 1, 0, 0, 0),
(124, 41, '2020-09-13', '23:00:00', 1, 0, 0, 0),
(125, 43, '2020-09-03', '08:00:00', 1, 0, 0, 0),
(126, 44, '2020-02-04', '06:30:00', 1, 0, 0, 0),
(127, 45, '2020-02-28', '22:00:00', 1, 0, 0, 0),
(128, 46, '2020-02-29', '11:00:00', 1, 0, 0, 0),
(129, 47, '2020-02-28', '17:00:00', 1, 0, 0, 0),
(130, 48, '2020-05-28', '15:00:00', 1, 0, 0, 0),
(131, 46, '2020-07-31', '20:00:00', 1, 0, 0, 0),
(132, 45, '2020-08-07', '01:30:00', 1, 0, 1, 0),
(133, 49, '2020-08-10', '20:30:00', 2, 0, 0, 0),
(134, 49, '2020-12-14', '03:00:00', 2, 0, 0, 0),
(135, 46, '2020-12-29', '21:00:00', 1, 0, 0, 0),
(136, 46, '2020-09-22', '01:30:00', 1, 0, 0, 0),
(137, 47, '2020-10-24', '02:00:00', 0, 0, 1, 0),
(138, 50, '2021-08-27', '01:45:00', 1, 0, 0, 0),
(139, 50, '2021-12-13', '18:30:00', 0, 0, 1, 0),
(140, 51, '2021-06-09', '15:25:00', 1, 0, 0, 0),
(141, 51, '2021-10-29', '06:30:00', 1, 0, 0, 0),
(142, 50, '2021-10-07', '16:30:00', 1, 0, 0, 0),
(143, 50, '2021-10-08', '07:30:00', 0, 0, 1, 0),
(144, 52, '2021-07-06', '02:30:00', 1, 0, 0, 0),
(145, 52, '2021-01-11', '02:30:00', 1, 0, 0, 0),
(146, 52, '2021-01-09', '00:30:00', 0, 0, 1, 0),
(147, 52, '2021-03-14', '10:30:00', 1, 0, 0, 0),
(148, 52, '2021-07-23', '11:30:00', 2, 0, 0, 0),
(149, 52, '2021-05-12', '23:00:00', 1, 0, 0, 0),
(150, 53, '2021-02-11', '08:45:00', 1, 0, 0, 0),
(151, 52, '2021-05-10', '02:00:00', 0, 0, 1, 0),
(152, 52, '2021-06-03', '02:40:00', 0, 0, 1, 0),
(153, 52, '2021-01-04', '07:30:00', 1, 0, 0, 0),
(154, 54, '2021-05-18', '22:15:00', 1, 0, 0, 0),
(155, 54, '2021-07-16', '10:00:00', 2, 0, 0, 0),
(156, 54, '2021-09-13', '09:30:00', 1, 0, 0, 0),
(157, 54, '2021-08-25', '15:30:00', 0, 0, 1, 0),
(158, 55, '2021-08-26', '06:20:00', 3, 0, 0, 0),
(159, 55, '2021-02-17', '04:30:00', 2, 0, 0, 0),
(160, 56, '2021-08-23', '14:00:00', 1, 0, 0, 0),
(161, 57, '2021-06-17', '17:30:00', 1, 0, 0, 0),
(162, 56, '2021-10-29', '11:30:00', 1, 0, 0, 0),
(163, 58, '2021-01-17', '07:45:00', 1, 0, 0, 0),
(164, 59, '2021-05-06', '12:30:00', 1, 0, 1, 0),
(165, 58, '2021-12-27', '18:30:00', 1, 0, 0, 0),
(166, 60, '2021-03-20', '15:00:00', 1, 0, 0, 0),
(167, 59, '2021-08-31', '15:00:00', 1, 0, 0, 0),
(168, 58, '2021-09-03', '07:00:00', 1, 0, 0, 0),
(169, 61, '2021-05-07', '06:30:00', 1, 0, 1, 0),
(170, 61, '2021-08-02', '21:45:00', 1, 0, 1, 0),
(171, 61, '2021-08-18', '12:20:00', 1, 0, 0, 0),
(172, 61, '2021-01-02', '14:30:00', 2, 0, 0, 0),
(173, 58, '2021-06-30', '16:30:00', 1, 0, 0, 0),
(174, 62, '2021-03-01', '08:05:00', 2, 0, 0, 0),
(175, 63, '2021-04-24', '16:30:00', 1, 0, 0, 0),
(176, 64, '2021-12-06', '18:30:00', 1, 0, 1, 0),
(177, 65, '2021-05-05', '11:30:00', 1, 0, 0, 0),
(178, 66, '2021-03-23', '10:30:00', 1, 0, 0, 0),
(179, 67, '2021-04-02', '15:35:00', 1, 0, 0, 0),
(180, 65, '2021-03-29', '23:00:00', 1, 0, 1, 0),
(181, 67, '2021-05-29', '15:20:00', 2, 0, 0, 0),
(182, 68, '2021-10-03', '06:15:00', 1, 0, 0, 0),
(183, 69, '2021-09-07', '16:45:00', 1, 0, 0, 0),
(184, 69, '2021-11-25', '11:55:00', 0, 0, 1, 0),
(185, 69, '2021-05-28', '06:10:00', 0, 0, 2, 0),
(186, 69, '2021-09-20', '18:40:00', 0, 0, 1, 0),
(187, 70, '2021-04-27', '19:30:00', 0, 0, 1, 0),
(188, 70, '2021-08-29', '20:00:00', 1, 0, 0, 0),
(189, 71, '2021-07-14', '14:30:00', 1, 0, 0, 0),
(190, 71, '2021-03-14', '15:20:00', 1, 0, 0, 0),
(191, 72, '2021-12-10', '12:30:00', 1, 0, 0, 0),
(192, 71, '2021-03-21', '12:40:00', 1, 0, 0, 0),
(193, 71, '2021-02-24', '07:40:00', 1, 0, 0, 0),
(194, 72, '2021-08-11', '16:25:00', 0, 0, 1, 0),
(195, 72, '2021-11-19', '22:05:00', 1, 0, 0, 0),
(196, 72, '2021-10-10', '02:10:00', 1, 0, 0, 0),
(197, 72, '2021-10-08', '12:50:00', 1, 0, 0, 0),
(198, 73, '2021-04-11', '08:00:00', 1, 0, 0, 0),
(199, 73, '2021-03-20', '21:30:00', 2, 0, 0, 0),
(200, 74, '2021-11-22', '14:00:00', 1, 0, 0, 0),
(201, 73, '2021-10-18', '07:00:00', 2, 0, 0, 0),
(202, 75, '2021-11-15', '14:00:00', 2, 0, 0, 0),
(203, 76, '2021-12-09', '10:00:00', 0, 0, 1, 0),
(204, 77, '2021-12-14', '15:00:00', 1, 0, 0, 0),
(205, 78, '2021-01-17', '12:00:00', 1, 0, 0, 0),
(206, 78, '2021-05-16', '07:30:00', 2, 0, 0, 0),
(207, 79, '2021-10-19', '03:00:00', 0, 0, 2, 0),
(208, 79, '2021-07-16', '09:15:00', 1, 0, 0, 0),
(209, 78, '2021-03-09', '05:30:00', 1, 0, 0, 0),
(210, 79, '2021-06-03', '05:20:00', 1, 0, 0, 0),
(211, 79, '2021-07-26', '09:30:00', 0, 0, 1, 0),
(212, 80, '2021-01-30', '21:00:00', 1, 0, 0, 0),
(213, 80, '2021-03-31', '14:00:00', 0, 0, 1, 0),
(214, 80, '2021-04-04', '00:30:00', 2, 0, 0, 0),
(215, 80, '2021-03-30', '07:30:00', 1, 0, 0, 0),
(216, 81, '2021-11-20', '19:00:00', 1, 0, 0, 0),
(217, 80, '2021-05-12', '17:00:00', 1, 0, 0, 0),
(218, 82, '2021-09-15', '03:15:00', 1, 0, 0, 0),
(219, 82, '2021-08-13', '15:00:00', 1, 0, 0, 0),
(220, 83, '2021-04-17', '15:30:00', 1, 0, 0, 0),
(221, 81, '2021-09-24', '07:45:00', 1, 0, 0, 0),
(222, 84, '2021-07-08', '06:30:00', 1, 0, 0, 0),
(223, 85, '2021-01-18', '23:00:00', 1, 0, 0, 0),
(224, 85, '2021-01-19', '12:00:00', 1, 0, 0, 0),
(225, 84, '2021-04-29', '21:30:00', 3, 0, 0, 0),
(226, 86, '2021-08-01', '01:00:00', 1, 0, 0, 0),
(227, 84, '2021-09-03', '19:00:00', 1, 0, 0, 0),
(228, 86, '2021-02-10', '17:00:00', 1, 0, 0, 0),
(229, 84, '2021-04-02', '16:30:00', 1, 0, 0, 0),
(230, 84, '2021-08-08', '21:00:00', 1, 0, 0, 0),
(231, 85, '2021-05-16', '07:30:00', 1, 0, 0, 0),
(232, 86, '2021-05-02', '04:45:00', 2, 0, 1, 0),
(233, 85, '2021-11-17', '20:00:00', 1, 0, 0, 0),
(234, 84, '2021-06-11', '13:00:00', 0, 0, 1, 0),
(235, 87, '2021-11-02', '10:00:00', 1, 0, 0, 0),
(236, 85, '2021-11-04', '07:00:00', 0, 0, 1, 0),
(237, 88, '2021-12-21', '13:00:00', 1, 0, 0, 0),
(238, 84, '2021-12-29', '18:00:00', 1, 0, 0, 0),
(239, 89, '2022-12-29', '11:00:00', 1, 0, 1, 0),
(240, 89, '2022-02-18', '19:45:00', 1, 0, 0, 0),
(241, 89, '2022-04-06', '06:43:00', 1, 0, 1, 0),
(242, 89, '2022-01-03', '15:30:00', 1, 0, 0, 0),
(243, 89, '2022-01-08', '17:00:00', 1, 0, 0, 0),
(244, 89, '2022-04-01', '18:30:00', 1, 0, 0, 0),
(245, 89, '2022-05-27', '23:30:00', 3, 0, 1, 0),
(246, 89, '2022-04-14', '06:45:00', 1, 0, 1, 0),
(247, 90, '2022-08-06', '23:20:00', 1, 0, 0, 0),
(248, 90, '2022-02-14', '06:30:00', 0, 0, 1, 0),
(249, 90, '2022-12-19', '22:00:00', 0, 0, 1, 0),
(250, 90, '2022-11-18', '23:50:00', 1, 0, 0, 0),
(251, 90, '2022-09-15', '09:00:00', 1, 0, 0, 0),
(252, 90, '2022-06-25', '17:45:00', 1, 0, 0, 0),
(253, 90, '2022-05-27', '14:30:00', 1, 0, 0, 0),
(254, 90, '2022-04-12', '06:45:00', 2, 0, 0, 0),
(255, 90, '2022-12-06', '19:20:00', 0, 0, 1, 0),
(256, 90, '2022-12-07', '11:30:00', 1, 0, 0, 0),
(257, 91, '2022-02-23', '21:00:00', 0, 0, 1, 0),
(258, 91, '2022-02-02', '17:00:00', 1, 0, 0, 0),
(259, 91, '2022-07-05', '15:45:00', 1, 0, 0, 0),
(260, 91, '2022-09-07', '10:30:00', 1, 0, 0, 0),
(261, 91, '2022-11-15', '17:45:00', 1, 0, 0, 0),
(262, 91, '2022-07-16', '04:45:00', 1, 0, 0, 0),
(263, 91, '2022-10-19', '23:30:00', 0, 0, 1, 0),
(264, 91, '2022-10-23', '14:30:00', 1, 0, 1, 0),
(265, 91, '2022-10-25', '14:45:00', 1, 0, 0, 0),
(266, 91, '2022-01-26', '19:15:00', 2, 0, 0, 0),
(267, 91, '2022-06-26', '20:50:00', 1, 0, 0, 0),
(268, 91, '2022-03-31', '01:10:00', 2, 0, 0, 0),
(269, 91, '2022-10-31', '18:30:00', 1, 0, 0, 0),
(270, 92, '2022-03-10', '06:20:00', 0, 0, 1, 0),
(271, 93, '2022-03-07', '11:30:00', 1, 0, 0, 0),
(272, 93, '2022-01-19', '16:50:00', 1, 0, 0, 0),
(273, 93, '2022-04-14', '20:50:00', 0, 0, 1, 0),
(274, 93, '2022-05-01', '19:00:00', 2, 0, 0, 0),
(275, 94, '2022-10-31', '06:30:00', 1, 0, 1, 0),
(276, 94, '2022-10-27', '02:30:00', 0, 0, 1, 0),
(277, 94, '2022-10-03', '16:33:00', 1, 0, 0, 0),
(278, 93, '2022-12-17', '12:00:00', 1, 0, 0, 0),
(279, 92, '2022-10-02', '21:30:00', 2, 0, 0, 0),
(280, 95, '2022-07-03', '11:00:00', 1, 0, 0, 0),
(281, 96, '2022-08-05', '20:00:00', 1, 0, 0, 0),
(282, 95, '2022-03-31', '14:00:00', 2, 0, 0, 0),
(283, 95, '2022-03-15', '02:00:00', 1, 0, 0, 0),
(284, 95, '2022-02-09', '13:00:00', 0, 0, 1, 0),
(285, 95, '2022-03-26', '20:00:00', 1, 0, 0, 0),
(286, 95, '2022-03-22', '17:00:00', 1, 0, 0, 0),
(287, 95, '2022-01-03', '17:00:00', 1, 0, 0, 0),
(288, 95, '2022-01-04', '11:00:00', 1, 0, 0, 0),
(289, 95, '2022-04-30', '02:00:00', 1, 0, 0, 0),
(290, 95, '2022-05-20', '22:30:00', 1, 0, 0, 0),
(291, 95, '2022-06-15', '10:00:00', 1, 0, 0, 0),
(292, 95, '2022-06-17', '10:30:00', 0, 0, 1, 0),
(293, 97, '2022-06-28', '01:00:00', 1, 0, 0, 0),
(294, 95, '2022-09-11', '23:00:00', 2, 0, 0, 0),
(295, 95, '2022-10-19', '16:00:00', 1, 0, 0, 0),
(296, 95, '2022-10-24', '08:00:00', 2, 0, 0, 0),
(297, 95, '2022-11-07', '04:00:00', 11, 0, 1, 0),
(298, 96, '2022-12-11', '23:00:00', 1, 0, 0, 0),
(299, 95, '2022-11-28', '17:45:00', 2, 0, 0, 0),
(300, 96, '2022-12-02', '18:00:00', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lapor`
--

CREATE TABLE `lapor` (
  `idlapor` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_kejadian` date NOT NULL,
  `jam` time NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `luka_ringan` int(10) NOT NULL,
  `luka_berat` int(10) NOT NULL,
  `meninggal` int(10) NOT NULL,
  `rugi` int(20) NOT NULL,
  `link_maps` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status_lapor` enum('2','1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapor`
--

INSERT INTO `lapor` (`idlapor`, `iduser`, `tanggal_isi`, `tgl_kejadian`, `jam`, `alamat`, `kecamatan`, `luka_ringan`, `luka_berat`, `meninggal`, `rugi`, `link_maps`, `foto`, `status_lapor`) VALUES
(3, 1, '2024-05-09 04:14:50', '2023-03-29', '09:00:08', 'Jl. Imogiri - Siluk, Dogongan, Sriharjo, Kec. Imogiri, Kabupaten Bantul, Daerah Istimewa Yogyakarta ', 'Imogiri', 1, 0, 1, 0, 'https://maps.app.goo.gl/6216Ew7U5ZKko3vaA', '', '1'),
(4, 1, '2024-05-09 07:44:27', '2023-03-29', '10:45:00', 'Jl. Bakulan Imogiri, Barongan, Sumberagung, Kec. Jetis, Kabupaten Bantul, Daerah Istimewa Yogyakarta', 'Jetis', 1, 0, 1, 0, 'https://maps.app.goo.gl/sHrURFCGGzh9gABY8', '', '1'),
(38, 2, '2024-05-25 12:14:42', '2024-04-17', '10:30:00', 'Jalan Samas, Dusun Siten, Sumbermulyo, Bambanglipuro, Bantul', 'Bambanglipuro', 2, 0, 0, 0, 'https://maps.app.goo.gl/T5ogTdCQUUdxRYncA', 'item-240525-f0dd484100.jpeg', '1'),
(39, 2, '2024-05-25 12:13:18', '2024-04-11', '15:10:00', 'Jl. Raya Jogja-Wonosari, tepatnya di Dusun Payak Cilik, Desa Srimulyo, Kecamatan Piyungan, Kabupaten Bantul', 'Piyungan', 2, 0, 1, 0, 'https://maps.app.goo.gl/xWvxaGa3hiRZnjGu8', 'item-240525-bb654e205a.jpeg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `idtoken` int(11) NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `iduser` int(11) NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`idtoken`, `token`, `iduser`, `dibuat`) VALUES
(8, '317c75002f68305422ffefa58500ca', 2, '2024-05-14'),
(9, 'c4aa6067b58c7e37eed5c84cb7e4ab', 3, '2024-05-28'),
(10, 'be7b0d75ff82155b34e17763aacc6b', 2, '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` enum('2','1') NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `nama`, `username`, `password`, `no_hp`, `level`, `status`) VALUES
(1, 'admin@gmail.com', 'admin keren', 'admin', '0771f0cb595750d749f08ca27d2d7b4f', '6281949273411', '1', '1'),
(2, 'jarablouse@gmail.com', 'zahra', 'zahra', '3b972fa77cc41309d88d22c169b01dc8', '6285380376289', '2', '1'),
(3, 'hikmatuzzahra21@gmail.com', 'Sarah', 'sarah', 'ec26202651ed221cf8f993668c459d46', '12717491747', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blackspot`
--
ALTER TABLE `blackspot`
  ADD PRIMARY KEY (`idblack`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`idkasus`),
  ADD KEY `blackspot` (`id`);

--
-- Indexes for table `lapor`
--
ALTER TABLE `lapor`
  ADD PRIMARY KEY (`idlapor`),
  ADD KEY `user` (`iduser`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`idtoken`),
  ADD KEY `pengguna` (`iduser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blackspot`
--
ALTER TABLE `blackspot`
  MODIFY `idblack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `idkasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `lapor`
--
ALTER TABLE `lapor`
  MODIFY `idlapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `blackspot` FOREIGN KEY (`id`) REFERENCES `blackspot` (`idblack`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lapor`
--
ALTER TABLE `lapor`
  ADD CONSTRAINT `user` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `pengguna` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
