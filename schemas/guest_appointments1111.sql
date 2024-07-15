/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `guest_appointments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('p','l') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_with` int DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_date` date NOT NULL,
  `people_amount` int NOT NULL,
  `guest_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `appointment_type` enum('janji_temu','buku_tamu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `meeting_with` (`meeting_with`),
  CONSTRAINT `guest_appointments_ibfk_1` FOREIGN KEY (`meeting_with`) REFERENCES `employees` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `guest_appointments` (`id`, `name`, `address`, `gender`, `phone`, `meeting_with`, `purpose`, `appointment_time`, `appointment_date`, `people_amount`, `guest_photo`, `created_at`, `updated_at`, `appointment_type`, `email`) VALUES
(5, 'Budi', 'Jl Pahlawan No 123', 'l', '082121273909', 2, 'Memberikan Kiriman', '10:00:00', '2024-07-14', 1, 'php/uploads/668120372b0ce1719738423.1763.jpg', '2024-06-30 16:07:03', '2024-06-30 16:08:25', 'janji_temu', 'nurul@gmail.com');
INSERT INTO `guest_appointments` (`id`, `name`, `address`, `gender`, `phone`, `meeting_with`, `purpose`, `appointment_time`, `appointment_date`, `people_amount`, `guest_photo`, `created_at`, `updated_at`, `appointment_type`, `email`) VALUES
(6, 'Indah Yastami', 'Jl RE Martadinata No 456 ', 'p', '081232344342', 1, 'Memberikan Hadiah', '12:00:00', '2024-07-11', 2, 'php/uploads/668296c25c7451719834306.3787.jpg', '2024-07-01 18:45:06', '2024-07-01 18:45:06', 'janji_temu', 'indahy@gmail.com');
INSERT INTO `guest_appointments` (`id`, `name`, `address`, `gender`, `phone`, `meeting_with`, `purpose`, `appointment_time`, `appointment_date`, `people_amount`, `guest_photo`, `created_at`, `updated_at`, `appointment_type`, `email`) VALUES
(7, 'Bambang Hartono', 'Jl Irjen Polri No 289', 'l', '0821239183', 2, '', '10:00:00', '2024-07-17', 12, 'php/uploads/66829ce99c8cb1719835881.6412.jpg', '2024-07-01 19:11:21', '2024-07-01 19:11:21', 'janji_temu', 'bambang@gmail.com');
INSERT INTO `guest_appointments` (`id`, `name`, `address`, `gender`, `phone`, `meeting_with`, `purpose`, `appointment_time`, `appointment_date`, `people_amount`, `guest_photo`, `created_at`, `updated_at`, `appointment_type`, `email`) VALUES
(8, 'Samsudin', 'Jl Pahlawan No 123', 'l', '081213213123', 1, 'Memberikan Kiriman', '10:00:00', '2024-07-11', 12, 'php/uploads/6682ae8cdf8561719840396.9155.jpg', '2024-07-01 20:26:36', '2024-07-01 20:26:36', 'janji_temu', 'owner@email.com'),
(9, 'Haji Thoriq', 'Jl Pahlawan No 123', 'l', '081213213123', 2, 'Memberikan Kiriman', '19:00:00', '2024-07-25', 12, 'php/uploads/6682aeb674b361719840438.478.jpg', '2024-07-01 20:27:18', '2024-07-01 20:27:18', 'janji_temu', 'owner@email.com'),
(10, 'Jerome Polin', 'Jl Pahlawan No 123', 'l', '081213213123', 1, 'Memberikan Kiriman', '11:00:00', '2024-07-25', 12, 'php/uploads/6682aee5c63481719840485.8119.jpg', '2024-07-01 20:28:05', '2024-07-01 20:28:05', 'janji_temu', 'owner@email.com'),
(11, 'Paul Pogba', 'Jl Pahlawan No 123', 'l', '082121273909', 1, 'Bermain', '12:00:00', '2024-07-17', 12, 'php/uploads/6682af0752a891719840519.3386.jpg', '2024-07-01 20:28:39', '2024-07-01 20:28:39', 'janji_temu', 'owner@email.com'),
(12, 'Johan Cruijff', 'Jl Pahlawan No 123', 'l', '081213213123', 1, 'Memberikan Kiriman', '20:32:00', '2024-07-18', 1, 'php/uploads/6682af571e1cb1719840599.1233.jpg', '2024-07-01 20:29:59', '2024-07-01 20:29:59', 'janji_temu', 'owner@email.com'),
(13, 'Maria', 'Jl Pahlawan No 123', 'p', '081213213123', 1, 'Memberikan Kiriman', '00:33:00', '2024-07-13', 1, 'php/uploads/6682af70c832c1719840624.82.jpg', '2024-07-01 20:30:24', '2024-07-01 20:30:24', 'janji_temu', 'masagi@gmail.com'),
(14, 'Supri', 'Jl Pahlawan No 123', 'l', '081213213123', 1, 'Memberikan Kiriman', '23:33:00', '2024-07-18', 1, 'php/uploads/6682af94b7ea31719840660.7533.jpg', '2024-07-01 20:31:00', '2024-07-01 20:31:00', 'janji_temu', 'owner@email.com'),
(15, 'Wulan Guritno', 'Jl Pahlawan No 123', 'p', '081213213123', 2, 'Memberikan Kiriman', '01:36:00', '2024-07-20', 1, 'php/uploads/6682afad3993e1719840685.2358.jpg', '2024-07-01 20:31:25', '2024-07-01 20:31:25', 'janji_temu', 'masagi@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;