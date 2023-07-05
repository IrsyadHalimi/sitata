-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 10:28 AM
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
-- Database: `sitata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`) VALUES
(3, 'Administrator', 'admin@mail.com', '$2y$10$hRi1qju2KOeEPcBZ0wYfhu/PN5e9Wl.ddWeDTds8Uokad764X9D1a');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(4) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `waktu_dibuat` datetime NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `id_kategori`, `gambar`, `isi_berita`, `waktu_dibuat`, `dilihat`) VALUES
(64, 'Festival Olahraga Karang Taruna Desa Cilandak', 9, 'olahraga.jpg', 'Ketua Karang Taruna Desa mengucapkan terimakasih kepada Pemerintahan Desa dan BPD Desa Cilandak yang telah mendukung sepenuhnya pada kegiatan Karang Taruna kali ini. “Ada banyak kegiatan Karang Taruna kedepannya. Saya yakin di momen ini bisa membuktikan bahwa Karang Taruna akan semakin lebih kedepan, semakin memperkuat hal-hal yang bersifat sosial,” jelas Ketua Karang Taruna Desa Faekhu<br />\r\n<br />\r\nDitambahkannya, ucapan terimakasih kepada sponsor 101 Nusa Lima atas berkat dan dukungan yang luar biasa pada kegiatan pelaksanaan Festival Olahraga Karang Taruna Desa Cilandak. Semoga kedepan dapat menjalin kerjasama yang baik demi mewujudkan pemuda-pemuda yang unggul dan berprestasi. Tidak luput juga Ketua Karang Taruna Desa Cilandak mengucapkan selamat kepada para juara yang sudah ikut dan terlibat ke dalam turnament  3 cabang olahraga Karang Taruna Desa Cilandak.<br />\r\n<br />\r\nSelain itu, dalam rangka memeriahkan HUT ke-77 RI di Desa Cilandak, panitia juga melaksanakan berbagai kegiatan, antara lain : lomba makan kerupuk, senam wajah, tarik tambang, dan lomba panjat pinang yang di ikuti oleh anak-anak, remaja dan orang tua.<br />\r\n<br />\r\nTurut hadir Ketua dan anggota BPD Desa Faekhu,Ketua dan anggota LPM Desa Cilandak, ketua dan anggota lembaga/BUMDES/Kelompok Tani Desa Cilandak, mewakili Sponsor 101 Nusa Lima, tokoh masyarakat, tokoh agama, dan para hadirin lainnya.', '2023-06-26 16:24:39', 1),
(65, 'Perkembangan Teknologi di Pelosok Desa', 7, 'teknologi_12.jpg', 'Pembangunan dewasa ini, tidak bisa dipisahkan dari perkembangan teknologi informasi. Mulai dari yang paling sederhana, seperti penggunaan telepon seluler hingga pemanfaatan internet dengan berbagai fitur dan kelengkapannya, sudah merambah di semua lini kehidupan masyarakat.<br />\r\n<br />\r\nTidak hanya di perkotaan, di wilayah pedesaanpun sudah dimasuki oleh perkembangan teknologi informasi. Lantas apa yang bisa disikapi dari kondisi tersebut, terutama sekali dalam hal upaya percepatan pembangunan kawasan pedesaan dan wilayah yang dikatagorikan terpencil? Banyak hal yang mestinya bisa dilakukan dengan berbagai kemudahan teknologi dan komitmen pimpinan lembaga yang ada.', '2023-06-26 16:37:13', 4),
(66, 'Implementasi Atasi Rabies ', 10, 'kesehatan.jpg', 'Upaya mengatasi masalah Rabies perlu dilakukan dari sektor kesehatan manusia dan sektor kesehatan hewan dalam skema One Health. Koordinasi lintas sektor perlu dilakukan. Hal tersebut yang menengarai adanya ASEAN Consultative Meeting on One Health Initiative yang diikuti oleh delegasi negara ASEAN. Hari ini para delegasi negara ASEAN melihat penerapan One Health di Bali, khususnya di Puskesmas 1 Denpasar Selatan dan Desa Legian, Badung.<br />\r\n<br />\r\nDalam upaya penanganan rabies ini ada keterlibatan antara sektor kesehatan manusia dan kesehatan hewan. Pemerintah Bali membangun Rabies Center di sejumlah rumah sakit dan seluruh Puskesmas di Bali. Sebagai contoh, Rabies Center di Puskesmas 1 Denpasar Selatan melakukan manajemen terhadap pasien kasus gigitan anjing. Penatalaksanaan dilakukan mulai dari mengobati luka gigitan hingga pemberian vaksin anti rabies (VAR) dan serum anti rabies (SAR). Rabies Center juga sebagai upaya memperlancar distribusi VAR dan SAR. Pemberian VAR dan SAR berbeda, SAR diberikan lebih sedikit dari VAR karena tidak semua pasien gigitan hewan membutuhkan SAR.<br />\r\n<br />\r\nSAR hanya diberikan pada pasien dengan risiko tinggi yang benar-benar membutuhkannya. Kepala Puskesmas 1 Denpasar Selatan dr. Ni Wulan Putri Tjatera mengatakan Rabies Center berfungsi tidak hanya mengobati pasien gigitan hewan tetapi juga mencegah rabies melalui edukasi.<br />\r\n<br />\r\n“Pertolongan pertama bagi seseorang yang digigit hewan adalah cuci luka gigitan dengan sabun/detergen di bawah air mengalir selama 10-15 menit. Beri antiseptik pada luka gigitan, bisa obat merah atau alkohol 70%. Setelah itu segera ke Puskesmas, rumah sakit, atau Rabies Center,” ujarnya. Terkait keamanan dan kesehatan hewan, Dinas Pertanian dan Ketahanan Pangan Provinsi Bali membentuk Tim Siaga Rabies (Tisira) sejak awal tahun 2023. Tisira diterapkan untuk wilayah desa/kelurahan, dan secara bertahap Tisira ini akan tersebar di seluruh desa/kelurahan di Bali.', '2023-06-26 16:49:42', 1),
(67, 'Hanya 20 Persen SMA di Desa Cilandak yang Memenuhi Standar', 11, 'pendidikan.jpg', 'Di Desa Cilandak hanya 20 persen dari seluruh sekolah menengah atas, baik negeri maupun swasta yang memenuhi delapan standar otonomi pendidikan. Hal ini menyebabkan tujuan otonomi pendidikan untuk mewujudkan sekolah berbasis keunggulan lokal belum tercapai.<br />\r\n<br />\r\nMenteri pendidikan Nasional, Bambang Sudibyo, mengatakan bahwa delapan standar otonomi pendidikan yang harus dipenuhi sekolah adalah isi, kompetensi, pendidik, sarana, proses, pelayanan, pengelolaan, dan biaya. Jika delapan syarat itu terpenuhi maka akan ada ruang yang cukup lebar untuk tumbuhnya kreativitas dan kemandiriaan. Kewenangan menyelenggarakan pendidikan dasar dan menengah ini didelegasikan kepada pemerintah daerah sebagai bentuk desentralisasi pendidikan.<br />\r\n<br />\r\nDirektur Pembinaan Sekolah Menengah Atas Depdiknas, Sungkowo, menyatakan bahwa hambatan 80 persen SMA yang belum memenuhi standar tersebut adalah guru dan sarana. Dari segi kuantitas, jumlah guru di negeri kita sudah memenuhi syarat, tetapi tentang kualitasnya masih menjadi persoalan hingga sekarang.<br />\r\n<br />\r\nKualitas guru menjadi persoalan dasar dalam otonomi pendidikan kita karena kurikulum tidak lagi ditentukan oleh pemerintah pusat, akan tetapi disusun oleh sekolah, sedangkan pemerintah hanya memberikan standar minimal isi kurikulum. Jika kualitas guru masih menjadi persoalan maka pencapaian standar minimal isi kurikulum pun dipastikan akan sulit dilakukan. Mengenai anggaran pendidikan, Bambang Sudibyo mengatakan bahwa tahun ini Depdiknas mendapatkan anggaran sekitar Rp50 triliun yang mana sebanyak 50 persen tersedot untuk penuntasan wajib belajar pendidikan dasar sembilan tahun. Sedangkan sisa anggaran lainnya dialokasikan untuk pendidikan menengah dan tinggi.', '2023-06-26 16:56:18', 1),
(68, 'Sosialisasi Pelayanan Posyandu Baru 2023', 10, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 13:56:47', 0),
(69, 'Pembagian Dana Bantuan Covid 19 Untuk Warga Desa Cilandak', 12, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 13:59:09', 0),
(70, 'Tata Cara Menyembelih Hewan Kurban', 10, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 14:00:04', 0),
(71, 'Klub Sepakbola Cilandak Berhasil Menjadi Juara Piala Kecamatan Cibatu 2023', 9, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 14:02:13', 0),
(72, 'Hari Raya Idul Fitri 1444H', 13, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 14:03:05', 0),
(73, 'Tabligh Akbar Desa Cilandak 2023', 13, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 14:04:37', 0),
(74, 'Pendaftaran Lomba 17 Agustus 2023', 14, 'newspaper.png', 'What is Lorem Ipsum?<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\n<br />\r\nWhy do we use it?<br />\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br />\r\n<br />\r\n<br />\r\nWhere does it come from?<br />\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br />\r\n<br />\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-07-05 14:05:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(7, 'Teknologi'),
(9, 'Olahraga'),
(10, 'Kesehatan'),
(11, 'Pendidikan'),
(12, 'Pengumuman Desa'),
(13, 'Keagamaan'),
(14, 'Sosial'),
(15, 'Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `waktu_dibuat_komentar` datetime NOT NULL,
  `ip_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `id`, `isi_komentar`, `waktu_dibuat_komentar`, `ip_address`) VALUES
(22, 65, 7, 'wah, sangat menginspirasi', '2023-06-26 16:57:45', '::1'),
(23, 64, 8, 'Ini komentar jamal', '2023-07-05 14:39:18', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Ina Abdul Nasir', 'inanasir44@gmail.com', 'default.jpg', '$2y$10$tLy7KT8n0wH/CG48DFs3Q.vbwC8VQibEgCG1hUn4QnHaOw9DR1aNG', 2, 1, 1684860334),
(4, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$A6LD/ps7KlNnMBcr6Py71OOtzvPGXt6HYlVaAwSW9VhpOTHJ/fM.y', 1, 1, 1684928445),
(7, 'fitriayu', 'fitri@gmail.com', 'default.jpg', '$2y$10$62KH5IU6SA7g/BdTiYYzz.n1HUkbqOgsaA/4Rf1DESlsDaf7tXPM.', 2, 1, 1687769829),
(8, 'Jamal Mustofa', 'jamal22@gmail.com', 'default.jpg', '$2y$10$rmj/fMFTp6Va/ZhgxQhCm.p8qnNSed0efgeLB89dYPjiy3WNxtg2S', 2, 1, 1688479457);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'member/member/profile', 'fas fa-fw fa-user', 1),
(4, 1, 'Berita', 'admin/News', 'fas fa-newspaper', 1),
(5, 2, 'Beranda', 'member/member', 'fas fa-home', 1),
(6, 1, 'Komentar', 'admin/Comment', 'fas fa-comment', 1),
(7, 1, 'Anggota', 'admin/dashboard/get_member/', 'fas fa-user', 1),
(9, 1, 'Kategori Berita', 'admin/News_category', 'fas fa-list', 1),
(11, 2, 'Berita', 'member/Member/news/', 'fas fa-newspaper', 1),
(12, 2, 'Kategori Berita', 'member/category/', 'fas fa-list', 1),
(13, 1, 'Cetak Laporan', 'admin/Report/', 'fas fa-print', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
