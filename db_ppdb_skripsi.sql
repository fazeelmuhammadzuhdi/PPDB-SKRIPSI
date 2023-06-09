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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kampungs` */

insert  into `kampungs`(`id`,`nama_kampung`,`nagari_id`,`kecamatan_id`,`created_at`,`updated_at`) values (7,'AJO',10,7,'2023-04-18 02:42:25','2023-04-18 02:42:25'),(8,'OIOI',10,7,'2023-04-18 02:56:03','2023-04-18 02:56:03'),(10,'NDK TAU',13,7,'2023-04-18 06:56:06','2023-04-18 06:56:06'),(11,'HILALANG',8,10,'2023-05-28 14:09:28','2023-05-28 14:09:28');

/*Table structure for table `kecamatans` */

DROP TABLE IF EXISTS `kecamatans`;

CREATE TABLE `kecamatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kecamatans` */

insert  into `kecamatans`(`id`,`nama_kecamatan`,`created_at`,`updated_at`) values (7,'LENGAYANG','2023-04-16 10:59:47','2023-04-16 11:01:42'),(10,'PANCUNG SOAL','2023-04-17 07:34:27','2023-04-17 07:34:27');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nagaris` */

insert  into `nagaris`(`id`,`nama_nagari`,`kecamatan_id`,`created_at`,`updated_at`) values (8,'KUDO-KUDO INDERAPURA',10,'2023-04-17 08:21:08','2023-04-17 08:21:08'),(9,'INDERAPURA BARAT',10,'2023-04-17 08:21:19','2023-04-17 08:21:19'),(10,'KAMBANG UTARA',7,'2023-04-17 08:23:03','2023-04-17 08:23:03'),(13,'KAMBANG TIMUR',7,'2023-04-18 06:55:47','2023-04-18 06:55:47');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penghargaans` */

insert  into `penghargaans`(`id`,`siswa_id`,`nama_penghargaan`,`tahun`,`file`,`created_at`,`updated_at`) values (1,3,'Juara 1','2022','lampu.jpg','2023-03-23 10:22:12','2023-03-23 10:22:12'),(2,3,'Juara 3','2023','logo dinas.png','2023-03-23 10:22:12','2023-03-23 10:22:12'),(3,1,'Juara 2','2022',NULL,'2023-03-24 11:24:41','2023-03-24 11:24:44'),(15,9,'juara 1','2022','kip.jpg','2023-04-15 08:33:16','2023-04-15 08:33:16'),(16,1,'Exercitationem in no','2023','1151-768x591.png','2023-05-16 11:01:08','2023-05-16 11:01:08'),(20,16,'Juara 1 MLBB','2023','prestasi.png','2023-06-06 13:32:09','2023-06-06 13:32:09'),(21,16,'Juara 2 MLBB JAYANUSA','2022','Login1.png','2023-06-06 13:32:09','2023-06-06 13:32:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pindah_tugas` */

insert  into `pindah_tugas`(`id`,`siswa_id`,`sekolah_id`,`file`,`status`,`created_at`,`updated_at`) values (1,5,1,'file/pindahtugas/hsDS3AHknjyL0kqfnH6JxHq3iY41i9FuY1rIPOqH.pdf',NULL,'2023-04-08 11:03:46','2023-06-06 15:54:32'),(2,8,1,'file/pindahtugas/lxAJvke4OGvNF18PVOBtdr2K021dflKjjJQp5cE0.jpg',NULL,'2023-04-14 08:17:34','2023-06-06 15:38:14'),(3,2,3,'file/pindahtugas/YxG7DvlpWw5GuFVtCJTdG4mKZmOATyHP8f3OKtB9.png',1,'2023-04-18 04:05:00','2023-04-18 04:09:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `prestasis` */

insert  into `prestasis`(`id`,`sekolah_id`,`siswa_id`,`k6sm1`,`k6sm2`,`k5sm1`,`k5sm2`,`k4sm2`,`jumlah`,`bukti_nilai_rapor`,`status`,`created_at`,`updated_at`) values (1,1,7,90,90,80,80,80,80,NULL,1,'2023-05-16 11:01:08','2023-05-16 11:01:08'),(5,1,1,9,75,3,83,76,49,'file/bukti_nilai_rapor/sLYzLWPW1jznQLS5SeNvySjOHoQ1QgrWuIPVf6kQ.pdf',1,'2023-05-16 11:01:08','2023-05-19 19:06:44'),(16,1,14,80,87,80,80,90,83,'file/bukti_nilai_rapor/nXNHJD9dYgPNEQFmIvODJkerOLkkf4oxE4aJmuNI.pdf',NULL,'2023-05-30 16:44:48','2023-06-06 15:39:44'),(20,1,16,90,89,90,90,90,90,'file/bukti_nilai_rapor/IgjmeHu3ePHA4Y4PdbS6kdxlcxvVJmvFlpspBaGW.pdf',NULL,'2023-06-06 13:32:08','2023-06-07 12:11:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sekolahs` */

insert  into `sekolahs`(`id`,`sekolah_id`,`npsn`,`nama`,`alamat`,`akreditasi`,`kecamatan`,`notelp`,`user_id`,`created_at`,`updated_at`) values (1,2,'1231231','SMP N 6 PAINAN','Adipisci voluptate ipsa sed ducimus non','A','Et qui animi do eaq','0786968',1,'2023-03-05 02:16:52','2023-03-05 02:17:08'),(3,12,'65252662','SMP N 2 PAINAN','<p>hddd</p>','A','Padang Selatan','0837383',1,'2023-04-15 08:41:31','2023-04-15 08:41:57'),(4,7,'1212121','SMP N 3 PAINAN','<p>afafaf</p>','A','Mollitia sequi volup','4754745745',1,'2023-04-18 06:52:54','2023-04-18 06:53:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siswas` */

insert  into `siswas`(`id`,`no_pendaftaran`,`nama_lengkap`,`nisn`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`sekolah_asal`,`no_kk`,`no_nik`,`alamat`,`foto`,`nama_ayah`,`pekerjaan_ayah`,`penghasilan_ayah`,`nama_ibu`,`pekerjaan_ibu`,`penghasilan_ibu`,`user_id`,`kecamatan_id`,`nagari_id`,`kampung_id`,`created_at`,`updated_at`) values (1,'20230804001','Fazeel Muhammad','14141','Padang','2004-03-11','L','Islam','Dolor pariatur Natu','12','13131313','Dolorum alias laboru','public/tqZx3MavLwLfQlvluYQ7gNp6xYtURYkS015nq9r3.png','Junaidi','PNS','> Rp.4.000,000','Daniel Benjamin','Ibu Rumah Tangga','Rp.1.000,000 s/d Rp.1.500,000',4,10,10,10,'2023-03-04 14:09:46','2023-03-16 11:15:22'),(2,'20230804002','Nanda Kuriak','1231','Padang','1992-01-01','L','Hindu','Natus et et consecte','Non doloremque neces','Sint sapiente assume','Ut iure maxime volup','public/39jWKxum2obTFSgIF0FtP6hfV0ayg5yFSsZu6PyR.png','Alyssa Sheppard','TNI/POLRI','Rp.3.500,000 s/d Rp.4.000,000','Elaine Odom','Wiraswasta','Rp.3.500,000 s/d Rp.4.000,000',6,7,7,7,'2023-03-05 03:16:44','2023-03-05 03:53:14'),(5,'20230804003','afafafaf','3111111111','Padang','2023-03-24','L','Islam','SD N 1','1313123131313131','1321312313131313','Jl.Permata','public/LZEAPlKAOAVtOfBBNY5JzGE1oHvhRFt1A4qOCbM3.png','Martena Frazier','TNI/POLRI','Rp.0 s/d Rp.500,000','Yvette Dorsey','Wiraswasta','Rp.500,000 s/d Rp.1.000,000',9,7,7,7,'2023-03-24 08:25:44','2023-03-24 08:25:44'),(7,'20230804004','Do sed vero esse ev','1234567890','Medan','2011-12-17','P','Islam','Autem quia rerum dol','1234567890123456','1234567890123456','<p>Jl.Mantap Cuy</p>','public/O19wfCdPrlq8SJqPqlDp5HxUbhdP12C7sJzL9sIM.png','Blaine Park','TNI/POLRI','Rp.3.500,000 s/d Rp.4.000,000','Jorden Booth','PNS','> Rp.4.000,000',3,10,10,10,'2023-04-08 06:34:05','2023-04-08 06:34:05'),(8,'20231404005','oioioi','1234567891','Padang','2023-04-14','L','Islam','SD N 1 PADANG','1214124124141414','2525114141414414','<p>Jl.fahfjahfa</p>','public/mAIeVsRKfD3cWCvR9RW2zys7l31Xc2U9sgQHdY8H.png','Coy coy','PNS','> Rp.4.000,000','Kevin Raymond','Ibu Rumah Tangga','Rp.3.500,000 s/d Rp.4.000,000',10,7,7,7,'2023-04-14 08:16:36','2023-04-14 08:16:36'),(9,'20231504006','Dolor eaque minim il','1234568979','paoaa','1979-10-21','L','Islam','Nemo repudiandae qua','1577267265257526','2562656752675675','<p>jhjhjh</p>','public/A5vS64FGcgSw0VzHQjVVtGCaASvx2r7vsjA1t5pr.png','Dean Barrera','Swastaa','Rp.1.500,000 s/d Rp.2.000,000','Melinda Gamble','Swastaa','Rp.3.500,000 s/d Rp.4.000,000',11,7,10,7,'2023-04-15 08:30:47','2023-04-18 07:10:34'),(10,'20231804007','Aliquid nulla quam v','1234252352','Padang','1985-11-02','L','Islam','Dolor culpa tempora','5235252352314144','2352521342143242','<p>afafafaf</p>','public/Hdgq2e1m7EpScC5PqvUMSBzY5ASaI2pU5loTwplV.png','Briar Short','TNI/POLRI','Rp.3.500,000 s/d Rp.4.000,000','Wang Pate','Wiraswasta','Rp.2.500,000 s/d Rp.3.000,000',13,7,13,10,'2023-04-18 04:50:32','2023-06-07 11:24:40'),(11,'20230105008','Et eaque eos odio v','4745745745','Padang Panjag','2003-06-20','L','Islam','Quia molestiae in ac','4868568585858568','7467474484856856','<p>Jl.Kampung Indah</p>','public/QVvFOtxBKuqSjO7jaUgpQNYTQEtI8wl2MHN3LZR1.png','Roanna Marks','TNI/POLRI','Rp.1.000,000 s/d Rp.1.500,000','Keegan Caldwell','TNI/POLRI','Rp.500,000 s/d Rp.1.000,000',15,7,10,8,'2023-05-01 07:10:32','2023-05-01 07:10:32'),(12,'20231905009','Dicta enim optio iu','1463634636','Padang','2005-10-27','L','Islam','SD 1 PADANG','3653636363463634','6346346346363634','<p>Jl. Permata</p>','public/Mb1sBL8EX6cEIZJ93U04S6JBqTyvfmS5dFYpk5t1.jpg','Carly Munoz','TNI/POLRI','Rp.100,000 s/d Rp.500,000','Ila Bentley','Ibu Rumah Tangga','Rp.4.000,000 s/d Rp.5.000,000',18,7,10,7,'2023-05-19 18:58:57','2023-05-19 18:58:57'),(14,'20230834010','Dolore est do minus','1314112412','Eos obcaecati rem a','1998-09-28','L','Islam','Possimus proident','1241412414214141','4124124141241241','<p>Jl.HAHAHAHA</p>','public/file/fotosiswa/qZhXTHTLPOMzEEQGieB39Fco5rkCZ7pygc073eFn.png','Quail Molina','Wiraswasta','Rp.4.000,000 s/d Rp.5.000,000','Veronica Pitts','Swastaa','Rp.2.500,000 s/d Rp.3.000,000',20,7,10,7,'2023-05-26 08:35:03','2023-05-26 10:45:24'),(15,'20231046011','Yogi','1472252526','Padang','1984-12-26','L','Islam','SD N 1 PAINAN','2583257259835735','2358273583574358','<p>Jl.Raya Padang</p>','public/file/fotosiswa/kD0ZxdzflYc22XgaKmwcpYMriw25PDER3BcAIjEg.png','Stephanie Johnson','PNS','Rp.2.500,000 s/d Rp.3.000,000','Arden Cameron','TNI/POLRI','Rp. >5.000,000',22,7,10,8,'2023-06-03 10:48:33','2023-06-03 10:48:33'),(16,'20231135012','Antonio Valencia','2562357625','Padang','2001-01-17','L','Islam','SD NEGERI 1 PAINAN','8234752263526735','3578357635346535','<p>Jl.Manchester</p>','public/file/fotosiswa/UlwfVkA96fvfYw9efBhjFX4va92pzDLiVwnZ6bik.png','Cheyenne Fry','Wiraswasta','Rp.3.500,000 s/d Rp.4.000,000','Dieter Foreman','Wiraswasta','Rp.3.500,000 s/d Rp.4.000,000',24,10,8,11,'2023-06-06 11:38:56','2023-06-06 13:50:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`akses`,`nohp`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'dinas','dinas@contoh.com','Admin Dinas','081234567890','2023-03-04 14:05:09','$2y$10$RamXKMFXp4JlY5h3UGBiKe9udwGltGtAt/v51zbTo9Fv3of39hrda',NULL,'2023-03-04 14:05:09','2023-03-04 14:05:09'),(2,'sekolah','sekolah@contoh.com','Admin Sekolah','081234567890','2023-03-04 14:05:09','$2y$10$cHuuTRAuD2JqbksKg9uYQuMX1Z9T57qR0kq1o0yJgVF7pnRNlY1Ji',NULL,'2023-03-04 14:05:09','2023-03-04 14:05:09'),(3,'siswa','siswa@contoh.com','Siswa','08123456782252352','2023-03-04 14:05:09','$2y$10$2VR/Y126i2MO0EZs6t9Qnu3hSweYd/u.3L3e4Ak2ZC4jwP7doODu6',NULL,'2023-03-04 14:05:09','2023-06-07 15:12:23'),(4,'FAZEEL MUHAMMAD ZUHDI','fazeelmuhammadzuhdi@gmail.com','Siswa',NULL,NULL,'$2y$10$uQGkil2ArtD.7AOFryXWBu/4qU8cF.rrMCFLIjWTsvWWnCfDyuueK',NULL,'2023-03-04 14:05:40','2023-03-04 14:05:40'),(5,'afafa','131232131@mailinator.com','Siswa','131414141412',NULL,'$2y$10$I5fikzQEuWNPP3guNIDAhufeS7BQq6au1puViULbZgvzxT05Mv4kq',NULL,'2023-03-04 14:45:11','2023-03-05 05:11:41'),(6,'Mikayla Vaughn','vymez@mailinator.com','Siswa','6856',NULL,'$2y$10$miRuYhOslYkK2Jdbz9bh8.FW03xPwtFjtGiBC2skpx9jcBgdLmXcW',NULL,'2023-03-05 02:49:50','2023-03-05 04:57:19'),(7,'Destiny Webb','keso@mailinator.com','Admin Sekolah','36363636363',NULL,'$2y$10$/k4GcJzDrjnF3dIWZ/VyJuEE/d4plNAHgmsdvkKn6RpcF58FROQCK',NULL,'2023-03-17 10:50:59','2023-03-17 10:50:59'),(8,'agung','agung@gmail.com','Siswa',NULL,NULL,'$2y$10$SUWaKK4j3g/oPeS1OCfI.uPAqKj4Ktgh99Hn.CHtdLHAN5E.F8Zc6',NULL,'2023-03-21 07:34:22','2023-03-21 07:34:22'),(9,'Acton Clayton','zuneh@mailinator.com','Siswa',NULL,NULL,'$2y$10$3NhRt1pKDKNE4yOgtNXLL.rUxZnfF/K.bLeHHTOy0LhyoHpgcQVfa',NULL,'2023-03-22 01:27:11','2023-03-22 01:27:11'),(10,'oioioi','oioi@gmail.com','Siswa',NULL,NULL,'$2y$10$qFAVzCC8FYNHFkUwpSuEE./xBLgX1khZRiFYOPpXAH14mrK/gWTcy',NULL,'2023-04-14 08:10:44','2023-04-14 08:10:44'),(11,'Chancellor Savage','vovof@mailinator.com','Siswa',NULL,NULL,'$2y$10$tH1QpH9IxNM.UA8MLSmCNOLFOraacfdIAcMQsrtUABRmxMx8CuqaS',NULL,'2023-04-15 08:28:23','2023-04-15 08:28:23'),(12,'ucokk','ucok@gmail.com','Admin Sekolah','0873837',NULL,'$2y$10$RamXKMFXp4JlY5h3UGBiKe9udwGltGtAt/v51zbTo9Fv3of39hrda',NULL,'2023-04-15 08:40:39','2023-04-15 08:40:39'),(13,'Fuller Logan','diqina@mailinator.com','Siswa',NULL,NULL,'$2y$10$kG4veqQTkJX0njuc0gyaHOlQzWQbaYDJu8yY8.3M6GMePcpkbtNpu',NULL,'2023-04-18 04:19:58','2023-04-18 04:19:58'),(14,'Gisela Moses','zenobasuq@mailinator.com','Siswa',NULL,NULL,'$2y$10$WZthStcjkEMG7s7wHQ/l/Odra3B8AeVNt5SeM3gvYr4m5iX7TFFzS',NULL,'2023-04-18 05:20:33','2023-04-18 05:20:33'),(15,'Irfan','ipan@gmail.com','Siswa',NULL,NULL,'$2y$10$BpvpdNMD/DKw5ekt2K2l/esOFiJcWwtPQfiSH6pyTqMlRB.8aoSAq',NULL,'2023-05-01 07:04:56','2023-05-01 07:04:56'),(16,'Cameron Oneal','satiryz@mailinator.com','Siswa',NULL,NULL,'$2y$10$p9cNV7XC/Fa0hFiVuazm3OIZqsAHyZ6oO6easW/U9Dk78LwtZA4D.',NULL,'2023-05-08 03:15:44','2023-05-08 03:15:44'),(17,'Winter Ratliff','cafucul@mailinator.com','Siswa',NULL,NULL,'$2y$10$ztItVBXH/fRR66Q9sbGT5.9MUXf3t88Bu0dL3gPxjAqGccaQIUh86',NULL,'2023-05-17 11:11:11','2023-05-17 11:11:11'),(18,'veri','veri@gmail','Siswa',NULL,NULL,'$2y$10$resYWPSiRAO66cssCoqitO2QzuD5micivJvDD2vrSQMhdTzIC1zbS',NULL,'2023-05-19 18:57:37','2023-05-19 18:57:37'),(19,'Stuart Fry','netipac@mailinator.com','Siswa',NULL,NULL,'$2y$10$Ak9MSMF92EWrJKlLHTEI.Ok3u8J2k0VWIrpODTytI7WAP2J8CJCzq',NULL,'2023-05-20 10:49:41','2023-05-20 10:49:41'),(20,'ucokkk','ucok','Siswa',NULL,NULL,'$2y$10$MO3jU/q1cA8ySaXuTLUMF.eaaognLVZw8b5.PhcR/ehsvGEkkPZtS',NULL,'2023-05-26 08:28:26','2023-05-26 08:28:26'),(22,'cugik','cugik','Siswa',NULL,NULL,'$2y$10$NqOeeOXYrgyuFwqE.YrPTekaLvnMZKHrLTTIPZHEMsitFDkrOaWs6',NULL,'2023-06-03 10:46:29','2023-06-03 10:46:29'),(23,'rivaldo','rivaldo','Siswa',NULL,NULL,'$2y$10$e6WaXdBDgY4zD/Xtgd5A3OSSutF6AJLg.RRgsNuY6QHk//I96xllu',NULL,'2023-06-04 15:38:55','2023-06-04 15:38:55'),(24,'anto','anto','Siswa',NULL,NULL,'$2y$10$.ktZLsSVxAHSuEukjRjAYuxtnq0QMdTTqZjEIjMuIMlvnZh183/6a',NULL,'2023-06-06 11:35:19','2023-06-06 11:35:19'),(27,'SALIM MUHAIMIN,S.Pd,M.Si','kepaladinas@gmail.com','Kepala Dinas','4225285252525',NULL,'$2y$10$t/12Cxh2RM27mYwSmQ6FzOm.uV0rMLmXgyJBAgL70FH3.MdR58lZe',NULL,'2023-06-07 15:39:17','2023-06-07 15:39:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zonasi_sekolahs` */

insert  into `zonasi_sekolahs`(`id`,`nagari_id`,`kampung_id`,`kecamatan_id`,`sekolah_id`,`no_urut`,`nilai`,`created_at`,`updated_at`) values (13,10,7,7,4,'1','70','2023-05-29 17:10:44','2023-05-29 17:10:44'),(14,10,8,7,4,'2','69','2023-05-29 17:17:02','2023-05-29 17:17:02'),(15,8,11,10,3,'1','70','2023-06-06 11:42:24','2023-06-06 11:50:38'),(37,13,10,7,1,'1','70','2023-06-07 11:19:10','2023-06-07 11:19:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zonasis` */

insert  into `zonasis`(`id`,`sekolah_id`,`siswa_id`,`created_at`,`updated_at`,`status`) values (1,4,9,'2023-04-18 07:24:12','2023-05-29 21:02:16','1'),(3,4,11,'2023-05-01 07:15:05','2023-05-29 21:00:15','1'),(22,4,12,'2023-05-19 19:02:26','2023-05-29 21:00:15','1'),(24,1,10,'2023-06-07 11:24:53','2023-06-07 11:24:53','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
