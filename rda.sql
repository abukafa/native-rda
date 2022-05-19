-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 09:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rda`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `ID` int(11) NOT NULL,
  `NISR` varchar(15) NOT NULL,
  `NAMA` text NOT NULL,
  `BULAN` text NOT NULL,
  `HARI` text NOT NULL,
  `HADIR` text NOT NULL,
  `P_HDR` text NOT NULL,
  `LAMBAT` text NOT NULL,
  `P_LBT` text NOT NULL,
  `LEMBUR` text NOT NULL,
  `P_LBR` text NOT NULL,
  `TOTAL` text NOT NULL,
  `ACC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`ID`, `NISR`, `NAMA`, `BULAN`, `HARI`, `HADIR`, `P_HDR`, `LAMBAT`, `P_LBT`, `LEMBUR`, `P_LBR`, `TOTAL`, `ACC`) VALUES
(170, '016.10.2021', 'ADMIN', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', '0', 'YA'),
(171, '039.02.2021', 'HAMBA FAUZI RAHMAN', 'Dec-2021', '27', '25', '92.59', '2', '0.74', '0', '0', '0.91', 'YA'),
(172, '018.11.2021', 'IYUL AMINANTI', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', '0', 'YA'),
(173, '001.09.2021', 'NURUL AZMI', 'Dec-2021', '27', '26', '96.3', '1', '0.37', '0', '0', '0.95', 'YA'),
(174, '040.02.2021', 'RIZAL MUHAMMAD', 'Dec-2021', '27', '25', '92.59', '2', '0.74', '0', '0', '0.91', 'YA'),
(175, '019.12.2019', 'SINTIA ARUM', 'Dec-2021', '27', '26', '96.3', '1', '0.37', '0', '0', '0.95', 'YA'),
(176, '045.02.2021', 'TIA NAILA MALIEHA', 'Dec-2021', '27', '18', '66.67', '0', '0', '0', '0', '0.67', 'YA'),
(177, '046.02.2021', 'UFU FUWAIZIAH', 'Dec-2021', '27', '20', '74.07', '2', '0.74', '0', '0', '0.72', 'YA'),
(178, '004.12.2017', 'FINA DESIA', 'Dec-2021', '27', '9', '33.33', '8', '2.96', '0', '0', '0.25', 'YA'),
(179, '012.09.2021', 'DIANA PURWITA ASIH', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', '0', 'YA'),
(180, '028.12.2019', 'SITI ROHIMAH', 'Dec-2021', '27', '25', '92.59', '1', '0.37', '0', '0', '0.92', 'YA'),
(181, '027.12.2019', 'APRILIANDRI DEDE YUSUF', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', '0', 'YA'),
(182, '052.02.2021', 'IRMA APRIYANTI', 'Dec-2021', '27', '7', '25.93', '7', '2.59', '0', '0', '0.19', 'YA'),
(183, '007.12.2017', 'IRPA MAULANA', 'Dec-2021', '27', '24', '88.89', '1', '0.37', '0', '0', '0.88', 'YA'),
(184, '003.12.2017', 'ANGGRAENI DEVI LESTARI', 'Dec-2021', '27', '24', '88.89', '1', '0.37', '0', '0', '0.88', 'YA'),
(185, '043.02.2021', 'ARIYANA NURANDINA', 'Dec-2021', '27', '16', '59.26', '5', '1.85', '0', '0', '0.54', 'YA'),
(186, '009.12.2019', 'ELLEN SILVIANI', 'Dec-2021', '27', '26', '96.3', '2', '0.74', '0', '0', '0.94', 'YA'),
(187, '008.12.2017', 'EUIS KURNIASIH', 'Dec-2021', '27', '27', '100', '2', '0.74', '0', '0', '0.98', 'YA'),
(188, '002.12.2011', 'FINE AFRIANI', ' SE', ' AK', 'Dec-2021', '27', '0', '0', '0', '0', '0', 'YA'),
(189, '001.12.2011', 'H. TINO WARSITO', ' ST', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', 'YA'),
(190, '015.10.2021', 'JORDI PERMANA', 'Dec-2021', '27', '15', '55.56', '7', '2.59', '0', '0', '0.49', 'YA'),
(191, '031.12.2020', 'PITRI NATALIA', 'Dec-2021', '27', '25', '92.59', '1', '0.37', '0', '0', '0.92', 'YA'),
(192, '038.02.2021', 'NIA KUSMIATI', 'Dec-2021', '27', '9', '33.33', '4', '1.48', '0', '0', '0.29', 'YA'),
(193, '017.11.2021', 'NUR MALA SARI', 'Dec-2021', '27', '27', '100', '0', '0', '0', '0', '1', 'YA'),
(194, '034.02.2021', 'YULVIANI MONIKA', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', '0', 'YA'),
(195, '013.09.2021', 'DIMAS TRIYUDA KUSUMAH', 'Dec-2021', '27', '23', '85.19', '1', '0.37', '0', '0', '0.84', 'YA'),
(196, '017.12.2018', 'IRA RODIYATAM MARDIYYAH', 'Dec-2021', '27', '23', '85.19', '4', '1.48', '0', '0', '0.81', 'YA'),
(197, '012.12.2018', 'MUHAMMAD RIFKI ALFIKRI', 'Dec-2021', '27', '16', '59.26', '4', '1.48', '0', '0', '0.55', 'YA'),
(198, '026.12.2019', 'IMA ROHIMAH', 'Dec-2021', '27', '25', '92.59', '2', '0.74', '0', '0', '0.91', 'YA'),
(199, '010.12.2018', 'LUTFHI ABDUL LATIEF', 'Dec-2021', '27', '27', '100', '2', '0.74', '0', '0', '0.98', 'YA'),
(200, '029.12.2019', 'RAIZAL MIFTAHUL MAULANA', 'Dec-2021', '27', '19', '70.37', '2', '0.74', '0', '0', '0.68', 'YA'),
(201, '014.09.2021', 'FIRMANSYAH PUTRA', 'Dec-2021', '27', '0', '0', '0', '0', '0', '0', '0', 'YA'),
(202, '033.12.2019', 'NIDA MARTIANA', 'Dec-2021', '27', '26', '96.3', '6', '2.22', '0', '0', '0.9', 'YA'),
(203, '048.02.2021', 'NURUL SITI HAJAR', 'Dec-2021', '27', '27', '100', '5', '1.85', '0', '0', '0.95', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(15) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `name` text NOT NULL,
  `jabatan` text NOT NULL,
  `laznah` text NOT NULL,
  `akses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pass`, `name`, `jabatan`, `laznah`, `akses`) VALUES
('001.12.2011', 'abu', 'ghurob@bu', 'H. TINO WARSITO, ST', 'KETUA', 'PIMPINAN', 'manager'),
('003.12.2017', 'devi', 'rda123', 'ANGGRAENI DEVI LESTARI', 'SEKRETARIS', 'DIREKTORAT', 'supervisor'),
('009.01.2017', 'tech', '1234', 'ABDUL AZIZ', 'TEKNISI', 'TEKNISI', 'manager'),
('016.10.2021', 'admin', 'rda123', 'ADMIN', '-', '-', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi`
--

CREATE TABLE `kompetensi` (
  `ID` int(11) NOT NULL,
  `NISR` text NOT NULL,
  `NAMA` text NOT NULL,
  `BENTUK` text NOT NULL,
  `KET` text NOT NULL,
  `LOKASI` text NOT NULL,
  `TAHUN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `NISR` varchar(15) NOT NULL,
  `NAMA` text NOT NULL,
  `ID` int(11) NOT NULL,
  `P_SRG` text NOT NULL,
  `P_ATR` text NOT NULL,
  `P_KES` text NOT NULL,
  `P_RMH` text NOT NULL,
  `P_BON` text NOT NULL,
  `P_HTG` text NOT NULL,
  `P_ZKT` text NOT NULL,
  `P_INF` text NOT NULL,
  `P_LIN` text NOT NULL,
  `ACC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`NISR`, `NAMA`, `ID`, `P_SRG`, `P_ATR`, `P_KES`, `P_RMH`, `P_BON`, `P_HTG`, `P_ZKT`, `P_INF`, `P_LIN`, `ACC`) VALUES
('001.09.2021', 'NURUL AZMI', 12021, '0', '0', '0', '0', '0', '0', '13000', '0', '95000', 'YA'),
('001.12.2011', 'H. TINO WARSITO, ST', 12011, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('002.12.2011', 'FINE AFRIANI, SE, AK', 22011, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('003.12.2017', 'ANGGRAENI DEVI LESTARI', 32017, '0', '0', '0', '0', '0', '0', '16000', '0', '0', 'YA'),
('004.12.2017', 'FINA DESIA', 42017, '0', '0', '0', '0', '0', '0', '2000', '0', '0', 'YA'),
('007.12.2017', 'IRPA MAULANA', 72017, '0', '0', '0', '0', '0', '0', '16000', '0', '0', 'YA'),
('008.12.2017', 'EUIS KURNIASIH', 82017, '0', '0', '0', '0', '0', '0', '14000', '0', '100000', 'YA'),
('009.12.2019', 'ELLEN SILVIANI', 92019, '0', '0', '0', '0', '0', '0', '16000', '0', '100000', 'YA'),
('010.12.2018', 'LUTFHI ABDUL LATIEF', 102018, '0', '0', '0', '0', '0', '0', '11000', '0', '0', 'YA'),
('012.09.2021', 'DIANA PURWITA ASIH', 2021012, '0', '0', '0', '0', '0', '0', '3000', '0', '0', 'YA'),
('012.12.2018', 'MUHAMMAD RIFKI ALFIKRI', 122018, '0', '0', '0', '0', '0', '0', '3000', '0', '0', 'YA'),
('013.09.2021', 'DIMAS TRIYUDA KUSUMAH', 2021013, '0', '0', '0', '0', '0', '0', '12000', '0', '100000', 'YA'),
('014.09.2021', 'FIRMANSYAH PUTRA', 2021014, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('015.10.2021', 'JORDI PERMANA', 2021015, '0', '0', '0', '0', '0', '0', '3000', '0', '0', 'YA'),
('017.11.2021', 'NUR MALA SARI', 2021017, '0', '0', '0', '0', '0', '0', '10000', '0', '0', 'YA'),
('017.12.2018', 'IRA RODIYATAM MARDIYYAH', 172018, '0', '0', '0', '0', '0', '0', '8000', '0', '0', 'YA'),
('018.11.2021', 'IYUL ARMINANTI', 2021018, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('019.12.2019', 'SINTIA ARUM', 192019, '0', '0', '0', '0', '0', '0', '15000', '0', '100000', 'YA'),
('026.12.2019', 'IMA ROHIMAH', 262019, '0', '0', '0', '0', '0', '0', '11000', '0', '100000', 'YA'),
('027.12.2019', 'APRILIANDRI DEDE YUSUF', 272019, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('028.12.2019', 'SITI ROHIMAH', 282019, '0', '0', '0', '0', '0', '0', '8000', '0', '0', 'YA'),
('029.12.2019', 'RAIZAL MIFTAHUL MAULANA', 292019, '0', '0', '0', '0', '0', '0', '10000', '0', '0', 'YA'),
('031.12.2020', 'PITRI NATALIA', 312020, '0', '0', '0', '0', '0', '0', '10000', '0', '0', 'YA'),
('033.12.2019', 'NIDA MARTIANA', 332019, '0', '0', '0', '0', '0', '0', '8000', '0', '0', 'YA'),
('034.02.2021', 'YULVI', 342021, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('038.02.2021', 'NIA KUSMIATI', 382021, '0', '0', '0', '0', '0', '0', '10000', '0', '0', 'YA'),
('039.02.2021', 'HAMBA FAUZI RAHMAN', 392021, '0', '0', '0', '0', '0', '0', '13000', '0', '0', 'YA'),
('040.02.2021', 'RIZAL MUHAMMAD', 402021, '0', '0', '0', '0', '0', '0', '10000', '0', '0', 'YA'),
('041.02.2021', 'NISA BELA', 412021, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('043.02.2021', 'ARIANA', 432021, '0', '0', '0', '0', '0', '0', '3000', '0', '0', 'YA'),
('045.02.2021', 'TIA', 452021, '0', '0', '0', '0', '0', '0', '9000', '0', '0', 'YA'),
('046.02.2021', 'UFU FUWAIZIAH', 462021, '0', '0', '0', '0', '0', '0', '9000', '0', '0', 'YA'),
('048.02.2021', 'NURUL SITI HAJAR', 482021, '0', '0', '0', '0', '0', '0', '8000', '0', '0', 'YA'),
('052.02.2021', 'IRMA APRIYANTI', 522021, '0', '0', '0', '0', '0', '0', '1000', '0', '0', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `NISR` varchar(15) NOT NULL,
  `NO_ABSEN` text NOT NULL,
  `KTP` text NOT NULL,
  `GENDER` text NOT NULL,
  `NAMA` text NOT NULL,
  `PANGGILAN` text NOT NULL,
  `TMP_LAHIR` text NOT NULL,
  `TGL_LAHIR` text NOT NULL,
  `GOL_DARAH` text NOT NULL,
  `STATUS` text NOT NULL,
  `JML_ISTRI` text NOT NULL,
  `PENDIDIKAN` text NOT NULL,
  `ALAMAT` text NOT NULL,
  `KEC` text NOT NULL,
  `KAB` text NOT NULL,
  `POS` text NOT NULL,
  `ASAL` text NOT NULL,
  `HANDPHONE` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PASANGAN` text NOT NULL,
  `JML_ANAK` text NOT NULL,
  `THN_GABUNG` text NOT NULL,
  `LAZNAH` text NOT NULL,
  `STATUS_RDA` text NOT NULL,
  `GRADE` text NOT NULL,
  `GOLONGAN` text NOT NULL,
  `SUB_GOLONG` text NOT NULL,
  `JABATAN` text NOT NULL,
  `STATUS_SANTRI` text NOT NULL,
  `T_JAB` text NOT NULL,
  `T_STT` text NOT NULL,
  `T_ANK` text NOT NULL,
  `T_RMH` text NOT NULL,
  `T_PRG` text NOT NULL,
  `T_SRG` text NOT NULL,
  `T_ATR` text NOT NULL,
  `T_KES` text NOT NULL,
  `T_HRA` text NOT NULL,
  `T_DKA` text NOT NULL,
  `T_HAJ` text NOT NULL,
  `T_BNS` text NOT NULL,
  `T_SPC` text NOT NULL,
  `T_EKS` text NOT NULL,
  `ACC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`NISR`, `NO_ABSEN`, `KTP`, `GENDER`, `NAMA`, `PANGGILAN`, `TMP_LAHIR`, `TGL_LAHIR`, `GOL_DARAH`, `STATUS`, `JML_ISTRI`, `PENDIDIKAN`, `ALAMAT`, `KEC`, `KAB`, `POS`, `ASAL`, `HANDPHONE`, `EMAIL`, `PASANGAN`, `JML_ANAK`, `THN_GABUNG`, `LAZNAH`, `STATUS_RDA`, `GRADE`, `GOLONGAN`, `SUB_GOLONG`, `JABATAN`, `STATUS_SANTRI`, `T_JAB`, `T_STT`, `T_ANK`, `T_RMH`, `T_PRG`, `T_SRG`, `T_ATR`, `T_KES`, `T_HRA`, `T_DKA`, `T_HAJ`, `T_BNS`, `T_SPC`, `T_EKS`, `ACC`) VALUES
('001.09.2021', '32', '3207025411000003', 'AKHWAT', 'NURUL AZMI', 'NURUL', 'TASIKMALAYA', '14/11/2000', '-', 'SINGLE', '-', 'SMA', 'Dusun Desa RT 03/01 Margaluyu Kec Cikoneng Kota Tasikmalaya', 'CIKONENG', 'Kota Ciamis', '46261', 'Jl. Raya Cikoneng Dusun Desa Margaluyu Rt.003 Rw. 001 Kec. Cikoneng - Ciamis ', '083827906162', 'azmiulul078@gmail.com', '', '', '2020', 'AHE', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'STAF', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('001.12.2011', '1', '3278091011770006', 'IKHWAN', 'H. TINO WARSITO, ST', 'ABU FAUZANA', 'LEMBANG', '10/11/1977', 'AB', 'MENIKAH', '1', 'S1', 'JL. LETNAN HARUN RT 03/10 CIJOLANG SUKARINDIK BUNGURSARI KOTA TASIKMALAYA', '', '', '', 'JL. KAYU AMBON NO.10 DESA/KEC. LEMBANG BANDUNG BARAT', '0818 42 0867', 'abufauzana.af31@gmail.com', 'FINE AFRIANI', '3', '2013', 'PIMPINAN', 'KHIDMAT', '13', 'PIMPINAN', 'PIMPINAN UTAMA', 'KETUA', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('002.12.2011', '2', '', 'AKHWAT', 'FINE AFRIANI, SE, AK', 'UMMU FATHAN', 'TASIKMALAYA', '2/4/1986', 'A', 'MENIKAH', '-', 'S1', 'JL. LETNAN HARUN RT 03/10 CIJOLANG SUKARINDIK BUNGURSARI KOTA TASIKMALAYA', 'Bungursari', 'Kota Tasikmalaya', '', 'JL. LETNAN HARUN RT 03/10 CIJOLANG SUKARINDIK BUNGURSARI KOTA TASIKMALAYA', '0877 2809 9095', 'fine_afriani@yahoo.com', 'TINO WARSITO', '0', '2013', 'PIMPINAN', 'KHIDMAT', '13', 'PIMPINAN', 'PIMPINAN UTAMA', 'BENDAHARA', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('003.12.2017', '3', '3278046105960017', 'AKHWAT', 'ANGGRAENI DEVI LESTARI', 'DEVI', 'TASIKMALAYA', '21/5/1996', 'O', 'SINGLE', '', 'SLTA', 'JL. RE. MARTADINATA NO. 231 RT/RW 02/10 KEL PANYINGKIRAN ', 'Indihiang', 'Kota Tasikmalaya', '46411', 'JL. RE. MARTADINATA NO. 231 RT/RW 02/06 KEL PANYINGKIRAN KEC INDIHIANG', '0896 6135 7595', 'a.devilestari@gmail.com', '-', '-', '2017', 'DIREKTORAT', 'KHIDMAT', '5', 'KA. BAGIAN ', 'ASISTEN MANAGER SENIOR', 'SEKRETARIS', 'AKTIF', 'YA', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('004.12.2017', '4', '3278057112880003', 'AKHWAT', 'FINA DESIA', 'FINA', 'TASIKMALAYA', '31/12/1988', 'B', 'MENIKAH', '-', 'S1', 'PERUM TAMAN SARI INDAH BLOK D35 RT/RW 04/11 TASIKMALAYA', 'Kawalu ', 'Kota Tasikmalaya', '46182', 'PERUM TAMAN SARI INDAH BLOK D35 RT/RW 04/11 KARSAMENAK KAWALU ', '085223848455', 'fina_defiani@yahoo.co.id', 'HAMBA FAUZI RAHMAN', '2', '2017', 'AL IFFAH', 'KARYA', '4', 'KEPALA BAGIAN', 'ASISTEN MANAGER JUNIOR', 'KETUA', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('007.12.2017', '7', '3278090501950003', 'IKHWAN', 'IRPA MAULANA', 'IRPA', 'Tasikmalaya', '5/1/1995', 'B', 'MENIKAH', '1', 'SLTA', 'Bantar RT.003 RW.005 Kelurahan Bantarsari', 'Bungursari', 'Kota Tasikmalaya', '46151', 'Bantar RT.003 RW.005 Kel. Bantarsari Kec. Bungursari Kota Tasikmalaya', '0821-2766-2364', 'irpamaulana007@gmail.com', 'TENI TAQIAH', '1', '2017', 'CORPORATE', 'KHIDMAT', '4', 'KA. BAGIAN', 'ASISTEN MANAGER JUNIOR', 'SEKBID', 'AKTIF', '', 'YA', 'YA', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('008.12.2017', '8', '3206284310960004', 'AKHWAT', 'EUIS KURNIASIH', 'EUIS', 'TASIKMALAYA', '3/10/1996', 'A', 'SINGLE', '-', 'SLTA', 'Kp. Rawa Girang Rt/Rw 011/003 Ds. Linggamulya', 'Leuwisari', ' Tasikmalaya', '46464', 'Kp Rawa Girang Rt/Rw 011/003 Desa Linggamulya, Kec Leuwisari, Kab Tasikmalaya', '081546971426', 'Euiskurniasih443@yahoo.com', '-', '-', '2017', 'DIREKTORAT', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', 'YA', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('009.12.2019', '9', '3205056811970002', 'AKHWAT', 'ELLEN SILVIANI', 'ELLEN', 'GARUT', '28/11/1997', 'B', 'SINGLE', '-', 'S1', 'Kp. Salamgede , RT. 03 RW. 03 Desa Kersamenak', 'Tarogong Kidul', 'Garut', '44150', 'Kp. Salamgede , RT. 03 RW. 03 Desa Kersamenak, Kec. Tarogong Kidul, Kab. Garut ', '081319016439', 'ellen.silviani13@gmail.com', '-', '-', '2019', 'DIREKTORAT', 'KHIDMAT', '4', 'KA. BAGIAN', 'ASISTEN MANAGER JUNIOR', 'SEKBID', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('010.12.2018', '10', '3278082806990005', 'IKHWAN', 'LUTFHI ABDUL LATIEF', 'LUTFI', 'TASIKMALAYA', '28/6/1999', 'o', 'BUJANGAN', '-', 'SLTA', 'Tundagan Rt/Rw 16/04  Kel. Linggajaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Tundagan Rt/Rw 16/04  Kel. Linggajaya Kec. Mangkubumi Kota Tasikmalaya', '085523662500', 'latieflutfhi28@gmail.com', '-', '-', '2018', 'TRIGER Q', 'KHIDMAT', '4', 'KA. BAGIAN', 'ASISTEN MANAGER JUNIOR', 'STAF', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('012.09.2021', '', '3278025501820005', 'AKHWAT', 'DIANA PURWITA ASIH', 'DIANA', 'BANDUNG', '15/01/1982', '-', '-', '-', 'S1', 'JL Hanura Cikiara RT/RW 003/011 Panglayungan Cipedes Tasikmalaya', 'Cipedes ', 'Kota Tasikmalaya', '46134', 'Jl. Hanura Cikiara Rt.003 Rw.011  Desa Panglayungan Kec Cipedes Kota Tasikmalaya', '', '', '-', '-', '2020', 'AL-IFFAH', 'KHIDMAT', '2', 'STAF', 'STAF JUNIOR', 'STAF', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('012.12.2018', '12', '3278080811990008', 'IKHWAN', 'MUHAMMAD RIFKI ALFIKRI', 'RIFQI', 'TASIKMALAYA', '8/11/1999', '', 'BUJANGAN', '-', 'SLTA', 'Tundagan Rt. 01 Rw. 07 Kel. Linggajaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Tundagan Rt. 01 Rw. 07 Kel. Linggajaya Kecamatan  Mangkubumi Kota Tasikmalaya', '0815 6764 6242', 'rifkialfikri08@gmaiil.com', '-', '-', '2019', 'TRIGER P', 'KARYA', '2', 'STAF', 'STAF JUNIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('013.09.2021', '55', '3278052408940002', 'IKHWAN', 'DIMAS TRIYUDA KUSUMAH', 'DIMAS', 'TASIKMALAYA', '24/8/1994', '-', 'SINGLE', '-', 'SMA', 'Kp Babakanpala RT/RW 04/10 Kel. Karsamenak ', 'Kawalu ', 'Kota Tasikmalaya', '46182', 'Kp Babakanpala RT/RW 04/10 Kel Karsamenak Kec Kawalu Kota Tasikmalaya', '085223461661', 'dimastriyuda@gmail.com', '-', '-', '2021', 'MPZ', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'STAF', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('014.09.2021', '', '7604060507010002', 'AKHWAT', 'FIRMANSYAH PUTRA', 'ADAM', 'MALAYSIA', '5/7/2001', '-', 'SINGLE', '-', 'SMA', 'Dusun Kendal RT/RW 006/007 Desa Sukahaji', 'Cihaurbeuti', 'Ciamis', '46262', 'Dusun Kendal Rt.006 Rw. 007 Desa Sukahaji Kecamatan Cihaurbeuti ', '', '', '-', '-', '2021', 'TRIGER R', 'SUSPEND', '2', 'STAF', 'STAF JUNIOR', 'STAF', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('015.10.2021', '53', '3175051803940003', 'IKHWAN', 'JORDI PERMANA', 'JORDI', 'Jakarta', '18/3/1994', '-', 'SINGLE', '-', 'SMA', 'Jl. H. Taiman Timur KAV.34 Rt.011 Rw. 009 Kelurahan Gedong ', 'Pasar Rebo', 'Jakarta Timur', '13760', 'Jl. H. Taiman Timur KAV.34 Rt.011 Rw. 009 Kelurahan Gedong Kecamatan Pasar Rebo ', '', '', '-', '-', '2021', 'DIREKTORAT', 'KARYA', '2', 'STAF', 'STAF JUNIOR', 'STAF', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('016.10.2021', '', '', 'AKHWAT', 'ADMIN', '', '', '', '-', '-', '-', '-', '', '', '', '', '', '', '', '', '', '-', '-', 'SUSPEND', '-', '', '', '-', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('017.11.2021', '', '3206335912020001', 'AKHWAT', 'NUR MALA SARI', 'MALA', 'TASIKMALAYA', '10/12/2002', '-', 'SINGLE', '-', 'SMA', 'Kp Legok 003/007 Banyurasa Sukahening Tasikmalaya', 'SUKAHENING', 'Kab Tasikmalaya', '', 'Kp Legok 003/007 Banyurasa Sukahening Tasikmalaya', '083827634214', 'ns4926552@gmail.com', '-', '-', '2021', 'MPZ', 'KHIDMAT', '2', 'STAF', 'STAF JUNIOR', 'STAF', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('017.12.2018', '17', '3278044609000010', 'AKHWAT', 'IRA RODIYATAM MARDIYYAH', 'IRA', 'TASIKMALAYA', '6/9/2000', 'A', 'SINGLE', '-', 'SLTA', 'Sukarindik 1  Rt.02 Rw.01 Kel. Sukarindik ', 'Bungursari', 'Kota Tasikmalaya', '46151', 'Sukarindik 1 Rt.02 Rw.01 Sukarindik Bungursari  Tasikmalaya', '081990680825', 'rodiyatammardiyyah69@gmail.com', '-', '-', '2018', 'TRIGER P', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('018.11.2021', '', '', 'AKHWAT', 'IYUL ARMINANTI', 'IYUL', 'TASIKMALAYA', '', 'O', 'SINGLE', '-', 'SMA', 'Kp Mangkujaya 08/04 Kel Dawagung Kec Rajapolah', 'RAJAPOLAH', 'Kab Tasikmalaya', '', 'Kp Mangkujaya 08/04 Kel Dawagung Kec Rajapolah', '085311915581', 'iyularminanti409@gmail.com', '-', '-', '2021', 'AHE', 'SUSPEND', '1', 'STAF', 'STAF PERCOBAAN', 'STAF', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('019.12.2019', '19', '3208286008980003', 'AKHWAT', 'SINTIA ARUM', 'ARUM', 'KUNINGAN', '20/08/1998', 'A', 'BUJANGAN', '-', 'SMA', 'Kuningan RT/RW 003/002 Desa Sukarapih Kec Cibeureum Kab Kuningan', '', 'Kuningan', '45588', 'Kuningan RT/RW 003/002 Desa Sukarapih Kec Cibeureum Kab Kuningan', '08157098340', '', '-', '-', '2018', 'AHE', 'KHIDMAT', '4', 'KA. BAGIAN', 'ASISTEN MANAGER JUNIOR', 'KETUA', 'AKTIF', 'YA', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('026.12.2019', '26', '3206205307000002', 'AKHWAT', 'IMA ROHIMAH', 'IMA', 'TASIKMALAYA', '13/7/2000', '', 'SINGLE', '-', 'SLTA', 'Kp. Pasirjaya Rt/Rw 03/06 Kel. Sukajaya ', 'Purbaratu', 'Kota Tasikmalaya', '46190', 'Kp. Pasirjaya Rt/Rw 03/06 Sukajaya Purbaratu Tasikmalaya', '', '', '-', '-', '2019', 'TRIGER Q', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('027.12.2019', '27', '3204341404960003', 'IKHWAN', 'APRILIANDRI DEDE YUSUF', 'DEDE', 'BANDUNG', '14/4/1996', '', 'MENIKAH', '1', 'SLTA', 'Kp. Sukagenah 3, RT. 002 RW. 004, Kel. Sambong Jaya, Kec. Mangkubumi, Kota Tasikmalaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Kp. Sukagenah 3, RT. 002 RW. 004, Kel. Sambong Jaya, Kec. Mangkubumi', '08999131096', 'amilzakat14@gmail.com', 'MIA AGUSTINA', '-', '2019', 'CORPORATE', 'SUSPEND', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('028.12.2019', '28', '3278034109970001', 'AKHWAT', 'SITI ROHIMAH', 'SITI', 'TASIKMALAYA', '1/9/1997', 'A', 'JANDA', '-', 'SLTA', 'EMPANG WETAN 05/06 TAWANG', 'TAWANG', 'KOTA TASIKMALAYA', '46113', 'EMPANG WETAN 05/06 EMPANGSARI  TAWANG TASIKMALAYA', '085324219796', 'strhmh01@gmail.com', '-', '-', '2019', 'AL-IFFAH', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('029.12.2019', '29', '3271041712990008', 'IKHWAN', 'RAIZAL MIFTAHUL MAULANA', 'MAULANA', 'TASIKMALAYA', '17/12/1999', 'B-', 'BUJANGAN', '-', 'SMA', 'JL. ABR NO. 90 RT/RW 04/01 Kel. Linggajaya', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'JL. ABR NO. 90 RT/RW 04/01 LINGGAJAYA MANGKUBUMI TASIKMALAYA', '082123802799', 'raizalbiman@gmail.com', '-', '-', '2019', 'TRIGER Q', 'KHIDMAT', '4', 'KA. BAGIAN', 'ASISTEN MANAGER JUNIOR', 'KETUA', 'AKTIF', 'YA', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('031.12.2020', '0', '3278094811020003', 'AKHWAT', 'PITRI NATALIA', 'PITRI', 'TASIKMALAYA', '11/8/2002', 'B', 'SINGLE', '-', 'SLTA', 'Gunung Honje RT/RW 01/08 Kel. Sukarindik', 'INDIHIANG', 'Kota Tasikmalaya', '46151', 'Gunung Honje RT/RW 01/08 Kel Sukarindik Kec Bungursari Kota Tasikmalaya', '089614517849', 'pitrinatalia22@gmail.com', '-', '-', '2020', 'DIREKTORAT', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('033.12.2019', '33', '3278036603000001', 'AKHWAT', 'NIDA MARTIANA', 'NIDA', 'TASIKMALAYA', '26/3/2000', 'O', 'SINGLE', '-', 'SLTA', 'Petir,I Rt/Rw.05/08 Kel Cikalang ', 'TAWANG', 'Kota Tasikmalaya', '46144', 'Petir, RT 05/08 Kel Cikalang Kec Tawang Kab Tasikmalaya', '083830891826', 'nidamartiana@gmail.com', '-', '-', '2019', 'TRIGER R', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('034.02.2021', '34', '3278026507980010', 'AKHWAT', 'YULVIANI MONIKA', 'YULVI', 'TASIKMALAYA', '25/7/1998', '', 'MENIKAH', '-', 'SLTA', 'Kp. Sindanghurip 005/003 Sukamaju Kidul', 'Indihiang', 'Tasikmalaya', '46151', 'Kp. Sindanghurip 005/003 Sukamaju Kidul Indihiang Tasikmalaya', '089663053303', 'almahira25@gmail.com', 'YONO TARYONO', '1', '2019', 'MPZ', 'SUSPEND', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('038.02.2021', '38', '3278046810960007', 'AKHWAT', 'NIA KUSMIATI', 'NIA', 'TASIKMALAYA', '28/10/1996', 'O', 'SINGLE', '-', 'SLTA', 'RARANGJAMI RT/RW 03/07 INDIHIANG', 'Indihiang', 'Kota Tasikmalaya', '46151', 'RARANGJAMI RT/RW 03/07 INDIHIANG', '081313592676', 'niakusmiati288gmail.com', '-', '-', '2019', 'MPZ', 'KHIDMAT', '4', 'KA. BAGIAN', 'ASISTEN MANAGER JUNIOR', 'KETUA', 'AKTIF', 'YA', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('039.02.2021', '39', '3207010803860001', 'IKHWAN', 'HAMBA FAUZI RAHMAN', 'HAMBA', 'CIAMIS', '8/3/1986', '', 'MENIKAH', '1', 'S1', 'PERUM TAMANSARI INDAH 04/11 KAWALU', 'Kawalu ', 'Kota Tasikmalaya', '', 'PERUM TAMANSARI INDAH 04/11 KAWALU', '085218349909', 'hambafauzi.r@gmail.com', 'FINA DESIA DEFIANI', '1', '2020', 'AHE', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', 'YA', 'YA', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('040.02.2021', '40', '3278011906020005', 'IKHWAN', 'RIZAL MUHAMMAD', 'RIZAL', 'TASIKMALAYA', '19/6/2002', '', 'BUJANGAN', '-', 'SLTA', 'PERUM MELATI MAS RESIDENCE 2 BLOKB.25', 'INDIHIANG', 'Kota Tasikmalaya', '46151', 'PERUM MELATI MAS RESIDENCE 2 BLOKB.25', '087775755908', 'rizalmuhamad0204gmail.com', '-', '-', '2020', 'AHE', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('041.02.2021', '41', '', 'AKHWAT', 'NISA BELA', 'NISA', 'TASIKMALAYA', '10/10/1997', '', 'BUJANGAN', '-', 'S1', 'Kp. Cimajaya 003/003 Cidadali Cikalong', '', '', '', 'RDA', '082320112090', '', '', '', '2019', 'MPZ', 'SUSPEND', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'PASIF', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'YA'),
('043.02.2021', '43', '3278080203030008', 'AKHWAT', 'ARIYANA NURANDINA', 'ARI', 'TASIKMALAYA', '2/3/2003', '', 'BUJANGAN', '-', 'SMP', 'Peundeuy, RT 01/18 Kel Linggajaya Kec Mangkubumi', 'Mangkubumi', 'Kota Tasikmalaya', '46181', 'Peundeuy, RT 01/18 Kel Linggajaya Kec Mangkubumi', '087713619531', '', '-', '-', '2020', 'DIREKTORAT', 'KARYA', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('045.02.2021', '45', '3206344909970001', 'AKHWAT', 'TIA NAILA MALIEHA', 'TIA', 'TASIKMALAYA', '9/9/1997', 'B', 'SINGLE', '-', 'S1', 'Cibarani RT 01/07 Kel Manggung Jaya Kec Rajapolah', 'RAJAPOLAH', ' Tasikmalaya', '46155', 'Cibarani RT 01/07 Kel Manggung Jaya Kec Rajapolah Kab Tasikmalaya', '089698910144', 'tianailamalieha@gmail.com', '-', '-', '2020', 'AHE', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('046.02.2021', '46', '3278046508950003', 'AKHWAT', 'UFU FUWAIZIAH', 'UFU', 'TASIKMALAYA', '25/08/1995', 'B', 'BUJANGAN', '-', 'S1', 'SUKARINDIK 1 02/01 SUKARINDIK BUNGURSARI ', 'Bungursari', 'Kota Tasikmalaya', '46151', 'SUKARINDIK 1 02/01 SUKARINDIK BUNGURSARI  TASIKMALAYA', '082120946109', 'ufusiti@gmail.com', '-', '-', '2020', 'AHE', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', 'YA', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('048.02.2021', '48', '3278036303010005', 'AKHWAT', 'NURUL SITI HAJAR', 'NURSI', 'TASIKMALAYA', '23/3/2001', 'A', 'SINGLE', '-', 'SLTA', 'Jl. Cikalang Tengah 02/14 Kelurahan Cikalang', 'Tawang', 'Kota Tasikmalaya', '46114', 'Jl. Cikalangtengah 02/14 Cikalang Tawang Tasikmalaya', '087738837157', 'Nurulsitihajar8@gmail.com', '-', '-', '2020', 'TRIGER R', 'KHIDMAT', '3', 'STAF', 'STAF SENIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA'),
('052.02.2021', '52', '', 'AKHWAT', 'IRMA APRIYANTI', 'IRMA ', 'TASIKMALAYA', '10/8/1980', '', 'BUJANGAN', '-', 'SLTA', 'SUKARINDIK 001/001 SUKARINDIK BUNGURSARI ', '', '', '', 'SUKARINDIK 001/001 SUKARINDIK BUNGURSARI ', '082315183990', '', '', '', '2020', 'CORPORATE', 'KARYA', '2', 'STAF', 'STAF JUNIOR', 'SEKBID', 'AKTIF', '', '', '', '', '', '', '', '', '', '', '', 'YA', 'YA', 'YA', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `skim`
--

CREATE TABLE `skim` (
  `GRADE` int(15) NOT NULL,
  `GOL` text NOT NULL,
  `SUB_GOL` text NOT NULL,
  `HONOR` text NOT NULL,
  `MAKAN` text NOT NULL,
  `TRANSPORT` text NOT NULL,
  `T_JAB` text NOT NULL,
  `T_STT` text NOT NULL,
  `T_ANK` text NOT NULL,
  `T_PRG` text NOT NULL,
  `T_KES` text NOT NULL,
  `ACC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skim`
--

INSERT INTO `skim` (`GRADE`, `GOL`, `SUB_GOL`, `HONOR`, `MAKAN`, `TRANSPORT`, `T_JAB`, `T_STT`, `T_ANK`, `T_PRG`, `T_KES`, `ACC`) VALUES
(0, 'TRAINEE', 'TRAINEE', '0', '50000', '20000', '0', '0', '0', '0', '0', 'YA'),
(1, 'STAF', 'STAF PERCOBAAN', '25000', '100000', '25000', '0', '100000', '20000', '100000', '0', 'YA'),
(2, 'STAF', 'STAF JUNIOR', '50000', '150000', '100000', '0', '100000', '20000', '100000', '0', 'YA'),
(3, 'STAF', 'STAF SENIOR', '100000', '150000', '100000', '0', '100000', '20000', '100000', '0', 'YA'),
(4, 'KEPALA BAGIAN', 'ASISTEN MANAGER JUNIOR', '150000', '175000', '120000', '60000', '150000', '50000', '100000', '0', 'YA'),
(5, 'KEPALA BAGIAN', 'ASISTEN MANAGER SENIOR', '175000', '175000', '120000', '60000', '150000', '50000', '100000', '0', 'YA'),
(6, 'KEPALA DIVISI', 'MANAGER JUNIOR', '200000', '200000', '150000', '120000', '200000', '60000', '100000', '0', 'YA'),
(7, 'KEPALA DIVISI', 'MANAGER SENIOR', '225000', '200000', '150000', '120000', '200000', '60000', '100000', '0', 'YA'),
(8, 'KEPALA DEPARTEMEN', 'GENERAL MANAGER MUDA', '250000', '250000', '200000', '175000', '250000', '80000', '100000', '0', 'YA'),
(9, 'KEPALA DEPARTEMEN', 'GENERAL MANAGER MADYA', '275000', '250000', '200000', '175000', '250000', '80000', '100000', '0', 'YA'),
(10, 'KEPALA DEPARTEMEN', 'GENERAL MANAGER UTAMA', '300000', '250000', '200000', '175000', '250000', '80000', '100000', '0', 'YA'),
(11, 'PIMPINAN', 'PIMPINAN MUDA', '325000', '350000', '250000', '250000', '300000', '100000', '200000', '0', 'YA'),
(12, 'PIMPINAN', 'PIMPINAN MADYA', ' 350000', ' 350000', ' 250000', '250000', '300000', '100000', '200000', '0', 'YA'),
(13, 'PIMPINAN', 'PIMPINAN UTAMA', '400000', '350000', '250000', '250000', '300000', '100000', '200000', '0', 'YA');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `NISR` varchar(15) NOT NULL,
  `NAMA` text NOT NULL,
  `ID` int(11) NOT NULL,
  `T_JAB` text NOT NULL,
  `T_STT` text NOT NULL,
  `T_ANK` text NOT NULL,
  `T_RMH` text NOT NULL,
  `T_PRG` text NOT NULL,
  `T_KES` text NOT NULL,
  `T_SRG` text NOT NULL,
  `T_ATR` text NOT NULL,
  `T_HRA` text NOT NULL,
  `T_HAJ` text NOT NULL,
  `T_DKA` text NOT NULL,
  `T_BNS` text NOT NULL,
  `T_SPC` text NOT NULL,
  `T_EKS` text NOT NULL,
  `ACC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`NISR`, `NAMA`, `ID`, `T_JAB`, `T_STT`, `T_ANK`, `T_RMH`, `T_PRG`, `T_KES`, `T_SRG`, `T_ATR`, `T_HRA`, `T_HAJ`, `T_DKA`, `T_BNS`, `T_SPC`, `T_EKS`, `ACC`) VALUES
('001.09.2021', 'NURUL AZMI', 12021, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '100000', '0', '0', 'YA'),
('001.12.2011', 'H. TINO WARSITO, ST', 12011, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('002.12.2011', 'FINE AFRIANI, SE, AK', 22011, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('003.12.2017', 'ANGGRAENI DEVI LESTARI', 32017, '60000', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '50000', '0', '0', 'YA'),
('004.12.2017', 'FINA DESIA', 42017, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('007.12.2017', 'IRPA MAULANA', 72017, '0', '150000', '50000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('008.12.2017', 'EUIS KURNIASIH', 82017, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '100000', '0', '0', 'YA'),
('009.12.2019', 'ELLEN SILVIANI', 92019, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '100000', 'YA'),
('010.12.2018', 'LUTFHI ABDUL LATIEF', 102018, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('012.09.2021', 'DIANA PURWITA ASIH', 2021012, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('012.12.2018', 'MUHAMMAD RIFKI ALFIKRI', 122018, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('013.09.2021', 'DIMAS TRIYUDA KUSUMAH', 2021013, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '100000', '0', '0', 'YA'),
('014.09.2021', 'FIRMANSYAH PUTRA', 2021014, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('015.10.2021', 'JORDI PERMANA', 2021015, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('017.11.2021', 'NUR MALA SARI', 2021017, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('017.12.2018', 'IRA RODIYATAM MARDIYYAH', 172018, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('018.11.2021', 'IYUL ARMINANTI', 2021018, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('019.12.2019', 'SINTIA ARUM', 192019, '60000', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '100000', '0', '0', 'YA'),
('026.12.2019', 'IMA ROHIMAH', 262019, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100000', '0', '0', 'YA'),
('028.12.2019', 'SITI ROHIMAH', 282019, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('029.12.2019', 'RAIZAL MIFTAHUL MAULANA', 292019, '60000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('031.12.2020', 'PITRI NATALIA', 312020, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('033.12.2019', 'NIDA MARTIANA', 332019, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('034.02.2021', 'YULVI', 342021, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('038.02.2021', 'NIA KUSMIATI', 382021, '60000', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('039.02.2021', 'HAMBA FAUZI RAHMAN', 392021, '0', '100000', '20000', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('040.02.2021', 'RIZAL MUHAMMAD', 402021, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('041.02.2021', 'NISA BELA', 412021, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('043.02.2021', 'ARIANA', 432021, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100000', '0', '0', 'YA'),
('045.02.2021', 'TIA', 452021, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('046.02.2021', 'UFU FUWAIZIAH', 462021, '0', '0', '0', '0', '100000', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('048.02.2021', 'NURUL SITI HAJAR', 482021, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA'),
('052.02.2021', 'IRMA APRIYANTI', 522021, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'YA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`NISR`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`NISR`);

--
-- Indexes for table `skim`
--
ALTER TABLE `skim`
  ADD PRIMARY KEY (`GRADE`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`NISR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `kompetensi`
--
ALTER TABLE `kompetensi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
