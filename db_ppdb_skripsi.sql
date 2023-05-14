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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `afirmasis` */

insert  into `afirmasis`(`id`,`sekolah_id`,`siswa_id`,`kk`,`skl`,`kip`,`sktm`,`status`,`created_at`,`updated_at`) values (2,1,1,'file/kk/OShxP0tX0RE5SAhDfW4HhZpDEEUP4ZkFSpHSFsgh.jpg','file/skl/oF4UzTQLY7gBf4fRzX8ZpCaauM1zl8Lc3Z69SfGt.jpg','file/kip/8VsrKlajw4nrElgaiE21IrHRRImoFyLnQh3MgbJP.png','file/sktm/VWO8PZ8w34x85oQfGUSeZHgBlNmxEwE1LDvHZzfW.png',2,'2023-04-05 08:18:45','2023-04-05 08:18:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kampungs` */

insert  into `kampungs`(`id`,`nama_kampung`,`nagari_id`,`kecamatan_id`,`created_at`,`updated_at`) values (6,'HILALANG',10,7,'2023-04-18 01:43:55','2023-04-18 03:04:48'),(7,'AJO',10,7,'2023-04-18 02:42:25','2023-04-18 02:42:25'),(8,'OIOI',10,7,'2023-04-18 02:56:03','2023-04-18 02:56:03'),(10,'NDK TAU',13,7,'2023-04-18 06:56:06','2023-04-18 06:56:06');

/*Table structure for table `kecamatans` */

DROP TABLE IF EXISTS `kecamatans`;

CREATE TABLE `kecamatans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kecamatans` */

insert  into `kecamatans`(`id`,`nama_kecamatan`,`created_at`,`updated_at`) values (7,'LENGAYANG','2023-04-16 10:59:47','2023-04-16 11:01:42'),(10,'PANCUNG SOAL','2023-04-17 07:34:27','2023-04-17 07:34:27');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_02_26_031122_create_sekolahs_table',1),(6,'2023_03_02_021830_create_penghasilans_table',1),(7,'2023_03_03_094356_create_pekerjaans_table',1),(8,'2023_03_04_063941_create_siswas_table',1),(12,'2023_03_17_090325_create_prestasis_table',2),(13,'2023_03_23_050230_create_penghargaans_table',3),(15,'2023_04_01_044926_add_bukti_nilai_rapor_to_prestasis_table',4),(16,'2023_04_02_041217_create_afirmasis_table',5),(18,'2023_04_05_065937_create_pindah_tugas_table',6),(19,'2023_04_08_055721_add_no_pendaftaran_to_siswas_table',7),(20,'2023_04_16_081854_create_kecamatans_table',8),(21,'2023_04_17_021047_create_nagaris_table',9),(22,'2023_04_17_064832_create_kampungs_table',10),(24,'2023_04_18_015907_create_zonasi_sekolahs_table',11),(25,'2023_04_18_043329_add_nagari_to_siswas_table',12),(26,'2023_04_18_055027_add_sekolah_id_to_zonasi_sekolahs_table',13),(27,'2023_04_18_060229_create_zonasis_table',14),(28,'2014_10_00_000000_create_settings_table',15),(29,'2014_10_00_000001_add_group_column_on_settings_table',15);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penghargaans` */

insert  into `penghargaans`(`id`,`siswa_id`,`nama_penghargaan`,`tahun`,`file`,`created_at`,`updated_at`) values (1,3,'Juara 1','2022','lampu.jpg','2023-03-23 10:22:12','2023-03-23 10:22:12'),(2,3,'Juara 3','2023','logo dinas.png','2023-03-23 10:22:12','2023-03-23 10:22:12'),(3,1,'Juara 2','2022',NULL,'2023-03-24 11:24:41','2023-03-24 11:24:44'),(10,5,'Ex nisi quia cillum','1212','devchallenges.png','2023-03-24 09:09:25','2023-03-24 09:09:25'),(11,5,'Juara 1','2021','Scarecrow.png','2023-04-01 05:16:25','2023-04-01 05:16:25'),(12,5,'Nulla voluptate cons','2022','favicon.png','2023-04-01 05:30:17','2023-04-01 05:30:17'),(13,5,'Eveniet numquam ten','2020inventore aut','favicon.png','2023-04-01 05:31:54','2023-04-01 05:31:54'),(14,5,'Aut eum dolore conse','2020','Scarecrow.png','2023-04-01 05:33:55','2023-04-01 05:33:55'),(15,9,'juara 1','2022','kip.jpg','2023-04-15 08:33:16','2023-04-15 08:33:16');

/*Table structure for table `penghasilans` */

DROP TABLE IF EXISTS `penghasilans`;

CREATE TABLE `penghasilans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penghasilans` */

insert  into `penghasilans`(`id`,`nama`,`created_at`,`updated_at`) values (1,'Rp.0 s/d Rp.500,000','2023-03-04 14:07:42','2023-03-04 14:07:42'),(2,'Rp.500,000 s/d Rp.1.000,000','2023-03-04 14:07:46','2023-03-04 14:07:46'),(3,'Rp.1.000,000 s/d Rp.1.500,000','2023-03-04 14:07:54','2023-03-04 14:07:54'),(4,'Rp.1.500,000 s/d Rp.2.000,000','2023-03-04 14:07:58','2023-03-04 14:07:58'),(5,'Rp.2.000,000 s/d Rp.2.500,000','2023-03-04 14:08:03','2023-03-04 14:08:03'),(6,'Rp.2.500,000 s/d Rp.3.000,000','2023-03-04 14:08:08','2023-03-04 14:08:08'),(7,'Rp.3.500,000 s/d Rp.4.000,000','2023-03-04 14:08:14','2023-03-04 14:08:14'),(8,'> Rp.4.000,000','2023-03-04 14:08:25','2023-03-04 14:08:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pindah_tugas` */

insert  into `pindah_tugas`(`id`,`siswa_id`,`sekolah_id`,`file`,`status`,`created_at`,`updated_at`) values (1,5,1,'file/pindahtugas/hsDS3AHknjyL0kqfnH6JxHq3iY41i9FuY1rIPOqH.pdf',1,'2023-04-08 11:03:46','2023-04-08 11:03:46'),(2,8,1,'file/pindahtugas/lxAJvke4OGvNF18PVOBtdr2K021dflKjjJQp5cE0.jpg',1,'2023-04-14 08:17:34','2023-04-14 08:23:27'),(3,2,3,'file/pindahtugas/YxG7DvlpWw5GuFVtCJTdG4mKZmOATyHP8f3OKtB9.png',1,'2023-04-18 04:05:00','2023-04-18 04:09:13');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `prestasis` */

insert  into `prestasis`(`id`,`sekolah_id`,`siswa_id`,`k6sm1`,`k6sm2`,`k5sm1`,`k5sm2`,`k4sm2`,`jumlah`,`bukti_nilai_rapor`,`status`,`created_at`,`updated_at`) values (1,1,7,90,90,80,80,80,80,NULL,1,NULL,NULL);

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

insert  into `sekolahs`(`id`,`sekolah_id`,`npsn`,`nama`,`alamat`,`akreditasi`,`kecamatan`,`notelp`,`user_id`,`created_at`,`updated_at`) values (1,2,'1231231','SMA N 6 PADANG','Adipisci voluptate ipsa sed ducimus non','A','Et qui animi do eaq','0786968',1,'2023-03-05 02:16:52','2023-03-05 02:17:08'),(3,12,'65252662','SMP 2 PADANG','<p>hddd</p>','A','Padang Selatan','0837383',1,'2023-04-15 08:41:31','2023-04-15 08:41:57'),(4,7,'1212121','SMP 3 PADANG','<p>afafaf</p>','A','Mollitia sequi volup','4754745745',1,'2023-04-18 06:52:54','2023-04-18 06:53:11');

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

insert  into `settings`(`id`,`name`,`val`,`group`,`created_at`,`updated_at`) values (1,'app_name','DINAS PENDIDIKAN DAN KEBUDAYAAN PESISIR SELATAN','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(2,'app_email','diknaspessel@gmail.com','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(3,'app_phone','(0756) 21602','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(4,'app_address','<p>Jalan H. Agus Salim, Painan</p>','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(5,'pj_nama','Salim Muhaimin','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(6,'pj_jabatan','Kepala Dinas','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(7,'app_logo','public/nEu9wtbLmynGO9GjvOfFXvo28e7hFozAvFjd9nPQ.png','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(8,'pj_ttd','public/Pvwyo8bPXLCWbnmtqLnNGNObNPVPIv5BnH8kCaAv.png','default','2023-05-02 02:51:33','2023-05-02 02:51:33'),(9,'awal_pendaftaran','2023-05-02','default','2023-05-02 03:44:46','2023-05-02 03:53:43'),(10,'akhir_pendaftaran','2023-05-31','default','2023-05-02 03:44:47','2023-05-02 03:53:26'),(11,'jadwa_kelulusan','2023-06-02','default','2023-05-02 03:54:41','2023-05-02 03:54:41');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siswas` */

insert  into `siswas`(`id`,`no_pendaftaran`,`nama_lengkap`,`nisn`,`tempat_lahir`,`tanggal_lahir`,`jenis_kelamin`,`agama`,`sekolah_asal`,`no_kk`,`no_nik`,`alamat`,`foto`,`nama_ayah`,`pekerjaan_ayah`,`penghasilan_ayah`,`nama_ibu`,`pekerjaan_ibu`,`penghasilan_ibu`,`user_id`,`kecamatan_id`,`nagari_id`,`kampung_id`,`created_at`,`updated_at`) values (1,NULL,'Fazeel Muhammad','14141','Padang','2004-03-11','L','Islam','Dolor pariatur Natu','12','13131313','Dolorum alias laboru','public/tqZx3MavLwLfQlvluYQ7gNp6xYtURYkS015nq9r3.png','Junaidi','PNS','> Rp.4.000,000','Daniel Benjamin','Ibu Rumah Tangga','Rp.1.000,000 s/d Rp.1.500,000',4,NULL,NULL,NULL,'2023-03-04 14:09:46','2023-03-16 11:15:22'),(2,'20230804002','Nanda Kuriak','1231','Padang','1992-01-01','L','Hindu','Natus et et consecte','Non doloremque neces','Sint sapiente assume','Ut iure maxime volup','public/39jWKxum2obTFSgIF0FtP6hfV0ayg5yFSsZu6PyR.png','Alyssa Sheppard','TNI/POLRI','Rp.3.500,000 s/d Rp.4.000,000','Elaine Odom','Wiraswasta','Rp.3.500,000 s/d Rp.4.000,000',6,NULL,NULL,NULL,'2023-03-05 03:16:44','2023-03-05 03:53:14'),(5,'20230804003','afafafaf','3111111111','Padang','2023-03-24','L','Islam','SD N 1','1313123131313131','1321312313131313','Jl.Permata','public/LZEAPlKAOAVtOfBBNY5JzGE1oHvhRFt1A4qOCbM3.png','Martena Frazier','TNI/POLRI','Rp.0 s/d Rp.500,000','Yvette Dorsey','Wiraswasta','Rp.500,000 s/d Rp.1.000,000',9,NULL,NULL,NULL,'2023-03-24 08:25:44','2023-03-24 08:25:44'),(7,'20230804004','Do sed vero esse ev','1234567890','Medan','2011-12-17','P','Islam','Autem quia rerum dol','1234567890123456','1234567890123456','<p>Jl.Mantap Cuy</p>','public/O19wfCdPrlq8SJqPqlDp5HxUbhdP12C7sJzL9sIM.png','Blaine Park','TNI/POLRI','Rp.3.500,000 s/d Rp.4.000,000','Jorden Booth','PNS','> Rp.4.000,000',3,NULL,NULL,NULL,'2023-04-08 06:34:05','2023-04-08 06:34:05'),(8,'20231404005','oioioi','1234567891','Padang','2023-04-14','L','Islam','SD N 1 PADANG','1214124124141414','2525114141414414','<p>Jl.fahfjahfa</p>','public/mAIeVsRKfD3cWCvR9RW2zys7l31Xc2U9sgQHdY8H.png','Coy coy','PNS','> Rp.4.000,000','Kevin Raymond','Ibu Rumah Tangga','Rp.3.500,000 s/d Rp.4.000,000',10,NULL,NULL,NULL,'2023-04-14 08:16:36','2023-04-14 08:16:36'),(9,'20231504006','Dolor eaque minim il','1234568979','paoaa','1979-10-21','L','Islam','Nemo repudiandae qua','1577267265257526','2562656752675675','<p>jhjhjh</p>','public/A5vS64FGcgSw0VzHQjVVtGCaASvx2r7vsjA1t5pr.png','Dean Barrera','Swastaa','Rp.1.500,000 s/d Rp.2.000,000','Melinda Gamble','Swastaa','Rp.3.500,000 s/d Rp.4.000,000',11,7,13,10,'2023-04-15 08:30:47','2023-04-18 07:10:34'),(10,'20231804007','Aliquid nulla quam v','1234252352','Padang','1985-11-02','L','Islam','Dolor culpa tempora','5235252352314144','2352521342143242','<p>afafafaf</p>','public/Hdgq2e1m7EpScC5PqvUMSBzY5ASaI2pU5loTwplV.png','Briar Short','TNI/POLRI','Rp.0 s/d Rp.500,000','Wang Pate','Wiraswasta','> Rp.4.000,000',13,7,10,6,'2023-04-18 04:50:32','2023-04-18 05:19:40'),(11,'20230105008','Et eaque eos odio v','4745745745','Padang Panjag','2003-06-20','L','Islam','Quia molestiae in ac','4868568585858568','7467474484856856','<p>Jl.Kampung Indah</p>','public/QVvFOtxBKuqSjO7jaUgpQNYTQEtI8wl2MHN3LZR1.png','Roanna Marks','TNI/POLRI','Rp.1.000,000 s/d Rp.1.500,000','Keegan Caldwell','TNI/POLRI','Rp.500,000 s/d Rp.1.000,000',15,7,10,6,'2023-05-01 07:10:32','2023-05-01 07:10:32');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` enum('Admin Dinas','Admin Sekolah','Siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa',
  `nohp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`akses`,`nohp`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'dinas','dinas@contoh.com','Admin Dinas','081234567890','2023-03-04 14:05:09','$2y$10$RamXKMFXp4JlY5h3UGBiKe9udwGltGtAt/v51zbTo9Fv3of39hrda',NULL,'2023-03-04 14:05:09','2023-03-04 14:05:09'),(2,'sekolah','sekolah@contoh.com','Admin Sekolah','081234567890','2023-03-04 14:05:09','$2y$10$cHuuTRAuD2JqbksKg9uYQuMX1Z9T57qR0kq1o0yJgVF7pnRNlY1Ji',NULL,'2023-03-04 14:05:09','2023-03-04 14:05:09'),(3,'siswa','siswa@contoh.com','Siswa','081234567890','2023-03-04 14:05:09','$2y$10$4h7THZzVRAnchtqp.BT5D.vYckUKIVwICvJWht1c38IWOdT5DAgvi',NULL,'2023-03-04 14:05:09','2023-03-04 14:05:09'),(4,'FAZEEL MUHAMMAD ZUHDI','fazeelmuhammadzuhdi@gmail.com','Siswa',NULL,NULL,'$2y$10$uQGkil2ArtD.7AOFryXWBu/4qU8cF.rrMCFLIjWTsvWWnCfDyuueK',NULL,'2023-03-04 14:05:40','2023-03-04 14:05:40'),(5,'afafa','131232131@mailinator.com','Siswa','131414141412',NULL,'$2y$10$I5fikzQEuWNPP3guNIDAhufeS7BQq6au1puViULbZgvzxT05Mv4kq',NULL,'2023-03-04 14:45:11','2023-03-05 05:11:41'),(6,'Mikayla Vaughn','vymez@mailinator.com','Siswa','6856',NULL,'$2y$10$miRuYhOslYkK2Jdbz9bh8.FW03xPwtFjtGiBC2skpx9jcBgdLmXcW',NULL,'2023-03-05 02:49:50','2023-03-05 04:57:19'),(7,'Destiny Webb','keso@mailinator.com','Admin Sekolah','36363636363',NULL,'$2y$10$/k4GcJzDrjnF3dIWZ/VyJuEE/d4plNAHgmsdvkKn6RpcF58FROQCK',NULL,'2023-03-17 10:50:59','2023-03-17 10:50:59'),(8,'agung','agung@gmail.com','Siswa',NULL,NULL,'$2y$10$SUWaKK4j3g/oPeS1OCfI.uPAqKj4Ktgh99Hn.CHtdLHAN5E.F8Zc6',NULL,'2023-03-21 07:34:22','2023-03-21 07:34:22'),(9,'Acton Clayton','zuneh@mailinator.com','Siswa',NULL,NULL,'$2y$10$3NhRt1pKDKNE4yOgtNXLL.rUxZnfF/K.bLeHHTOy0LhyoHpgcQVfa',NULL,'2023-03-22 01:27:11','2023-03-22 01:27:11'),(10,'oioioi','oioi@gmail.com','Siswa',NULL,NULL,'$2y$10$qFAVzCC8FYNHFkUwpSuEE./xBLgX1khZRiFYOPpXAH14mrK/gWTcy',NULL,'2023-04-14 08:10:44','2023-04-14 08:10:44'),(11,'Chancellor Savage','vovof@mailinator.com','Siswa',NULL,NULL,'$2y$10$tH1QpH9IxNM.UA8MLSmCNOLFOraacfdIAcMQsrtUABRmxMx8CuqaS',NULL,'2023-04-15 08:28:23','2023-04-15 08:28:23'),(12,'ucokk','ucok@gmail.com','Admin Sekolah','0873837',NULL,'$2y$10$RamXKMFXp4JlY5h3UGBiKe9udwGltGtAt/v51zbTo9Fv3of39hrda',NULL,'2023-04-15 08:40:39','2023-04-15 08:40:39'),(13,'Fuller Logan','diqina@mailinator.com','Siswa',NULL,NULL,'$2y$10$kG4veqQTkJX0njuc0gyaHOlQzWQbaYDJu8yY8.3M6GMePcpkbtNpu',NULL,'2023-04-18 04:19:58','2023-04-18 04:19:58'),(14,'Gisela Moses','zenobasuq@mailinator.com','Siswa',NULL,NULL,'$2y$10$WZthStcjkEMG7s7wHQ/l/Odra3B8AeVNt5SeM3gvYr4m5iX7TFFzS',NULL,'2023-04-18 05:20:33','2023-04-18 05:20:33'),(15,'Irfan','ipan@gmail.com','Siswa',NULL,NULL,'$2y$10$BpvpdNMD/DKw5ekt2K2l/esOFiJcWwtPQfiSH6pyTqMlRB.8aoSAq',NULL,'2023-05-01 07:04:56','2023-05-01 07:04:56');

/*Table structure for table `zonasi_sekolahs` */

DROP TABLE IF EXISTS `zonasi_sekolahs`;

CREATE TABLE `zonasi_sekolahs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nagari_id` bigint(20) unsigned NOT NULL,
  `kampung_id` bigint(20) unsigned NOT NULL,
  `kecamatan_id` bigint(20) unsigned NOT NULL,
  `sekolah_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zonasi_sekolahs` */

insert  into `zonasi_sekolahs`(`id`,`nagari_id`,`kampung_id`,`kecamatan_id`,`sekolah_id`,`created_at`,`updated_at`) values (1,10,6,7,1,'2023-04-18 05:55:13','2023-04-18 05:55:13'),(2,10,6,7,3,'2023-04-18 06:35:12','2023-04-18 06:35:12'),(3,13,10,7,4,'2023-04-18 06:56:51','2023-04-18 06:56:51'),(4,10,6,7,4,'2023-05-01 04:48:09','2023-05-01 04:48:09'),(5,10,7,7,4,'2023-05-01 04:48:21','2023-05-01 04:48:21');

/*Table structure for table `zonasis` */

DROP TABLE IF EXISTS `zonasis`;

CREATE TABLE `zonasis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sekolah_id` bigint(20) unsigned NOT NULL,
  `siswa_id` bigint(20) unsigned NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `zonasis` */

insert  into `zonasis`(`id`,`sekolah_id`,`siswa_id`,`status`,`created_at`,`updated_at`) values (1,4,9,1,'2023-04-18 07:24:12','2023-05-01 07:00:58'),(2,1,10,NULL,'2023-04-19 05:52:13','2023-04-19 06:03:38'),(3,4,11,NULL,'2023-05-01 07:15:05','2023-05-01 07:15:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
