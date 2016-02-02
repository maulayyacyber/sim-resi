-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 04:48 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sim_resi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counter`
--

CREATE TABLE IF NOT EXISTS `tbl_counter` (
`id_counter` int(225) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `date_visit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resi`
--

CREATE TABLE IF NOT EXISTS `tbl_resi` (
`id_resi` int(225) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `no_resi` varchar(225) NOT NULL,
  `aktif` int(1) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_resi`
--

INSERT INTO `tbl_resi` (`id_resi`, `nama`, `kategori`, `no_resi`, `aktif`, `alamat`, `id_user`) VALUES
(1, 'Fika Ridaul Maulayya', 'JNE', '123456789123', 0, 'Diwek, Jombang, Jawa Timur', 1),
(2, 'Kurnia Andi', 'POS', '123456789789', 1, 'Sidomulyo,&nbsp;Demak, jawa Tengah', 1),
(3, 'Imam Syafii', 'JNE', '123456789321', 1, 'Gandul, Temanggung, Jawa Tengah', 1),
(5, 'Pranoto Purwo', 'POS', '123456789456', 0, 'Sleman, Yokyakarta, Jawa Tengah', 1),
(6, 'Hadliq Lutfi', 'JNE', '123456789854', 0, 'Sidomulyo,&nbsp;Demak, jawa Tengah', 1),
(7, 'Syahrul Ramadhon', 'JNE', '123456789444', 0, 'jl.gubenur suryo 12,&nbsp;Cengkareng, Jakarta Timur', 1),
(8, 'Royhan', 'JNE', '123456789222', 0, 'jogoroto, diwek, jombang', 1),
(9, 'Muhammad Mahsun Jauhari', 'POS', '123456789556', 0, 'Tembelang, Jombang, Jawa Timur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE IF NOT EXISTS `tbl_session` (
  `session_id` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` varchar(225) NOT NULL,
  `last_activity` int(10) NOT NULL,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2778c983e07cae4182210b3199e6aa05', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1453377849, ''),
('2a84b7e9b44a8559bac412d2f6093dfc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452769214, 'a:9:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"1";s:9:"nama_user";s:20:"Fika Ridaul Maulayya";s:9:"user_name";s:5:"admin";s:9:"pass_user";s:32:"21232f297a57a5a743894a0e4a801fc3";s:10:"email_user";s:24:"ridaulmaulayya@gmail.com";s:9:"foto_user";s:23:"IMG_20150525_075147.jpg";s:13:"cari_data_jne";b:0;s:13:"cari_data_pos";b:0;}'),
('f71cb643b6b19dc10f17100b8c4a3f2c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452779302, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
`id_setting` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `tipe`, `title`, `content_setting`, `id_user`) VALUES
(1, 'admin_title', 'Nama Situs Admin', 'SIM RESI - Administrator', 1),
(2, 'admin_footer', 'Footer Admin', 'Copyright  ©  2014 - 2015 SIM RESI - Pondok Kode Inc. All Rights Reserved.', 1),
(3, 'web_title', 'Nama Situs Web', 'SIM RESI - No Resi Pengiriman Pelanggan', 1),
(4, 'web_footer', 'Footer Web', 'Copyright  ©  2014 - 2015 SIM RESI - Pondok Kode Inc.  All Rights Reserved.', 1),
(5, 'facebook', 'Alamat Facebook', 'https://www.facebook.com/pages/pondokkode', 1),
(6, 'twitter', 'Alamat Twitter', 'https://www.twitter.com/pondokkode', 1),
(7, 'github', 'Github Repository', 'https://www.github.com/pondokkode', 1),
(8, 'keywords', 'Kata Kunci Website', 'Pondok Kode, Resi Pengiriman, Kaos Distro, Kaos Programmer, Programmer, Web Development.', 1),
(9, 'descripstion', 'Deskripsi Website', 'SIM RESI adalah Sistem Informasi Manajemen Resi yang digunakan untuk memeanajemen resi pelanggan guna mempermudah pelanggan dalam mengecek status barang yang mereka order ditoko kami.', 1),
(10, 'text_sistem', 'Frontend Text', 'Pondok Kode - Web Project Development.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `pass_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `aktif_user` int(1) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `user_name`, `pass_user`, `email_user`, `foto_user`, `aktif_user`, `ip_address`, `last_login`) VALUES
(1, 'Fika Ridaul Maulayya', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ridaulmaulayya@gmail.com', 'IMG_20150525_075147.jpg', 1, '127.0.0.1', '2016-01-21 13:00:34'),
(2, 'Kurnia Andi Nugroho', 'kurnia', 'dc502eff4e2efeaecb6566348dfb630b', 'kurniaandi18@gmail.com', 'mentah.jpg', 1, '', '0000-00-00 00:00:00'),
(3, 'Hadliq Lutfi', 'hadliq', '1a8b0bfa404b413302c00f1a43dddcb5', 'hadliq@gmail.com', 'Untitled.jpg', 1, '', '0000-00-00 00:00:00'),
(4, 'Muhammad Zidni Mubarrok', 'zidny', '2950fd7dbc610a6d2db3f86eab4e11d1', 'zidny@gmail.com', 'Untitled.jpg', 1, '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_counter`
--
ALTER TABLE `tbl_counter`
 ADD PRIMARY KEY (`id_counter`);

--
-- Indexes for table `tbl_resi`
--
ALTER TABLE `tbl_resi`
 ADD PRIMARY KEY (`id_resi`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
 ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
 ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_counter`
--
ALTER TABLE `tbl_counter`
MODIFY `id_counter` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_resi`
--
ALTER TABLE `tbl_resi`
MODIFY `id_resi` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
