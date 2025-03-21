# tabulator
Fetching the data through API and Append in tabulator


run this file to your data base
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.41 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_student
CREATE DATABASE IF NOT EXISTS `db_student` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_student`;

-- Dumping structure for table db_student.tbl_student
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_student.tbl_student: ~80 rows (approximately)
INSERT INTO `tbl_student` (`id`, `name`, `age`, `grade`, `email`, `dob`, `is_active`) VALUES
	(1, 'John Doe', 16, '10th', 'john.doe@example.com', '2007-05-12', 'Y'),
	(2, 'Jane Smith', 17, '11th', 'jane.smith@example.com', '2006-08-25', 'Y'),
	(3, 'Alice Johnson', 15, '9th', 'alice.johnson@example.com', '2008-02-14', 'Y'),
	(4, 'Bob Brown', 18, '12th', 'bob.brown@example.com', '2005-11-30', 'Y'),
	(5, 'Charlie Davis', 16, '10th', 'charlie.davis@example.com', '2007-07-04', 'Y'),
	(6, 'Emma Wilson', 14, '8th', 'emma.wilson@example.com', '2009-01-20', 'Y'),
	(7, 'David Miller', 17, '11th', 'david.miller@example.com', '2006-09-15', 'Y'),
	(8, 'Sophia Taylor', 16, '10th', 'sophia.taylor@example.com', '2007-04-28', 'Y'),
	(9, 'Michael Moore', 15, '9th', 'michael.moore@example.com', '2008-10-10', 'Y'),
	(10, 'Isabella Lee', 16, '10th', 'isabella.lee@example.com', '2007-06-22', 'Y')

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;



configure db.php according to as Your localfile
define("DB_DSN", "mysql:host=db;dbname=db_student");
define("DB_USERNAME", "raut"); //as your username
define("DB_PASSWORD", "raut"); // as your password

