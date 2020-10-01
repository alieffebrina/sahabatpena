-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2018 pada 23.41
-- Versi server: 10.1.19-MariaDB
-- Versi PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resto_v3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `level` text,
  `master` int(11) NOT NULL,
  `kasir` int(11) DEFAULT NULL,
  `transaksi` int(11) DEFAULT NULL,
  `laporan` int(11) DEFAULT NULL,
  `pengguna` int(11) DEFAULT NULL,
  `pengaturan` int(11) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `barang` int(11) DEFAULT NULL,
  `barang_tambah` int(11) DEFAULT NULL,
  `barang_import` int(11) DEFAULT NULL,
  `barang_edit` int(11) DEFAULT NULL,
  `barang_hapus` int(11) DEFAULT NULL,
  `barcode` int(11) DEFAULT NULL,
  `transaksi_penjualan` int(11) DEFAULT NULL,
  `transaksi_pembelian` int(11) DEFAULT NULL,
  `transaksi_piutang` int(11) DEFAULT NULL,
  `transaksi_hutang` int(11) DEFAULT NULL,
  `transaksi_return_penjualan` int(11) DEFAULT NULL,
  `transaksi_return_pembelian` int(11) DEFAULT NULL,
  `laporan_kas` int(11) DEFAULT NULL,
  `laporan_laba_rugi` int(11) DEFAULT NULL,
  `laporan_grafik` int(11) DEFAULT NULL,
  `transaksi_return` int(11) DEFAULT NULL,
  `pelanggan` int(11) DEFAULT NULL,
  `pelanggan_tambah` int(11) DEFAULT NULL,
  `pelanggan_import` int(11) DEFAULT NULL,
  `pelanggan_edit` int(11) DEFAULT NULL,
  `pelanggan_hapus` int(11) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `supplier_tambah` int(11) DEFAULT NULL,
  `supplier_import` int(11) DEFAULT NULL,
  `supplier_edit` int(11) DEFAULT NULL,
  `supplier_hapus` int(11) DEFAULT NULL,
  `stok_opname` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `level`, `master`, `kasir`, `transaksi`, `laporan`, `pengguna`, `pengaturan`, `hak_akses`, `barang`, `barang_tambah`, `barang_import`, `barang_edit`, `barang_hapus`, `barcode`, `transaksi_penjualan`, `transaksi_pembelian`, `transaksi_piutang`, `transaksi_hutang`, `transaksi_return_penjualan`, `transaksi_return_pembelian`, `laporan_kas`, `laporan_laba_rugi`, `laporan_grafik`, `transaksi_return`, `pelanggan`, `pelanggan_tambah`, `pelanggan_import`, `pelanggan_edit`, `pelanggan_hapus`, `supplier`, `supplier_tambah`, `supplier_import`, `supplier_edit`, `supplier_hapus`, `stok_opname`) VALUES
(1, 'master', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'marketing', 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'kasir', 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 'operator', 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_bahan`
--

CREATE TABLE `daftar_bahan` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` text,
  `nama_barang` text,
  `kategori_barang` text,
  `satuan` text,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `diskon` text,
  `terjual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `lokasi` text,
  `ukuran` text,
  `warna` text,
  `merek` text,
  `expired` text,
  `stok_minimal` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `expiredDate` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_barang`
--

CREATE TABLE `daftar_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` text,
  `nama_barang` text,
  `kategori_barang` text,
  `satuan` text,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `diskon` text,
  `terjual` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `lokasi` text,
  `ukuran` text,
  `warna` text,
  `merek` text,
  `expired` text,
  `stok_minimal` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `expiredDate` text,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_barang`
--

INSERT INTO `daftar_barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori_barang`, `satuan`, `harga_beli`, `harga_jual`, `diskon`, `terjual`, `stok`, `lokasi`, `ukuran`, `warna`, `merek`, `expired`, `stok_minimal`, `supplier_id`, `expiredDate`, `jenis`) VALUES
(1, '37827905', 'kopi luwak', 'OMSET', 'SET', 0, 10000, NULL, NULL, 9994, '', '', '', '', '', 1, NULL, '--', 'produk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `total_barang` int(11) DEFAULT NULL,
  `total_pelanggan` int(11) DEFAULT NULL,
  `omset` int(11) DEFAULT NULL,
  `laba` int(11) DEFAULT NULL,
  `grafik` int(11) DEFAULT NULL,
  `barang_terlaris` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `barang_expired` int(11) DEFAULT NULL,
  `barang_limit` int(11) DEFAULT NULL,
  `piutang_tempo` int(11) DEFAULT NULL,
  `hutang_rempo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dashboard`
--

INSERT INTO `dashboard` (`total_barang`, `total_pelanggan`, `omset`, `laba`, `grafik`, `barang_terlaris`, `id`, `barang_expired`, `barang_limit`, `piutang_tempo`, `hutang_rempo`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id` int(11) NOT NULL,
  `ekspedisi` text,
  `website` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ekspedisi`
--

INSERT INTO `ekspedisi` (`id`, `ekspedisi`, `website`) VALUES
(1, 'JNE', 'http://jne.co.id'),
(2, 'JNT', ''),
(3, 'TIKI', ''),
(4, 'POS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `id` int(11) NOT NULL,
  `faktur` text,
  `pelanggan_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `date` text,
  `ongkir` int(11) DEFAULT NULL,
  `ekspedisi` text,
  `total` int(11) DEFAULT NULL,
  `pemasukan` text,
  `pengeluaran` text,
  `mode` text,
  `keterangan` text,
  `voucher` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `dibayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` text,
  `hutang` int(11) DEFAULT NULL,
  `hutang_dibayar` int(11) DEFAULT NULL,
  `hutang_sisa` int(11) DEFAULT NULL,
  `tempo` text,
  `disc` int(11) DEFAULT NULL,
  `pjk` int(11) DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `total_hpp` int(11) DEFAULT NULL,
  `laba_rugi` int(11) DEFAULT NULL,
  `terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`id`, `faktur`, `pelanggan_id`, `supplier_id`, `tanggal`, `bulan`, `tahun`, `date`, `ongkir`, `ekspedisi`, `total`, `pemasukan`, `pengeluaran`, `mode`, `keterangan`, `voucher`, `diskon`, `grand_total`, `dibayar`, `kembali`, `user_id`, `status`, `hutang`, `hutang_dibayar`, `hutang_sisa`, `tempo`, `disc`, `pjk`, `pajak`, `total_hpp`, `laba_rugi`, `terjual`) VALUES
(1, 'PJ.181003234127.0001.1', 0, NULL, 3, 10, 2018, '2018-10-03', 0, '', 20000, '20000', '0', 'penjualan', 'Penjualan : PJ.181003234127.0001.1', 0, 0, 20000, 20000, 0, 1, 'tunai', 0, 0, 0, '0', 0, 0, 0, 0, 20000, 2),
(2, 'PJ.181003234245.0002.2', 0, NULL, 3, 10, 2018, '2018-10-03', 0, '', 10000, '10000', '0', 'penjualan', 'Penjualan : PJ.181003234245.0002.2', 0, 0, 10000, 10000, 0, 1, 'tunai', 0, 0, 0, '0', 0, 0, 0, 0, 10000, 1),
(3, 'PJ.181003234428.0003.1', 0, NULL, 3, 10, 2018, '2018-10-03', 0, '', 20000, '20000', '0', 'penjualan', 'Penjualan : PJ.181003234428.0003.1', 0, 0, 20000, 20000, 0, 1, 'tunai', 0, 0, 0, '0', 0, 0, 0, 0, 20000, 2),
(4, 'PJ.181003234734.0004.13', 0, NULL, 3, 10, 2018, '2018-10-03', 0, '', 10000, '10000', '0', 'penjualan', 'Penjualan : PJ.181003234734.0004.13', 0, 0, 10000, 10000, 0, 1, 'tunai', 0, 0, 0, '0', 0, 0, 0, 0, 10000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_pembelian`
--

CREATE TABLE `kasir_pembelian` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `faktur` text,
  `date` text,
  `nama_barang` text,
  `kode_barang` text,
  `status` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `total_hpp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_penjualan`
--

CREATE TABLE `kasir_penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `faktur` text,
  `date` text,
  `nama_barang` text,
  `kode_barang` text,
  `status` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `total_hpp` int(11) DEFAULT NULL,
  `meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir_penjualan`
--

INSERT INTO `kasir_penjualan` (`id`, `id_barang`, `harga`, `qty`, `total`, `faktur`, `date`, `nama_barang`, `kode_barang`, `status`, `session`, `hpp`, `total_hpp`, `meja`) VALUES
(1, 1, 10000, 2, 20000, 'PJ.181003234127.0001.1', '2018-10-03', 'kopi luwak', '37827905', 2, 1, 0, 0, 1),
(2, 1, 10000, 1, 10000, 'PJ.181003234245.0002.2', '2018-10-03', 'kopi luwak', '37827905', 2, 1, 0, 0, 2),
(3, 1, 10000, 2, 20000, 'PJ.181003234428.0003.1', '2018-10-03', 'kopi luwak', '37827905', 2, 1, 0, 0, 1),
(4, 1, 10000, 1, 10000, 'PJ.181003234734.0004.13', '2018-10-03', 'kopi luwak', '37827905', 2, 1, 0, 0, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL,
  `kategori` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `kategori`) VALUES
(53, 'OMSET'),
(56, 'baju anak'),
(58, 'MINUMAN'),
(60, 'BATERAI'),
(62, 'kosmetik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `meja` int(11) NOT NULL,
  `faktur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id`, `meja`, `faktur`) VALUES
(1, 1, ''),
(2, 2, 'PJ.181003234932.0005.2'),
(3, 3, ''),
(4, 4, ''),
(5, 5, ''),
(6, 6, ''),
(7, 7, ''),
(8, 8, ''),
(9, 9, ''),
(10, 10, ''),
(11, 11, ''),
(12, 12, ''),
(13, 13, ''),
(14, 14, ''),
(15, 15, ''),
(16, 16, ''),
(17, 17, ''),
(18, 18, ''),
(19, 19, ''),
(20, 20, ''),
(21, 21, ''),
(22, 22, ''),
(23, 23, ''),
(24, 24, ''),
(25, 25, ''),
(26, 26, ''),
(27, 27, ''),
(28, 28, ''),
(29, 29, ''),
(30, 30, ''),
(31, 31, ''),
(32, 32, ''),
(33, 33, ''),
(34, 34, ''),
(35, 35, ''),
(36, 36, ''),
(37, 37, ''),
(38, 38, ''),
(39, 39, ''),
(40, 40, ''),
(41, 41, ''),
(42, 42, ''),
(43, 43, ''),
(44, 44, ''),
(45, 45, ''),
(46, 46, ''),
(47, 47, ''),
(48, 48, ''),
(49, 49, ''),
(50, 50, ''),
(51, 51, ''),
(52, 52, ''),
(53, 53, ''),
(54, 54, ''),
(55, 55, ''),
(56, 56, ''),
(57, 57, ''),
(58, 58, ''),
(59, 59, ''),
(60, 60, ''),
(61, 61, ''),
(62, 62, ''),
(63, 63, ''),
(64, 64, ''),
(65, 65, ''),
(66, 66, ''),
(67, 67, ''),
(68, 68, ''),
(69, 69, ''),
(70, 70, ''),
(71, 71, ''),
(72, 72, ''),
(73, 73, ''),
(74, 74, ''),
(75, 75, ''),
(76, 76, ''),
(77, 77, ''),
(78, 78, ''),
(79, 79, ''),
(80, 80, ''),
(81, 81, ''),
(82, 82, ''),
(83, 83, ''),
(84, 84, ''),
(85, 85, ''),
(86, 86, ''),
(87, 87, ''),
(88, 88, ''),
(89, 89, ''),
(90, 90, ''),
(91, 91, ''),
(92, 92, ''),
(93, 93, ''),
(94, 94, ''),
(95, 95, ''),
(96, 96, ''),
(97, 97, ''),
(98, 98, ''),
(99, 99, ''),
(100, 100, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `voucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id`, `ongkir`, `pajak`, `voucher`) VALUES
(1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` text,
  `alamat` text,
  `kota` text,
  `no_hp` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `admin` text,
  `password` text,
  `nama_toko` text,
  `keterangan` text,
  `alamat` text,
  `no_hp` text,
  `email` text,
  `website` text,
  `pin_bb` text,
  `facebook` text,
  `backup` datetime DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `aktivasi` int(11) DEFAULT NULL,
  `meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `admin`, `password`, `nama_toko`, `keterangan`, `alamat`, `no_hp`, `email`, `website`, `pin_bb`, `facebook`, `backup`, `serial`, `aktivasi`, `meja`) VALUES
(1, '', '', 'DJAVASOFT.COM', '', 'Jl. P. Sudirman gang 7 no 56 A Tulungagung', '0888998890', 'toko@mail.com', 'http://djavasoft.com', '', '', '0000-00-00 00:00:00', 0, 0, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `return_barang`
--

CREATE TABLE `return_barang` (
  `id` int(11) NOT NULL,
  `faktur` text,
  `pelanggan_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `date` text,
  `total` int(11) DEFAULT NULL,
  `return_penjualan` text,
  `return_pembelian` text,
  `mode` text,
  `keterangan` text,
  `dibayar` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` text,
  `return_total` int(11) DEFAULT NULL,
  `return_dibayar` int(11) DEFAULT NULL,
  `return_sisa` int(11) DEFAULT NULL,
  `faktur_pembelian` text,
  `faktur_penjualan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `return_pembelian`
--

CREATE TABLE `return_pembelian` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `faktur` text,
  `date` text,
  `nama_barang` text,
  `kode_barang` text,
  `status` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `return_penjualan`
--

CREATE TABLE `return_penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `faktur` text,
  `date` text,
  `nama_barang` text,
  `kode_barang` text,
  `status` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(39, 'BH'),
(40, 'PAK'),
(42, 'LBR'),
(43, 'DOS'),
(44, 'PAD'),
(45, 'BTL'),
(46, 'BOX'),
(47, 'PAP'),
(48, 'BJ'),
(49, 'ISI'),
(50, 'BKS'),
(51, 'PCS'),
(53, 'KLG'),
(55, 'SET'),
(56, 'KRG'),
(58, 'KTL'),
(59, 'SCH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_opname`
--

CREATE TABLE `stok_opname` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `kode_barang` text,
  `nama_barang` text,
  `harga_beli` int(11) DEFAULT NULL,
  `stok_komputer` int(11) DEFAULT NULL,
  `stok_nyata` int(11) DEFAULT NULL,
  `selisih` int(11) DEFAULT NULL,
  `total_selisih` int(11) DEFAULT NULL,
  `date` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` text,
  `alamat` text,
  `kota` text,
  `no_hp` text,
  `email` text,
  `website` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text,
  `password` text,
  `level` text,
  `nama` text,
  `alamat` text,
  `no_hp` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'master', 'Administrator', 'Local', '0877889809'),
(12, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'Kasir', '', ''),
(13, 'marketing', 'c769c2bd15500dd906102d9be97fdceb', 'marketing', 'Marketing', '', ''),
(14, 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator', 'operator', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasir_pembelian`
--
ALTER TABLE `kasir_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasir_penjualan`
--
ALTER TABLE `kasir_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `return_barang`
--
ALTER TABLE `return_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `return_pembelian`
--
ALTER TABLE `return_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `return_penjualan`
--
ALTER TABLE `return_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `daftar_barang`
--
ALTER TABLE `daftar_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kasir_pembelian`
--
ALTER TABLE `kasir_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasir_penjualan`
--
ALTER TABLE `kasir_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `return_barang`
--
ALTER TABLE `return_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `return_pembelian`
--
ALTER TABLE `return_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `return_penjualan`
--
ALTER TABLE `return_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
