-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2023 pada 06.19
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_barang`
--

CREATE TABLE `mst_barang` (
  `id_barang` int(8) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `satuan` int(100) NOT NULL,
  `id_pengguna` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_customers`
--

CREATE TABLE `mst_customers` (
  `id_pelanggan` int(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `telepon` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_pengguna` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_users`
--

CREATE TABLE `mst_users` (
  `id_pengguna` int(8) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_depan` varchar(35) NOT NULL,
  `nama_belakang` varchar(35) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `Alamat` text NOT NULL,
  `id_akses` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user_roles`
--

CREATE TABLE `mst_user_roles` (
  `id_akses` int(8) NOT NULL,
  `nama_akses` varchar(30) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(8) NOT NULL,
  `jumlah_pembelian` int(100) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `id_pengguna` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(8) NOT NULL,
  `jumlah_penjualan` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `id_pengguna` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `id_pengguna` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_barang`
--
ALTER TABLE `mst_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mst_customers`
--
ALTER TABLE `mst_customers`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `id_akses` (`id_akses`);

--
-- Indeks untuk tabel `mst_user_roles`
--
ALTER TABLE `mst_user_roles`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_user_roles`
--
ALTER TABLE `mst_user_roles`
  MODIFY `id_akses` int(8) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mst_barang`
--
ALTER TABLE `mst_barang`
  ADD CONSTRAINT `mst_barang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `mst_users` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `mst_customers`
--
ALTER TABLE `mst_customers`
  ADD CONSTRAINT `mst_customers_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `mst_users` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `mst_users`
--
ALTER TABLE `mst_users`
  ADD CONSTRAINT `mst_users_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `mst_user_roles` (`id_akses`);

--
-- Ketidakleluasaan untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD CONSTRAINT `tbl_pembelian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `mst_users` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD CONSTRAINT `tbl_penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `mst_users` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD CONSTRAINT `tbl_supplier_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `mst_users` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
