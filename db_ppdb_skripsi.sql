/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.19-MariaDB : Database - db_ppdb_skripsi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ppdb_skripsi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_ppdb_skripsi`;

/*Table structure for table `afirmasis` */

DROP TABLE IF EXISTS `afirmasis`;

CREATE TABLE `afirmasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sekolah_id` bigint(20) unsigned NOT NULL,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sktm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `afirmasis` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `kampungs` */

DROP TABLE IF EXISTS `kampungs`;

CREATE TABLE `kampungs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kampung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nagari_id` bigint(20) unsigned NOT NULL,
  `kecamatan_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kampungs_nagari_id_foreign` (`nagari_id`),
  KEY `kampungs_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `kampungs_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kampungs_nagari_id_foreign` FOREIGN KEY (`nagari_id`) REFERENCES `nagaris` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kampungs` */

insert  into `kampungs`(`id`,`nama_kampung`,`nagari_id`,`kecamatan_id`,`created_at`,`updated_at`) values (1,'HILALANG',1,1,'2023-06-18 21:22:57','2023-06-18 21:22:57'),(2,'PANAMBAM',8,1,'2023-06-18 21:26:33','2023-06-18 21:26:33');

/*Table structure for table `kecamatans` */

DROP TABLE IF EXISTS `kecamatans`;

CREATE TABLE `kecamatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kecamatans` */

insert  into `kecamatans`(`id`,`nama_kecamatan`,`created_at`,`updated_at`) values (1,'PANCUNG SOAL','2023-06-18 21:07:33','2023-06-18 21:07:33'),(2,'RANAH PESISIR','2023-06-18 21:07:54','2023-06-18 21:07:54'),(3,'LENGAYANG','2023-06-18 21:08:13','2023-06-18 21:08:13'),(4,'BATANG KAPAS','2023-06-18 21:08:26','2023-06-18 21:08:26'),(5,'IV JURAI','2023-06-18 21:08:41','2023-06-18 21:08:41'),(6,'BAYANG','2023-06-18 21:08:52','2023-06-18 21:08:52'),(7,'KOTO XI TARUSAN','2023-06-18 21:09:05','2023-06-18 21:09:05'),(8,'SUTERA','2023-06-18 21:09:16','2023-06-18 21:09:16'),(9,'LINGGO SARI BAGANTI','2023-06-18 21:09:24','2023-06-18 21:09:24'),(10,'LUNANG','2023-06-18 21:09:32','2023-06-18 21:09:32'),(11,'BASA IV BALAI TAPAN','2023-06-18 21:09:38','2023-06-18 21:09:38'),(12,'IV NAGARI BAYANG UTARA','2023-06-18 21:09:44','2023-06-18 21:09:44'),(13,'AIR PURA','2023-06-18 21:09:56','2023-06-18 21:09:56'),(14,'RANAH AMPEK HULU TAPAN','2023-06-18 21:10:04','2023-06-18 21:10:04'),(15,'SILAUT','2023-06-18 21:10:10','2023-06-18 21:10:10');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_02_26_031122_create_sekolahs_table',1),(6,'2023_03_02_021830_create_penghasilans_table',1),(7,'2023_03_03_094356_create_pekerjaans_table',1),(8,'2023_03_04_063941_create_siswas_table',1),(12,'2023_03_17_090325_create_prestasis_table',2),(13,'2023_03_23_050230_create_penghargaans_table',3),(15,'2023_04_01_044926_add_bukti_nilai_rapor_to_prestasis_table',4),(16,'2023_04_02_041217_create_afirmasis_table',5),(18,'2023_04_05_065937_create_pindah_tugas_table',6),(19,'2023_04_08_055721_add_no_pendaftaran_to_siswas_table',7),(20,'2023_04_16_081854_create_kecamatans_table',8),(21,'2023_04_17_021047_create_nagaris_table',9),(22,'2023_04_17_064832_create_kampungs_table',10),(24,'2023_04_18_015907_create_zonasi_sekolahs_table',11),(25,'2023_04_18_043329_add_nagari_to_siswas_table',12),(26,'2023_04_18_055027_add_sekolah_id_to_zonasi_sekolahs_table',13),(27,'2023_04_18_060229_create_zonasis_table',14),(28,'2014_10_00_000000_create_settings_table',15),(29,'2014_10_00_000001_add_group_column_on_settings_table',15),(30,'2023_05_08_032638_add_status_to_zonasis_table',16),(31,'2023_05_26_095444_add_no_urut_to_zonasi_sekolahs_table',17);

/*Table structure for table `nagaris` */

DROP TABLE IF EXISTS `nagaris`;

CREATE TABLE `nagaris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_nagari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nagaris_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `nagaris_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nagaris` */

insert  into `nagaris`(`id`,`nama_nagari`,`kecamatan_id`,`created_at`,`updated_at`) values (1,'INDERAPURA',1,'2023-06-18 21:11:34','2023-06-18 21:11:34'),(2,'INDERAPURA SELATAN',1,'2023-06-18 21:11:54','2023-06-18 21:11:54'),(3,'INDERAPURA BARAT',1,'2023-06-18 21:12:33','2023-06-18 21:12:33'),(4,'INDERAPURA TENGAH',1,'2023-06-18 21:14:07','2023-06-18 21:14:07'),(5,'TIGA SEPAKAT INDERAPURA',1,'2023-06-18 21:14:31','2023-06-18 21:14:31'),(6,'TIGO SUNGAI INDERAPURA',1,'2023-06-18 21:14:45','2023-06-18 21:14:45'),(7,'MUARO SAKAI INDERAPURA',1,'2023-06-18 21:15:05','2023-06-18 21:15:05'),(8,'KUDO-KUDO INDERAPURA',1,'2023-06-18 21:15:22','2023-06-18 21:15:22'),(9,'TLUK AMPLU INDERAPURA',1,'2023-06-18 21:15:43','2023-06-18 21:15:43'),(10,'SIMPANG LAMA INDERAPURA',1,'2023-06-18 21:16:39','2023-06-18 21:16:39');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pekerjaans` */

DROP TABLE IF EXISTS `pekerjaans`;

CREATE TABLE `pekerjaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pekerjaans` */

insert  into `pekerjaans`(`id`,`nama`,`created_at`,`updated_at`) values (1,'PNS','2023-03-04 14:08:39','2023-03-04 14:08:39'),(2,'Swastaa','2023-03-04 14:08:44','2023-03-04 14:08:44'),(3,'TNI/POLRI','2023-03-04 14:08:48','2023-03-04 14:08:48'),(4,'Wiraswasta','2023-03-04 14:08:53','2023-03-04 14:08:53'),(5,'Ibu Rumah Tangga','2023-03-04 14:08:59','2023-03-04 14:08:59');

/*Table structure for table `penghargaans` */

DROP TABLE IF EXISTS `penghargaans`;

CREATE TABLE `penghargaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `nama_penghargaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penghargaans` */

/*Table structure for table `penghasilans` */

DROP TABLE IF EXISTS `penghasilans`;

CREATE TABLE `penghasilans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penghasilans` */

insert  into `penghasilans`(`id`,`nama`,`created_at`,`updated_at`) values (1,'Rp.100,000 s/d Rp.500,000','2023-03-04 14:07:42','2023-05-14 10:22:56'),(2,'Rp.500,000 s/d Rp.1.000,000','2023-03-04 14:07:46','2023-03-04 14:07:46'),(3,'Rp.1.000,000 s/d Rp.1.500,000','2023-03-04 14:07:54','2023-03-04 14:07:54'),(4,'Rp.1.500,000 s/d Rp.2.000,000','2023-03-04 14:07:58','2023-03-04 14:07:58'),(5,'Rp.2.000,000 s/d Rp.2.500,000','2023-03-04 14:08:03','2023-03-04 14:08:03'),(6,'Rp.2.500,000 s/d Rp.3.000,000','2023-03-04 14:08:08','2023-03-04 14:08:08'),(7,'Rp.3.500,000 s/d Rp.4.000,000','2023-03-04 14:08:14','2023-03-04 14:08:14'),(11,'Rp.4.000,000 s/d Rp.5.000,000','2023-05-14 10:26:47','2023-05-14 10:27:10'),(12,'Rp. >5.000,000','2023-05-14 10:27:50','2023-05-14 10:27:50');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `pindah_tugas` */

DROP TABLE IF EXISTS `pindah_tugas`;

CREATE TABLE `pindah_tugas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `sekolah_id` bigint(20) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pindah_tugas` */

/*Table structure for table `prestasis` */

DROP TABLE IF EXISTS `prestasis`;

CREATE TABLE `prestasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sekolah_id` bigint(20) unsigned NOT NULL,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `k6sm1` int(11) NOT NULL,
  `k6sm2` int(11) NOT NULL,
  `k5sm1` int(11) NOT NULL,
  `k5sm2` int(11) NOT NULL,
  `k4sm2` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bukti_nilai_rapor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestasis_sekolah_id_index` (`sekolah_id`),
  KEY `prestasis_siswa_id_index` (`siswa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `prestasis` */

/*Table structure for table `sekolahs` */

DROP TABLE IF EXISTS `sekolahs`;

CREATE TABLE `sekolahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sekolah_id` int(11) DEFAULT NULL,
  `npsn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akreditasi` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sekolahs_npsn_unique` (`npsn`),
  KEY `sekolahs_sekolah_id_index` (`sekolah_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sekolahs` */

insert  into `sekolahs`(`id`,`sekolah_id`,`npsn`,`nama`,`alamat`,`akreditasi`,`kecamatan`,`notelp`,`user_id`,`created_at`,`updated_at`) values (1,2,'10301932','SMP NEGERI 1 PAINAN','<p>Jl. Sutan Syahrir, Painan, Kec. Iv Jurai, Kabupaten Pesisir Selatan, Sumatera Barat 25651</p>','A','Kec. IV Jurai','081374268190',1,'2023-06-18 20:55:12','2023-06-18 20:56:15');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`name`,`val`,`group`,`created_at`,`updated_at`) values (1,'app_name','DINAS PENDIDIKAN DAN KEBUDAYAAN PESISIR SELATAN','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(2,'app_email','diknaspessel@gmail.com','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(3,'app_phone','(0756) 21602','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(4,'app_address','<p>Jl. H. Agus Salim, Painan, IV Jurai, Painan, Iv Jurai, Kabupaten Pesisir Selatan, Sumatera Barat 25651, Indonesia</p>','default','2023-05-02 02:51:33','2023-05-18 11:33:47'),(5,'pj_nama','SALIM MUHAIMIN,S.Pd,M.Si','default','2023-05-02 02:51:33','2023-05-18 11:27:10'),(6,'pj_jabatan','Kepala Dinas Pendidikan','default','2023-05-02 02:51:33','2023-05-18 11:27:41'),(7,'app_logo','public/rLHZl4NjFPXzcFSXNfLw60o5kQQggIzPrwlL5zUO.png','default','2023-05-02 02:51:33','2023-05-18 11:51:42'),(8,'pj_ttd','public/EyxS2Jj71XrCk2TA4NGMb4f2xRX9kVCGTJZUokbN.png','default','2023-05-02 02:51:33','2023-05-18 11:39:47'),(9,'awal_pendaftaran','2023-05-02','default','2023-05-02 03:44:46','2023-05-02 03:53:43'),(10,'akhir_pendaftaran','2023-08-01','default','2023-05-02 03:44:47','2023-06-03 10:44:23'),(11,'jadwa_kelulusan','2023-06-07','default','2023-05-02 03:54:41','2023-06-07 12:28:49');

/*Table structure for table `siswas` */

DROP TABLE IF EXISTS `siswas`;

CREATE TABLE `siswas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `nagari_id` int(11) DEFAULT NULL,
  `kampung_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `siswas_nisn_unique` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siswas` */

insert  into `siswas`(`id`,`no_pendaftaran`,`nama_lengkap`,`nisn`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`sekolah_asal`,`no_kk`,`no_nik`,`alamat`,`foto`,`nama_ayah`,`pekerjaan_ayah`,`penghasilan_ayah`,`nama_ibu`,`pekerjaan_ibu`,`penghasilan_ibu`,`user_id`,`kecamatan_id`,`nagari_id`,`kampung_id`,`created_at`,`updated_at`) values (1,'20231806001','Fazeel Muhammad Zuhdi','1424722424','Padang','2023-06-18','L','Islam','SD NEGERI 1 PAINAN','2523523141242152','1312423523525252','<p>Jl. Permata Harbaindo H 13 No 12</p>','public/file/fotosiswa/NHeYcoKPWnygz4lO1907XXOGia7jbr4Ic3RK6A7G.png','Ipul','Swastaa','Rp. >5.000,000','Decul','Ibu Rumah Tangga','Rp.100,000 s/d Rp.500,000',3,1,1,1,'2023-06-18 21:32:02','2023-06-18 21:50:09');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` enum('Admin Dinas','Admin Sekolah','Siswa','Kepala Dinas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa',
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`akses`,`nohp`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'admin','admin@contoh.com','Admin Dinas','08236426425',NULL,'$2y$10$R7MdWvCNtCAHMjft7zemXOVMxUuWDz85GKdPoLZjGezExWdfp.gvW',NULL,'2023-06-18 20:23:18','2023-06-18 20:23:20'),(2,'Linda','smpn1painan@gmail.com','Admin Sekolah','081266251435',NULL,'$2y$10$0BYy4xRsFZ72IMxg18J2pe4.gBVLjWa.pfWqUe9cibQ1J4FWl7MFq',NULL,'2023-06-18 20:31:51','2023-06-18 20:31:51'),(3,'FAZEEL MUHAMMAD ZUHDI','fazeel@gmail.com','Siswa',NULL,NULL,'$2y$10$a7Sv5wRRLtSvglAfKbEQ7uLPZSsu9qcrSoTO263Cz68DkBTKQkWg.',NULL,'2023-06-18 20:42:54','2023-06-18 20:42:54');

/*Table structure for table `zonasi_sekolahs` */

DROP TABLE IF EXISTS `zonasi_sekolahs`;

CREATE TABLE `zonasi_sekolahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nagari_id` bigint(20) unsigned NOT NULL,
  `kampung_id` bigint(20) unsigned NOT NULL,
  `kecamatan_id` bigint(20) unsigned NOT NULL,
  `sekolah_id` bigint(20) unsigned DEFAULT NULL,
  `no_urut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zonasi_sekolahs` */

insert  into `zonasi_sekolahs`(`id`,`nagari_id`,`kampung_id`,`kecamatan_id`,`sekolah_id`,`no_urut`,`nilai`,`created_at`,`updated_at`) values (1,1,1,1,1,'1','70','2023-06-18 21:28:40','2023-06-18 21:28:40'),(2,8,2,1,1,'2','69','2023-06-18 21:29:09','2023-06-18 21:29:09');

/*Table structure for table `zonasis` */

DROP TABLE IF EXISTS `zonasis`;

CREATE TABLE `zonasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sekolah_id` bigint(20) unsigned NOT NULL,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zonasis` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
